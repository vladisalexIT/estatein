<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle('Real Estate Services | Estatein');
$APPLICATION->SetPageProperty(
    'description',
    'Explore Estatein real estate services, including property valuation, property management and guidance for informed real estate investments.'
);

require $_SERVER['DOCUMENT_ROOT'] . '/local/include/pages/services.php';

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
