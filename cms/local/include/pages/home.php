<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$estateinConfig = require $_SERVER['DOCUMENT_ROOT']
    . '/local/config/estatein.php';

?>

<section class="hero" aria-labelledby="hero-title" id="hero">
    <div class="hero__body">
        <div class="hero__content">
            <div class="hero__content-inner">
                <?php
                $APPLICATION->IncludeComponent(
                    'bitrix:main.include',
                    '',
                    [
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => '/local/include/home/hero-content.php',
                        'EDIT_TEMPLATE' => '',
                    ],
                    false
                );
                ?>
            </div>

            <?php
            $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '',
                [
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => '/local/include/home/hero-stats.php',
                    'EDIT_TEMPLATE' => '',
                ],
                false
            );
            ?>
        </div>

        <div class="hero__visual">
            <?php
            $APPLICATION->IncludeComponent(
                'bitrix:main.include',
                '',
                [
                    'AREA_FILE_SHOW' => 'file',
                    'PATH' => '/local/include/home/hero-image.php',
                    'EDIT_TEMPLATE' => '',
                ],
                false
            );
            ?>

            <a class="hero__round-link" href="/properties/" aria-label="Discover your dream property">
                <svg class="hero__round-link-text" viewBox="0 0 160 160" aria-hidden="true">
                    <defs>
                        <path id="hero-round-text-path" d="M 80 145 A 65 65 0 1 1 80 15 A 65 65 0 1 1 80 145" />
                    </defs>

                    <text>
                        <textPath href="#hero-round-text-path" startOffset="50%" text-anchor="middle">
                            Discover Your Dream Property
                        </textPath>
                    </text>
                </svg>

                <svg class="hero__round-link-sparkles" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M9.5 1.5C10.15 5.65 13.35 8.85 17.5 9.5C13.35 10.15 10.15 13.35 9.5 17.5C8.85 13.35 5.65 10.15 1.5 9.5C5.65 8.85 8.85 5.65 9.5 1.5Z"
                        fill="currentColor" />
                    <path
                        d="M18.5 12.5C18.85 14.75 20.25 16.15 22.5 16.5C20.25 16.85 18.85 18.25 18.5 20.5C18.15 18.25 16.75 16.85 14.5 16.5C16.75 16.15 18.15 14.75 18.5 12.5Z"
                        fill="currentColor" />
                </svg>


                <svg class="hero__round-link-arrow" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 19 19 5M9 5h10v10" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</section>
<nav class="features" id="features" aria-label="Estatein service highlights">
    <?php
    $APPLICATION->IncludeComponent(
        'bitrix:main.include',
        '',
        [
            'AREA_FILE_SHOW' => 'file',
            'PATH' => '/local/include/home/features-content.php',
            'EDIT_TEMPLATE' => '',
        ],
        false
    );
    ?>
</nav>
<section
    class="properties-section"
    aria-labelledby="properties-title"
    id="properties"
    data-js-slider
    data-slider-slides-desktop="3"
    data-slider-slides-tablet="2"
    data-slider-slides-mobile="1"
    data-slider-group-desktop="1"
    data-slider-group-tablet="1"
    data-slider-group-mobile="1"
    data-slider-counter-mode="visible-cards"
    data-slider-loop="false">
    <div class="properties-section__inner container">
        <img class="properties-section__decoration" src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_75_930)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73233%2023.2843%200.0166836%2015%200.0166836C6.71573%200.0166836%200%206.73233%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_75_930)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_75_930)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.6851%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.6851%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M59.9998%2023.4C62.3194%2023.4%2064.1998%2021.5196%2064.1998%2019.2C64.1998%2016.8804%2062.3194%2015%2059.9998%2015C57.6802%2015%2055.7998%2016.8804%2055.7998%2019.2C55.7998%2021.5196%2057.6802%2023.4%2059.9998%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2023.4C70.7193%2023.4%2072.5997%2021.5196%2072.5997%2019.2C72.5997%2016.8804%2070.7193%2015%2068.3997%2015C66.0801%2015%2064.1997%2016.8804%2064.1997%2019.2C64.1997%2021.5196%2066.0801%2023.4%2068.3997%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M59.9998%2015C62.3194%2015%2064.1998%2013.1196%2064.1998%2010.8C64.1998%208.4804%2062.3194%206.6%2059.9998%206.6C57.6802%206.6%2055.7998%208.4804%2055.7998%2010.8C55.7998%2013.1196%2057.6802%2015%2059.9998%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2015C70.7193%2015%2072.5997%2013.1196%2072.5997%2010.8C72.5997%208.4804%2070.7193%206.6%2068.3997%206.6C66.0801%206.6%2064.1997%208.4804%2064.1997%2010.8C64.1997%2013.1196%2066.0801%2015%2068.3997%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_75_930'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_75_930'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_75_930'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e" alt="" width="69"
            height="30" aria-hidden="true" />
        <div class="properties-section__header section-header">
            <div class="section-header__content">
                <?php
                $APPLICATION->IncludeComponent(
                    'bitrix:main.include',
                    '',
                    [
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => '/local/include/home/properties-content.php',
                        'EDIT_TEMPLATE' => '',
                    ],
                    false
                );
                ?>
            </div>

            <a class="section-header__action button button--dark" href="/properties/">
                View All Properties
            </a>
        </div>

        <?php
        $APPLICATION->IncludeComponent(
            'bitrix:news.list',
            'home-properties',
            [
                'IBLOCK_ID' => (int)(
                    $estateinConfig['properties_iblock_id'] ?? 0
                ),

                'NEWS_COUNT' => '1000',

                'SORT_BY1' => 'SORT',
                'SORT_ORDER1' => 'ASC',
                'SORT_BY2' => 'ID',
                'SORT_ORDER2' => 'DESC',

                'CHECK_DATES' => 'Y',

                'FIELD_CODE' => [
                    'NAME',
                    'PREVIEW_TEXT',
                    'PREVIEW_PICTURE',
                    'DETAIL_PICTURE',
                ],

                'PROPERTY_CODE' => [
                    'PRICE',
                    'PROPERTY_PRICE',
                    'COST',
                    'BEDROOMS',
                    'BEDROOM_COUNT',
                    'BEDROOM',
                    'BATHROOMS',
                    'BATHROOM_COUNT',
                    'BATHROOM',
                    'PROPERTY_TYPE',
                    'TYPE',
                    'PROPERTY_KIND',
                ],

                'FILTER_NAME' => '',

                'DETAIL_URL' => SITE_DIR . 'property-details/',
                'HIDE_LINK_WHEN_NO_DETAIL' => 'N',

                'ACTIVE_DATE_FORMAT' => 'd.m.Y',

                'PREVIEW_TRUNCATE_LEN' => '0',
                'DISPLAY_DATE' => 'N',
                'DISPLAY_NAME' => 'Y',
                'DISPLAY_PICTURE' => 'Y',
                'DISPLAY_PREVIEW_TEXT' => 'Y',

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

                'SET_STATUS_404' => 'N',
                'SHOW_404' => 'N',
            ],
            false
        );
        ?>
    </div>
</section>
<section class="testimonials-section" aria-labelledby="testimonials-title" id="testimonials" data-js-slider
    data-slider-slides-desktop="3" data-slider-slides-tablet="2" data-slider-slides-mobile="1"
    data-slider-group-desktop="3" data-slider-group-tablet="2" data-slider-group-mobile="1" data-slider-loop="false">
    <div class="testimonials-section__inner container">
        <img class="testimonials-section__decoration" src="data:image/svg+xml,%3csvg%20width='69'%20height='30'%20viewBox='0%200%2069%2030'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20clip-path='url(%23clip0_75_930)'%3e%3cpath%20d='M15%2030.0166C23.2843%2030.0166%2030%2023.3009%2030%2015.0166C30%206.73233%2023.2843%200.0166836%2015%200.0166836C6.71573%200.0166836%200%206.73233%200%2015.0166C0%2023.3009%206.71573%2030.0166%2015%2030.0166Z'%20fill='%23666666'/%3e%3cpath%20d='M0%2045C8.28427%2045%2015%2038.2843%2015%2030C15%2021.7157%208.28427%2015%200%2015C-8.28427%2015%20-15%2021.7157%20-15%2030C-15%2038.2843%20-8.28427%2045%200%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2045C38.2843%2045%2045%2038.2843%2045%2030C45%2021.7157%2038.2843%2015%2030%2015C21.7157%2015%2015%2021.7157%2015%2030C15%2038.2843%2021.7157%2045%2030%2045Z'%20fill='%23141414'/%3e%3cpath%20d='M0%2015C8.28427%2015%2015%208.28427%2015%200C15%20-8.28427%208.28427%20-15%200%20-15C-8.28427%20-15%20-15%20-8.28427%20-15%200C-15%208.28427%20-8.28427%2015%200%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M30%2015C38.2843%2015%2045%208.28427%2045%200C45%20-8.28427%2038.2843%20-15%2030%20-15C21.7157%20-15%2015%20-8.28427%2015%200C15%208.28427%2021.7157%2015%2030%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip1_75_930)'%3e%3cpath%20d='M45%2024.01C49.9706%2024.01%2054%2019.9805%2054%2015.01C54%2010.0394%2049.9706%206.01001%2045%206.01001C40.0294%206.01001%2036%2010.0394%2036%2015.01C36%2019.9805%2040.0294%2024.01%2045%2024.01Z'%20fill='%23333333'/%3e%3cpath%20d='M36%2033C40.9706%2033%2045%2028.9706%2045%2024C45%2019.0294%2040.9706%2015%2036%2015C31.0294%2015%2027%2019.0294%2027%2024C27%2028.9706%2031.0294%2033%2036%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2033C58.9706%2033%2063%2028.9706%2063%2024C63%2019.0294%2058.9706%2015%2054%2015C49.0294%2015%2045%2019.0294%2045%2024C45%2028.9706%2049.0294%2033%2054%2033Z'%20fill='%23141414'/%3e%3cpath%20d='M36%2015C40.9706%2015%2045%2010.9706%2045%206C45%201.02944%2040.9706%20-3%2036%20-3C31.0294%20-3%2027%201.02944%2027%206C27%2010.9706%2031.0294%2015%2036%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M54%2015C58.9706%2015%2063%2010.9706%2063%206C63%201.02944%2058.9706%20-3%2054%20-3C49.0294%20-3%2045%201.02944%2045%206C45%2010.9706%2049.0294%2015%2054%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cg%20clip-path='url(%23clip2_75_930)'%3e%3cpath%20d='M64.2%2019.2046C66.5196%2019.2046%2068.4%2017.3242%2068.4%2015.0046C68.4%2012.6851%2066.5196%2010.8047%2064.2%2010.8047C61.8804%2010.8047%2060%2012.6851%2060%2015.0046C60%2017.3242%2061.8804%2019.2046%2064.2%2019.2046Z'%20fill='%23333333'/%3e%3cpath%20d='M59.9998%2023.4C62.3194%2023.4%2064.1998%2021.5196%2064.1998%2019.2C64.1998%2016.8804%2062.3194%2015%2059.9998%2015C57.6802%2015%2055.7998%2016.8804%2055.7998%2019.2C55.7998%2021.5196%2057.6802%2023.4%2059.9998%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2023.4C70.7193%2023.4%2072.5997%2021.5196%2072.5997%2019.2C72.5997%2016.8804%2070.7193%2015%2068.3997%2015C66.0801%2015%2064.1997%2016.8804%2064.1997%2019.2C64.1997%2021.5196%2066.0801%2023.4%2068.3997%2023.4Z'%20fill='%23141414'/%3e%3cpath%20d='M59.9998%2015C62.3194%2015%2064.1998%2013.1196%2064.1998%2010.8C64.1998%208.4804%2062.3194%206.6%2059.9998%206.6C57.6802%206.6%2055.7998%208.4804%2055.7998%2010.8C55.7998%2013.1196%2057.6802%2015%2059.9998%2015Z'%20fill='%23141414'/%3e%3cpath%20d='M68.3997%2015C70.7193%2015%2072.5997%2013.1196%2072.5997%2010.8C72.5997%208.4804%2070.7193%206.6%2068.3997%206.6C66.0801%206.6%2064.1997%208.4804%2064.1997%2010.8C64.1997%2013.1196%2066.0801%2015%2068.3997%2015Z'%20fill='%23141414'/%3e%3c/g%3e%3cdefs%3e%3cclipPath%20id='clip0_75_930'%3e%3crect%20width='30'%20height='30'%20fill='white'/%3e%3c/clipPath%3e%3cclipPath%20id='clip1_75_930'%3e%3crect%20width='18'%20height='18'%20fill='white'%20transform='translate(36%206)'/%3e%3c/clipPath%3e%3cclipPath%20id='clip2_75_930'%3e%3crect%20width='8.4'%20height='8.4'%20fill='white'%20transform='translate(60%2010.8)'/%3e%3c/clipPath%3e%3c/defs%3e%3c/svg%3e" alt="" width="69"
            height="30" aria-hidden="true" />

        <div class="testimonials-section__header section-header">
            <div class="section-header__content">
                <?php
                $APPLICATION->IncludeComponent(
                    'bitrix:main.include',
                    '',
                    [
                        'AREA_FILE_SHOW' => 'file',
                        'PATH' => '/local/include/home/testimonials-content.php',
                        'EDIT_TEMPLATE' => '',
                    ],
                    false
                );
                ?>
            </div>

            <a class="section-header__action button button--dark" href="/#testimonials">
                View All Testimonials
            </a>
        </div>

        <div class="testimonials-section__slider slider swiper" data-js-slider-swiper>
            <ul class="swiper-wrapper">
                <li class="swiper-slide">
                    <article class="testimonial-card">
                        <div class="testimonial-card__rating" role="img" aria-label="Rating: 5 out of 5">
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                        </div>

                        <div class="testimonial-card__content">
                            <h3 class="testimonial-card__title">
                                Exceptional Service!
                            </h3>

                            <p class="testimonial-card__text">
                                Our experience with Estatein was
                                outstanding. Their team's dedication and
                                professionalism made finding our dream
                                home a breeze. Highly recommended!
                            </p>
                        </div>

                        <footer class="testimonial-card__author">
                            <img class="testimonial-card__avatar"
                                src="data:image/webp;base64,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" alt="" width="50"
                                height="50" loading="lazy" decoding="async" />

                            <div class="testimonial-card__author-info">
                                <p class="testimonial-card__author-name">
                                    Wade Warren
                                </p>

                                <p class="testimonial-card__author-location">
                                    USA, California
                                </p>
                            </div>
                        </footer>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="testimonial-card">
                        <div class="testimonial-card__rating" role="img" aria-label="Rating: 5 out of 5">
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                        </div>

                        <div class="testimonial-card__content">
                            <h3 class="testimonial-card__title">
                                Efficient and Reliable
                            </h3>

                            <p class="testimonial-card__text">
                                Estatein provided us with top-notch
                                service. They helped us sell our property
                                quickly and at a great price. We couldn't
                                be happier with the results.
                            </p>
                        </div>

                        <footer class="testimonial-card__author">
                            <img class="testimonial-card__avatar"
                                src="data:image/webp;base64,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" alt="" width="50"
                                height="50" loading="lazy" decoding="async" />

                            <div class="testimonial-card__author-info">
                                <p class="testimonial-card__author-name">
                                    Emelie Thomson
                                </p>

                                <p class="testimonial-card__author-location">
                                    USA, Florida
                                </p>
                            </div>
                        </footer>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="testimonial-card">
                        <div class="testimonial-card__rating" role="img" aria-label="Rating: 5 out of 5">
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                        </div>

                        <div class="testimonial-card__content">
                            <h3 class="testimonial-card__title">
                                Trusted Advisors
                            </h3>

                            <p class="testimonial-card__text">
                                The Estatein team guided us through the
                                entire buying process. Their knowledge
                                and commitment to our needs were
                                impressive. Thank you for your support!
                            </p>
                        </div>

                        <footer class="testimonial-card__author">
                            <img class="testimonial-card__avatar"
                                src="data:image/webp;base64,UklGRjoFAABXRUJQVlA4WAoAAAAQAAAAYwAAYwAAQUxQSN0BAAABkFXbVt5qWwIOwAF1kDq410EkIKESjgQkRAISIuFIOBLOQ9I2gc338xYRE4Buw0+RbVdzdzdtTcoSQDWWqn6pbmsmsYj6rVqX4cJr9w51jSNlMe+1xlFS865rHCGId19jd8V8QF37Ss0HbbGjYj6slV6C+NDSR9p9cI0dJPXhNd6WzQlavimbU7R8SzYnafmGZE7T4mVJnajGq9Sp7uEacbJySXG65YJkfCx+15xw+2p1yuWLpJwsfFadtHyUnHb8pPJqHyQnnt9VZvImOXMLZys1f50pt/1kcfLLobKTg7JTAA+nH4GVXwE2fhVQforgEwzLDH7KDIrMQNoMtinsOgO1GZj/d7QZmM5A9xm0bQoyAykzKD8zeIYZBCg/BSq/DSj8ViDxewBQdgoAwq4eFnbPA3ZuitMXt/UsGLV4BmFW8fbBLL5D41XxYeIVP4Gwqvg4GCeNn6FwWvFtY9TwdTI+Fr9D4VNwpbARXBp2LoqLkzLReBWS8bCI67OxsIw7s3GwjHuzMbCMu5OOpxH3Jx1tj+hSxpKATouNYwX9pjZKi+h61RGsoPdU+5OAAVPtq0UMmmo3Jg8MnFbtYX8FjP6seo/KExwf66bXaC0JVMOzSGtqB9N9k/Ib0C0AVlA4IDYDAABwEgCdASpkAGQAPm00lEgkIqIhJfVamIANiWcAzlniiipZxBwnboP3e8xYHgQrAlB8PRreGtQj3ytak5m0KSaxRbckMhMAa1V73UiobOI+rJ+x3qJVzMjZLkvLOKkIprestQLt2uYKubVqwoh+pQvqS2OtjSNEqd6eRkcgoc2WQ2dWgIlbaeLx7LWz15Q4nbTGnlpQtDsRsULjQAAA/vzh7BzyFgk8tI2ykuTTzvcaUf52HdZoAphiAfJkbpjFCZhhG8zPk/kLwGiXcrUK2/4KPhELgNVqDK7zp23+hpk1nMPoZiyWLmm38pN1N0/fl3/RSBYi+Y0rA/H09u53X+yAOACApi3teo6Q2dWohb4lYl/65nDyRUWzLg+knJGO8FftLf/DV6IoXnLL7JGklcCawAuZFAyCLxGMagbbvFjPRL9jUMMIeAgOi9/5wuHRPEPWH1gXoc1U0zgE+e0X8lqJyliRB+4q9p40yIma9nXggUFDcpj6s+vIVLQ0ogH20UeeBWcWpr8egMXzbMJKGKI0PKxxUFYhsC3JaT2ZmwxGimaJ09zFPtTDxxGB/V8/J/5jPo1VFvpUY8fXjXIIUs6SWINTlrXo3OBbS7NaFA7b643cWKLBvX+daxaB6VUJY3s3tRJNE9Kwo9EZeOmdAFW8ASlF7cC15RTJoHO4D+f3W42WV5V5AEGRmQuD4SKpt5nSlfMeoaMGgENuN1YAfjXDe2Anl/sishoHl9eF1WPylL/xvpwUUYSqEA1Ll9SJG4hf5dqfqSGFDyoVvHrrGkxIyUOsj/ph4FjuupSS9QrHeY6gesp6iTHvC08wfHLocDBpTfBvvIYaXgLI0o8Wxv38PYrRe3rdnyArk9XJRYFODMQmPJiRZGzm475GtsD9gdjldIZhO7twkky8LEewiuKkWX3uQjOGri9+FeDq+eSqQ6UwN8gjAhtX5RcHVw1EB3CB3VeFGx3nRWoHMdq+68MFx6xwTabNCNXg9zgCACB4n5PJrKoAAF8L9K2YQ6ibVf7xh1aPPppZ+H///Clei6XDanV85WAHBr396xKuLfQGb//2oov6n2uFOdl//6RFGsNYagAAAAA=" alt="" width="50" height="50"
                                loading="lazy" decoding="async" />

                            <div class="testimonial-card__author-info">
                                <p class="testimonial-card__author-name">
                                    John Mans
                                </p>

                                <p class="testimonial-card__author-location">
                                    USA, Nevada
                                </p>
                            </div>
                        </footer>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="testimonial-card">
                        <div class="testimonial-card__rating" role="img" aria-label="Rating: 5 out of 5">
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                        </div>

                        <div class="testimonial-card__content">
                            <h3 class="testimonial-card__title">
                                Exceptional Service!
                            </h3>

                            <p class="testimonial-card__text">
                                Our experience with Estatein was
                                outstanding. Their team's dedication and
                                professionalism made finding our dream
                                home a breeze. Highly recommended!
                            </p>
                        </div>

                        <footer class="testimonial-card__author">
                            <img class="testimonial-card__avatar"
                                src="data:image/webp;base64,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" alt="" width="50"
                                height="50" loading="lazy" decoding="async" />

                            <div class="testimonial-card__author-info">
                                <p class="testimonial-card__author-name">
                                    Wade Warren
                                </p>

                                <p class="testimonial-card__author-location">
                                    USA, California
                                </p>
                            </div>
                        </footer>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="testimonial-card">
                        <div class="testimonial-card__rating" role="img" aria-label="Rating: 5 out of 5">
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                        </div>

                        <div class="testimonial-card__content">
                            <h3 class="testimonial-card__title">
                                Efficient and Reliable
                            </h3>

                            <p class="testimonial-card__text">
                                Estatein provided us with top-notch
                                service. They helped us sell our property
                                quickly and at a great price. We couldn't
                                be happier with the results.
                            </p>
                        </div>

                        <footer class="testimonial-card__author">
                            <img class="testimonial-card__avatar"
                                src="data:image/webp;base64,UklGRgAIAABXRUJQVlA4WAoAAAAQAAAAYwAAYwAAQUxQSN0BAAABkFXbVt5qWwIOwAF1kDq410EkIKESjgQkRAISIuFIOBLOQ9I2gc338xYRE4Buw0+RbVdzdzdtTcoSQDWWqn6pbmsmsYj6rVqX4cJr9w51jSNlMe+1xlFS865rHCGId19jd8V8QF37Ss0HbbGjYj6slV6C+NDSR9p9cI0dJPXhNd6WzQlavimbU7R8SzYnafmGZE7T4mVJnajGq9Sp7uEacbJySXG65YJkfCx+15xw+2p1yuWLpJwsfFadtHyUnHb8pPJqHyQnnt9VZvImOXMLZys1f50pt/1kcfLLobKTg7JTAA+nH4GVXwE2fhVQforgEwzLDH7KDIrMQNoMtinsOgO1GZj/d7QZmM5A9xm0bQoyAykzKD8zeIYZBCg/BSq/DSj8ViDxewBQdgoAwq4eFnbPA3ZuitMXt/UsGLV4BmFW8fbBLL5D41XxYeIVP4Gwqvg4GCeNn6FwWvFtY9TwdTI+Fr9D4VNwpbARXBp2LoqLkzLReBWS8bCI67OxsIw7s3GwjHuzMbCMu5OOpxH3Jx1tj+hSxpKATouNYwX9pjZKi+h61RGsoPdU+5OAAVPtq0UMmmo3Jg8MnFbtYX8FjP6seo/KExwf66bXaC0JVMOzSGtqB9N9k/Ib0C0AVlA4IPwFAADwHwCdASpkAGQAPm0wlEekIqIpJpTb4SANiWkDGAAXcToz+K5+9fFhDwPzA/0vnZ9kNdkj79HLRE9Y6iq0V2tBpnYplh//rmXc/8Zo1brVUnvCevXePyTdRU1fAxPr3n6IF3eEjuFP5Su+2AlFQlBSFVQIKZ3alcVLqkHpcI7i7YHxLViGW9KC6zEtTsSqgJ0VZebc0h/e3D7yQ3XHlUEMDGm7VYIaynuNCWZ98rL/LZEMhELm0QvP0HlrPGst23rfL/6L9Jjm7+ARk1GfbyahW0SWROTkyMIrdzbM9dmobndfxVSjSoczXRZM1VYzO5SmF2xT5lcvlP/cjyoJtFdoHjdGb2kQ/AAA/vwu//h0f/4bK//8J53+4LGITupeR2lZDIX5jWp39LFxBpctKmrgIe6Ayo90rSBlXHV/586OnauOoaVu+RuIJiPBHK+ph9Wa9FBnzBebQxLYUSSTlix5bdsgqff/VR8HeM7/Sp947xb5g4CfYie353X6bZjCecJ+3gRlodp/HWDls7tEy+I6tWgWLxLfgDumpCD9ogchSB27Ll89aNl+0Ok1DB6TqgMfuvh6AJvSqO961/FPtk7GtqHSdZO6opp/7vmr36xZEezy7snOgWCaiagCIuF1cfjEle0hlkf/awAfnwud9tvnushOonuopC10Pl7/oHL3Ijum+Y4W2/fBAR/W+awswoFhe8fBtWzbA2JtpLQ7zoPTizbe2384UYW1G///nwFwgSeISreCo4U79+MT8Qyc0giyrpWMKyO37+Yb5efilWHrPmoZTlQbPhe8r2LYin+jPUzP3ZbJL8c+tttOQweeK3+LVITWzNU2GYTx0yOhR5lqa96ZdfgCMGlYkZB4u0K3euTFKUFSV0afrztNECb1emL1iBB4d14lwxe2ds6V7Nv6jV44QcsiMZX8WdYDFbjHHjfdfQp3N5kkFDBWt4VQ2QI/5MwGGP1aRqVmOZm5WIII7gS2Mv8fAO83pGtRAGCA3aTs3DxQxAphku/zdKyjemHLjUOW7MsCINyzm9+/xNlcRWlX9D4l6I2oyrgmFhkKpL7/9HIbqyZl6XmpV5inh3ZTZJQu79uZ1NALAEVsBMXd3xNn73otTGO25GaIHnS/kls0oSO/octswU8dDzq8wSNPE8yueTR4Q/P64+LwzvqsqVfQpNaqoabi89eqtyk5PT9/XB0fD5etUAjarDAvv/enYIBR7bWTxws90OXww2IDE55IGcnd4X2rJsn741j1Pk86DGWvTItv+W7SqILhlHQfL+UgAtmp0xqdTICbgNzl+Sq+Qrjza89YZnWVT34ITpAiU3yI1t2P1FXdTvL+cTR6DHBJN7rxdzp0xEUqBpUfmZsswvXrls8+pFclQc1tKr5ePNSi0k21yvbSYTPhQKiewAqlAshiJZEqZliZXEpKvYGyfQsxL1V6A9kVYd+w2qiGJ84edJ+jJAu4UwQg2fR14s+ciuj6piO8xbGvq4yGDklqZcmlLJJVE6auYd/+9YHs7ajyknTm4WGQlhcNS+XOzgnuHv+qz/I/23CzE1AGuuCujZ+bMM30ENmLV62paogSdXoqbmiYyWb59OP5ICo7KbGmHT1okSw6LaZKje7x49EiaXqRbwKYW23TgUEJYXPouP/t2L//+y7i/4pD9UZZ7cNiuKQBmTZqKiMZ4Y9PP9Sby127XQTp7SS+sp2BGoKx9TIb0pk/LhxBZMCivwt6TQsjk4zkDW8DWRFBzNvawo6HD8P9gQPIPAWUj8hj9fUOtnAn0F3OSwNqAEafLRJIWlpgwH8F5ZFa/Ac11G+d+FKHF1rLvSiZE0kXJu9nYWn/aNj5IJjFVhqMpJ4lkpgLukmkZ8a9buzWRZLN04bdx2q7AwaQUgFnCffiIQmvFIsedepp2FC25pep1eB9Vj/MWpsT+pyCz8nu/i3jGlqR2/m942Pp/MzmxKRHrlkZzjXCxQXLlPokbwBMav/7kt7BRn49r2R1EsNaNtN/aDVB6r9n6Jz4gnHsSVti4wMP/Xv8thaBmriDyAAAAA==" alt="" width="50"
                                height="50" loading="lazy" decoding="async" />

                            <div class="testimonial-card__author-info">
                                <p class="testimonial-card__author-name">
                                    Emelie Thomson
                                </p>

                                <p class="testimonial-card__author-location">
                                    USA, Florida
                                </p>
                            </div>
                        </footer>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="testimonial-card">
                        <div class="testimonial-card__rating" role="img" aria-label="Rating: 5 out of 5">
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                        </div>

                        <div class="testimonial-card__content">
                            <h3 class="testimonial-card__title">
                                Trusted Advisors
                            </h3>

                            <p class="testimonial-card__text">
                                The Estatein team guided us through the
                                entire buying process. Their knowledge
                                and commitment to our needs were
                                impressive. Thank you for your support!
                            </p>
                        </div>

                        <footer class="testimonial-card__author">
                            <img class="testimonial-card__avatar"
                                src="data:image/webp;base64,UklGRjoFAABXRUJQVlA4WAoAAAAQAAAAYwAAYwAAQUxQSN0BAAABkFXbVt5qWwIOwAF1kDq410EkIKESjgQkRAISIuFIOBLOQ9I2gc338xYRE4Buw0+RbVdzdzdtTcoSQDWWqn6pbmsmsYj6rVqX4cJr9w51jSNlMe+1xlFS865rHCGId19jd8V8QF37Ss0HbbGjYj6slV6C+NDSR9p9cI0dJPXhNd6WzQlavimbU7R8SzYnafmGZE7T4mVJnajGq9Sp7uEacbJySXG65YJkfCx+15xw+2p1yuWLpJwsfFadtHyUnHb8pPJqHyQnnt9VZvImOXMLZys1f50pt/1kcfLLobKTg7JTAA+nH4GVXwE2fhVQforgEwzLDH7KDIrMQNoMtinsOgO1GZj/d7QZmM5A9xm0bQoyAykzKD8zeIYZBCg/BSq/DSj8ViDxewBQdgoAwq4eFnbPA3ZuitMXt/UsGLV4BmFW8fbBLL5D41XxYeIVP4Gwqvg4GCeNn6FwWvFtY9TwdTI+Fr9D4VNwpbARXBp2LoqLkzLReBWS8bCI67OxsIw7s3GwjHuzMbCMu5OOpxH3Jx1tj+hSxpKATouNYwX9pjZKi+h61RGsoPdU+5OAAVPtq0UMmmo3Jg8MnFbtYX8FjP6seo/KExwf66bXaC0JVMOzSGtqB9N9k/Ib0C0AVlA4IDYDAABwEgCdASpkAGQAPm00lEgkIqIhJfVamIANiWcAzlniiipZxBwnboP3e8xYHgQrAlB8PRreGtQj3ytak5m0KSaxRbckMhMAa1V73UiobOI+rJ+x3qJVzMjZLkvLOKkIprestQLt2uYKubVqwoh+pQvqS2OtjSNEqd6eRkcgoc2WQ2dWgIlbaeLx7LWz15Q4nbTGnlpQtDsRsULjQAAA/vzh7BzyFgk8tI2ykuTTzvcaUf52HdZoAphiAfJkbpjFCZhhG8zPk/kLwGiXcrUK2/4KPhELgNVqDK7zp23+hpk1nMPoZiyWLmm38pN1N0/fl3/RSBYi+Y0rA/H09u53X+yAOACApi3teo6Q2dWohb4lYl/65nDyRUWzLg+knJGO8FftLf/DV6IoXnLL7JGklcCawAuZFAyCLxGMagbbvFjPRL9jUMMIeAgOi9/5wuHRPEPWH1gXoc1U0zgE+e0X8lqJyliRB+4q9p40yIma9nXggUFDcpj6s+vIVLQ0ogH20UeeBWcWpr8egMXzbMJKGKI0PKxxUFYhsC3JaT2ZmwxGimaJ09zFPtTDxxGB/V8/J/5jPo1VFvpUY8fXjXIIUs6SWINTlrXo3OBbS7NaFA7b643cWKLBvX+daxaB6VUJY3s3tRJNE9Kwo9EZeOmdAFW8ASlF7cC15RTJoHO4D+f3W42WV5V5AEGRmQuD4SKpt5nSlfMeoaMGgENuN1YAfjXDe2Anl/sishoHl9eF1WPylL/xvpwUUYSqEA1Ll9SJG4hf5dqfqSGFDyoVvHrrGkxIyUOsj/ph4FjuupSS9QrHeY6gesp6iTHvC08wfHLocDBpTfBvvIYaXgLI0o8Wxv38PYrRe3rdnyArk9XJRYFODMQmPJiRZGzm475GtsD9gdjldIZhO7twkky8LEewiuKkWX3uQjOGri9+FeDq+eSqQ6UwN8gjAhtX5RcHVw1EB3CB3VeFGx3nRWoHMdq+68MFx6xwTabNCNXg9zgCACB4n5PJrKoAAF8L9K2YQ6ibVf7xh1aPPppZ+H///Clei6XDanV85WAHBr396xKuLfQGb//2oov6n2uFOdl//6RFGsNYagAAAAA=" alt="" width="50" height="50"
                                loading="lazy" decoding="async" />

                            <div class="testimonial-card__author-info">
                                <p class="testimonial-card__author-name">
                                    John Mans
                                </p>

                                <p class="testimonial-card__author-location">
                                    USA, Nevada
                                </p>
                            </div>
                        </footer>
                    </article>
                </li>
                <li class="swiper-slide">
                    <article class="testimonial-card">
                        <div class="testimonial-card__rating" role="img" aria-label="Rating: 5 out of 5">
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                        </div>

                        <div class="testimonial-card__content">
                            <h3 class="testimonial-card__title">
                                Exceptional Service!
                            </h3>

                            <p class="testimonial-card__text">
                                Our experience with Estatein was
                                outstanding. Their team's dedication and
                                professionalism made finding our dream
                                home a breeze. Highly recommended!
                            </p>
                        </div>

                        <footer class="testimonial-card__author">
                            <img class="testimonial-card__avatar"
                                src="data:image/webp;base64,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" alt="" width="50"
                                height="50" loading="lazy" decoding="async" />

                            <div class="testimonial-card__author-info">
                                <p class="testimonial-card__author-name">
                                    Wade Warren
                                </p>

                                <p class="testimonial-card__author-location">
                                    USA, California
                                </p>
                            </div>
                        </footer>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="testimonial-card">
                        <div class="testimonial-card__rating" role="img" aria-label="Rating: 5 out of 5">
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                        </div>

                        <div class="testimonial-card__content">
                            <h3 class="testimonial-card__title">
                                Efficient and Reliable
                            </h3>

                            <p class="testimonial-card__text">
                                Estatein provided us with top-notch
                                service. They helped us sell our property
                                quickly and at a great price. We couldn't
                                be happier with the results.
                            </p>
                        </div>

                        <footer class="testimonial-card__author">
                            <img class="testimonial-card__avatar"
                                src="data:image/webp;base64,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" alt="" width="50"
                                height="50" loading="lazy" decoding="async" />

                            <div class="testimonial-card__author-info">
                                <p class="testimonial-card__author-name">
                                    Emelie Thomson
                                </p>

                                <p class="testimonial-card__author-location">
                                    USA, Florida
                                </p>
                            </div>
                        </footer>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="testimonial-card">
                        <div class="testimonial-card__rating" role="img" aria-label="Rating: 5 out of 5">
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                            <span class="testimonial-card__star"></span>
                        </div>

                        <div class="testimonial-card__content">
                            <h3 class="testimonial-card__title">
                                Trusted Advisors
                            </h3>

                            <p class="testimonial-card__text">
                                The Estatein team guided us through the
                                entire buying process. Their knowledge
                                and commitment to our needs were
                                impressive. Thank you for your support!
                            </p>
                        </div>

                        <footer class="testimonial-card__author">
                            <img class="testimonial-card__avatar"
                                src="data:image/webp;base64,UklGRjoFAABXRUJQVlA4WAoAAAAQAAAAYwAAYwAAQUxQSN0BAAABkFXbVt5qWwIOwAF1kDq410EkIKESjgQkRAISIuFIOBLOQ9I2gc338xYRE4Buw0+RbVdzdzdtTcoSQDWWqn6pbmsmsYj6rVqX4cJr9w51jSNlMe+1xlFS865rHCGId19jd8V8QF37Ss0HbbGjYj6slV6C+NDSR9p9cI0dJPXhNd6WzQlavimbU7R8SzYnafmGZE7T4mVJnajGq9Sp7uEacbJySXG65YJkfCx+15xw+2p1yuWLpJwsfFadtHyUnHb8pPJqHyQnnt9VZvImOXMLZys1f50pt/1kcfLLobKTg7JTAA+nH4GVXwE2fhVQforgEwzLDH7KDIrMQNoMtinsOgO1GZj/d7QZmM5A9xm0bQoyAykzKD8zeIYZBCg/BSq/DSj8ViDxewBQdgoAwq4eFnbPA3ZuitMXt/UsGLV4BmFW8fbBLL5D41XxYeIVP4Gwqvg4GCeNn6FwWvFtY9TwdTI+Fr9D4VNwpbARXBp2LoqLkzLReBWS8bCI67OxsIw7s3GwjHuzMbCMu5OOpxH3Jx1tj+hSxpKATouNYwX9pjZKi+h61RGsoPdU+5OAAVPtq0UMmmo3Jg8MnFbtYX8FjP6seo/KExwf66bXaC0JVMOzSGtqB9N9k/Ib0C0AVlA4IDYDAABwEgCdASpkAGQAPm00lEgkIqIhJfVamIANiWcAzlniiipZxBwnboP3e8xYHgQrAlB8PRreGtQj3ytak5m0KSaxRbckMhMAa1V73UiobOI+rJ+x3qJVzMjZLkvLOKkIprestQLt2uYKubVqwoh+pQvqS2OtjSNEqd6eRkcgoc2WQ2dWgIlbaeLx7LWz15Q4nbTGnlpQtDsRsULjQAAA/vzh7BzyFgk8tI2ykuTTzvcaUf52HdZoAphiAfJkbpjFCZhhG8zPk/kLwGiXcrUK2/4KPhELgNVqDK7zp23+hpk1nMPoZiyWLmm38pN1N0/fl3/RSBYi+Y0rA/H09u53X+yAOACApi3teo6Q2dWohb4lYl/65nDyRUWzLg+knJGO8FftLf/DV6IoXnLL7JGklcCawAuZFAyCLxGMagbbvFjPRL9jUMMIeAgOi9/5wuHRPEPWH1gXoc1U0zgE+e0X8lqJyliRB+4q9p40yIma9nXggUFDcpj6s+vIVLQ0ogH20UeeBWcWpr8egMXzbMJKGKI0PKxxUFYhsC3JaT2ZmwxGimaJ09zFPtTDxxGB/V8/J/5jPo1VFvpUY8fXjXIIUs6SWINTlrXo3OBbS7NaFA7b643cWKLBvX+daxaB6VUJY3s3tRJNE9Kwo9EZeOmdAFW8ASlF7cC15RTJoHO4D+f3W42WV5V5AEGRmQuD4SKpt5nSlfMeoaMGgENuN1YAfjXDe2Anl/sishoHl9eF1WPylL/xvpwUUYSqEA1Ll9SJG4hf5dqfqSGFDyoVvHrrGkxIyUOsj/ph4FjuupSS9QrHeY6gesp6iTHvC08wfHLocDBpTfBvvIYaXgLI0o8Wxv38PYrRe3rdnyArk9XJRYFODMQmPJiRZGzm475GtsD9gdjldIZhO7twkky8LEewiuKkWX3uQjOGri9+FeDq+eSqQ6UwN8gjAhtX5RcHVw1EB3CB3VeFGx3nRWoHMdq+68MFx6xwTabNCNXg9zgCACB4n5PJrKoAAF8L9K2YQ6ibVf7xh1aPPppZ+H///Clei6XDanV85WAHBr396xKuLfQGb//2oov6n2uFOdl//6RFGsNYagAAAAA=" alt="" width="50" height="50"
                                loading="lazy" decoding="async" />

                            <div class="testimonial-card__author-info">
                                <p class="testimonial-card__author-name">
                                    John Mans
                                </p>

                                <p class="testimonial-card__author-location">
                                    USA, Nevada
                                </p>
                            </div>
                        </footer>
                    </article>
                </li>
            </ul>
        </div>

        <div class="testimonials-section__footer slider__footer">
            <a class="slider__mobile-action button button--dark" href="/#testimonials">
                View All Testimonials
            </a>

            <p class="slider__counter" aria-live="polite" aria-atomic="true">
                <span class="slider__counter-current" data-js-slider-current>
                    01
                </span>
                of
                <span data-js-slider-total>06</span>
            </p>

            <div class="slider__navigation" aria-label="Testimonials slider controls">
                <button class="slider__button slider__button--previous" type="button" aria-label="Previous testimonial"
                    data-js-slider-prev></button>

                <button class="slider__button slider__button--next" type="button" aria-label="Next testimonial"
                    data-js-slider-next></button>
            </div>
        </div>
    </div>
</section>

<?php
$estateinFaqIblockId = (int)(
    $estateinConfig['faq_iblock_id'] ?? 0
);

$estateinFaqHtml = '';

if ($estateinFaqIblockId > 0) {
    ob_start();

    $APPLICATION->IncludeComponent(
        'bitrix:news.list',
        'home-faq',
        [
            'IBLOCK_ID' => $estateinFaqIblockId,

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

    $estateinFaqHtml = (string)ob_get_clean();
}
?>

<?php if (trim($estateinFaqHtml) !== ''): ?>
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
                            'PATH' => '/local/include/home/faq-content.php',
                            'EDIT_TEMPLATE' => '',
                        ],
                        false
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
            // Готовая разметка компонента: повторно не экранируем.
            echo $estateinFaqHtml;
            ?>
        </div>
    </section>
<?php endif; ?>