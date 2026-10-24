<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle('Contact Estatein | Real Estate Enquiries');
$APPLICATION->SetPageProperty(
    'description',
    'Contact Estatein for property enquiries, real estate services and investment guidance, or find information about our office locations.'
);

require $_SERVER['DOCUMENT_ROOT'] . '/local/include/pages/contacts.php';

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
