<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (empty($arResult)) {
    return;
}

$groups = [
    'home' => [
        'title' => 'Home',
        'items' => [],
    ],
    'about' => [
        'title' => 'About Us',
        'items' => [],
    ],
    'properties' => [
        'title' => 'Properties',
        'items' => [],
    ],
    'services' => [
        'title' => 'Services',
        'items' => [],
    ],
    'contacts' => [
        'title' => 'Contact Us',
        'items' => [],
    ],
];

foreach ($arResult as $item) {
    $groupKey = $item['PARAMS']['GROUP'] ?? '';

    if (!isset($groups[$groupKey])) {
        continue;
    }

    $groups[$groupKey]['items'][] = $item;
}
?>

<nav class="footer__nav nav-footer" aria-label="Footer navigation">
    <?php foreach ($groups as $group): ?>
        <?php if (empty($group['items'])): ?>
            <?php continue; ?>
        <?php endif; ?>

        <div class="nav-footer__col">
            <p class="nav-footer__title">
                <?= htmlspecialcharsbx($group['title']) ?>
            </p>

            <ul class="nav-footer__list">
                <?php foreach ($group['items'] as $item): ?>
                    <li>
                        <a
                            class="nav-footer__link"
                            href="<?= htmlspecialcharsbx($item['LINK']) ?>"
                        >
                            <?= htmlspecialcharsbx($item['TEXT']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>
</nav>