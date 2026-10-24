<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!function_exists('estateinGetSiteContacts')) {
    function estateinGetSiteContacts(): array
    {
        static $contacts = null;

        if ($contacts !== null) {
            return $contacts;
        }

        $fallback = [
            'email' => 'info@estatein.com',
            'phone_display' => '+1 (123) 456-7890',
            'phone_href' => '+11234567890',
            'hq_label' => 'Main Headquarters',
            'hq_address' => '123 Estatein Plaza, City Center, Metropolis',
            'hq_city' => 'Metropolis',
            'maps_url' => 'https://www.google.com/maps/search/?api=1&query='
                . rawurlencode(
                    '123 Estatein Plaza, City Center, Metropolis'
                ),
            'social_links' => [],
        ];

        $useFallback = static function (
            string $reason
        ) use ($fallback): array {
            if (function_exists('AddMessage2Log')) {
                AddMessage2Log(
                    'Site contacts fallback: ' . $reason,
                    'estatein_contacts'
                );
            }

            return $fallback;
        };

        $config = require $_SERVER['DOCUMENT_ROOT']
            . '/local/config/estatein.php';

        $iblockId = (int)(
            $config['site_contacts_iblock_id'] ?? 0
        );

        $elementId = (int)(
            $config['site_contacts_element_id'] ?? 0
        );

        if ($iblockId <= 0 || $elementId <= 0) {
            $contacts = $useFallback(
                'The source IDs are not configured.'
            );

            return $contacts;
        }

        if (!\Bitrix\Main\Loader::includeModule('iblock')) {
            $contacts = $useFallback(
                'The iblock module is unavailable.'
            );

            return $contacts;
        }

        $result = \CIBlockElement::GetList(
            [],
            [
                'IBLOCK_ID' => $iblockId,
                'ID' => $elementId,
                'ACTIVE' => 'Y',
                'ACTIVE_DATE' => 'Y',
                'CHECK_PERMISSIONS' => 'Y',
            ],
            false,
            ['nTopCount' => 1],
            ['ID', 'IBLOCK_ID']
        );

        $element = $result->GetNextElement(false, false);

        if (!$element) {
            $contacts = $useFallback(
                'The configured element is unavailable for reading.'
            );

            return $contacts;
        }

        $properties = $element->GetProperties();

        $getValue = static function (
            string $code
        ) use ($properties): string {
            $property = $properties[$code] ?? [];

            $value = $property['~VALUE']
                ?? $property['VALUE']
                ?? '';

            return is_string($value)
                ? trim($value)
                : '';
        };

        $email = $getValue('EMAIL');
        $phoneDisplay = $getValue('PHONE_DISPLAY');
        $phoneHref = $getValue('PHONE_HREF');
        $hqLabel = $getValue('HQ_LABEL');
        $hqAddress = $getValue('HQ_ADDRESS');
        $hqCity = $getValue('HQ_CITY');

        $hasValidRequiredValues =
            filter_var($email, FILTER_VALIDATE_EMAIL) !== false
            && $phoneDisplay !== ''
            && preg_match('/^\+[0-9]{7,15}$/D', $phoneHref) === 1
            && $hqLabel !== ''
            && $hqAddress !== ''
            && $hqCity !== '';

        if (!$hasValidRequiredValues) {
            $contacts = $useFallback(
                'Required contact values are missing or invalid.'
            );

            return $contacts;
        }

        $socialDefinitions = [
            'VK_URL' => 'VK',
            'INSTAGRAM_URL' => 'Instagram',
            'LINKEDIN_URL' => 'LinkedIn',
            'FACEBOOK_URL' => 'Facebook',
        ];

        $socialLinks = [];

        foreach ($socialDefinitions as $code => $label) {
            $url = $getValue($code);

            if ($url === '') {
                continue;
            }

            $isValidUrl =
                filter_var($url, FILTER_VALIDATE_URL) !== false
                && strtolower(
                    (string)parse_url($url, PHP_URL_SCHEME)
                ) === 'https';

            if (!$isValidUrl) {
                continue;
            }

            $socialLinks[] = [
                'label' => $label,
                'url' => $url,
            ];
        }

        $contacts = [
            'email' => $email,
            'phone_display' => $phoneDisplay,
            'phone_href' => $phoneHref,
            'hq_label' => $hqLabel,
            'hq_address' => $hqAddress,
            'hq_city' => $hqCity,
            'maps_url' => 'https://www.google.com/maps/search/?api=1&query='
                . rawurlencode($hqAddress),
            'social_links' => $socialLinks,
        ];

        return $contacts;
    }
}

return estateinGetSiteContacts();