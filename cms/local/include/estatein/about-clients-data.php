<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!function_exists('estateinGetAboutClients')) {
    function estateinGetAboutClients(int $iblockId): array
    {
        if (
            $iblockId <= 0
            || !\Bitrix\Main\Loader::includeModule('iblock')
        ) {
            return [];
        }

        $clients = [];

        $result = \CIBlockElement::GetList(
            [
                'SORT' => 'ASC',
                'ID' => 'ASC',
            ],
            [
                'IBLOCK_ID' => $iblockId,
                'ACTIVE' => 'Y',
                'ACTIVE_DATE' => 'Y',
                'CHECK_PERMISSIONS' => 'Y',
                'MIN_PERMISSION' => 'R',
            ],
            false,
            false,
            [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'PREVIEW_TEXT',
                'PREVIEW_TEXT_TYPE',
            ]
        );

        while ($element = $result->GetNextElement(false, false)) {
            $fields = $element->GetFields();
            $properties = $element->GetProperties();

            $getPropertyValue = static function (
                string $code
            ) use ($properties): string {
                $value = $properties[$code]['VALUE'] ?? '';

                return is_scalar($value)
                    ? trim((string)$value)
                    : '';
            };

            $linkUrl = $getPropertyValue('LINK_URL');

            if (
                $linkUrl !== ''
                && (
                    $linkUrl[0] !== '/'
                    || substr($linkUrl, 0, 2) === '//'
                    || strpos($linkUrl, '\\') !== false
                    || preg_match('/[\x00-\x20\x7F]/', $linkUrl)
                )
            ) {
                $linkUrl = '';
            }

            $quote = trim((string)($fields['PREVIEW_TEXT'] ?? ''));

            if (
                strtolower(
                    (string)($fields['PREVIEW_TEXT_TYPE'] ?? 'text')
                ) === 'html'
            ) {
                $quote = preg_replace(
                    '~<br\s*/?>|</(?:p|div|li)>~i',
                    "\n",
                    $quote
                );

                $quote = html_entity_decode(
                    strip_tags((string)$quote),
                    ENT_QUOTES | ENT_HTML5,
                    'UTF-8'
                );

                $quote = trim($quote);
            }

            $clients[] = [
                'id' => (int)$fields['ID'],
                'name' => (string)$fields['NAME'],
                'since_year' => $getPropertyValue('SINCE_YEAR'),
                'domain' => $getPropertyValue('DOMAIN'),
                'category' => $getPropertyValue('CATEGORY'),
                'quote' => $quote,
                'link_url' => $linkUrl,
            ];
        }

        return $clients;
    }
}