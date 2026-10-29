<?php
if (!defined('ERROR_404')) define('ERROR_404', 'Y');
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
CHTTP::SetStatus('404 Not Found');
http_response_code(404);
$APPLICATION->SetTitle('Page not found | Estatein');
$APPLICATION->SetPageProperty('robots', 'noindex, follow');
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
?>
<section class="error-page"><div class="container">
<span class="error-page__code" aria-hidden="true">404</span>
<h1>We could not find this page</h1>
<p>The address may be incorrect, or the page may have moved. Your next property is still waiting to be discovered.</p>
<div class="error-page__actions"><a class="button button--accent" href="/properties/">Explore Properties</a><a class="button button--dark" href="/">Back to Home</a></div>
</div></section>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'; ?>
