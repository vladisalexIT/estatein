<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!function_exists('estateinGetAboutTeam')) {
    function estateinGetAboutTeam(int $iblockId): array
    {
        if ($iblockId <= 0) {
            return [];
        }

        if (!\Bitrix\Main\Loader::includeModule('iblock')) {
            return [];
        }

        $normalizeUrl = static function (string $value): string {
            $url = trim($value);

            if ($url === '') {
                return '';
            }

            if (preg_match('/[\x00-\x20\x7F]/', $url)) {
                return '';
            }

            if (strpos($url, '\\') !== false) {
                return '';
            }

            if ($url[0] === '/') {
                return strpos($url, '//') === 0 ? '' : $url;
            }

            if (filter_var($url, FILTER_VALIDATE_URL) === false) {
                return '';
            }

            $parts = parse_url($url);

            if (!is_array($parts)) {
                return '';
            }

            if (strtolower((string)($parts['scheme'] ?? '')) !== 'https') {
                return '';
            }

            if (
                empty($parts['host'])
                || isset($parts['user'])
                || isset($parts['pass'])
            ) {
                return '';
            }

            return $url;
        };

        $team = [];

        $elementResult = \CIBlockElement::GetList(
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
                'PROPERTY_POSITION',
                'PROPERTY_PHOTO',
                'PROPERTY_SOCIAL_URL',
                'PROPERTY_CONTACT_URL',
            ]
        );

        while ($element = $elementResult->Fetch()) {
            $name = trim((string)$element['NAME']);

            $position = trim(
                (string)($element['PROPERTY_POSITION_VALUE'] ?? '')
            );

            $photoId = (int)(
                $element['PROPERTY_PHOTO_VALUE'] ?? 0
            );

            if ($name === '' || $photoId <= 0) {
                continue;
            }
            
            $resizedPhoto = \CFile::ResizeImageGet(
                $photoId,
                [
                    'width' => 634,
                    'height' => 506,
                ],
                BX_RESIZE_IMAGE_EXACT,
                true
            );

            $imageSrc = (string)($resizedPhoto['src'] ?? '');

            if ($imageSrc === '') {
                $imageSrc = (string)\CFile::GetPath($photoId);
            }

            if ($imageSrc === '') {
                continue;
            }

            $team[] = [
                'id' => (int)$element['ID'],
                'name' => $name,
                'position' => $position,
                'image' => $imageSrc,
                'social_url' => $normalizeUrl(
                    (string)(
                        $element['PROPERTY_SOCIAL_URL_VALUE'] ?? ''
                    )
                ),
                'contact_url' => $normalizeUrl(
                    (string)(
                        $element['PROPERTY_CONTACT_URL_VALUE'] ?? ''
                    )
                ),
            ];
        }

        return $team;
    }
}