<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;

if (!function_exists('estateinGetPropertyValue')) {
    function estateinGetPropertyValue(
        array $properties,
        array $codes,
        string $default = ''
    ): string {
        foreach ($codes as $code) {
            if (!isset($properties[$code])) {
                continue;
            }

            $value = $properties[$code]['VALUE'] ?? '';

            if (is_array($value)) {
                $value = implode(', ', $value);
            }

            $value = trim((string)$value);

            if ($value !== '') {
                return $value;
            }
        }

        return $default;
    }
}

if (!function_exists('estateinFormatFeature')) {
    function estateinFormatFeature(
        string $value,
        string $suffix,
        string $default = '—'
    ): string {
        $value = trim($value);

        if ($value === '') {
            return $default;
        }

        if (stripos($value, $suffix) !== false) {
            return $value;
        }

        return $value . '-' . $suffix;
    }
}

if (!function_exists('estateinFormatPrice')) {
    function estateinFormatPrice(string $value): string
    {
        $value = trim($value);

        if ($value === '') {
            return 'Price on request';
        }

        $digits = preg_replace('/[^\d]/', '', $value);

        if ($digits === '') {
            return htmlspecialcharsbx($value);
        }

        return '$' . number_format(
            (int)$digits,
            0,
            '.',
            ','
        );
    }
}

if (!function_exists('estateinGetProperties')) {
    function estateinGetProperties(int $iblockId): array
    {
        if (
            $iblockId <= 0 ||
            !Loader::includeModule('iblock')
        ) {
            return [];
        }

        $properties = [];

        $elementResult = CIBlockElement::GetList(
            [
                'SORT' => 'ASC',
                'ID' => 'DESC',
            ],
            [
                'IBLOCK_ID' => $iblockId,
                'ACTIVE' => 'Y',
            ],
            false,
            false,
            [
                'ID',
                'IBLOCK_ID',
                'NAME',
                'PREVIEW_TEXT',
                'PREVIEW_PICTURE',
                'DETAIL_PICTURE',
                'PROPERTY_*',
            ]
        );

        while ($element = $elementResult->GetNextElement()) {
            $fields = $element->GetFields();
            $elementProperties = $element->GetProperties();

            $imageId = (int)(
                $fields['PREVIEW_PICTURE']
                ?: $fields['DETAIL_PICTURE']
            );

            $imagePath = $imageId > 0
                ? CFile::GetPath($imageId)
                : '';

            if ($imagePath === '') {
                continue;
            }

            $imageFile = CFile::GetFileArray($imageId);

            $imageAlt = trim((string)(
                $imageFile['DESCRIPTION']
                ?? $fields['NAME']
            ));

            $previewText = trim(
                strip_tags((string)$fields['PREVIEW_TEXT'])
            );

            if ($previewText === '') {
                $previewText =
                    'Discover more details about this property at Estatein.';
            }

            $price = estateinGetPropertyValue(
                $elementProperties,
                [
                    'PRICE',
                    'PROPERTY_PRICE',
                    'COST',
                ]
            );

            $bedrooms = estateinGetPropertyValue(
                $elementProperties,
                [
                    'BEDROOMS',
                    'BEDROOM_COUNT',
                    'BEDROOM',
                ]
            );

            $bathrooms = estateinGetPropertyValue(
                $elementProperties,
                [
                    'BATHROOMS',
                    'BATHROOM_COUNT',
                    'BATHROOM',
                ]
            );

            $propertyType = estateinGetPropertyValue(
                $elementProperties,
                [
                    'PROPERTY_TYPE',
                    'TYPE',
                    'PROPERTY_KIND',
                ],
                'Property'
            );

            $properties[] = [
                'id' => (int)$fields['ID'],
                'title' => (string)$fields['NAME'],
                'description' => $previewText,
                'image' => $imagePath,
                'image_alt' => $imageAlt !== ''
                    ? $imageAlt
                    : (string)$fields['NAME'],
                'bedrooms' => estateinFormatFeature(
                    $bedrooms,
                    'Bedroom'
                ),
                'bathrooms' => estateinFormatFeature(
                    $bathrooms,
                    'Bathroom'
                ),
                'type' => $propertyType,
                'price' => estateinFormatPrice($price),
                'url' => SITE_DIR . 'property-details/',
            ];
        }

        return $properties;
    }
}