<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

if (empty($arResult['ITEMS'])) {
    return;
}
?>

<div class="about-achievements__grid">
    <?php foreach ($arResult['ITEMS'] as $item): ?>
        <?php
        $this->AddEditAction(
            $item['ID'],
            $item['EDIT_LINK'],
            CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT')
        );

        $this->AddDeleteAction(
            $item['ID'],
            $item['DELETE_LINK'],
            CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => 'Удалить это достижение?',
            ]
        );

        $title = (string) ($item['~NAME'] ?? $item['NAME'] ?? '');
        $text = (string) (
            $item['~PREVIEW_TEXT'] ?? $item['PREVIEW_TEXT'] ?? ''
        );
        ?>

        <article
            class="about-achievements__card achievement-card"
            id="<?= htmlspecialcharsbx($this->GetEditAreaId($item['ID'])) ?>"
        >
            <h3 class="achievement-card__title">
                <?= htmlspecialcharsbx($title) ?>
            </h3>

            <?php if ($text !== ''): ?>
                <p class="achievement-card__text">
                    <?= nl2br(htmlspecialcharsbx($text), false) ?>
                </p>
            <?php endif; ?>
        </article>
    <?php endforeach; ?>
</div>