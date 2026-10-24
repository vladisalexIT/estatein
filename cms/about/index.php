<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle('About Estatein | Team, Values & Experience');
$APPLICATION->SetPageProperty(
    'description',
    'Meet the Estatein team and learn about our values, achievements and approach to helping clients make confident real estate decisions.'
);

require $_SERVER['DOCUMENT_ROOT']
    . '/local/include/pages/about.php';

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
