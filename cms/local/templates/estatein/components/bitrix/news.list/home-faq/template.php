<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */

$this->setFrameMode(true);

if (empty($arResult['ITEMS'])) {
    return;
}

$estateinFaqCount = count($arResult['ITEMS']);
?>



<div
    class="faq-section__slider slider swiper"
    data-js-slider-swiper>
    <ul class="swiper-wrapper">
        <?php foreach ($arResult['ITEMS'] as $estateinFaqItem): ?>
            <?php
            $estateinFaqId = (int)$estateinFaqItem['ID'];

            $this->AddEditAction(
                $estateinFaqId,
                $estateinFaqItem['EDIT_LINK'],
                CIBlock::GetArrayByID(
                    (int)$estateinFaqItem['IBLOCK_ID'],
                    'ELEMENT_EDIT'
                )
            );

            $this->AddDeleteAction(
                $estateinFaqId,
                $estateinFaqItem['DELETE_LINK'],
                CIBlock::GetArrayByID(
                    (int)$estateinFaqItem['IBLOCK_ID'],
                    'ELEMENT_DELETE'
                ),
                [
                    'CONFIRM' => 'Удалить этот вопрос?',
                ]
            );

            $estateinFaqQuestion = (string)(
                $estateinFaqItem['~NAME']
                ?? $estateinFaqItem['NAME']
                ?? ''
            );

            $estateinFaqAnswer = (string)(
                $estateinFaqItem['~DETAIL_TEXT']
                ?? $estateinFaqItem['DETAIL_TEXT']
                ?? ''
            );

            $estateinFaqAnswerType = strtolower(
                (string)($estateinFaqItem['DETAIL_TEXT_TYPE'] ?? 'text')
            );

            if ($estateinFaqAnswerType === 'html') {
                $estateinFaqAnswerHtml = $estateinFaqAnswer;
            } else {
                $estateinFaqAnswerHtml = nl2br(
                    htmlspecialcharsbx($estateinFaqAnswer)
                );
            }

            $estateinFaqLinkProperty = (
                $estateinFaqItem['PROPERTIES']['LINK_URL'] ?? []
            );

            $estateinFaqLinkValue = (
                $estateinFaqLinkProperty['~VALUE']
                ?? $estateinFaqLinkProperty['VALUE']
                ?? ''
            );

            $estateinFaqLinkUrl = is_string($estateinFaqLinkValue)
                ? trim($estateinFaqLinkValue)
                : '';

            $estateinFaqLinkAllowed = false;

            if (
                $estateinFaqLinkUrl !== ''
                && !preg_match('/[\x00-\x20\x7F]/', $estateinFaqLinkUrl)
                && !str_contains($estateinFaqLinkUrl, '\\')
            ) {
                if (str_starts_with($estateinFaqLinkUrl, '#')) {
                    $estateinFaqLinkAllowed = true;
                } elseif (
                    str_starts_with($estateinFaqLinkUrl, '/')
                    && !str_starts_with($estateinFaqLinkUrl, '//')
                ) {
                    $estateinFaqLinkAllowed = true;
                } elseif (
                    preg_match('~^https?://~i', $estateinFaqLinkUrl)
                    && filter_var(
                        $estateinFaqLinkUrl,
                        FILTER_VALIDATE_URL
                    ) !== false
                ) {
                    $estateinFaqLinkAllowed = true;
                }
            }
            ?>

            <li
                class="swiper-slide"
                id="<?= $this->GetEditAreaId($estateinFaqId) ?>">
                <article class="faq-card">
                    <div class="faq-card__content">
                        <h3 class="faq-card__title">
                            <?= htmlspecialcharsbx($estateinFaqQuestion) ?>
                        </h3>

                        <div class="faq-card__description">
                            <?= $estateinFaqAnswerHtml ?>
                        </div>
                    </div>

                    <?php if ($estateinFaqLinkAllowed): ?>
                        <a
                            class="faq-card__link button button--gray"
                            href="<?= htmlspecialcharsbx($estateinFaqLinkUrl) ?>"
                            aria-label="<?= htmlspecialcharsbx(
                                            'Read more about ' . $estateinFaqQuestion
                                        ) ?>">
                            Read More
                        </a>
                    <?php endif; ?>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="faq-section__footer slider__footer">
    <a
        class="slider__mobile-action button button--dark"
        href="/#faq">
        View All FAQs
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
            <?= str_pad(
                (string)$estateinFaqCount,
                2,
                '0',
                STR_PAD_LEFT
            ) ?>
        </span>
    </p>

    <div
        class="slider__navigation"
        aria-label="FAQ slider controls">
        <button
            class="slider__button slider__button--previous"
            type="button"
            aria-label="Previous FAQ group"
            data-js-slider-prev></button>

        <button
            class="slider__button slider__button--next"
            type="button"
            aria-label="Next FAQ group"
            data-js-slider-next></button>
    </div>
</div>