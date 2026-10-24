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

      if (!empty($item['SELECTED'])) {
          $itemClasses[] = 'is-active';
      }
      ?>

      <li class="<?= htmlspecialcharsbx(implode(' ', $itemClasses)) ?>">
        <a
          class="header__menu-link"
          href="<?= htmlspecialcharsbx($item['LINK']) ?>"
          <?php if (!empty($item['SELECTED'])): ?>
            aria-current="page"
          <?php endif; ?>
        >
          <?= htmlspecialcharsbx($item['TEXT']) ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>