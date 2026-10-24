<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

$hasOffices = !empty($arResult['ITEMS']);

$contactEmail = trim(
    (string)($arParams['CONTACT_EMAIL'] ?? '')
);

$contactPhoneDisplay = trim(
    (string)($arParams['CONTACT_PHONE_DISPLAY'] ?? '')
);

$contactPhoneHref = trim(
    (string)($arParams['CONTACT_PHONE_HREF'] ?? '')
);
?>

<ul class="contacts-offices__list">
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
                'CONFIRM' => 'Удалить этот офис?',
            ]
        );

        $getPropertyText = static function (
            string $code
        ) use ($arItem): string {
            $property = $arItem['PROPERTIES'][$code] ?? [];

            $value = $property['~VALUE']
                ?? $property['VALUE']
                ?? '';

            return is_scalar($value)
                ? trim((string)$value)
                : '';
        };

        $officeName = (string)(
            $arItem['~NAME']
            ?? $arItem['NAME']
            ?? ''
        );

        $officeDescription = (string)(
            $arItem['~PREVIEW_TEXT']
            ?? $arItem['PREVIEW_TEXT']
            ?? ''
        );

        $officeAddress = $getPropertyText('ADDRESS');
        $officeCity = $getPropertyText('CITY');

        $categoryValue = $arItem['PROPERTIES']['CATEGORY']['VALUE_XML_ID']
            ?? '';

        $officeCategory = is_scalar($categoryValue)
            ? trim((string)$categoryValue)
            : '';

        if (
            !in_array(
                $officeCategory,
                ['headquarters', 'regional', 'international'],
                true
            )
        ) {
            $officeCategory = '';
        }

        $officeMapUrl = $officeAddress !== ''
            ? 'https://www.google.com/maps/search/?api=1&query='
            . rawurlencode($officeAddress)
            : '';
        ?>
        <li
            class="contacts-offices__item office-card"
            id="<?= $this->GetEditAreaId($elementId) ?>"
            data-office-category="<?= htmlspecialcharsbx($officeCategory) ?>">
            <div class="office-card__body">
                <span class="office-card__type">
                    <?= htmlspecialcharsbx($officeName) ?>
                </span>

                <h3 class="office-card__address">
                    <?= htmlspecialcharsbx($officeAddress) ?>
                </h3>

                <p class="office-card__description">
                    <?= nl2br(htmlspecialcharsbx($officeDescription)) ?>
                </p>
            </div>

            <address class="office-card__contacts">
                <?php if ($contactEmail !== ''): ?>
                    <a
                        class="office-card__contact-tag"
                        href="<?= htmlspecialcharsbx('mailto:' . $contactEmail) ?>">
                        <img
                            class="office-card__contact-icon"
                            src="data:image/svg+xml,%3csvg%20width='20'%20height='20'%20viewBox='0%200%2020%2020'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M1.25%207.22425V14.375C1.25%2015.7557%202.36929%2016.875%203.75%2016.875H16.25C17.6307%2016.875%2018.75%2015.7557%2018.75%2014.375V7.22425L11.3102%2011.8026C10.5067%2012.297%209.49327%2012.297%208.68976%2011.8026L1.25%207.22425Z'%20fill='white'/%3e%3cpath%20d='M18.75%205.75652V5.625C18.75%204.24429%2017.6307%203.125%2016.25%203.125H3.75C2.36929%203.125%201.25%204.24429%201.25%205.625V5.75652L9.34488%2010.738C9.74664%2010.9852%2010.2534%2010.9852%2010.6551%2010.738L18.75%205.75652Z'%20fill='white'/%3e%3c/svg%3e"
                            alt=""
                            width="20"
                            height="20"
                            aria-hidden="true" />
                        <span class="office-card__contact-value">
                            <?= htmlspecialcharsbx($contactEmail) ?>
                        </span>
                    </a>
                <?php endif; ?>

                <?php if (
                    $contactPhoneHref !== ''
                    && $contactPhoneDisplay !== ''
                ): ?>
                    <a
                        class="office-card__contact-tag"
                        href="<?= htmlspecialcharsbx('tel:' . $contactPhoneHref) ?>">
                        <img
                            class="office-card__contact-icon"
                            src="data:image/svg+xml,%3csvg%20width='20'%20height='20'%20viewBox='0%200%2020%2020'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M1.25%203.75C1.25%202.36929%202.36929%201.25%203.75%201.25H4.89302C5.61%201.25%206.23498%201.73796%206.40887%202.43354L7.33037%206.11952C7.48284%206.72942%207.25495%207.37129%206.75202%207.74849L5.674%208.557C5.56206%208.64096%205.53772%208.7639%205.56917%208.84974C6.51542%2011.4329%208.5671%2013.4846%2011.1503%2014.4308C11.2361%2014.4623%2011.359%2014.4379%2011.443%2014.326L12.2515%2013.248C12.6287%2012.7451%2013.2706%2012.5172%2013.8805%2012.6696L17.5665%2013.5911C18.262%2013.765%2018.75%2014.39%2018.75%2015.107V16.25C18.75%2017.6307%2017.6307%2018.75%2016.25%2018.75H14.375C7.12626%2018.75%201.25%2012.8737%201.25%205.625V3.75Z'%20fill='white'/%3e%3c/svg%3e"
                            alt=""
                            width="20"
                            height="20"
                            aria-hidden="true" />
                        <span class="office-card__contact-value">
                            <?= htmlspecialcharsbx($contactPhoneDisplay) ?>
                        </span>
                    </a>
                <?php endif; ?>

                <?php if ($officeMapUrl !== '' && $officeCity !== ''): ?>
                    <a
                        class="office-card__contact-tag"
                        href="<?= htmlspecialcharsbx($officeMapUrl) ?>"
                        target="_blank"
                        rel="noopener noreferrer">
                        <img
                            class="office-card__contact-icon"
                            src="data:image/svg+xml,%3csvg%20width='20'%20height='20'%20viewBox='0%200%2020%2020'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M9.61646%2018.6259C9.64163%2018.6405%209.66141%2018.6517%209.67542%2018.6596L9.69869%2018.6726C9.88441%2018.7745%2010.1148%2018.7738%2010.3007%2018.6729L10.3246%2018.6596C10.3386%2018.6517%2010.3584%2018.6405%2010.3835%2018.6259C10.4339%2018.5967%2010.5058%2018.5542%2010.5963%2018.4985C10.7771%2018.3872%2011.0323%2018.223%2011.3372%2018.0076C11.9459%2017.5776%2012.7581%2016.9395%2013.5721%2016.1061C15.1922%2014.4474%2016.875%2011.9551%2016.875%208.75C16.875%204.95304%2013.797%201.875%2010%201.875C6.20304%201.875%203.125%204.95304%203.125%208.75C3.125%2011.9551%204.80777%2014.4474%206.42788%2016.1061C7.24188%2016.9395%208.05409%2017.5776%208.66282%2018.0076C8.96771%2018.223%209.22295%2018.3872%209.40375%2018.4985C9.49419%2018.5542%209.56612%2018.5967%209.61646%2018.6259ZM10%2011.25C11.3807%2011.25%2012.5%2010.1307%2012.5%208.75C12.5%207.36929%2011.3807%206.25%2010%206.25C8.61929%206.25%207.5%207.36929%207.5%208.75C7.5%2010.1307%208.61929%2011.25%2010%2011.25Z'%20fill='white'/%3e%3c/svg%3e"
                            alt=""
                            width="20"
                            height="20"
                            aria-hidden="true" />
                        <span class="office-card__contact-value">
                            <?= htmlspecialcharsbx($officeCity) ?>
                        </span>
                    </a>
                <?php endif; ?>
            </address>

            <?php if ($officeMapUrl !== ''): ?>
                <a
                    class="office-card__button"
                    href="<?= htmlspecialcharsbx($officeMapUrl) ?>"
                    target="_blank"
                    rel="noopener noreferrer">
                    Get Direction
                </a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<p
    class="contacts-offices__empty"
    data-js-offices-empty
    <?= $hasOffices ? 'hidden' : '' ?>>
    No offices are available in this category yet.
</p>