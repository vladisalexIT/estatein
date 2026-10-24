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
            $property = $properties[$code] ?? null;

            if (!is_array($property)) {
                continue;
            }

            $candidates = [
                $property['~VALUE_ENUM'] ?? null,
                $property['VALUE_ENUM'] ?? null,
                $property['~VALUE'] ?? null,
                $property['VALUE'] ?? null,
            ];

            foreach ($candidates as $value) {
                if (is_array($value)) {
                    $value = implode(
                        ', ',
                        array_filter(
                            $value,
                            static function ($item): bool {
                                return is_scalar($item)
                                    && trim((string)$item) !== '';
                            }
                        )
                    );
                }

                if (!is_scalar($value)) {
                    continue;
                }

                $value = trim((string)$value);

                if ($value !== '') {
                    return $value;
                }
            }
        }

        return $default;
    }
}

if (!function_exists('estateinParseNumericValue')) {
    function estateinParseNumericValue(string $value): ?float
    {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        $value = preg_replace('/^\$\s*/u', '', $value);

        $value = str_replace(
            [' ', "\xC2\xA0", "\xE2\x80\xAF"],
            '',
            $value
        );

        if (
            preg_match(
                '/^(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/D',
                $value
            ) !== 1
        ) {
            return null;
        }

        $number = (float)str_replace(',', '', $value);

        return is_finite($number)
            ? $number
            : null;
    }
}

if (!function_exists('estateinGetNumericPropertyValue')) {
    function estateinGetNumericPropertyValue(
        array $properties,
        array $codes
    ): ?float {
        return estateinParseNumericValue(
            estateinGetPropertyValue($properties, $codes)
        );
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

        $number = estateinParseNumericValue($value);

        if ($number === null) {
            return $value;
        }

        $decimals = floor($number) === $number
            ? 0
            : 2;

        return '$' . number_format(
            $number,
            $decimals,
            '.',
            ','
        );
    }
}

if (!function_exists('estateinParseMapCoordinate')) {
    function estateinParseMapCoordinate(
        string $value,
        float $minimum,
        float $maximum
    ): ?float {
        $value = trim($value);

        if ($value === '') {
            return null;
        }

        $value = str_replace(',', '.', $value);

        if (
            preg_match(
                '/^[+-]?(?:\d+(?:\.\d+)?|\.\d+)$/D',
                $value
            ) !== 1
        ) {
            return null;
        }

        $coordinate = (float)$value;

        if (
            !is_finite($coordinate)
            || $coordinate < $minimum
            || $coordinate > $maximum
        ) {
            return null;
        }

        return $coordinate;
    }
}

if (!function_exists('estateinBuildPropertyCard')) {
    function estateinBuildPropertyCard(
        array $fields,
        array $properties
    ): ?array {
        $id = (int)($fields['ID'] ?? 0);

        $title = trim((string)(
            $fields['~NAME']
            ?? $fields['NAME']
            ?? ''
        ));

        $image = null;

        foreach (
            ['PREVIEW_PICTURE', 'DETAIL_PICTURE']
            as $fieldName
        ) {
            $picture = $fields[$fieldName] ?? null;

            if (
                is_array($picture)
                && !empty($picture['SRC'])
            ) {
                $image = $picture;
                break;
            }

            $pictureId = is_array($picture)
                ? (int)($picture['ID'] ?? 0)
                : (int)$picture;

            if ($pictureId <= 0) {
                continue;
            }

            $file = CFile::GetFileArray($pictureId);

            if (
                is_array($file)
                && !empty($file['SRC'])
            ) {
                $image = $file;
                break;
            }
        }

        if ($image === null) {
            return null;
        }

        $imageAlt = trim((string)(
            $image['DESCRIPTION'] ?? ''
        ));

        if ($imageAlt === '') {
            $imageAlt = $title;
        }

        $description = trim(
            strip_tags((string)(
                $fields['~PREVIEW_TEXT']
                ?? $fields['PREVIEW_TEXT']
                ?? ''
            ))
        );

        if ($description === '') {
            $description =
                'Discover more details about this property at Estatein.';
        }

        $price = estateinGetPropertyValue(
            $properties,
            ['PRICE', 'PROPERTY_PRICE', 'COST']
        );

        $bedrooms = estateinGetPropertyValue(
            $properties,
            ['BEDROOMS', 'BEDROOM_COUNT', 'BEDROOM']
        );

        $bathrooms = estateinGetPropertyValue(
            $properties,
            ['BATHROOMS', 'BATHROOM_COUNT', 'BATHROOM']
        );

        $type = estateinGetPropertyValue(
            $properties,
            ['PROPERTY_TYPE', 'TYPE', 'PROPERTY_KIND'],
            'Property'
        );

        $buildYear = estateinGetNumericPropertyValue(
            $properties,
            ['BUILD_YEAR', 'YEAR_BUILT']
        );

        $mapLatitude = estateinParseMapCoordinate(
            estateinGetPropertyValue(
                $properties,
                ['MAP_LATITUDE']
            ),
            -90.0,
            90.0
        );

        $mapLongitude = estateinParseMapCoordinate(
            estateinGetPropertyValue(
                $properties,
                ['MAP_LONGITUDE']
            ),
            -180.0,
            180.0
        );

        if (
            $mapLatitude === null
            || $mapLongitude === null
        ) {
            $mapLatitude = null;
            $mapLongitude = null;
        }

        return [
            'id' => $id,
            'map_latitude' => $mapLatitude,
            'map_longitude' => $mapLongitude,
            'title' => $title,
            'description' => $description,
            'image' => (string)$image['SRC'],
            'image_alt' => $imageAlt,

            'bedrooms' => estateinFormatFeature(
                $bedrooms,
                'Bedroom'
            ),

            'bathrooms' => estateinFormatFeature(
                $bathrooms,
                'Bathroom'
            ),

            'type' => $type,
            'price' => estateinFormatPrice($price),
            'price_value' => estateinParseNumericValue($price),

            'location' => estateinGetPropertyValue(
                $properties,
                ['LOCATION']
            ),

            'size_value' => estateinGetNumericPropertyValue(
                $properties,
                ['SIZE', 'PROPERTY_SIZE', 'AREA']
            ),

            'build_year' => (
                $buildYear !== null
                && floor($buildYear) === $buildYear
                && $buildYear >= 1
                && $buildYear <= 9999
            )
                ? (int)$buildYear
                : null,

            'eyebrow' => estateinGetPropertyValue(
                $properties,
                ['CARD_LABEL']
            ),


            'url' => SITE_DIR . 'property-details/',
        ];
    }
}

if (!function_exists('estateinGetProperties')) {
    function estateinGetProperties(int $iblockId): array
    {
        if (
            $iblockId <= 0
            || !Loader::includeModule('iblock')
        ) {
            return [];
        }

        $cards = [];

        $result = CIBlockElement::GetList(
            [
                'SORT' => 'ASC',
                'ID' => 'DESC',
            ],
            [
                'IBLOCK_ID' => $iblockId,
                'ACTIVE' => 'Y',
                'ACTIVE_DATE' => 'Y',
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
            ]
        );

        while (
            $element = $result->GetNextElement(false, false)
        ) {
            $card = estateinBuildPropertyCard(
                $element->GetFields(),
                $element->GetProperties()
            );

            if ($card !== null) {
                $cards[] = $card;
            }
        }

        return $cards;
    }
}
