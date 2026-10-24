<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
  die();
}

$estateinDetailsConfig = require $_SERVER['DOCUMENT_ROOT']
  . '/local/config/estatein.php';

require_once $_SERVER['DOCUMENT_ROOT']
  . '/local/include/estatein/property-details-pricing.php';

$estateinDemoPricing = estateinGetDemoPropertyPricing(
  (int)(
    $estateinDetailsConfig['properties_iblock_id'] ?? 0
  ),
  (int)(
    $estateinDetailsConfig['property_details_demo_element_id'] ?? 0
  )
);

$estateinPricingMoney = static function (
  ?int $cents,
  string $class = ''
): string {
  $classAttribute = $class !== ''
    ? ' class="' . htmlspecialcharsbx($class) . '"'
    : '';

  if ($cents === null) {
    return '<span'
      . $classAttribute
      . '>On request</span>';
  }

  $whole = intdiv($cents, 100);
  $fraction = $cents % 100;

  $decimalPart = $fraction !== 0
    ? '.' . str_pad(
      (string)$fraction,
      2,
      '0',
      STR_PAD_LEFT
    )
    : '';

  $machineValue = (string)$whole . $decimalPart;

  $formattedValue = '$'
    . number_format($whole, 0, '.', ',')
    . $decimalPart;

  return '<data'
    . $classAttribute
    . ' value="'
    . htmlspecialcharsbx($machineValue)
    . '" data-currency="USD">'
    . htmlspecialcharsbx($formattedValue)
    . '</data>';
};

$estateinPricingPercent =
  $estateinDemoPricing['down_payment_rate'] === null
  ? 'On request'
  : rtrim(
    rtrim(
      number_format(
        $estateinDemoPricing['down_payment_rate'] / 100,
        2,
        '.',
        ''
      ),
      '0'
    ),
    '.'
  ) . '%';
?>

<section class="property-gallery" id="property-gallery" aria-labelledby="property-gallery-title">
  <div class="property-gallery__container container">
    <header class="property-gallery__header">
      <div class="property-gallery__identity">
        <?php
        $APPLICATION->IncludeComponent(
          'bitrix:main.include',
          '',
          [
            'AREA_FILE_SHOW' => 'file',
            'PATH' => '/local/include/pages/property-details/gallery-header-content.php',
            'EDIT_TEMPLATE' => '',
          ]
        );
        ?>
      </div>

      <p class="property-gallery__price">
        <span class="property-gallery__price-label">
          Price
        </span>

        <strong class="property-gallery__price-value">
          <?= $estateinPricingMoney(
            $estateinDemoPricing['listing_price']
          ) ?>
        </strong>
      </p>
    </header>

    <div class="property-gallery__box" data-property-gallery>
      <nav class="property-gallery__thumbnails" aria-label="Choose a property gallery slide">
        <ul class="property-gallery__thumbnail-list">
          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail is-active" type="button" data-gallery-thumb="0"
              aria-label="Show gallery slide 1" aria-current="true">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="eager" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="1"
              aria-label="Show gallery slide 2" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="2"
              aria-label="Show gallery slide 3" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="3"
              aria-label="Show gallery slide 4" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="4"
              aria-label="Show gallery slide 5" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="5"
              aria-label="Show gallery slide 6" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="6"
              aria-label="Show gallery slide 7" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>

          <li class="property-gallery__thumbnail-item">
            <button class="property-gallery__thumbnail" type="button" data-gallery-thumb="7"
              aria-label="Show gallery slide 8" aria-current="false">
              <img src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp" alt="" width="160" height="100"
                loading="lazy" decoding="async" aria-hidden="true" />
            </button>
          </li>
        </ul>
      </nav>

      <div class="property-gallery__slider swiper" data-gallery-swiper
        aria-label="Seaside Serenity Villa gallery slides">
        <ul class="property-gallery__slides swiper-wrapper">
          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Exterior view of Seaside Serenity Villa with a private swimming pool" width="733" height="583"
                loading="eager" decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Living room and dining area inside Seaside Serenity Villa" width="733" height="583" loading="eager"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Exterior view of Seaside Serenity Villa surrounded by greenery" width="733" height="583"
                loading="lazy" decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Open-plan living area inside Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Modern architecture of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Bright interior of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Poolside exterior of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Kitchen and dining area inside Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Front elevation of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Comfortable lounge inside Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Seaside Serenity Villa exterior at pool level" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Dining space inside Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Contemporary exterior details of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Interior details of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>

          <li class="property-gallery__slide swiper-slide">
            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/seaside-serenity-villa-BMOJRHhy.webp"
                alt="Complete exterior view of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>

            <figure class="property-gallery__media">
              <img class="property-gallery__image" src="/local/templates/estatein/assets/metropolitan-haven-CktEm9H_.webp"
                alt="Complete interior view of Seaside Serenity Villa" width="733" height="583" loading="lazy"
                decoding="async" />
            </figure>
          </li>
        </ul>
      </div>

      <div class="property-gallery__controls" aria-label="Property gallery controls">
        <button class="property-gallery__arrow property-gallery__arrow--previous" type="button" data-gallery-prev
          aria-label="Previous gallery slide"></button>

        <div class="property-gallery__pagination" data-gallery-pagination aria-label="Gallery pagination"></div>

        <button class="property-gallery__arrow property-gallery__arrow--next" type="button" data-gallery-next
          aria-label="Next gallery slide"></button>
      </div>
    </div>

    <div class="property-gallery__details">
      <div class="property-gallery__info-panel">
        <section
          class="property-gallery__description"
          aria-labelledby="property-description-title">
          <?php
          $APPLICATION->IncludeComponent(
            'bitrix:main.include',
            '',
            [
              'AREA_FILE_SHOW' => 'file',
              'PATH' => '/local/include/pages/property-details/description-content.php',
              'EDIT_TEMPLATE' => '',
            ]
          );
          ?>
        </section>

        <section
          class="property-gallery__amenities"
          aria-labelledby="property-amenities-title">
          <?php
          $APPLICATION->IncludeComponent(
            'bitrix:main.include',
            '',
            [
              'AREA_FILE_SHOW' => 'file',
              'PATH' => '/local/include/pages/property-details/amenities-content.php',
              'EDIT_TEMPLATE' => '',
            ]
          );
          ?>
        </section>
      </div>
    </div>
  </div>
</section>
<section class="property-details-inquiry" id="property-details-inquiry"
  aria-labelledby="property-details-inquiry-title">
  <div class="property-details-inquiry__container container">
    <div class="property-details-inquiry__layout">
      <div class="property-details-inquiry__intro">
        <img class="property-details-inquiry__decoration" src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_75_930)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73233%2023.2843%200.0166836%2015%200.0166836C6.71573%200.0166836%200%206.73233%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_75_930)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_75_930)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.6851%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.6851%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M59.9998%2023.4C62.3194%2023.4%2064.1998%2021.5196%2064.1998%2019.2C64.1998%2016.8804%2062.3194%2015%2059.9998%2015C57.6802%2015%2055.7998%2016.8804%2055.7998%2019.2C55.7998%2021.5196%2057.6802%2023.4%2059.9998%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2023.4C70.7193%2023.4%2072.5997%2021.5196%2072.5997%2019.2C72.5997%2016.8804%2070.7193%2015%2068.3997%2015C66.0801%2015%2064.1997%2016.8804%2064.1997%2019.2C64.1997%2021.5196%2066.0801%2023.4%2068.3997%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M59.9998%2015C62.3194%2015%2064.1998%2013.1196%2064.1998%2010.8C64.1998%208.4804%2062.3194%206.6%2059.9998%206.6C57.6802%206.6%2055.7998%208.4804%2055.7998%2010.8C55.7998%2013.1196%2057.6802%2015%2059.9998%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2015C70.7193%2015%2072.5997%2013.1196%2072.5997%2010.8C72.5997%208.4804%2070.7193%206.6%2068.3997%206.6C66.0801%206.6%2064.1997%208.4804%2064.1997%2010.8C64.1997%2013.1196%2066.0801%2015%2068.3997%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_75_930'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_75_930'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_75_930'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e" alt=""
          width="69" height="30" loading="lazy" decoding="async" aria-hidden="true" />

        <?php
        $APPLICATION->IncludeComponent(
          'bitrix:main.include',
          '',
          [
            'AREA_FILE_SHOW' => 'file',
            'PATH' => '/local/include/pages/property-details/inquiry-content.php',
            'EDIT_TEMPLATE' => '',
          ]
        );
        ?>
      </div>

      <div class="property-details-inquiry__form-card">
        <form class="property-details-inquiry__form" data-js-form action="/local/ajax/estatein-form.php" method="post" autocomplete="on" novalidate>
          <?php $estateinFormType = 'property_details';
          require $_SERVER['DOCUMENT_ROOT'] . '/local/include/estatein/form-meta.php'; ?>

          <div class="property-details-inquiry__fields">
            <div class="form-field">
              <label class="form-field__label" for="property-details-first-name">
                First Name
              </label>

              <input class="form-field__control" id="property-details-first-name" name="first_name" type="text"
                placeholder="Enter First Name" autocomplete="given-name" required maxlength="100" />
              <div data-js-form-field-errors></div>
            </div>

            <div class="form-field">
              <label class="form-field__label" for="property-details-last-name">
                Last Name
              </label>

              <input class="form-field__control" id="property-details-last-name" name="last_name" type="text"
                placeholder="Enter Last Name" autocomplete="family-name" required maxlength="100" />
              <div data-js-form-field-errors></div>
            </div>

            <div class="form-field">
              <label class="form-field__label" for="property-details-email">
                Email
              </label>

              <input class="form-field__control" id="property-details-email" name="email" type="email"
                placeholder="Enter your Email" autocomplete="email" inputmode="email" required maxlength="254" />
              <div data-js-form-field-errors></div>
            </div>

            <div class="form-field">
              <label class="form-field__label" for="property-details-phone">
                Phone
              </label>
              <input class="form-field__control" id="property-details-phone" name="phone" type="tel"
                placeholder="Enter Phone Number" autocomplete="tel" inputmode="tel" required maxlength="25" />
              <div data-js-form-field-errors></div>
            </div>

            <div class="form-field form-field--wide">
              <label class="form-field__label" for="property-details-selected-property">
                Selected Property
              </label>
              <div class="property-details-inquiry__selected-control">
                <select class="form-field__control form-field__control--select js-custom-select"
                  data-select-theme="form" id="property-details-selected-property" name="selected_property" required>
                  <option value="Seaside Serenity Villa, Malibu, California" selected>Seaside Serenity Villa, Malibu,
                    California</option>
                  <option value="Metropolitan Haven, New York City, NY">Metropolitan Haven, New York City, NY</option>
                  <option value="Rustic Retreat Cottage, Aspen, Colorado">Rustic Retreat Cottage, Aspen, Colorado
                  </option>
                  <option value="Coastal Elegance, Miami, Florida">Coastal Elegance, Miami, Florida</option>
                  <option value="Urban Vista Apartment, Chicago, Illinois">Urban Vista Apartment, Chicago, Illinois
                  </option>
                  <option value="Countryside Haven, Austin, Texas">Countryside Haven, Austin, Texas</option>
                </select>
              </div>
              <div data-js-form-field-errors></div>
            </div>

            <div class="form-field form-field--wide">
              <label class="form-field__label" for="property-details-message">
                Message
              </label>

              <textarea class="form-field__control form-field__control--textarea" id="property-details-message"
                name="message" placeholder="Enter your Message here..." rows="5" required maxlength="5000"></textarea>
              <div data-js-form-field-errors></div>
            </div>
          </div>

          <div class="property-details-inquiry__footer">
            <div class="agreement">
              <input class="agreement__checkbox visually-hidden" type="checkbox" id="property-details-privacy-policy"
                name="privacy_agreement" required />

              <label class="agreement__label" for="property-details-privacy-policy">
                I agree with
                <span class="agreement__link">
                  Terms of Use
                </span>
                and
                <span class="agreement__link">
                  Privacy Policy
                </span>
              </label>
              <div data-js-form-field-errors></div>
            </div>

            <button class="property-details-inquiry__submit button button--accent" type="submit">
              Send Your Message
            </button>
          </div>

          <p class="form-error form-submission-error" data-js-form-submit-error role="alert" tabindex="-1" hidden></p>
        </form>
      </div>
    </div>
  </div>
</section>
<section class="pricing" id="pricing" aria-labelledby="pricing-title">
  <div class="pricing__container container">
    <img class="pricing__decoration" src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_104_11388)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73234%2023.2843%200.0166931%2015%200.0166931C6.71573%200.0166931%200%206.73234%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_104_11388)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_104_11388)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.685%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.685%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M60.0008%2023.4C62.3204%2023.4%2064.2008%2021.5196%2064.2008%2019.2C64.2008%2016.8804%2062.3204%2015%2060.0008%2015C57.6812%2015%2055.8008%2016.8804%2055.8008%2019.2C55.8008%2021.5196%2057.6812%2023.4%2060.0008%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3992%2023.4C70.7188%2023.4%2072.5992%2021.5196%2072.5992%2019.2C72.5992%2016.8804%2070.7188%2015%2068.3992%2015C66.0796%2015%2064.1992%2016.8804%2064.1992%2019.2C64.1992%2021.5196%2066.0796%2023.4%2068.3992%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M60.0008%2015C62.3204%2015%2064.2008%2013.1196%2064.2008%2010.8C64.2008%208.48038%2062.3204%206.59998%2060.0008%206.59998C57.6812%206.59998%2055.8008%208.48038%2055.8008%2010.8C55.8008%2013.1196%2057.6812%2015%2060.0008%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3992%2015C70.7188%2015%2072.5992%2013.1196%2072.5992%2010.8C72.5992%208.48038%2070.7188%206.59998%2068.3992%206.59998C66.0796%206.59998%2064.1992%208.48038%2064.1992%2010.8C64.1992%2013.1196%2066.0796%2015%2068.3992%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_104_11388'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_104_11388'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_104_11388'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e" alt="" width="68" height="30"
      loading="lazy" decoding="async" aria-hidden="true" draggable="false">

    <header class="pricing__header">
      <?php
      $APPLICATION->IncludeComponent(
        'bitrix:main.include',
        '',
        [
          'AREA_FILE_SHOW' => 'file',
          'PATH' => '/local/include/pages/property-details/pricing-content.php',
          'EDIT_TEMPLATE' => '',
        ]
      );
      ?>
    </header>

    <?php
    $APPLICATION->IncludeComponent(
      'bitrix:main.include',
      '',
      [
        'AREA_FILE_SHOW' => 'file',
        'PATH' => '/local/include/pages/property-details/pricing-note.php',
        'EDIT_TEMPLATE' => '',
      ]
    );
    ?>

    <div class="pricing__grid">
      <div class="pricing__summary">
        <dl class="pricing__summary-list">
          <dt class="pricing__summary-label">
            Listing Price
          </dt>

          <dd class="pricing__summary-value">
            <?= $estateinPricingMoney(
              $estateinDemoPricing['listing_price']
            ) ?>
          </dd>
        </dl>
      </div>

      <div class="pricing__blocks">
        <article class="pricing-card" aria-labelledby="pricing-additional-fees-title">
          <header class="pricing-card__header">
            <h3 class="pricing-card__title" id="pricing-additional-fees-title">
              Additional Fees
            </h3>

            <a class="pricing-card__btn" href="#property-details-inquiry" aria-label="Learn more about additional fees">
              Learn More
            </a>
          </header>

          <div class="pricing-card__rows">
            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Transfer Tax
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['transfer_tax'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    Based on the sale price and local regulations
                  </span>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Legal Fees
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['legal_fees'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    Approximate cost for legal services, including title transfer
                  </span>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Home Inspection
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['home_inspection'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    Recommended for due diligence
                  </span>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Insurance
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['insurance_annual'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    Annual cost for comprehensive property insurance
                  </span>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row pricing-card__row--single">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Mortgage Fees
                </dt>

                <dd class="pricing-card__details">
                  <span class="pricing-card__price">
                    Varies
                  </span>

                  <span class="pricing-card__badge">
                    If applicable, consult with your lender for specific details
                  </span>
                </dd>
              </dl>
            </div>
          </div>
        </article>

        <article class="pricing-card" aria-labelledby="pricing-monthly-costs-title">
          <header class="pricing-card__header">
            <h3 class="pricing-card__title" id="pricing-monthly-costs-title">
              Monthly Costs
            </h3>

            <a class="pricing-card__btn" href="#property-details-inquiry" aria-label="Learn more about monthly costs">
              Learn More
            </a>
          </header>

          <div class="pricing-card__rows">
            <div class="pricing-card__row pricing-card__row--single">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Taxes
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['property_tax_monthly'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    Approximate monthly property tax based on the sale price and local rates
                  </span>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row pricing-card__row--single">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Homeowners' Association Fee
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['hoa_monthly'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    Monthly fee for common area maintenance and security
                  </span>
                </dd>
              </dl>
            </div>
          </div>
        </article>

        <article class="pricing-card" aria-labelledby="pricing-initial-costs-title">
          <header class="pricing-card__header">
            <h3 class="pricing-card__title" id="pricing-initial-costs-title">
              Total Initial Costs
            </h3>

            <a class="pricing-card__btn" href="#property-details-inquiry" aria-label="Learn more about total initial costs">
              Learn More
            </a>
          </header>

          <div class="pricing-card__rows">
            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Listing Price
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['listing_price'],
                    'pricing-card__price'
                  ) ?>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Additional Fees
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['additional_fees'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    Property transfer tax, legal fees, inspection, annual insurance; variable mortgage fees excluded
                  </span>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Down Payment
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['down_payment'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    <?= htmlspecialcharsbx($estateinPricingPercent) ?>
                  </span>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Mortgage Amount
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['mortgage_amount'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    If applicable
                  </span>
                </dd>
              </dl>
            </div>
          </div>
        </article>

        <article class="pricing-card" aria-labelledby="pricing-monthly-expenses-title">
          <header class="pricing-card__header">
            <h3 class="pricing-card__title" id="pricing-monthly-expenses-title">
              Monthly Expenses
            </h3>

            <a class="pricing-card__btn" href="#property-details-inquiry" aria-label="Learn more about monthly expenses">
              Learn More
            </a>
          </header>

          <div class="pricing-card__rows">
            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Taxes
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['property_tax_monthly'],
                    'pricing-card__price'
                  ) ?>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Homeowners' Association Fee
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['hoa_monthly'],
                    'pricing-card__price'
                  ) ?>
                </dd>
              </dl>
            </div>

            <div class="pricing-card__row">
              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Mortgage Payment
                </dt>

                <dd class="pricing-card__details">
                  <span class="pricing-card__price">
                    Varies based on terms and interest rate
                  </span>

                  <span class="pricing-card__badge">
                    If applicable
                  </span>
                </dd>
              </dl>

              <dl class="pricing-card__item">
                <dt class="pricing-card__label">
                  Property Insurance
                </dt>

                <dd class="pricing-card__details">
                  <?= $estateinPricingMoney(
                    $estateinDemoPricing['insurance_monthly'],
                    'pricing-card__price'
                  ) ?>

                  <span class="pricing-card__badge">
                    Approximate monthly cost
                  </span>
                </dd>
              </dl>
            </div>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>
<?php
$estateinDetailsFaqIblockId = (int)(
  $estateinDetailsConfig['faq_iblock_id'] ?? 0
);

$estateinDetailsFaqHtml = '';

if ($estateinDetailsFaqIblockId > 0) {
  ob_start();

  $APPLICATION->IncludeComponent(
    'bitrix:news.list',
    'home-faq',
    [
      'IBLOCK_ID' => $estateinDetailsFaqIblockId,

      'NEWS_COUNT' => '1000',

      'SORT_BY1' => 'SORT',
      'SORT_ORDER1' => 'ASC',
      'SORT_BY2' => 'ID',
      'SORT_ORDER2' => 'ASC',

      'CHECK_DATES' => 'Y',

      'FIELD_CODE' => [
        'NAME',
        'DETAIL_TEXT',
        'DETAIL_TEXT_TYPE',
      ],

      'PROPERTY_CODE' => [
        'LINK_URL',
      ],

      'FILTER_NAME' => '',

      'DETAIL_URL' => '',
      'HIDE_LINK_WHEN_NO_DETAIL' => 'N',

      'PREVIEW_TRUNCATE_LEN' => '0',
      'DISPLAY_DATE' => 'N',
      'DISPLAY_NAME' => 'Y',
      'DISPLAY_PICTURE' => 'N',
      'DISPLAY_PREVIEW_TEXT' => 'N',

      'SET_TITLE' => 'N',
      'SET_BROWSER_TITLE' => 'N',
      'SET_META_KEYWORDS' => 'N',
      'SET_META_DESCRIPTION' => 'N',
      'SET_LAST_MODIFIED' => 'N',

      'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
      'ADD_SECTIONS_CHAIN' => 'N',

      'PARENT_SECTION' => '',
      'PARENT_SECTION_CODE' => '',
      'INCLUDE_SUBSECTIONS' => 'Y',

      'CACHE_TYPE' => 'A',
      'CACHE_TIME' => '3600',
      'CACHE_FILTER' => 'N',
      'CACHE_GROUPS' => 'Y',

      'DISPLAY_TOP_PAGER' => 'N',
      'DISPLAY_BOTTOM_PAGER' => 'N',
      'PAGER_SHOW_ALWAYS' => 'N',

      'SET_STATUS_404' => 'N',
      'SHOW_404' => 'N',
    ],
    false,
    [
      'HIDE_ICONS' => 'Y',
    ]
  );

  $estateinDetailsFaqHtml = (string)ob_get_clean();
}
?>

<?php if (trim($estateinDetailsFaqHtml) !== ''): ?>
  <section
    class="faq-section"
    aria-labelledby="faq-title"
    id="faq"
    data-js-slider
    data-slider-slides-desktop="3"
    data-slider-slides-tablet="2"
    data-slider-slides-mobile="1"
    data-slider-group-desktop="3"
    data-slider-group-tablet="2"
    data-slider-group-mobile="1"
    data-slider-loop="false">
    <div class="faq-section__inner container">
      <img
        class="faq-section__decoration"
        src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_75_930)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73233%2023.2843%200.0166836%2015%200.0166836C6.71573%200.0166836%200%206.73233%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_75_930)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_75_930)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.6851%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.6851%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M59.9998%2023.4C62.3194%2023.4%2064.1998%2021.5196%2064.1998%2019.2C64.1998%2016.8804%2062.3194%2015%2059.9998%2015C57.6802%2015%2055.7998%2016.8804%2055.7998%2019.2C55.7998%2021.5196%2057.6802%2023.4%2059.9998%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2023.4C70.7193%2023.4%2072.5997%2021.5196%2072.5997%2019.2C72.5997%2016.8804%2070.7193%2015%2068.3997%2015C66.0801%2015%2064.1997%2016.8804%2064.1997%2019.2C64.1997%2021.5196%2066.0801%2023.4%2068.3997%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M59.9998%2015C62.3194%2015%2064.1998%2013.1196%2064.1998%2010.8C64.1998%208.4804%2062.3194%206.6%2059.9998%206.6C57.6802%206.6%2055.7998%208.4804%2055.7998%2010.8C55.7998%2013.1196%2057.6802%2015%2059.9998%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2015C70.7193%2015%2072.5997%2013.1196%2072.5997%2010.8C72.5997%208.4804%2070.7193%206.6%2068.3997%206.6C66.0801%206.6%2064.1997%208.4804%2064.1997%2010.8C64.1997%2013.1196%2066.0801%2015%2068.3997%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_75_930'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_75_930'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_75_930'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
        alt=""
        width="69"
        height="30"
        aria-hidden="true" />

      <div class="faq-section__header section-header">
        <div class="section-header__content">
          <?php
          $APPLICATION->IncludeComponent(
            'bitrix:main.include',
            '',
            [
              'AREA_FILE_SHOW' => 'file',
              'PATH' => '/local/include/pages/property-details/faq-content.php',
              'EDIT_TEMPLATE' => '',
            ]
          );
          ?>
        </div>

        <a
          class="section-header__action button button--dark"
          href="/#faq">
          View All FAQ’s
        </a>
      </div>

      <?php
      echo $estateinDetailsFaqHtml;
      ?>
    </div>
  </section>
<?php endif; ?>

<?php
require $_SERVER['DOCUMENT_ROOT']
    . '/local/include/pages/property-details/map-modal.php';
?>
