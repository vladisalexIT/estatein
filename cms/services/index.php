<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle('Real Estate Services | Estatein');
$APPLICATION->SetPageProperty(
    'description',
    'Explore Estatein real estate services, including property valuation, property management and guidance for informed real estate investments.'
);

$APPLICATION->IncludeComponent(
    'bitrix:main.include',
    '',
    [
        'AREA_FILE_SHOW' => 'file',
        'PATH' => '/local/include/pages/services.php',
        'EDIT_TEMPLATE' => '',
    ]
);

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
