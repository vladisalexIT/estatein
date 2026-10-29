<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/include/estatein/property-context.php';
$config = require $_SERVER['DOCUMENT_ROOT'] . '/local/config/estatein.php';
$raw = $_GET['id'] ?? null;
$id = is_string($raw) && preg_match('/^[1-9][0-9]{0,9}$/D', $raw) ? (int)$raw : 0;
$estateinCurrentProperty = estateinFindProperty((int)($config['properties_iblock_id'] ?? 0), $id);
if (!$estateinCurrentProperty) {
    require $_SERVER['DOCUMENT_ROOT'] . '/404.php';
    exit;
}
$GLOBALS['estateinCurrentProperty'] = $estateinCurrentProperty;
$GLOBALS['estateinCurrentProperty'] = $estateinCurrentProperty;
$APPLICATION->SetTitle($estateinCurrentProperty['title'] . ' | Estatein');
$APPLICATION->SetPageProperty('description', mb_substr($estateinCurrentProperty['description'], 0, 160));
$APPLICATION->SetPageProperty('estatein_canonical_query', 'id=' . $estateinCurrentProperty['id']);
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/local/include/pages/property-details.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
