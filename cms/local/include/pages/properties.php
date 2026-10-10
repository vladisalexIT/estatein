<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
<section class="properties-hero" aria-labelledby="properties-hero-title">
    <div class="properties-hero__intro">
        <div class="properties-hero__container container">
            <?php
            $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '',
                [
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => '/local/include/pages/properties/hero-content.php',
                    'EDIT_TEMPLATE' => '',
                ]
            );
            ?>
        </div>
    </div>

    <div class="properties-search container">
        <form class="properties-search__form" data-js-form data-form-kind="search" action="/properties/"
            method="get" role="search" novalidate>
            <div class="properties-search__primary">
                <label class="properties-search__input-wrapper" for="properties-search-query">
                    <span class="visually-hidden">
                        Search for a property
                    </span>

                    <input class="properties-search__input" id="properties-search-query" name="query" type="search"
                        placeholder="Search For A Property" autocomplete="off" maxlength="100" />
                </label>

                <button class="properties-search__submit button button--accent" type="submit">
                    <img src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M21%2021L15.8033%2015.8033M15.8033%2015.8033C17.1605%2014.4461%2018%2012.5711%2018%2010.5C18%206.35786%2014.6421%203%2010.5%203C6.35786%203%203%206.35786%203%2010.5C3%2014.6421%206.35786%2018%2010.5%2018C12.5711%2018%2014.4461%2017.1605%2015.8033%2015.8033Z'%20stroke='white'%20stroke-width='1.5'%20stroke-linecap='round'%20stroke-linejoin='round'/%3e%3c/svg%3e" alt="" width="24" height="24"
                        aria-hidden="true" />
                    <span>Find Property</span>
                </button>
            </div>

            <p class="properties-search__error" data-js-form-field-errors data-search-errors></p>

            <div class="properties-search__filters">
                <div class="properties-search__field">
                    <img class="properties-search__field-icon" src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M11.5397%2022.351C11.57%2022.3685%2011.5937%2022.3821%2011.6105%2022.3915L11.6384%2022.4071C11.8613%2022.5294%2012.1378%2022.5285%2012.3608%2022.4075L12.3895%2022.3915C12.4063%2022.3821%2012.43%2022.3685%2012.4603%2022.351C12.5207%2022.316%2012.607%2022.265%2012.7155%2022.1982C12.9325%2022.0646%2013.2388%2021.8676%2013.6046%2021.6091C14.3351%2021.0931%2015.3097%2020.3274%2016.2865%2019.3273C18.2307%2017.3368%2020.25%2014.3462%2020.25%2010.5C20.25%205.94365%2016.5563%202.25%2012%202.25C7.44365%202.25%203.75%205.94365%203.75%2010.5C3.75%2014.3462%205.76932%2017.3368%207.71346%2019.3273C8.69025%2020.3274%209.66491%2021.0931%2010.3954%2021.6091C10.7612%2021.8676%2011.0675%2022.0646%2011.2845%2022.1982C11.393%2022.265%2011.4793%2022.316%2011.5397%2022.351ZM12%2013.5C13.6569%2013.5%2015%2012.1569%2015%2010.5C15%208.84315%2013.6569%207.5%2012%207.5C10.3431%207.5%209%208.84315%209%2010.5C9%2012.1569%2010.3431%2013.5%2012%2013.5Z'%20fill='%23999999'/%3e%3c/svg%3e" alt=""
                        width="24" height="24" aria-hidden="true" />

                    <span class="properties-search__field-value" aria-hidden="true">
                        Location
                    </span>

                    <select class="properties-search__select js-custom-select" id="property-location" name="location"
                        aria-label="Location">
                        <option value="">Location</option>
                        <option value="new-york">New York</option>
                        <option value="california">California</option>
                        <option value="florida">Florida</option>
                    </select>
                </div>

                <div class="properties-search__field">
                    <img class="properties-search__field-icon" src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M19.0065%203.70487C19.3958%203.56331%2019.5966%203.13299%2019.455%202.74371C19.3135%202.35444%2018.8832%202.15362%2018.4939%202.29518L6.00037%206.83828V3.00002C6.00037%202.58581%205.66458%202.25002%205.25037%202.25002H3.75037C3.33615%202.25002%203.00037%202.58581%203.00037%203.00002V7.92919L1.9939%208.29518C1.60462%208.43673%201.4038%208.86705%201.54536%209.25633C1.68691%209.6456%202.11724%209.84642%202.50651%209.70487L19.0065%203.70487Z'%20fill='%23999999'/%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M3.01932%2011.1145L18.0004%205.6669V9.0884L22.0065%2010.5452C22.3958%2010.6867%2022.5966%2011.1171%2022.455%2011.5063C22.3135%2011.8956%2021.8832%2012.0964%2021.4939%2011.9549L21.0002%2011.7753V20.25H21.7504C22.1646%2020.25%2022.5004%2020.5858%2022.5004%2021C22.5004%2021.4142%2022.1646%2021.75%2021.7504%2021.75H2.25037C1.83615%2021.75%201.50037%2021.4142%201.50037%2021C1.50037%2020.5858%201.83615%2020.25%202.25037%2020.25H3.00037V11.1213L3.01932%2011.1145ZM18.0004%2020.25V10.6845L19.5002%2011.2299V20.25H18.0004ZM9.00037%2014.25C8.58615%2014.25%208.25037%2014.5858%208.25037%2015V19.5C8.25037%2019.9142%208.58615%2020.25%209.00037%2020.25H12.0004C12.4146%2020.25%2012.7504%2019.9142%2012.7504%2019.5V15C12.7504%2014.5858%2012.4146%2014.25%2012.0004%2014.25H9.00037Z'%20fill='%23999999'/%3e%3c/svg%3e" alt=""
                        width="24" height="24" aria-hidden="true" />

                    <span class="properties-search__field-value" aria-hidden="true">
                        Property Type
                    </span>

                    <select class="properties-search__select js-custom-select" id="property-type" name="type"
                        aria-label="Property type">
                        <option value="">Property Type</option>
                        <option value="house">House</option>
                        <option value="apartment">Apartment</option>
                        <option value="villa">Villa</option>
                    </select>
                </div>

                <div class="properties-search__field">
                    <img class="properties-search__field-icon" src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M12%207.5C10.7574%207.5%209.75%208.50736%209.75%209.75C9.75%2010.9926%2010.7574%2012%2012%2012C13.2426%2012%2014.25%2010.9926%2014.25%209.75C14.25%208.50736%2013.2426%207.5%2012%207.5Z'%20fill='%23999999'/%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M1.5%204.875C1.5%203.83947%202.33947%203%203.375%203H20.625C21.6605%203%2022.5%203.83947%2022.5%204.875V14.625C22.5%2015.6605%2021.6605%2016.5%2020.625%2016.5H3.375C2.33947%2016.5%201.5%2015.6605%201.5%2014.625V4.875ZM8.25%209.75C8.25%207.67893%209.92893%206%2012%206C14.0711%206%2015.75%207.67893%2015.75%209.75C15.75%2011.8211%2014.0711%2013.5%2012%2013.5C9.92893%2013.5%208.25%2011.8211%208.25%209.75ZM18.75%209C18.3358%209%2018%209.33579%2018%209.75V9.7575C18%2010.1717%2018.3358%2010.5075%2018.75%2010.5075H18.7575C19.1717%2010.5075%2019.5075%2010.1717%2019.5075%209.7575V9.75C19.5075%209.33579%2019.1717%209%2018.7575%209H18.75ZM4.5%209.75C4.5%209.33579%204.83579%209%205.25%209H5.2575C5.67171%209%206.0075%209.33579%206.0075%209.75V9.7575C6.0075%2010.1717%205.67171%2010.5075%205.2575%2010.5075H5.25C4.83579%2010.5075%204.5%2010.1717%204.5%209.7575V9.75Z'%20fill='%23999999'/%3e%3cpath%20d='M2.25%2018C1.83579%2018%201.5%2018.3358%201.5%2018.75C1.5%2019.1642%201.83579%2019.5%202.25%2019.5C7.65005%2019.5%2012.8802%2020.2222%2017.8498%2021.5749C19.0404%2021.899%2020.25%2021.0168%2020.25%2019.7551V18.75C20.25%2018.3358%2019.9142%2018%2019.5%2018H2.25Z'%20fill='%23999999'/%3e%3c/svg%3e" alt=""
                        width="24" height="24" aria-hidden="true" />

                    <span class="properties-search__field-value" aria-hidden="true">
                        Pricing Range
                    </span>

                    <select class="properties-search__select js-custom-select" id="property-price" name="price"
                        aria-label="Price range">
                        <option value="">Pricing Range</option>
                        <option value="0-250000">Up to $250,000</option>
                        <option value="250000-500000">
                            $250,000–$500,000
                        </option>
                        <option value="500000-plus">
                            $500,000 and above
                        </option>
                    </select>
                </div>

                <div class="properties-search__field">
                    <img class="properties-search__field-icon" src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M12.3779%201.60217C12.1444%201.46594%2011.8556%201.46594%2011.6221%201.60217L3%206.63172L12%2011.8817L21%206.63172L12.3779%201.60217Z'%20fill='%23999999'/%3e%3cpath%20d='M21.75%207.93078L12.75%2013.1808V22.1808L21.3779%2017.1478C21.6083%2017.0134%2021.75%2016.7668%2021.75%2016.5V7.93078Z'%20fill='%23999999'/%3e%3cpath%20d='M11.25%2022.1808V13.1808L2.25%207.93078V16.5C2.25%2016.7668%202.39168%2017.0134%202.6221%2017.1478L11.25%2022.1808Z'%20fill='%23999999'/%3e%3c/svg%3e" alt=""
                        width="24" height="24" aria-hidden="true" />

                    <span class="properties-search__field-value" aria-hidden="true">
                        Property Size
                    </span>

                    <select class="properties-search__select js-custom-select" id="property-size" name="size"
                        aria-label="Property size">
                        <option value="">Property Size</option>
                        <option value="small">Up to 1,000 sq ft</option>
                        <option value="medium">1,000–2,500 sq ft</option>
                        <option value="large">2,500 sq ft and above</option>
                    </select>
                </div>

                <div class="properties-search__field">
                    <img class="properties-search__field-icon" src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M6.75%202.25C7.16421%202.25%207.5%202.58579%207.5%203V4.5H16.5V3C16.5%202.58579%2016.8358%202.25%2017.25%202.25C17.6642%202.25%2018%202.58579%2018%203V4.5H18.75C20.4069%204.5%2021.75%205.84315%2021.75%207.5V18.75C21.75%2020.4069%2020.4069%2021.75%2018.75%2021.75H5.25C3.59315%2021.75%202.25%2020.4069%202.25%2018.75V7.5C2.25%205.84315%203.59315%204.5%205.25%204.5H6V3C6%202.58579%206.33579%202.25%206.75%202.25ZM20.25%2011.25C20.25%2010.4216%2019.5784%209.75%2018.75%209.75H5.25C4.42157%209.75%203.75%2010.4216%203.75%2011.25V18.75C3.75%2019.5784%204.42157%2020.25%205.25%2020.25H18.75C19.5784%2020.25%2020.25%2019.5784%2020.25%2018.75V11.25Z'%20fill='%23999999'/%3e%3c/svg%3e" alt=""
                        width="24" height="24" aria-hidden="true" />

                    <span class="properties-search__field-value" aria-hidden="true">
                        Build Year
                    </span>

                    <select class="properties-search__select js-custom-select" id="property-build-year"
                        name="build-year" aria-label="Build year">
                        <option value="">Build Year</option>
                        <option value="2020-plus">2020 and newer</option>
                        <option value="2010-2019">2010–2019</option>
                        <option value="before-2010">Before 2010</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="properties-listings" id="property-listings" aria-labelledby="properties-listings-title" data-js-slider
    data-slider-slides-desktop="3" data-slider-slides-tablet="2" data-slider-slides-mobile="1"
    data-slider-group-desktop="1" data-slider-group-tablet="1" data-slider-group-mobile="1"
    data-slider-space-desktop="30" data-slider-space-tablet="20" data-slider-space-mobile="16" data-slider-loop="false">
    <div class="properties-listings__container container">
        <img class="properties-listings__decoration" src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_75_930)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73233%2023.2843%200.0166836%2015%200.0166836C6.71573%200.0166836%200%206.73233%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_75_930)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_75_930)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.6851%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.6851%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M59.9998%2023.4C62.3194%2023.4%2064.1998%2021.5196%2064.1998%2019.2C64.1998%2016.8804%2062.3194%2015%2059.9998%2015C57.6802%2015%2055.7998%2016.8804%2055.7998%2019.2C55.7998%2021.5196%2057.6802%2023.4%2059.9998%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2023.4C70.7193%2023.4%2072.5997%2021.5196%2072.5997%2019.2C72.5997%2016.8804%2070.7193%2015%2068.3997%2015C66.0801%2015%2064.1997%2016.8804%2064.1997%2019.2C64.1997%2021.5196%2066.0801%2023.4%2068.3997%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M59.9998%2015C62.3194%2015%2064.1998%2013.1196%2064.1998%2010.8C64.1998%208.4804%2062.3194%206.6%2059.9998%206.6C57.6802%206.6%2055.7998%208.4804%2055.7998%2010.8C55.7998%2013.1196%2057.6802%2015%2059.9998%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2015C70.7193%2015%2072.5997%2013.1196%2072.5997%2010.8C72.5997%208.4804%2070.7193%206.6%2068.3997%206.6C66.0801%206.6%2064.1997%208.4804%2064.1997%2010.8C64.1997%2013.1196%2066.0801%2015%2068.3997%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_75_930'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_75_930'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_75_930'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e" alt="" width="69"
            height="30" aria-hidden="true" />

        <header class="properties-listings__header">
            <?php
            $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '',
                [
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => '/local/include/pages/properties/listings-content.php',
                    'EDIT_TEMPLATE' => '',
                ]
            );
            ?>
        </header>

        <div class="properties-listings__slider slider swiper" data-js-slider-swiper aria-label="Available properties">
            <ul class="swiper-wrapper" role="list">
                <li class="slider__slide swiper-slide">
                    <article class="property-card">
                        <img class="property-card__image"
                            src="/local/templates/estatein/assets/seaside-serenity-villa-j9R8ufbp.webp"
                            alt="Seaside Serenity Villa with a swimming pool" width="512" height="318" loading="lazy"
                            decoding="async" />

                        <div class="property-card__body">
                            <p class="property-card__eyebrow">
                                Coastal Escapes — Where Waves Beckon
                            </p>

                            <h3 class="property-card__title">
                                Seaside Serenity Villa
                            </h3>

                            <p class="property-card__description">
                                A stunning 4-bedroom, 3-bathroom villa in a
                                peaceful suburban neighborhood...
                                <a class="property-card__description-link" href="/property-details/">
                                    Read More
                                </a>
                            </p>

                            <div class="property-card__footer">
                                <p class="property-card__price">
                                    <span class="property-card__price-label">
                                        Price
                                    </span>
                                    <strong class="property-card__price-value">
                                        $550,000
                                    </strong>
                                </p>

                                <a class="property-card__button button button--accent" href="/property-details/"
                                    aria-label="View details for Seaside Serenity Villa">
                                    View Property Details
                                </a>
                            </div>
                        </div>
                    </article>
                </li>

                <li class="slider__slide swiper-slide">
                    <article class="property-card">
                        <img class="property-card__image"
                            src="/local/templates/estatein/assets/metropolitan-haven-vj8lBgFz.webp"
                            alt="Modern Metropolitan Haven apartment interior" width="512" height="318" loading="lazy"
                            decoding="async" />

                        <div class="property-card__body">
                            <p class="property-card__eyebrow">
                                Urban Oasis — Life in the Heart of the City
                            </p>

                            <h3 class="property-card__title">
                                Metropolitan Haven
                            </h3>

                            <p class="property-card__description">
                                A chic and fully-furnished 2-bedroom apartment
                                with panoramic city views...
                                <a class="property-card__description-link" href="/property-details/">
                                    Read More
                                </a>
                            </p>

                            <div class="property-card__footer">
                                <p class="property-card__price">
                                    <span class="property-card__price-label">
                                        Price
                                    </span>
                                    <strong class="property-card__price-value">
                                        $550,000
                                    </strong>
                                </p>

                                <a class="property-card__button button button--accent" href="/property-details/"
                                    aria-label="View details for Metropolitan Haven">
                                    View Property Details
                                </a>
                            </div>
                        </div>
                    </article>
                </li>

                <li class="slider__slide swiper-slide">
                    <article class="property-card">
                        <img class="property-card__image"
                            src="/local/templates/estatein/assets/rustic-retreat-cottage-CT2jpoR6.webp"
                            alt="Rustic Retreat Cottage exterior" width="512" height="318" loading="lazy"
                            decoding="async" />

                        <div class="property-card__body">
                            <p class="property-card__eyebrow">
                                Countryside Charm — Escape to Nature's Embrace
                            </p>

                            <h3 class="property-card__title">
                                Rustic Retreat Cottage
                            </h3>

                            <p class="property-card__description">
                                An elegant 3-bedroom cottage located in a quiet
                                and welcoming community...
                                <a class="property-card__description-link" href="/property-details/">
                                    Read More
                                </a>
                            </p>

                            <div class="property-card__footer">
                                <p class="property-card__price">
                                    <span class="property-card__price-label">
                                        Price
                                    </span>
                                    <strong class="property-card__price-value">
                                        $550,000
                                    </strong>
                                </p>

                                <a class="property-card__button button button--accent" href="/property-details/"
                                    aria-label="View details for Rustic Retreat Cottage">
                                    View Property Details
                                </a>
                            </div>
                        </div>
                    </article>
                </li>

                <li class="slider__slide swiper-slide">
                    <article class="property-card">
                        <img class="property-card__image"
                            src="/local/templates/estatein/assets/seaside-serenity-villa-j9R8ufbp.webp"
                            alt="Modern villa with outdoor recreation area" width="512" height="318" loading="lazy"
                            decoding="async" />

                        <div class="property-card__body">
                            <p class="property-card__eyebrow">
                                Coastal Living — Designed for Relaxation
                            </p>

                            <h3 class="property-card__title">
                                Coastal Elegance
                            </h3>

                            <p class="property-card__description">
                                A sophisticated coastal residence designed for
                                comfort, privacy and relaxed living...
                                <a class="property-card__description-link" href="/property-details/">
                                    Read More
                                </a>
                            </p>

                            <div class="property-card__footer">
                                <p class="property-card__price">
                                    <span class="property-card__price-label">
                                        Price
                                    </span>
                                    <strong class="property-card__price-value">
                                        $620,000
                                    </strong>
                                </p>

                                <a class="property-card__button button button--accent" href="/property-details/"
                                    aria-label="View details for Coastal Elegance">
                                    View Property Details
                                </a>
                            </div>
                        </div>
                    </article>
                </li>

                <li class="slider__slide swiper-slide">
                    <article class="property-card">
                        <img class="property-card__image"
                            src="/local/templates/estatein/assets/metropolitan-haven-vj8lBgFz.webp"
                            alt="Contemporary city apartment" width="512" height="318" loading="lazy"
                            decoding="async" />

                        <div class="property-card__body">
                            <p class="property-card__eyebrow">
                                City Living — Everything Within Reach
                            </p>

                            <h3 class="property-card__title">
                                Urban Vista Apartment
                            </h3>

                            <p class="property-card__description">
                                A contemporary city apartment with elegant
                                finishes and convenient access to local amenities...
                                <a class="property-card__description-link" href="/property-details/">
                                    Read More
                                </a>
                            </p>

                            <div class="property-card__footer">
                                <p class="property-card__price">
                                    <span class="property-card__price-label">
                                        Price
                                    </span>
                                    <strong class="property-card__price-value">
                                        $480,000
                                    </strong>
                                </p>

                                <a class="property-card__button button button--accent" href="/property-details/"
                                    aria-label="View details for Urban Vista Apartment">
                                    View Property Details
                                </a>
                            </div>
                        </div>
                    </article>
                </li>

                <li class="slider__slide swiper-slide">
                    <article class="property-card">
                        <img class="property-card__image"
                            src="/local/templates/estatein/assets/rustic-retreat-cottage-CT2jpoR6.webp"
                            alt="Comfortable countryside cottage" width="512" height="318" loading="lazy"
                            decoding="async" />

                        <div class="property-card__body">
                            <p class="property-card__eyebrow">
                                Rural Retreat — Surrounded by Nature
                            </p>

                            <h3 class="property-card__title">
                                Countryside Haven
                            </h3>

                            <p class="property-card__description">
                                A comfortable countryside home surrounded by
                                greenery and designed for peaceful family living...
                                <a class="property-card__description-link" href="/property-details/">
                                    Read More
                                </a>
                            </p>

                            <div class="property-card__footer">
                                <p class="property-card__price">
                                    <span class="property-card__price-label">
                                        Price
                                    </span>
                                    <strong class="property-card__price-value">
                                        $395,000
                                    </strong>
                                </p>

                                <a class="property-card__button button button--accent" href="/property-details/"
                                    aria-label="View details for Countryside Haven">
                                    View Property Details
                                </a>
                            </div>
                        </div>
                    </article>
                </li>
            </ul>
        </div>

        <footer class="properties-listings__footer slider__footer">
            <p class="slider__counter" aria-live="polite" aria-atomic="true">
                <span class="slider__counter-current" data-js-slider-current>
                    01
                </span>
                <span aria-hidden="true"> of </span>
                <span class="visually-hidden">of</span>
                <span data-js-slider-total>01</span>
            </p>

            <div class="slider__navigation" aria-label="Property slider controls">
                <button class="slider__button slider__button--previous" type="button" data-js-slider-prev>
                    <span class="visually-hidden">
                        Previous property
                    </span>
                </button>

                <button class="slider__button slider__button--next" type="button" data-js-slider-next>
                    <span class="visually-hidden">
                        Next property
                    </span>
                </button>
            </div>
        </footer>
    </div>
</section>
<section class="property-inquiry" id="inquiry" aria-labelledby="property-inquiry-title">
    <div class="property-inquiry__container container">
        <img class="property-inquiry__decoration" src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_75_930)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73233%2023.2843%200.0166836%2015%200.0166836C6.71573%200.0166836%200%206.73233%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_75_930)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_75_930)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.6851%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.6851%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M59.9998%2023.4C62.3194%2023.4%2064.1998%2021.5196%2064.1998%2019.2C64.1998%2016.8804%2062.3194%2015%2059.9998%2015C57.6802%2015%2055.7998%2016.8804%2055.7998%2019.2C55.7998%2021.5196%2057.6802%2023.4%2059.9998%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2023.4C70.7193%2023.4%2072.5997%2021.5196%2072.5997%2019.2C72.5997%2016.8804%2070.7193%2015%2068.3997%2015C66.0801%2015%2064.1997%2016.8804%2064.1997%2019.2C64.1997%2021.5196%2066.0801%2023.4%2068.3997%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M59.9998%2015C62.3194%2015%2064.1998%2013.1196%2064.1998%2010.8C64.1998%208.4804%2062.3194%206.6%2059.9998%206.6C57.6802%206.6%2055.7998%208.4804%2055.7998%2010.8C55.7998%2013.1196%2057.6802%2015%2059.9998%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2015C70.7193%2015%2072.5997%2013.1196%2072.5997%2010.8C72.5997%208.4804%2070.7193%206.6%2068.3997%206.6C66.0801%206.6%2064.1997%208.4804%2064.1997%2010.8C64.1997%2013.1196%2066.0801%2015%2068.3997%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_75_930'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_75_930'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_75_930'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e" alt="" width="69"
            height="30" aria-hidden="true" />

        <header class="property-inquiry__header">
            <?php
            $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '',
                [
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => '/local/include/pages/properties/inquiry-content.php',
                    'EDIT_TEMPLATE' => '',
                ]
            );
            ?>
        </header>

        <form class="property-inquiry__form" data-js-form action="" method="post" novalidate>
            <div class="property-inquiry__grid">
                <div class="form-field">
                    <label class="form-field__label" for="inquiry-first-name">
                        First Name
                    </label>

                    <input class="form-field__control" id="inquiry-first-name" name="first-name" type="text"
                        placeholder="Enter First Name" autocomplete="given-name" required />
                    <div data-js-form-field-errors></div>
                </div>

                <div class="form-field">
                    <label class="form-field__label" for="inquiry-last-name">
                        Last Name
                    </label>

                    <input class="form-field__control" id="inquiry-last-name" name="last-name" type="text"
                        placeholder="Enter Last Name" autocomplete="family-name" required />
                    <div data-js-form-field-errors></div>
                </div>

                <div class="form-field">
                    <label class="form-field__label" for="inquiry-email">
                        Email
                    </label>

                    <input class="form-field__control" id="inquiry-email" name="email" type="email" placeholder="Enter your Email"
                        autocomplete="email" inputmode="email" required />
                    <div data-js-form-field-errors></div>
                </div>

                <div class="form-field">
                    <label class="form-field__label" for="inquiry-phone">
                        Phone
                    </label>

                    <input class="form-field__control" id="inquiry-phone" name="phone" type="tel" placeholder="Enter Phone Number"
                        autocomplete="tel" inputmode="tel" required />
                    <div data-js-form-field-errors></div>
                </div>

                <div class="form-field">
                    <label class="form-field__label" for="inquiry-location">
                        Preferred Location
                    </label>

                    <select class="form-field__control form-field__control--select js-custom-select" id="inquiry-location"
                        name="location" data-select-theme="form">
                        <option value="">Select Location</option>
                        <option value="new-york">New York</option>
                        <option value="california">California</option>
                        <option value="florida">Florida</option>
                    </select>
                    <div data-js-form-field-errors></div>
                </div>

                <div class="form-field">
                    <label class="form-field__label" for="inquiry-type">
                        Property Type
                    </label>

                    <select class="form-field__control form-field__control--select js-custom-select" id="inquiry-type"
                        name="property-type" data-select-theme="form" required>
                        <option value="">Select Property Type</option>
                        <option value="house">House</option>
                        <option value="apartment">Apartment</option>
                        <option value="villa">Villa</option>
                    </select>
                    <div data-js-form-field-errors></div>
                </div>

                <div class="form-field">
                    <label class="form-field__label" for="inquiry-bathrooms">
                        No. of Bathrooms
                    </label>

                    <select class="form-field__control form-field__control--select js-custom-select" id="inquiry-bathrooms"
                        name="bathrooms" data-select-theme="form">
                        <option value="">Select no. of Bathrooms</option>
                        <option value="1">1 Bathroom</option>
                        <option value="2">2 Bathrooms</option>
                        <option value="3">3 Bathrooms</option>
                        <option value="4-plus">4 or more</option>
                    </select>
                    <div data-js-form-field-errors></div>
                </div>

                <div class="form-field">
                    <label class="form-field__label" for="inquiry-bedrooms">
                        No. of Bedrooms
                    </label>

                    <select class="form-field__control form-field__control--select js-custom-select" id="inquiry-bedrooms"
                        name="bedrooms" data-select-theme="form">
                        <option value="">Select no. of Bedrooms</option>
                        <option value="1">1 Bedroom</option>
                        <option value="2">2 Bedrooms</option>
                        <option value="3">3 Bedrooms</option>
                        <option value="4-plus">4 or more</option>
                    </select>
                    <div data-js-form-field-errors></div>
                </div>

                <div class="form-field form-field--budget">
                    <label class="form-field__label" for="inquiry-budget">
                        Budget
                    </label>

                    <select class="form-field__control form-field__control--select js-custom-select" id="inquiry-budget"
                        name="budget" data-select-theme="form" required>
                        <option value="">Select Budget</option>
                        <option value="0-250000">Up to $250,000</option>
                        <option value="250000-500000">$250,000–$500,000</option>
                        <option value="500000-plus">$500,000 and above</option>
                    </select>
                    <div data-js-form-field-errors></div>
                </div>

                <fieldset class="contact-method">
                    <legend class="contact-method__legend">
                        Preferred Contact Method
                    </legend>

                    <div class="contact-method__options">
                        <label class="contact-method__option">
                            <img class="contact-method__icon" src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M1.5%204.5C1.5%202.84315%202.84315%201.5%204.5%201.5H5.87163C6.732%201.5%207.48197%202.08556%207.69064%202.92025L8.79644%207.34343C8.97941%208.0753%208.70594%208.84555%208.10242%209.29818L6.8088%2010.2684C6.67447%2010.3691%206.64527%2010.5167%206.683%2010.6197C7.81851%2013.7195%2010.2805%2016.1815%2013.3803%2017.317C13.4833%2017.3547%2013.6309%2017.3255%2013.7316%2017.1912L14.7018%2015.8976C15.1545%2015.2941%2015.9247%2015.0206%2016.6566%2015.2036L21.0798%2016.3094C21.9144%2016.518%2022.5%2017.268%2022.5%2018.1284V19.5C22.5%2021.1569%2021.1569%2022.5%2019.5%2022.5H17.25C8.55151%2022.5%201.5%2015.4485%201.5%206.75V4.5Z'%20fill='white'/%3e%3c/svg%3e" alt="" width="24" height="24"
                                aria-hidden="true" />

                            <span class="contact-method__text">
                                Enter Your Number
                            </span>

                            <input class="contact-method__radio" type="radio" name="contact-method" value="phone"
                                aria-label="Contact me by phone" checked />
                        </label>

                        <label class="contact-method__option">
                            <img class="contact-method__icon" src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M1.5%208.6691V17.25C1.5%2018.9069%202.84315%2020.25%204.5%2020.25H19.5C21.1569%2020.25%2022.5%2018.9069%2022.5%2017.25V8.6691L13.5723%2014.1631C12.6081%2014.7564%2011.3919%2014.7564%2010.4277%2014.1631L1.5%208.6691Z'%20fill='white'/%3e%3cpath%20d='M22.5%206.90783V6.75C22.5%205.09315%2021.1569%203.75%2019.5%203.75H4.5C2.84315%203.75%201.5%205.09315%201.5%206.75V6.90783L11.2139%2012.8856C11.696%2013.1823%2012.304%2013.1823%2012.7861%2012.8856L22.5%206.90783Z'%20fill='white'/%3e%3c/svg%3e" alt="" width="24" height="24"
                                aria-hidden="true" />

                            <span class="contact-method__text">
                                Enter Your Email
                            </span>

                            <input class="contact-method__radio" type="radio" name="contact-method" value="email"
                                aria-label="Contact me by email" />
                        </label>
                    </div>
                </fieldset>

                <div class="form-field form-field--wide">
                    <label class="form-field__label" for="inquiry-message">
                        Message
                    </label>

                    <textarea class="form-field__control form-field__control--textarea" id="inquiry-message" name="message"
                        placeholder="Enter your Message here..." rows="5" required></textarea>
                    <div data-js-form-field-errors></div>
                </div>
            </div>

            <div class="property-inquiry__footer">
                <div class="agreement">
                    <input class="agreement__checkbox visually-hidden" type="checkbox" id="inquiry-privacy-policy"
                        name="privacy_agreement" required />

                    <label class="agreement__label" for="inquiry-privacy-policy">
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

                <button class="property-inquiry__submit button button--accent" type="submit">
                    Send Your Message
                </button>
            </div>
        </form>
    </div>
</section>