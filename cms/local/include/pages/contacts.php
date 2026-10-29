<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
  die();
}

$estateinContacts = require $_SERVER['DOCUMENT_ROOT']
  . '/local/include/site/contacts.php';

$estateinConfig = require $_SERVER['DOCUMENT_ROOT']
  . '/local/config/estatein.php';
?>

<section class="contact-hero" id="contact-hero" aria-labelledby="contact-hero-title">
  <div class="contact-hero__container container">
    <header class="contact-hero__header">
      <?php
      $APPLICATION->IncludeComponent(
        'bitrix:main.include',
        '',
        [
          'AREA_FILE_SHOW' => 'file',
          'PATH' => '/local/include/pages/contacts/hero-content.php',
          'EDIT_TEMPLATE' => '',
        ]
      );
      ?>
    </header>
  </div>

  <?php
  require $_SERVER['DOCUMENT_ROOT']
    . '/local/include/pages/contacts/hero-cards.php';
  ?>
</section>
<section
  class="contacts-form"
  id="contact-form"
  aria-labelledby="contacts-form-title">
  <div class="contacts-form__container container">
    <img
      class="contacts-form__decoration"
      src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_104_13318)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73234%2023.2843%200.0166931%2015%200.0166931C6.71573%200.0166931%200%206.73234%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_104_13318)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_104_13318)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.685%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.685%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M60.0008%2023.4C62.3204%2023.4%2064.2008%2021.5196%2064.2008%2019.2C64.2008%2016.8804%2062.3204%2015%2060.0008%2015C57.6812%2015%2055.8008%2016.8804%2055.8008%2019.2C55.8008%2021.5196%2057.6812%2023.4%2060.0008%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3992%2023.4C70.7188%2023.4%2072.5992%2021.5196%2072.5992%2019.2C72.5992%2016.8804%2070.7188%2015%2068.3992%2015C66.0796%2015%2064.1992%2016.8804%2064.1992%2019.2C64.1992%2021.5196%2066.0796%2023.4%2068.3992%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M60.0008%2015C62.3204%2015%2064.2008%2013.1196%2064.2008%2010.8C64.2008%208.48038%2062.3204%206.59998%2060.0008%206.59998C57.6812%206.59998%2055.8008%208.48038%2055.8008%2010.8C55.8008%2013.1196%2057.6812%2015%2060.0008%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3992%2015C70.7188%2015%2072.5992%2013.1196%2072.5992%2010.8C72.5992%208.48038%2070.7188%206.59998%2068.3992%206.59998C66.0796%206.59998%2064.1992%208.48038%2064.1992%2010.8C64.1992%2013.1196%2066.0796%2015%2068.3992%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_104_13318'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_104_13318'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_104_13318'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
      alt=""
      width="69"
      height="30"
      loading="lazy"
      decoding="async"
      aria-hidden="true" />

    <header class="contacts-form__header">
      <?php
      $APPLICATION->IncludeComponent(
        'bitrix:main.include',
        '',
        [
          'AREA_FILE_SHOW' => 'file',
          'PATH' => '/local/include/pages/contacts/form-content.php',
          'EDIT_TEMPLATE' => '',
        ]
      );
      ?>
    </header>

    <form
      class="contacts-form__body form-grid"
      data-js-form
      action="/local/ajax/estatein-form.php"
      method="post"
      autocomplete="on"
      novalidate>
      <?php $estateinFormType = 'contacts';
      require $_SERVER['DOCUMENT_ROOT'] . '/local/include/estatein/form-meta.php'; ?>

      <div class="form-grid__fields">
        <div class="form-grid__item">
          <label
            class="form-grid__label"
            for="contacts-first-name">
            First Name
          </label>

          <input
            class="form-grid__input"
            id="contacts-first-name"
            name="first_name"
            type="text"
            placeholder="Enter First Name"
            autocomplete="given-name"
            required maxlength="100" />
          <div data-js-form-field-errors></div>
        </div>

        <div class="form-grid__item">
          <label
            class="form-grid__label"
            for="contacts-last-name">
            Last Name
          </label>

          <input
            class="form-grid__input"
            id="contacts-last-name"
            name="last_name"
            type="text"
            placeholder="Enter Last Name"
            autocomplete="family-name"
            required maxlength="100" />
          <div data-js-form-field-errors></div>
        </div>

        <div class="form-grid__item">
          <label
            class="form-grid__label"
            for="contacts-email">
            Email
          </label>

          <input
            class="form-grid__input"
            id="contacts-email"
            name="email"
            type="email"
            placeholder="Enter your Email"
            autocomplete="email"
            inputmode="email"
            required maxlength="254" />
          <div data-js-form-field-errors></div>
        </div>

        <div class="form-grid__item">
          <label
            class="form-grid__label"
            for="contacts-phone">
            Phone
          </label>

          <input
            class="form-grid__input"
            id="contacts-phone"
            name="phone"
            type="tel"
            placeholder="Enter Phone Number"
            autocomplete="tel"
            inputmode="tel"
            required maxlength="25" />
          <div data-js-form-field-errors></div>
        </div>

        <div class="form-grid__item">
          <label
            class="form-grid__label"
            for="contacts-inquiry-type">
            Inquiry Type
          </label>

          <div class="form-grid__select-wrapper">
            <select
              class="form-grid__select js-custom-select"
              id="contacts-inquiry-type"
              name="inquiry_type"
              required
              data-select-theme="form">
              <option value="" selected>
                Select Inquiry Type
              </option>
              <option value="buy">
                Buying a Property
              </option>
              <option value="sell">
                Selling a Property
              </option>
              <option value="manage">
                Property Management
              </option>
              <option value="invest">
                Investments
              </option>
            </select>

            <svg
              class="form-grid__select-arrow"
              width="18"
              height="18"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true">
              <path
                d="m19.5 8.25-7.5 7.5-7.5-7.5"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </div>
          <div data-js-form-field-errors></div>
        </div>

        <div class="form-grid__item">
          <label
            class="form-grid__label"
            for="contacts-source">
            How Did You Hear About Us?
          </label>

          <div class="form-grid__select-wrapper">
            <select
              class="form-grid__select js-custom-select"
              id="contacts-source"
              name="source"
              data-select-theme="form">
              <option value="" selected>
                Select
              </option>
              <option value="google">
                Google Search
              </option>
              <option value="social">
                Social Media
              </option>
              <option value="friend">
                Recommendation
              </option>
              <option value="other">
                Other
              </option>
            </select>

            <svg
              class="form-grid__select-arrow"
              width="18"
              height="18"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true">
              <path
                d="m19.5 8.25-7.5 7.5-7.5-7.5"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </div>
          <div data-js-form-field-errors></div>
        </div>

        <div class="form-grid__item form-grid__item--textarea">
          <label
            class="form-grid__label"
            for="contacts-message">
            Message
          </label>

          <textarea
            class="form-grid__textarea"
            id="contacts-message"
            name="message"
            placeholder="Enter your Message here..."
            rows="6"
            maxlength="5000"></textarea>
          <div data-js-form-field-errors></div>
        </div>
      </div>

      <div class="form-grid__footer">
        <div class="form-grid__checkbox-wrapper">
          <input
            class="form-grid__checkbox visually-hidden"
            type="checkbox"
            id="contacts-privacy-policy"
            name="privacy_agreement"
            required />

          <label
            class="form-grid__checkbox-label"
            for="contacts-privacy-policy">
            I agree with
            <span class="form-grid__footer-link">
              Terms of Use
            </span>
            and
            <span class="form-grid__footer-link">
              Privacy Policy
            </span>
          </label>
          <div data-js-form-field-errors></div>
        </div>

        <button
          class="form-grid__submit-btn"
          type="submit">
          Send Your Message
        </button>
      </div>

      <p class="form-error form-submission-error" data-js-form-submit-error role="alert" tabindex="-1" hidden></p>
    </form>
  </div>
</section>
<section
  class="contacts-offices"
  id="offices"
  aria-labelledby="contacts-offices-title"
  data-js-office-tabs>
  <div class="contacts-offices__container container">
    <img
      class="contacts-offices__decoration"
      src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_104_13318)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73234%2023.2843%200.0166931%2015%200.0166931C6.71573%200.0166931%200%206.73234%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_104_13318)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_104_13318)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.685%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.685%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M60.0008%2023.4C62.3204%2023.4%2064.2008%2021.5196%2064.2008%2019.2C64.2008%2016.8804%2062.3204%2015%2060.0008%2015C57.6812%2015%2055.8008%2016.8804%2055.8008%2019.2C55.8008%2021.5196%2057.6812%2023.4%2060.0008%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3992%2023.4C70.7188%2023.4%2072.5992%2021.5196%2072.5992%2019.2C72.5992%2016.8804%2070.7188%2015%2068.3992%2015C66.0796%2015%2064.1992%2016.8804%2064.1992%2019.2C64.1992%2021.5196%2066.0796%2023.4%2068.3992%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M60.0008%2015C62.3204%2015%2064.2008%2013.1196%2064.2008%2010.8C64.2008%208.48038%2062.3204%206.59998%2060.0008%206.59998C57.6812%206.59998%2055.8008%208.48038%2055.8008%2010.8C55.8008%2013.1196%2057.6812%2015%2060.0008%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3992%2015C70.7188%2015%2072.5992%2013.1196%2072.5992%2010.8C72.5992%208.48038%2070.7188%206.59998%2068.3992%206.59998C66.0796%206.59998%2064.1992%208.48038%2064.1992%2010.8C64.1992%2013.1196%2066.0796%2015%2068.3992%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_104_13318'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_104_13318'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_104_13318'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e"
      alt=""
      width="69"
      height="30"
      loading="lazy"
      decoding="async"
      aria-hidden="true" />

    <header class="contacts-offices__header">
      <?php
      $APPLICATION->IncludeComponent(
        'bitrix:main.include',
        '',
        [
          'AREA_FILE_SHOW' => 'file',
          'PATH' => '/local/include/pages/contacts/offices-content.php',
          'EDIT_TEMPLATE' => '',
        ]
      );
      ?>
    </header>

    <div class="contacts-offices__tabs tabs-offices">
      <ul
        class="tabs-offices__list"
        role="tablist"
        aria-label="Estatein office categories">
        <li class="tabs-offices__item" role="presentation">
          <button
            class="tabs-offices__btn is-active"
            type="button"
            role="tab"
            id="office-tab-all"
            aria-selected="true"
            aria-controls="offices-panel"
            tabindex="0"
            data-office-filter="all">
            All
          </button>
        </li>

        <li class="tabs-offices__item" role="presentation">
          <button
            class="tabs-offices__btn"
            type="button"
            role="tab"
            id="office-tab-regional"
            aria-selected="false"
            aria-controls="offices-panel"
            tabindex="-1"
            data-office-filter="regional">
            Regional
          </button>
        </li>

        <li class="tabs-offices__item" role="presentation">
          <button
            class="tabs-offices__btn"
            type="button"
            role="tab"
            id="office-tab-international"
            aria-selected="false"
            aria-controls="offices-panel"
            tabindex="-1"
            data-office-filter="international">
            International
          </button>
        </li>
      </ul>
    </div>

    <div
      class="contacts-offices__panels"
      id="offices-panel"
      role="tabpanel"
      aria-labelledby="office-tab-all"
      tabindex="0">
      <?php
      $contactsOfficesIblockId = (int)(
        $estateinConfig['contacts_offices_iblock_id'] ?? 0
      );

      if ($contactsOfficesIblockId > 0) {
        $APPLICATION->IncludeComponent(
          'bitrix:news.list',
          'contacts-offices',
          [
            'IBLOCK_ID' => $contactsOfficesIblockId,
            'NEWS_COUNT' => '1000',

            'SORT_BY1' => 'SORT',
            'SORT_ORDER1' => 'ASC',
            'SORT_BY2' => 'ID',
            'SORT_ORDER2' => 'ASC',

            'FILTER_NAME' => '',
            'FIELD_CODE' => [
              'ID',
              'IBLOCK_ID',
              'NAME',
              'PREVIEW_TEXT',
              'PREVIEW_TEXT_TYPE',
            ],
            'PROPERTY_CODE' => [
              'ADDRESS',
              'CITY',
              'CATEGORY',
            ],

            'CHECK_DATES' => 'Y',
            'CHECK_PERMISSIONS' => 'Y',

            'PARENT_SECTION' => '',
            'PARENT_SECTION_CODE' => '',
            'INCLUDE_SUBSECTIONS' => 'N',

            'DETAIL_URL' => '',
            'HIDE_LINK_WHEN_NO_DETAIL' => 'Y',

            'DISPLAY_DATE' => 'N',
            'DISPLAY_NAME' => 'Y',
            'DISPLAY_PICTURE' => 'N',
            'DISPLAY_PREVIEW_TEXT' => 'Y',
            'PREVIEW_TRUNCATE_LEN' => '',

            'SET_TITLE' => 'N',
            'SET_BROWSER_TITLE' => 'N',
            'SET_META_KEYWORDS' => 'N',
            'SET_META_DESCRIPTION' => 'N',
            'SET_LAST_MODIFIED' => 'N',

            'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
            'ADD_SECTIONS_CHAIN' => 'N',

            'DISPLAY_TOP_PAGER' => 'N',
            'DISPLAY_BOTTOM_PAGER' => 'N',

            'CACHE_TYPE' => 'A',
            'CACHE_TIME' => '36000000',
            'CACHE_FILTER' => 'N',
            'CACHE_GROUPS' => 'Y',

            'AJAX_MODE' => 'N',

            'CONTACT_EMAIL' => (string)(
              $estateinContacts['email'] ?? ''
            ),
            'CONTACT_PHONE_DISPLAY' => (string)(
              $estateinContacts['phone_display'] ?? ''
            ),
            'CONTACT_PHONE_HREF' => (string)(
              $estateinContacts['phone_href'] ?? ''
            ),
          ],
          false
        );
      }
      ?>
    </div>
  </div>
</section>
<section
  class="contacts-gallery"
  id="contacts-gallery"
  aria-labelledby="contacts-gallery-title">

  <div class="contacts-gallery__container container">
    <div class="contacts-gallery__box">

      <div class="contacts-gallery-grid">
        <?php
        $APPLICATION->IncludeComponent(
          'bitrix:main.include',
          '',
          [
            'AREA_FILE_SHOW' => 'file',
            'PATH' => '/local/include/pages/contacts/gallery-grid.php',
            'EDIT_TEMPLATE' => '',
          ]
        );
        ?>
      </div>

      <div class="contacts-gallery-info">
        <div class="contacts-gallery-info__row">

          <div class="contacts-gallery-info__content">
            <?php
            $APPLICATION->IncludeComponent(
              'bitrix:main.include',
              '',
              [
                'AREA_FILE_SHOW' => 'file',
                'PATH' => '/local/include/pages/contacts/gallery-content.php',
                'EDIT_TEMPLATE' => '',
              ]
            );
            ?>
          </div>

          <div class="contacts-gallery-info__handshake">
            <?php
            $APPLICATION->IncludeComponent(
              'bitrix:main.include',
              '',
              [
                'AREA_FILE_SHOW' => 'file',
                'PATH' => '/local/include/pages/contacts/gallery-handshake.php',
                'EDIT_TEMPLATE' => '',
              ]
            );
            ?>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
