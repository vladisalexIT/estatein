<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

require_once $_SERVER['DOCUMENT_ROOT']
    . '/local/include/estatein/property-data.php';

$estateinItems = [];

foreach ($arResult['ITEMS'] as $estateinItem) {
    $estateinTitle = (string)(
        $estateinItem['~NAME']
        ?? $estateinItem['NAME']
        ?? ''
    );

    $estateinProperties = [];

    foreach (
        ($estateinItem['PROPERTIES'] ?? [])
        as $estateinCode => $estateinPropertyData
    ) {
        $estateinProperties[$estateinCode] = $estateinPropertyData;

        $estateinProperties[$estateinCode]['VALUE'] =
            $estateinPropertyData['~VALUE']
            ?? $estateinPropertyData['VALUE']
            ?? '';

        $estateinProperties[$estateinCode]['VALUE_ENUM'] =
            $estateinPropertyData['~VALUE_ENUM']
            ?? $estateinPropertyData['VALUE_ENUM']
            ?? null;
    }

    $estateinImage = null;

    foreach (
        ['PREVIEW_PICTURE', 'DETAIL_PICTURE']
        as $estateinPictureField
    ) {
        $estateinPicture =
            $estateinItem[$estateinPictureField] ?? null;

        if (
            is_array($estateinPicture)
            && !empty($estateinPicture['SRC'])
        ) {
            $estateinImage = $estateinPicture;
            break;
        }

        $estateinPictureId = is_array($estateinPicture)
            ? (int)($estateinPicture['ID'] ?? 0)
            : (int)$estateinPicture;

        if ($estateinPictureId > 0) {
            $estateinPictureFile = CFile::GetFileArray(
                $estateinPictureId
            );

            if (
                is_array($estateinPictureFile)
                && !empty($estateinPictureFile['SRC'])
            ) {
                $estateinImage = $estateinPictureFile;
                break;
            }
        }
    }

    if ($estateinImage === null) {
        continue;
    }

    $estateinImageAlt = trim((string)(
        $estateinImage['DESCRIPTION'] ?? ''
    ));

    if ($estateinImageAlt === '') {
        $estateinImageAlt = $estateinTitle;
    }

    $estateinDescription = trim(
        strip_tags((string)(
            $estateinItem['~PREVIEW_TEXT']
            ?? $estateinItem['PREVIEW_TEXT']
            ?? ''
        ))
    );

    if ($estateinDescription === '') {
        $estateinDescription =
            'Discover more details about this property at Estatein.';
    }

    $estateinPrice = estateinGetPropertyValue(
        $estateinProperties,
        ['PRICE', 'PROPERTY_PRICE', 'COST']
    );

    // Карточка сама экранирует цену при выводе.
    // Не передаём в неё заранее экранированную строку.
    if ($estateinPrice === '') {
        $estateinFormattedPrice = 'Price on request';
    } elseif (preg_match('/\d/', $estateinPrice) === 1) {
        $estateinFormattedPrice = estateinFormatPrice(
            $estateinPrice
        );
    } else {
        $estateinFormattedPrice = $estateinPrice;
    }

    $estateinBedrooms = estateinGetPropertyValue(
        $estateinProperties,
        ['BEDROOMS', 'BEDROOM_COUNT', 'BEDROOM']
    );

    $estateinBathrooms = estateinGetPropertyValue(
        $estateinProperties,
        ['BATHROOMS', 'BATHROOM_COUNT', 'BATHROOM']
    );

    $estateinPropertyType = estateinGetPropertyValue(
        $estateinProperties,
        ['PROPERTY_TYPE', 'TYPE', 'PROPERTY_KIND'],
        'Property'
    );

    $estateinItem['ESTATEIN_CARD'] = [
        'id' => (int)$estateinItem['ID'],
        'title' => $estateinTitle,
        'description' => $estateinDescription,
        'image' => (string)$estateinImage['SRC'],
        'image_alt' => $estateinImageAlt,
        'bedrooms' => estateinFormatFeature(
            $estateinBedrooms,
            'Bedroom'
        ),
        'bathrooms' => estateinFormatFeature(
            $estateinBathrooms,
            'Bathroom'
        ),
        'type' => $estateinPropertyType,
        'price' => $estateinFormattedPrice,
        'url' => SITE_DIR . 'property-details/',
    ];

    $estateinItems[] = $estateinItem;
}

$arResult['ITEMS'] = $estateinItems;