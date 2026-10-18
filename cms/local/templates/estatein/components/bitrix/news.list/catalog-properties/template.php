<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

require_once $_SERVER['DOCUMENT_ROOT']
    . '/local/include/estatein/property-data.php';

$estateinCatalogItems = [];

foreach ($arResult['ITEMS'] as $arItem) {
    $estateinCard = estateinBuildPropertyCard(
        $arItem,
        $arItem['PROPERTIES'] ?? []
    );

    if ($estateinCard === null) {
        continue;
    }

    $estateinCard['variant'] = 'catalog';

    $estateinCatalogItems[] = [
        'item' => $arItem,
        'card' => $estateinCard,
    ];
}

$estateinCatalogTotal = count($estateinCatalogItems);
?>

<?php if ($estateinCatalogTotal > 0): ?>
    <div
        class="properties-listings__slider slider swiper"
        data-js-slider-swiper
        aria-label="Available properties">
        <ul class="swiper-wrapper">
            <?php foreach ($estateinCatalogItems as $estateinCatalogItem): ?>
                <?php
                $arItem = $estateinCatalogItem['item'];
                $estateinProperty = $estateinCatalogItem['card'];

                $estateinElementId = (int)$arItem['ID'];
                $estateinIblockId = (int)$arItem['IBLOCK_ID'];

                $this->AddEditAction(
                    $estateinElementId,
                    $arItem['EDIT_LINK'],
                    CIBlock::GetArrayByID(
                        $estateinIblockId,
                        'ELEMENT_EDIT'
                    )
                );

                $this->AddDeleteAction(
                    $estateinElementId,
                    $arItem['DELETE_LINK'],
                    CIBlock::GetArrayByID(
                        $estateinIblockId,
                        'ELEMENT_DELETE'
                    ),
                    [
                        'CONFIRM' => GetMessage(
                            'ESTATEIN_CATALOG_PROPERTY_DELETE_CONFIRM'
                        ),
                    ]
                );
                ?>

                <li
                    class="swiper-slide"
                    id="<?= htmlspecialcharsbx(
                        $this->GetEditAreaId($estateinElementId)
                    ) ?>">
                    <?php
                    include $_SERVER['DOCUMENT_ROOT']
                        . '/local/include/estatein/property-card.php';
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <footer class="properties-listings__footer slider__footer">
        <p
            class="slider__counter"
            aria-live="polite"
            aria-atomic="true">
            <span
                class="slider__counter-current"
                data-js-slider-current>
                01
            </span>

            <span aria-hidden="true"> of </span>
            <span class="visually-hidden">of</span>

            <span data-js-slider-total>
                <?= htmlspecialcharsbx(
                    str_pad(
                        (string)$estateinCatalogTotal,
                        2,
                        '0',
                        STR_PAD_LEFT
                    )
                ) ?>
            </span>
        </p>

        <div
            class="slider__navigation"
            aria-label="Property slider controls">
            <button
                class="slider__button slider__button--previous"
                type="button"
                data-js-slider-prev>
                <span class="visually-hidden">
                    Previous property
                </span>
            </button>

            <button
                class="slider__button slider__button--next"
                type="button"
                data-js-slider-next>
                <span class="visually-hidden">
                    Next property
                </span>
            </button>
        </div>
    </footer>
<?php else: ?>
    <div
        class="properties-listings__empty"
        role="status"
        aria-live="polite">
        <p class="properties-listings__empty-title">
            No properties found
        </p>

        <p class="properties-listings__empty-text">
            Try changing the search criteria to see more properties.
        </p>
    </div>
<?php endif; ?>