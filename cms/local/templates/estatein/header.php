<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
  die();
}

use Bitrix\Main\Page\Asset;

$estateinContacts = require $_SERVER['DOCUMENT_ROOT']
  . '/local/include/site/contacts.php';

$estateinAssets = require __DIR__ . '/assets.php';

foreach ($estateinAssets['css'] as $estateinCss) {
  Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/' . $estateinCss);
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  $estateinTitle = trim((string)$APPLICATION->GetTitle(false));
  $estateinDescription = trim((string)$APPLICATION->GetProperty('description'));

  $estateinRequestPath = parse_url(
    $_SERVER['REQUEST_URI'] ?? '/',
    PHP_URL_PATH
  ) ?: '/';

  if (preg_match('~/index\.php$~', $estateinRequestPath)) {
    $estateinRequestPath = preg_replace(
      '~/index\.php$~',
      '/',
      $estateinRequestPath
    );
  }

  if ($estateinRequestPath !== '/') {
    $estateinRequestPath = rtrim($estateinRequestPath, '/') . '/';
  }

  $estateinScheme = (
    !empty($_SERVER['HTTPS']) &&
    $_SERVER['HTTPS'] !== 'off'
  ) ? 'https' : 'http';

  $estateinCanonical = $estateinScheme
    . '://'
    . ($_SERVER['HTTP_HOST'] ?? '')
    . $estateinRequestPath;
  ?>

  <title><?= htmlspecialcharsbx($estateinTitle) ?></title>

  <?php $APPLICATION->ShowHead(); ?>
  <?php $APPLICATION->ShowMeta('description'); ?>

  <link
    rel="canonical"
    href="<?= htmlspecialcharsbx($estateinCanonical) ?>">

  <meta
    property="og:type"
    content="website">

  <meta
    property="og:site_name"
    content="Estatein">

  <meta
    property="og:title"
    content="<?= htmlspecialcharsbx($estateinTitle) ?>">

  <meta
    property="og:description"
    content="<?= htmlspecialcharsbx($estateinDescription) ?>">

  <meta
    property="og:url"
    content="<?= htmlspecialcharsbx($estateinCanonical) ?>">

  <link rel="icon" type="image/svg+xml" href="<?= htmlspecialcharsbx(SITE_TEMPLATE_PATH . '/favicon.svg') ?>">
  <?php foreach ($estateinAssets['js'] as $estateinJs): ?>
    <script type="module" crossorigin src="<?= htmlspecialcharsbx(SITE_TEMPLATE_PATH . '/' . $estateinJs) ?>"></script>
  <?php endforeach; ?>

</head>

<body>
  <div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
  <aside class="announcement" aria-label="Special announcement" data-js-announcement>
    <div class="announcement__inner container">
      <div class="announcement__content">
        <p class="announcement__text">
          <svg class="announcement__icon" viewBox="0 0 24 24" aria-hidden="true">
            <path
              d="M12 1.75C12.85 7.15 16.85 11.15 22.25 12C16.85 12.85 12.85 16.85 12 22.25C11.15 16.85 7.15 12.85 1.75 12C7.15 11.15 11.15 7.15 12 1.75Z"
              fill="currentColor" />
            <path
              d="M19 2.5C19.25 4.1 20.4 5.25 22 5.5C20.4 5.75 19.25 6.9 19 8.5C18.75 6.9 17.6 5.75 16 5.5C17.6 5.25 18.75 4.1 19 2.5Z"
              fill="currentColor" />
          </svg>

          <span class="announcement__message">
            Discover Your Dream Property with Estatein
            <a class="announcement__link" href="/properties/">
              Learn More
            </a>
          </span>
        </p>
      </div>

      <button class="announcement__close" type="button" aria-label="Close announcement" data-js-announcement-close>
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path d="M6 6L18 18M18 6L6 18" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
        </svg>
      </button>
    </div>
  </aside>
  <header class="header" data-js-header>
    <a class="skip-link" href="#main-content">
      Skip to main content
    </a>
    <button class="header__backdrop" type="button" aria-label="Close navigation menu" tabindex="-1"
      data-js-header-backdrop></button>

    <div class="header__inner container">

      <a class="header__logo logo" href="/" aria-label="Estatein — Home">
        <img class="logo__image" src="/local/templates/estatein/assets/logo-C2oo80JO.svg" alt="Estatein" width="160" height="48">
      </a>

      <div class="header__overlay" id="header-menu-panel" data-js-header-overlay>
        <div class="header__menu-intro">
          <span class="header__menu-eyebrow">
            Estatein Navigation
          </span>

          <p class="header__menu-title">
            Find the right property and service for your next move.
          </p>
        </div>
        <nav class="header__menu" aria-label="Main navigation">
          <?php
          $APPLICATION->IncludeComponent(
            'bitrix:menu',
            'header-menu',
            [
              'ALLOW_MULTI_SELECT' => 'N',
              'CHILD_MENU_TYPE' => 'left',
              'DELAY' => 'N',
              'MAX_LEVEL' => '1',
              'MENU_CACHE_GET_VARS' => [],
              'MENU_CACHE_TIME' => '3600',
              'MENU_CACHE_TYPE' => 'A',
              'MENU_CACHE_USE_GROUPS' => 'Y',
              'ROOT_MENU_TYPE' => 'top',
              'USE_EXT' => 'Y',
            ],
            false
          );
          ?>
        </nav>
        <div class="header__menu-help">
          <p class="header__menu-help-title">
            Need expert guidance?
          </p>

          <div class="header__menu-help-links">
            <a href="<?= htmlspecialcharsbx('tel:' . $estateinContacts['phone_href']) ?>">
              <?= htmlspecialcharsbx($estateinContacts['phone_display']) ?>
            </a>

            <a href="<?= htmlspecialcharsbx('mailto:' . $estateinContacts['email']) ?>">
              <?= htmlspecialcharsbx($estateinContacts['email']) ?>
            </a>
          </div>
        </div>

        <a class="header__contact button button--dark" href="/contacts/">
          Contact Us
        </a>
      </div>

      <button class="header__burger burger-button" type="button" aria-label="Open navigation menu" aria-expanded="false"
        aria-controls="header-menu-panel" data-js-header-burger>
        <span class="burger-button__line"></span>
        <span class="burger-button__line"></span>
        <span class="burger-button__line"></span>
      </button>

    </div>
  </header>
  <main class="main" id="main-content">