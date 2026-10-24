<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$this->setFrameMode(true);

if (empty($arResult['ITEMS'])) {
    return;
}

$readClientProperty = static function (
    array $item,
    string $code
): string {
    $property = $item['PROPERTIES'][$code] ?? [];

    $value = $property['~VALUE']
        ?? $property['VALUE']
        ?? '';

    return is_scalar($value)
        ? trim((string) $value)
        : '';
};
?>

<div
  class="about-clients__slider slider"
  data-js-slider
  data-slider-slides-mobile="1"
  data-slider-slides-tablet="2"
  data-slider-slides-desktop="2"
  data-slider-group-mobile="1"
  data-slider-group-tablet="2"
  data-slider-group-desktop="2"
  data-slider-loop="false">
  <div
    class="slider__body swiper"
    data-js-slider-swiper
    aria-label="Valued clients">
    <ul class="swiper-wrapper" role="list">
      <?php foreach ($arResult['ITEMS'] as $arItem): ?>
        <?php
        $itemId = (int) $arItem['ID'];
        $iblockId = (int) $arItem['IBLOCK_ID'];

        $this->AddEditAction(
            $itemId,
            $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID(
                $iblockId,
                'ELEMENT_EDIT'
            )
        );

        $this->AddDeleteAction(
            $itemId,
            $arItem['DELETE_LINK'],
            CIBlock::GetArrayByID(
                $iblockId,
                'ELEMENT_DELETE'
            ),
            [
                'CONFIRM' => 'Удалить этого клиента?',
            ]
        );

        $clientName = trim((string) (
            $arItem['~NAME']
            ?? $arItem['NAME']
            ?? ''
        ));

        $sinceYear = $readClientProperty(
            $arItem,
            'SINCE_YEAR'
        );

        $domain = $readClientProperty(
            $arItem,
            'DOMAIN'
        );

        $category = $readClientProperty(
            $arItem,
            'CATEGORY'
        );

        $linkUrl = $readClientProperty(
            $arItem,
            'LINK_URL'
        );

        $checkedUrl = rawurldecode($linkUrl);

        if (
            !str_starts_with($linkUrl, '/')
            || !str_starts_with($checkedUrl, '/')
            || str_starts_with($checkedUrl, '//')
            || str_contains($checkedUrl, '\\')
            || preg_match('/[\x00-\x20\x7F]/', $checkedUrl)
        ) {
            $linkUrl = '';
        }

        $quote = (string) (
            $arItem['~PREVIEW_TEXT']
            ?? $arItem['PREVIEW_TEXT']
            ?? ''
        );

        if (
            ($arItem['PREVIEW_TEXT_TYPE'] ?? 'text')
            === 'html'
        ) {
            $quote = preg_replace(
                '~<br\s*/?>|</(?:p|div|li|blockquote|h[1-6])\s*>~i',
                "\n",
                $quote
            );

            $quote = html_entity_decode(
                strip_tags($quote),
                ENT_QUOTES | ENT_HTML5,
                'UTF-8'
            );
        }

        $quote = trim($quote);
        ?>

        <li
          class="slider__slide swiper-slide"
          id="<?= $this->GetEditAreaId($itemId) ?>">
          <article class="client-card">
            <header class="client-card__header">
              <div class="client-card__meta">
                <?php if ($sinceYear !== ''): ?>
                  <p class="client-card__date">
                    Since <?= htmlspecialcharsbx($sinceYear) ?>
                  </p>
                <?php endif; ?>

                <h3 class="client-card__title">
                  <?= htmlspecialcharsbx($clientName) ?>
                </h3>
              </div>

              <?php if ($linkUrl !== ''): ?>
                <a
                  class="client-card__link"
                  href="<?= htmlspecialcharsbx($linkUrl) ?>">
                  <span>View Related Properties</span>
                  <span class="visually-hidden">
                    for <?= htmlspecialcharsbx($clientName) ?>
                  </span>
                </a>
              <?php endif; ?>
            </header>

            <dl class="client-card__details">
              <div class="client-card__detail">
                <dt class="client-card__term">
                  <img
                    src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M3.75%206C3.75%204.75736%204.75736%203.75%206%203.75H8.25C9.49264%203.75%2010.5%204.75736%2010.5%206V8.25C10.5%209.49264%209.49264%2010.5%208.25%2010.5H6C4.75736%2010.5%203.75%209.49264%203.75%208.25V6Z'%20stroke='%23999999'%20stroke-width='1.5'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3cpath%20d='M3.75%2015.75C3.75%2014.5074%204.75736%2013.5%206%2013.5H8.25C9.49264%2013.5%2010.5%2014.5074%2010.5%2015.75V18C10.5%2019.2426%209.49264%2020.25%208.25%2020.25H6C4.75736%2020.25%203.75%2019.2426%203.75%2018V15.75Z'%20stroke='%23999999'%20stroke-width='1.5'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3cpath%20d='M13.5%206C13.5%204.75736%2014.5074%203.75%2015.75%203.75H18C19.2426%203.75%2020.25%204.75736%2020.25%206V8.25C20.25%209.49264%2019.2426%2010.5%2018%2010.5H15.75C14.5074%2010.5%2013.5%209.49264%2013.5%208.25V6Z'%20stroke='%23999999'%20stroke-width='1.5'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3cpath%20d='M13.5%2015.75C13.5%2014.5074%2014.5074%2013.5%2015.75%2013.5H18C19.2426%2013.5%2020.25%2014.5074%2020.25%2015.75V18C20.25%2019.2426%2019.2426%2020.25%2018%2020.25H15.75C14.5074%2020.25%2013.5%2019.2426%2013.5%2018V15.75Z'%20stroke='%23999999'%20stroke-width='1.5'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3c/svg%3e"
                    alt=""
                    width="16"
                    height="16"
                    aria-hidden="true">
                  <span>Domain</span>
                </dt>

                <dd class="client-card__value">
                  <?= htmlspecialcharsbx($domain) ?>
                </dd>
              </div>

              <div class="client-card__detail">
                <dt class="client-card__term">
                  <img
                    src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M3.75%2013.5L14.25%202.25L12%2010.5H20.25L9.75%2021.75L12%2013.5H3.75Z'%20stroke='%23999999'%20stroke-width='1.5'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3c/svg%3e"
                    alt=""
                    width="16"
                    height="16"
                    aria-hidden="true">
                  <span>Category</span>
                </dt>

                <dd class="client-card__value">
                  <?= htmlspecialcharsbx($category) ?>
                </dd>
              </div>
            </dl>

            <?php if ($quote !== ''): ?>
              <div class="client-card__review">
                <p class="client-card__review-title">
                  What They Said 🤗
                </p>

                <blockquote class="client-card__quote">
                  <p>
                    <?= nl2br(htmlspecialcharsbx($quote)) ?>
                  </p>
                </blockquote>
              </div>
            <?php endif; ?>
          </article>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <footer class="slider__footer">
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
      <span data-js-slider-total>01</span>
    </p>

    <div
      class="slider__navigation"
      aria-label="Client slider controls">
      <button
        class="slider__button slider__button--previous"
        type="button"
        data-js-slider-prev>
        <span class="visually-hidden">
          Previous clients
        </span>
      </button>

      <button
        class="slider__button slider__button--next"
        type="button"
        data-js-slider-next>
        <span class="visually-hidden">
          Next clients
        </span>
      </button>
    </div>
  </footer>
</div>