<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

require_once $_SERVER['DOCUMENT_ROOT']
    . '/local/include/estatein/property-data.php';

$estateinItems = [];

foreach (($arResult['ITEMS'] ?? []) as $estateinItem) {
    $estateinCard = estateinBuildPropertyCard(
        $estateinItem,
        $estateinItem['PROPERTIES'] ?? []
    );

    if ($estateinCard === null) {
        continue;
    }

    $estateinItem['ESTATEIN_CARD'] = $estateinCard;
    $estateinItems[] = $estateinItem;
}

$arResult['ITEMS'] = $estateinItems;
