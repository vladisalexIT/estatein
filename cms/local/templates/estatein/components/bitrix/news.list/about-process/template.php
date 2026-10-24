<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if (empty($arResult['ITEMS'])) {
    return;
}
?>

<ol class="about-process__list">
    <?php foreach ($arResult['ITEMS'] as $arItem): ?>
        <?php
        $elementId = (int)$arItem['ID'];
        $iblockId = (int)$arItem['IBLOCK_ID'];

        $this->AddEditAction(
            $elementId,
            $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID($iblockId, 'ELEMENT_EDIT')
        );

        $this->AddDeleteAction(
            $elementId,
            $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID($iblockId, 'ELEMENT_DELETE'),
            [
                'CONFIRM' => 'Удалить этот этап работы?',
            ]
        );

        $title = (string)(
            $arItem['~NAME']
            ?? $arItem['NAME']
            ?? ''
        );

        $description = (string)(
            $arItem['~PREVIEW_TEXT']
            ?? $arItem['PREVIEW_TEXT']
            ?? ''
        );
        ?>

        <li
            class="about-process__item"
            id="<?= $this->GetEditAreaId($elementId) ?>">
            <div class="about-process__card">
                <h3 class="about-process__card-title">
                    <?= htmlspecialcharsbx($title) ?>
                </h3>

                <p class="about-process__card-description">
                    <?= nl2br(htmlspecialcharsbx($description)) ?>
                </p>
            </div>
        </li>
    <?php endforeach; ?>
</ol>