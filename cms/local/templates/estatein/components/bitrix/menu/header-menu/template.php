<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<?php if (!empty($arResult)): ?>
  <ul class="header__menu-list">
    <?php foreach ($arResult as $item): ?>
      <?php
      $itemClasses = ['header__menu-item'];

      if ((rtrim((string)parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/') === rtrim((string)parse_url($item['LINK'], PHP_URL_PATH), '/'))) {
          $itemClasses[] = 'is-active';
      }
      ?>

      <li class="<?= htmlspecialcharsbx(implode(' ', $itemClasses)) ?>">
        <a
          class="header__menu-link"
          href="<?= htmlspecialcharsbx($item['LINK']) ?>"
          <?php if ((rtrim((string)parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/') === rtrim((string)parse_url($item['LINK'], PHP_URL_PATH), '/'))): ?>
            aria-current="page"
          <?php endif; ?>
        >
          <?= htmlspecialcharsbx($item['TEXT']) ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
