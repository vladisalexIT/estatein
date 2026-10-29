<?php
// Run with PHP CLI from document root, or paste into authenticated Bitrix PHP console.
// No HTTP execution; no destructive updates; fills ONLY empty values.
if (PHP_SAPI !== 'cli' && !defined('B_PROLOG_INCLUDED')) { http_response_code(404); exit; }
if (!defined('B_PROLOG_INCLUDED')) {
    $_SERVER['DOCUMENT_ROOT'] = dirname(__DIR__, 2);
    require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
}
global $USER;
if (PHP_SAPI !== 'cli' && (!$USER || !$USER->IsAdmin() || !check_bitrix_sessid())) { die('Denied'); }
if (!\Bitrix\Main\Loader::includeModule('iblock')) throw new RuntimeException('Iblock module unavailable');
$config = require $_SERVER['DOCUMENT_ROOT'] . '/local/config/estatein.php';
$iblockId = (int)$config['properties_iblock_id'];
$iblock = CIBlock::GetList([], ['ID'=>$iblockId])->Fetch();
if (!$iblock || $iblock['CODE'] !== 'properties') throw new RuntimeException('Unexpected properties iblock');
$properties = [
 'PD_ADDRESS'=>['Address','N'], 'PD_AMENITIES'=>['Key features and amenities','Y'],
 'NAME_RU'=>['Название — русский','N'], 'PREVIEW_TEXT_RU'=>['Описание карточки — русский','N'],
 'DETAIL_TEXT_RU'=>['Подробное описание — русский','N'], 'PD_ADDRESS_RU'=>['Адрес — русский','N'],
 'PD_AMENITIES_RU'=>['Удобства — русский','Y'], 'PROPERTY_TYPE_RU'=>['Тип недвижимости — русский','N'],
 'CARD_LABEL_RU'=>['Метка карточки — русский','N'],
];
foreach ($properties as $code=>$definition) {
 $existing = CIBlockProperty::GetList([], ['IBLOCK_ID'=>$iblockId,'CODE'=>$code])->Fetch();
 if ($existing) {
  if ($existing['PROPERTY_TYPE'] !== 'S' || $existing['MULTIPLE'] !== $definition[1]) throw new RuntimeException('Property mismatch: '.$code);
 } else {
  $api = new CIBlockProperty();
  if (!$api->Add(['IBLOCK_ID'=>$iblockId,'CODE'=>$code,'NAME'=>$definition[0],'PROPERTY_TYPE'=>'S','MULTIPLE'=>$definition[1],'ACTIVE'=>'Y','SORT'=>500,'IS_REQUIRED'=>'N'])) throw new RuntimeException($api->LAST_ERROR);
 }
}
$seed = json_decode(file_get_contents(__DIR__.'/estatein-detail-seed.json'),true,512,JSON_THROW_ON_ERROR);
foreach ($seed as $item) {
 $rs = CIBlockElement::GetList([],['IBLOCK_ID'=>$iblockId,'=CODE'=>$item['code']],false,false,['ID','IBLOCK_ID','NAME','DETAIL_TEXT','DETAIL_TEXT_TYPE','PREVIEW_TEXT']);
 $elements=[]; while ($e=$rs->GetNextElement(false,false)) $elements[]=$e;
 if (count($elements)!==1) { echo 'SKIP missing or duplicate CODE: '.$item['code']."\n"; continue; }
 $e=$elements[0]; $f=$e->GetFields(); $p=$e->GetProperties();
 $new = ['PD_ADDRESS'=>$item['address'],'PD_AMENITIES'=>$item['amenities'],'NAME_RU'=>$item['name_ru'],
   'DETAIL_TEXT_RU'=>$item['description_ru'],'PREVIEW_TEXT_RU'=>$item['description_ru'],'PD_ADDRESS_RU'=>$item['address_ru'],'PD_AMENITIES_RU'=>$item['amenities_ru']];
 foreach ($new as $code=>$value) {
  $old=$p[$code]['VALUE']??'';
  $empty=is_array($old) ? count(array_filter($old,static fn($x)=>trim((string)$x)!==''))===0 : trim((string)$old)==='';
  if ($empty) CIBlockElement::SetPropertyValuesEx((int)$f['ID'],$iblockId,[$code=>$value]);
 }
 if (trim((string)$f['DETAIL_TEXT'])==='') {
  $api=new CIBlockElement();
  if (!$api->Update((int)$f['ID'],['DETAIL_TEXT'=>$item['description'],'DETAIL_TEXT_TYPE'=>'text'])) throw new RuntimeException($api->LAST_ERROR);
 }
 echo 'Prepared '.$item['code'].' [ID '.$f['ID']."]\n";
}
// Prices, numerical characteristics, coordinates and existing descriptions are NOT fabricated or overwritten.
$eventType = 'ESTATEIN_REQUEST';
foreach (['ru','en'] as $language) {
 $exists=CEventType::GetList(['TYPE_ID'=>$eventType,'LID'=>$language])->Fetch();
 if (!$exists) { $api=new CEventType(); $api->Add(['LID'=>$language,'EVENT_NAME'=>$eventType,'NAME'=>'Estatein: новая заявка','DESCRIPTION'=>'#EMAIL_TO#, #REQUEST_ID#, #FORM_TYPE#, #FORM_TITLE#, #EMAIL#, #REQUEST_TEXT#']); }
}
$siteId=defined('SITE_ID')?SITE_ID:'s1';
if (!CEventMessage::GetList('id','asc',['TYPE_ID'=>$eventType])->Fetch()) {
 $api=new CEventMessage();
 $id=$api->Add(['ACTIVE'=>'Y','EVENT_NAME'=>$eventType,'LID'=>[$siteId],'EMAIL_FROM'=>'#DEFAULT_EMAIL_FROM#','EMAIL_TO'=>'#EMAIL_TO#','SUBJECT'=>'Estatein: #FORM_TITLE# — заявка №#REQUEST_ID#','BODY_TYPE'=>'text','MESSAGE'=>"Форма: #FORM_TITLE# (#FORM_TYPE#)\nЗаявка: #REQUEST_ID#\nEmail: #EMAIL#\n\n#REQUEST_TEXT#"]);
 if (!$id) throw new RuntimeException($api->LAST_ERROR);
}
CIBlock::clearIblockTagCache($iblockId);
echo "DONE. Verify mail template site binding, sender and transport. Queue acceptance is not delivery.\n";
