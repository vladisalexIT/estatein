<?php
// Save a request in Bitrix. No mail sending or newsletter activation is performed here.
define('NO_KEEP_STATISTIC', true);
define('NO_AGENT_STATISTIC', true);
define('PUBLIC_AJAX_MODE', true);

$estateinBufferLevel = ob_get_level();
ob_start();

function estateinRespond(int $status, array $data): void
{
    global $estateinBufferLevel;
    while (ob_get_level() > $estateinBufferLevel) {
        ob_end_clean();
    }
    http_response_code($status);
    header('Content-Type: application/json; charset=UTF-8');
    header('Cache-Control: no-store');
    header('X-Content-Type-Options: nosniff');
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}

try {
    require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Allow: POST');
        estateinRespond(405, ['success' => false, 'message' => 'Use a POST request.']);
    }

    if ((int)($_SERVER['CONTENT_LENGTH'] ?? 0) > 65536 || !empty($_FILES)) {
        estateinRespond(413, ['success' => false, 'message' => 'The request is too large.']);
    }

    foreach ($_POST as $value) {
        if (!is_string($value) || !mb_check_encoding($value, 'UTF-8')) {
            estateinRespond(400, ['success' => false, 'message' => 'Invalid request format.']);
        }
    }

    if (!check_bitrix_sessid()) {
        estateinRespond(403, ['success' => false, 'message' => 'Your session has expired. Reload the page and try again.']);
    }

    if (trim($_POST['website'] ?? '') !== '') {
        estateinRespond(400, ['success' => false, 'message' => 'Unable to accept this request.']);
    }

    $type = $_POST['form_type'] ?? '';
    $titles = [
        'contacts' => 'Contact request',
        'property_inquiry' => 'Property inquiry',
        'property_details' => 'Property details inquiry',
        'newsletter' => 'Newsletter request',
    ];
    if (!isset($titles[$type])) {
        estateinRespond(422, ['success' => false, 'message' => 'Unknown form type.']);
    }

    // Session limits are deliberately simple; this is not a replacement for CAPTCHA.
    $now = time();
    if (
        $now - (int)($_SESSION['ESTATEIN_FORM_ATTEMPT'] ?? 0) < 2 ||
        $now - (int)($_SESSION['ESTATEIN_FORM_SUCCESS'] ?? 0) < 15
    ) {
        estateinRespond(429, ['success' => false, 'message' => 'Please wait a few seconds before sending another request.']);
    }
    $_SESSION['ESTATEIN_FORM_ATTEMPT'] = $now;

    $required = $type === 'newsletter'
        ? ['email', 'privacy_agreement']
        : ['first_name', 'last_name', 'email', 'phone', 'message', 'privacy_agreement'];

    $choices = [];
    if ($type === 'contacts') {
        $required[] = 'inquiry_type';
        $choices = [
            'inquiry_type' => ['buy', 'sell', 'manage', 'invest'],
            'source' => ['', 'google', 'social', 'friend', 'other'],
        ];
    } elseif ($type === 'property_inquiry') {
        $required = array_merge($required, ['property_type', 'budget', 'contact_method']);
        $choices = [
            'location' => ['', 'new-york', 'california', 'florida'],
            'property_type' => ['house', 'apartment', 'villa'],
            'bathrooms' => ['', '1', '2', '3', '4-plus'],
            'bedrooms' => ['', '1', '2', '3', '4-plus'],
            'budget' => ['0-250000', '250000-500000', '500000-plus'],
            'contact_method' => ['phone', 'email'],
        ];
    } elseif ($type === 'property_details') {
        $required[] = 'selected_property';
        $choices = [
            'selected_property' => [
                'Seaside Serenity Villa, Malibu, California',
                'Metropolitan Haven, New York City, NY',
                'Rustic Retreat Cottage, Aspen, Colorado',
                'Coastal Elegance, Miami, Florida',
                'Urban Vista Apartment, Chicago, Illinois',
                'Countryside Haven, Austin, Texas',
            ],
        ];
    }

    $limits = ['email' => 254, 'privacy_agreement' => 2];
    if ($type !== 'newsletter') {
        $limits += ['first_name' => 100, 'last_name' => 100, 'phone' => 25, 'message' => 5000];
    }
    foreach ($choices as $field => $allowed) {
        $limits[$field] = 200;
    }

    $data = [];
    $errors = [];
    foreach ($limits as $field => $limit) {
        $value = trim($_POST[$field] ?? '');
        $data[$field] = $value;
        if (in_array($field, $required, true) && $value === '') {
            $errors[$field] = 'Please complete this field.';
        } elseif (mb_strlen($value, 'UTF-8') > $limit) {
            $errors[$field] = 'This value is too long.';
        } elseif (preg_match('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', $value)) {
            $errors[$field] = 'Remove unsupported control characters.';
        }
    }

    if ($data['email'] !== '' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email address.';
    }
    if ($type !== 'newsletter' && !preg_match('/^\+7 \([0-9]{3}\) [0-9]{3}-[0-9]{4}$/D', $data['phone'])) {
        $errors['phone'] = 'Enter a complete phone number.';
    }
    if ($data['privacy_agreement'] !== 'on') {
        $errors['privacy_agreement'] = 'Please confirm your consent.';
    }
    foreach ($choices as $field => $allowed) {
        if (!in_array($data[$field], $allowed, true)) {
            $errors[$field] = 'Please select an option.';
        }
    }
    if ($errors) {
        estateinRespond(422, ['success' => false, 'message' => 'Please check the highlighted fields.', 'errors' => $errors]);
    }

    $config = require $_SERVER['DOCUMENT_ROOT'] . '/local/config/estatein.php';
    $iblockId = (int)($config['requests_iblock_id'] ?? 0);
    if ($iblockId <= 0 || !\Bitrix\Main\Loader::includeModule('iblock')) {
        estateinRespond(503, ['success' => false, 'message' => 'The form service is not configured yet.']);
    }
    $iblock = CIBlock::GetList(
        [],
        [
            'ID' => $iblockId,
            'ACTIVE' => 'Y',
            'CHECK_PERMISSIONS' => 'N',
        ]
    )->Fetch();

    if (!$iblock || $iblock['CODE'] !== 'estatein_requests') {
        estateinRespond(503, [
            'success' => false,
            'message' => 'The form service is not configured correctly.',
        ]);
    }
    $existingProperties = [];
    $propertyResult = CIBlockProperty::GetList([], ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y']);
    while ($property = $propertyResult->Fetch()) {
        $existingProperties[$property['CODE']] = $property;
    }
    foreach (['FORM_TYPE', 'FIRST_NAME', 'LAST_NAME', 'EMAIL', 'PHONE', 'CONSENT'] as $code) {
        if (!isset($existingProperties[$code]) || $existingProperties[$code]['PROPERTY_TYPE'] !== 'S' || $existingProperties[$code]['MULTIPLE'] !== 'N') {
            estateinRespond(503, ['success' => false, 'message' => 'The request fields are not configured correctly.']);
        }
    }

    $labels = [
        'first_name' => 'First name',
        'last_name' => 'Last name',
        'email' => 'Email',
        'phone' => 'Phone',
        'inquiry_type' => 'Inquiry type',
        'source' => 'Source',
        'location' => 'Location',
        'property_type' => 'Property type',
        'bathrooms' => 'Bathrooms',
        'bedrooms' => 'Bedrooms',
        'budget' => 'Budget',
        'contact_method' => 'Contact method',
        'selected_property' => 'Selected property',
        'message' => 'Message',
    ];
    $lines = ['Form: ' . $titles[$type]];
    foreach ($labels as $field => $label) {
        if (!isset($data[$field]) || $data[$field] === '') continue;
        $lines[] = $label . ': ' . $data[$field];
    }
    $lines[] = 'Consent: confirmed';

    $element = new CIBlockElement();
    $id = $element->Add([
        'IBLOCK_ID' => $iblockId,
        'ACTIVE' => 'Y',
        'NAME' => $titles[$type] . ' — ' . ($data['email'] ?? ''),
        'DETAIL_TEXT' => implode("\n\n", $lines),
        'DETAIL_TEXT_TYPE' => 'text',
        'PROPERTY_VALUES' => [
            'FORM_TYPE' => $type,
            'FIRST_NAME' => $data['first_name'] ?? '',
            'LAST_NAME' => $data['last_name'] ?? '',
            'EMAIL' => $data['email'],
            'PHONE' => $data['phone'] ?? '',
            'CONSENT' => 'Yes',
        ],
    ]);
    if (!$id) {
        AddMessage2Log('Estatein request save failed: ' . $element->LAST_ERROR, 'estatein_forms');
        estateinRespond(500, ['success' => false, 'message' => 'Unable to save your request. Please try again later.']);
    }

    $_SESSION['ESTATEIN_FORM_SUCCESS'] = $now;
    estateinRespond(200, ['success' => true]);
} catch (Throwable $exception) {
    if (function_exists('AddMessage2Log')) {
        AddMessage2Log('Estatein form handler: ' . $exception->getMessage(), 'estatein_forms');
    }
    estateinRespond(500, ['success' => false, 'message' => 'Unable to process your request. Please try again later.']);
}
