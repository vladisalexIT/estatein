<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) { die(); }
require_once __DIR__ . '/property-data.php';
if (!function_exists('estateinFindProperty')) {
function estateinFindProperty(int $iblockId, int $id): ?array {
    if ($iblockId < 1 || $id < 1 || !\Bitrix\Main\Loader::includeModule('iblock')) return null;
    $row = CIBlockElement::GetList([], [
        'IBLOCK_ID' => $iblockId, 'ID' => $id, 'ACTIVE' => 'Y', 'ACTIVE_DATE' => 'Y',
        'CHECK_PERMISSIONS' => 'Y', 'MIN_PERMISSION' => 'R',
    ], false, ['nTopCount' => 1], ['ID','IBLOCK_ID','NAME','CODE','PREVIEW_TEXT','DETAIL_TEXT','DETAIL_TEXT_TYPE'])->GetNextElement(false, false);
    if (!$row) return null;
    $f = $row->GetFields(); $p = $row->GetProperties();
    $v = static fn(array $codes): string => estateinGetPropertyValue($p, $codes);
    $amenities = $p['PD_AMENITIES']['VALUE'] ?? [];
    if (!is_array($amenities)) $amenities = [$amenities];
    $amenities = array_values(array_filter(array_map(static fn($x) => is_scalar($x) ? trim((string)$x) : '', $amenities)));
    $description = trim(strip_tags((string)($f['DETAIL_TEXT'] ?: $f['PREVIEW_TEXT'])));
    return ['id'=>(int)$f['ID'], 'title'=>(string)$f['NAME'], 'description'=>$description,
        'location'=>$v(['PD_ADDRESS','LOCATION']), 'bedrooms'=>$v(['BEDROOMS','BEDROOM_COUNT','BEDROOM']),
        'bathrooms'=>$v(['BATHROOMS','BATHROOM_COUNT','BATHROOM']), 'size'=>$v(['SIZE','PROPERTY_SIZE','AREA']),
        'title_ru'=>$v(['NAME_RU']), 'description_ru'=>$v(['DETAIL_TEXT_RU','PREVIEW_TEXT_RU']), 'address_ru'=>$v(['PD_ADDRESS_RU']),
        'amenities_ru'=>(array)($p['PD_AMENITIES_RU']['VALUE'] ?? []), 'amenities'=>$amenities, 'properties'=>$p];
}

}
