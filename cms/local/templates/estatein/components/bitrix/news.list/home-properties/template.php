<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

$estateinCardsCount = count($arResult['ITEMS']);

if ($estateinCardsCount === 0) {
    return;
}
?>

<div
    class="properties-section__slider slider swiper"
    data-js-slider-swiper>
    <ul class="swiper-wrapper">
        <?php foreach ($arResult['ITEMS'] as $estateinItem): ?>
            <?php
            $this->AddEditAction(
                $estateinItem['ID'],
                $estateinItem['EDIT_LINK'],
                CIBlock::GetArrayByID(
                    $estateinItem['IBLOCK_ID'],
                    'ELEMENT_EDIT'
                )
            );

            $this->AddDeleteAction(
                $estateinItem['ID'],
                $estateinItem['DELETE_LINK'],
                CIBlock::GetArrayByID(
                    $estateinItem['IBLOCK_ID'],
                    'ELEMENT_DELETE'
                ),
                [
                    'CONFIRM' =>
                        'Are you sure you want to delete this property?',
                ]
            );

            $estateinProperty = $estateinItem['ESTATEIN_CARD'];
            ?>

            <li
                class="swiper-slide"
                id="<?= htmlspecialcharsbx(
                    $this->GetEditAreaId($estateinItem['ID'])
                ) ?>">
                <?php
                include $_SERVER['DOCUMENT_ROOT']
                    . '/local/include/estatein/property-card.php';
                ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="properties-section__footer slider__footer">
    <a
        class="slider__mobile-action button button--dark"
        href="<?= htmlspecialcharsbx(SITE_DIR . 'properties/') ?>">
        View All Properties
    </a>

    <p
        class="slider__counter"
        aria-live="polite"
        aria-atomic="true">
        <span
            class="slider__counter-current"
            data-js-slider-current>
            01
        </span>
        of
        <span data-js-slider-total>
            <?= htmlspecialcharsbx(
                str_pad(
                    (string)$estateinCardsCount,
                    2,
                    '0',
                    STR_PAD_LEFT
                )
            ) ?>
        </span>
    </p>

    <div
        class="slider__navigation"
        aria-label="Featured properties slider controls">
        <button
            class="slider__button slider__button--previous"
            type="button"
            aria-label="Previous property"
            data-js-slider-prev></button>

        <button
            class="slider__button slider__button--next"
            type="button"
            aria-label="Next property"
            data-js-slider-next></button>
    </div>
</div>