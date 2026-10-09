<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle('Seaside Serenity Villa, Malibu | Estatein');
$APPLICATION->SetPageProperty(
    'description',
    'Explore Seaside Serenity Villa in Malibu, including property photos, features, amenities, pricing details and an enquiry form.'
);

$APPLICATION->IncludeComponent(
    'bitrix:main.include',
    '',
    [
        'AREA_FILE_SHOW' => 'file',
        'PATH' => '/local/include/pages/property-details.php',
        'EDIT_TEMPLATE' => '',
    ]
);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
