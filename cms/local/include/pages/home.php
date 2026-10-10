<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$estateinConfig = require $_SERVER['DOCUMENT_ROOT']
    . '/local/config/estatein.php';

require_once $_SERVER['DOCUMENT_ROOT']
    . '/local/include/estatein/property-data.php';

$estateinHomeProperties = estateinGetProperties(
    (int)($estateinConfig['properties_iblock_id'] ?? 0)
);
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

            <dl class="hero__stats">
                <div class="hero__stat">
                    <dt class="hero__stat-value">200+</dt>
                    <dd class="hero__stat-label">Happy Customers</dd>
                </div>

                <div class="hero__stat">
                    <dt class="hero__stat-value">10k+</dt>
                    <dd class="hero__stat-label">Properties For Clients</dd>
                </div>

                <div class="hero__stat hero__stat--wide-mobile">
                    <dt class="hero__stat-value">16+</dt>
                    <dd class="hero__stat-label">Years of Experience</dd>
                </div>
            </dl>
        </div>

        <div class="hero__visual">
            <picture>
                <img class="hero__image" src="/local/templates/estatein/assets/hero-ZojPGZk9.webp"
                    alt="Modern Estatein residential and business complex" width="920" height="814" fetchpriority="high"
                    decoding="async">
            </picture>

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
    <ul class="features__list">
        <li class="features__item">
            <a class="feature-card" href="/properties/#property-listings">
                <svg class="feature-card__arrow" width="34" height="34" viewBox="0 0 34 34" fill="none"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6.375 27.625L27.625 6.375M27.625 22.3125V6.375L11.6875 6.375" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="feature-card__icon-wrapper" aria-hidden="true">
                    <img class="feature-card__icon" src="data:image/svg+xml,%3csvg%20width='82'%20height='82'%20viewBox='0%200%2082%2082'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint0_linear_121_1892)'/%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint1_linear_121_1892)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint2_linear_121_1892)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint3_linear_121_1892)'/%3e%3cpath%20d='M28.8937%2036.1058C30.8853%2038.0975%2034.1145%2038.0975%2036.1061%2036.1058C36.3509%2035.8611%2036.5656%2035.5976%2036.7502%2035.3201C37.6639%2036.6941%2039.2261%2037.5996%2040.9999%2037.5996C42.7739%2037.5996%2044.3364%2036.6938%2045.25%2035.3196C45.4347%2035.5973%2045.6495%2035.8609%2045.8944%2036.1059C47.8861%2038.0975%2051.1152%2038.0975%2053.1069%2036.1059C55.0986%2034.1142%2055.0986%2030.885%2053.1069%2028.8934L52.6094%2028.3958C51.9718%2027.7582%2051.107%2027.4%2050.2052%2027.4H31.7953C30.8936%2027.4%2030.0288%2027.7582%2029.3911%2028.3958L28.8937%2028.8933C26.902%2030.885%2026.902%2034.1141%2028.8937%2036.1058Z'%20fill='%23A685FA'/%3e%3cpath%20d='M29.0999%2039.3548C31.5275%2040.5591%2034.4616%2040.3947%2036.7509%2038.8615C37.9654%2039.6741%2039.4269%2040.1496%2040.9999%2040.1496C42.573%2040.1496%2044.0347%2039.674%2045.2493%2038.8612C47.5384%2040.3946%2050.4723%2040.5592%2052.8999%2039.3552V52.05H53.3249C54.0291%2052.05%2054.5999%2052.6208%2054.5999%2053.325C54.5999%2054.0292%2054.0291%2054.6%2053.3249%2054.6H45.6749C44.9707%2054.6%2044.3999%2054.0292%2044.3999%2053.325V47.375C44.3999%2046.6708%2043.8291%2046.1%2043.1249%2046.1H38.8749C38.1707%2046.1%2037.5999%2046.6708%2037.5999%2047.375V53.325C37.5999%2054.0292%2037.0291%2054.6%2036.3249%2054.6H28.6749C27.9707%2054.6%2027.3999%2054.0292%2027.3999%2053.325C27.3999%2052.6208%2027.9707%2052.05%2028.6749%2052.05H29.0999V39.3548Z'%20fill='%23A685FA'/%3e%3cdefs%3e%3clinearGradient%20id='paint0_linear_121_1892'%20x1='6.75'%20y1='86.5'%20x2='85.75'%20y2='-5.5'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint1_linear_121_1892'%20x1='81.75'%20y1='-10.5'%20x2='6.75'%20y2='82'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint2_linear_121_1892'%20x1='3.25'%20y1='13.5'%20x2='71.75'%20y2='72'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint3_linear_121_1892'%20x1='84.25'%20y1='86'%20x2='12.25'%20y2='35'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e" alt="" width="82" height="82">
                </span>

                <span class="feature-card__title">
                    Find Your Dream Home
                </span>
            </a>
        </li>

        <li class="features__item">
            <a class="feature-card" href="/services/#unlock-value">
                <svg class="feature-card__arrow" width="34" height="34" viewBox="0 0 34 34" fill="none"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6.375 27.625L27.625 6.375M27.625 22.3125V6.375L11.6875 6.375" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="feature-card__icon-wrapper" aria-hidden="true">
                    <img class="feature-card__icon" src="data:image/svg+xml,%3csvg%20width='82'%20height='82'%20viewBox='0%200%2082%2082'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint0_linear_121_1916)'/%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint1_linear_121_1916)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint2_linear_121_1916)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint3_linear_121_1916)'/%3e%3cpath%20d='M41%2027.1875C41.5868%2027.1875%2042.0625%2027.6632%2042.0625%2028.25V31.4375C42.0625%2032.0243%2041.5868%2032.5%2041%2032.5C40.4132%2032.5%2039.9375%2032.0243%2039.9375%2031.4375V28.25C39.9375%2027.6632%2040.4132%2027.1875%2041%2027.1875Z'%20fill='%23A685FA'/%3e%3cpath%20d='M34.625%2041C34.625%2037.4792%2037.4792%2034.625%2041%2034.625C44.5208%2034.625%2047.375%2037.4792%2047.375%2041C47.375%2044.5208%2044.5208%2047.375%2041%2047.375C37.4792%2047.375%2034.625%2044.5208%2034.625%2041Z'%20fill='%23A685FA'/%3e%3cpath%20d='M50.767%2032.7356C51.1819%2032.3207%2051.1819%2031.648%2050.767%2031.233C50.3521%2030.8181%2049.6793%2030.8181%2049.2644%2031.233L47.0105%2033.4869C46.5955%2033.9019%2046.5955%2034.5746%2047.0105%2034.9895C47.4254%2035.4045%2048.0982%2035.4045%2048.5131%2034.9895L50.767%2032.7356Z'%20fill='%23A685FA'/%3e%3cpath%20d='M54.8125%2041C54.8125%2041.5868%2054.3368%2042.0625%2053.75%2042.0625H50.5625C49.9757%2042.0625%2049.5%2041.5868%2049.5%2041C49.5%2040.4132%2049.9757%2039.9375%2050.5625%2039.9375H53.75C54.3368%2039.9375%2054.8125%2040.4132%2054.8125%2041Z'%20fill='%23A685FA'/%3e%3cpath%20d='M49.2642%2050.7669C49.6792%2051.1818%2050.3519%2051.1818%2050.7668%2050.7669C51.1818%2050.3519%2051.1818%2049.6792%2050.7668%2049.2643L48.5129%2047.0104C48.098%2046.5954%2047.4253%2046.5954%2047.0103%2047.0104C46.5954%2047.4253%2046.5954%2048.098%2047.0103%2048.513L49.2642%2050.7669Z'%20fill='%23A685FA'/%3e%3cpath%20d='M41%2049.5C41.5868%2049.5%2042.0625%2049.9757%2042.0625%2050.5625V53.75C42.0625%2054.3368%2041.5868%2054.8125%2041%2054.8125C40.4132%2054.8125%2039.9375%2054.3368%2039.9375%2053.75V50.5625C39.9375%2049.9757%2040.4132%2049.5%2041%2049.5Z'%20fill='%23A685FA'/%3e%3cpath%20d='M34.9898%2048.513C35.4047%2048.098%2035.4047%2047.4253%2034.9898%2047.0104C34.5749%2046.5954%2033.9021%2046.5954%2033.4872%2047.0104L31.2333%2049.2643C30.8184%2049.6792%2030.8184%2050.3519%2031.2333%2050.7669C31.6482%2051.1818%2032.321%2051.1818%2032.7359%2050.7669L34.9898%2048.513Z'%20fill='%23A685FA'/%3e%3cpath%20d='M32.5%2041C32.5%2041.5868%2032.0243%2042.0625%2031.4375%2042.0625H28.25C27.6632%2042.0625%2027.1875%2041.5868%2027.1875%2041C27.1875%2040.4132%2027.6632%2039.9375%2028.25%2039.9375H31.4375C32.0243%2039.9375%2032.5%2040.4132%2032.5%2041Z'%20fill='%23A685FA'/%3e%3cpath%20d='M33.487%2034.9895C33.902%2035.4045%2034.5747%2035.4045%2034.9896%2034.9895C35.4046%2034.5746%2035.4046%2033.9019%2034.9896%2033.4869L32.7357%2031.233C32.3208%2030.8181%2031.6481%2030.8181%2031.2331%2031.233C30.8182%2031.648%2030.8182%2032.3207%2031.2331%2032.7356L33.487%2034.9895Z'%20fill='%23A685FA'/%3e%3cdefs%3e%3clinearGradient%20id='paint0_linear_121_1916'%20x1='6.75'%20y1='86.5'%20x2='85.75'%20y2='-5.5'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint1_linear_121_1916'%20x1='81.75'%20y1='-10.5'%20x2='6.75'%20y2='82'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint2_linear_121_1916'%20x1='3.25'%20y1='13.5'%20x2='71.75'%20y2='72'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint3_linear_121_1916'%20x1='84.25'%20y1='86'%20x2='12.25'%20y2='35'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e" alt="" width="82" height="82">
                </span>

                <span class="feature-card__title">
                    Unlock Property Value
                </span>
            </a>
        </li>

        <li class="features__item">
            <a class="feature-card" href="/services/#services-management">
                <svg class="feature-card__arrow" width="34" height="34" viewBox="0 0 34 34" fill="none"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6.375 27.625L27.625 6.375M27.625 22.3125V6.375L11.6875 6.375" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="feature-card__icon-wrapper" aria-hidden="true">
                    <img class="feature-card__icon" src="data:image/svg+xml,%3csvg%20width='82'%20height='82'%20viewBox='0%200%2082%2082'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint0_linear_121_1908)'/%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint1_linear_121_1908)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint2_linear_121_1908)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint3_linear_121_1908)'/%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M25.7002%2028.675C25.7002%2027.9708%2026.271%2027.4%2026.9752%2027.4H44.8252C45.5294%2027.4%2046.1002%2027.9708%2046.1002%2028.675C46.1002%2029.3792%2045.5294%2029.95%2044.8252%2029.95H44.4002V53.325C44.4002%2054.0292%2043.8294%2054.6%2043.1252%2054.6H40.5752C39.871%2054.6%2039.3002%2054.0292%2039.3002%2053.325V49.075C39.3002%2048.3708%2038.7294%2047.8%2038.0252%2047.8H33.7752C33.071%2047.8%2032.5002%2048.3708%2032.5002%2049.075V53.325C32.5002%2054.0292%2031.9294%2054.6%2031.2252%2054.6H26.9752C26.271%2054.6%2025.7002%2054.0292%2025.7002%2053.325C25.7002%2052.6208%2026.271%2052.05%2026.9752%2052.05H27.4002V29.95H26.9752C26.271%2029.95%2025.7002%2029.3792%2025.7002%2028.675ZM30.8002%2033.35C30.8002%2032.8806%2031.1808%2032.5%2031.6502%2032.5H33.3502C33.8196%2032.5%2034.2002%2032.8806%2034.2002%2033.35V35.05C34.2002%2035.5194%2033.8196%2035.9%2033.3502%2035.9H31.6502C31.1808%2035.9%2030.8002%2035.5194%2030.8002%2035.05V33.35ZM31.6502%2039.3C31.1808%2039.3%2030.8002%2039.6806%2030.8002%2040.15V41.85C30.8002%2042.3194%2031.1808%2042.7%2031.6502%2042.7H33.3502C33.8196%2042.7%2034.2002%2042.3194%2034.2002%2041.85V40.15C34.2002%2039.6806%2033.8196%2039.3%2033.3502%2039.3H31.6502ZM37.6002%2033.35C37.6002%2032.8806%2037.9808%2032.5%2038.4502%2032.5H40.1502C40.6196%2032.5%2041.0002%2032.8806%2041.0002%2033.35V35.05C41.0002%2035.5194%2040.6196%2035.9%2040.1502%2035.9H38.4502C37.9808%2035.9%2037.6002%2035.5194%2037.6002%2035.05V33.35ZM38.4502%2039.3C37.9808%2039.3%2037.6002%2039.6806%2037.6002%2040.15V41.85C37.6002%2042.3194%2037.9808%2042.7%2038.4502%2042.7H40.1502C40.6196%2042.7%2041.0002%2042.3194%2041.0002%2041.85V40.15C41.0002%2039.6806%2040.6196%2039.3%2040.1502%2039.3H38.4502Z'%20fill='%23A685FA'/%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M48.2252%2034.2C47.521%2034.2%2046.9502%2034.7708%2046.9502%2035.475V52.9C46.9502%2053.8389%2047.7113%2054.6%2048.6502%2054.6H55.0252C55.7294%2054.6%2056.3002%2054.0292%2056.3002%2053.325C56.3002%2052.6208%2055.7294%2052.05%2055.0252%2052.05H54.6002V36.75H55.0252C55.7294%2036.75%2056.3002%2036.1792%2056.3002%2035.475C56.3002%2034.7708%2055.7294%2034.2%2055.0252%2034.2H48.2252ZM49.0752%2040.15C49.0752%2039.6806%2049.4558%2039.3%2049.9252%2039.3H51.6252C52.0946%2039.3%2052.4752%2039.6806%2052.4752%2040.15V41.85C52.4752%2042.3194%2052.0946%2042.7%2051.6252%2042.7H49.9252C49.4558%2042.7%2049.0752%2042.3194%2049.0752%2041.85V40.15ZM49.9252%2046.1C49.4558%2046.1%2049.0752%2046.4806%2049.0752%2046.95V48.65C49.0752%2049.1194%2049.4558%2049.5%2049.9252%2049.5H51.6252C52.0946%2049.5%2052.4752%2049.1194%2052.4752%2048.65V46.95C52.4752%2046.4806%2052.0946%2046.1%2051.6252%2046.1H49.9252Z'%20fill='%23A685FA'/%3e%3cdefs%3e%3clinearGradient%20id='paint0_linear_121_1908'%20x1='6.75'%20y1='86.5'%20x2='85.75'%20y2='-5.5'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint1_linear_121_1908'%20x1='81.75'%20y1='-10.5'%20x2='6.75'%20y2='82'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint2_linear_121_1908'%20x1='3.25'%20y1='13.5'%20x2='71.75'%20y2='72'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint3_linear_121_1908'%20x1='84.25'%20y1='86'%20x2='12.25'%20y2='35'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e" alt="" width="82"
                        height="82">
                </span>

                <span class="feature-card__title">
                    Effortless Property Management
                </span>
            </a>
        </li>

        <li class="features__item">
            <a class="feature-card" href="/services/#services-investments">
                <svg class="feature-card__arrow" width="34" height="34" viewBox="0 0 34 34" fill="none"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6.375 27.625L27.625 6.375M27.625 22.3125V6.375L11.6875 6.375" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <span class="feature-card__icon-wrapper" aria-hidden="true">
                    <img class="feature-card__icon" src="data:image/svg+xml,%3csvg%20width='82'%20height='82'%20viewBox='0%200%2082%2082'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint0_linear_121_1900)'/%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint1_linear_121_1900)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint2_linear_121_1900)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint3_linear_121_1900)'/%3e%3cpath%20d='M41%2034.625C39.2396%2034.625%2037.8125%2036.0521%2037.8125%2037.8125C37.8125%2039.5729%2039.2396%2041%2041%2041C42.7604%2041%2044.1875%2039.5729%2044.1875%2037.8125C44.1875%2036.0521%2042.7604%2034.625%2041%2034.625Z'%20fill='%23A685FA'/%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M26.125%2030.9062C26.125%2029.4392%2027.3142%2028.25%2028.7812%2028.25H53.2188C54.6858%2028.25%2055.875%2029.4392%2055.875%2030.9062V44.7188C55.875%2046.1858%2054.6858%2047.375%2053.2188%2047.375H28.7812C27.3142%2047.375%2026.125%2046.1858%2026.125%2044.7188V30.9062ZM35.6875%2037.8125C35.6875%2034.8785%2038.066%2032.5%2041%2032.5C43.934%2032.5%2046.3125%2034.8785%2046.3125%2037.8125C46.3125%2040.7465%2043.934%2043.125%2041%2043.125C38.066%2043.125%2035.6875%2040.7465%2035.6875%2037.8125ZM50.5625%2036.75C49.9757%2036.75%2049.5%2037.2257%2049.5%2037.8125V37.8231C49.5%2038.4099%2049.9757%2038.8856%2050.5625%2038.8856H50.5731C51.1599%2038.8856%2051.6356%2038.4099%2051.6356%2037.8231V37.8125C51.6356%2037.2257%2051.1599%2036.75%2050.5731%2036.75H50.5625ZM30.375%2037.8125C30.375%2037.2257%2030.8507%2036.75%2031.4375%2036.75H31.4481C32.0349%2036.75%2032.5106%2037.2257%2032.5106%2037.8125V37.8231C32.5106%2038.4099%2032.0349%2038.8856%2031.4481%2038.8856H31.4375C30.8507%2038.8856%2030.375%2038.4099%2030.375%2037.8231V37.8125Z'%20fill='%23A685FA'/%3e%3cpath%20d='M27.1875%2049.5C26.6007%2049.5%2026.125%2049.9757%2026.125%2050.5625C26.125%2051.1493%2026.6007%2051.625%2027.1875%2051.625C34.8376%2051.625%2042.247%2052.6481%2049.2872%2054.5644C50.9738%2055.0235%2052.6875%2053.7738%2052.6875%2051.9864V50.5625C52.6875%2049.9757%2052.2118%2049.5%2051.625%2049.5H27.1875Z'%20fill='%23A685FA'/%3e%3cdefs%3e%3clinearGradient%20id='paint0_linear_121_1900'%20x1='6.75'%20y1='86.5'%20x2='85.75'%20y2='-5.5'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint1_linear_121_1900'%20x1='81.75'%20y1='-10.5'%20x2='6.75'%20y2='82'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint2_linear_121_1900'%20x1='3.25'%20y1='13.5'%20x2='71.75'%20y2='72'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint3_linear_121_1900'%20x1='84.25'%20y1='86'%20x2='12.25'%20y2='35'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e" alt="" width="82"
                        height="82">
                </span>

                <span class="feature-card__title">
                    Smart Investments, Informed Decisions
                </span>
            </a>
        </li>
    </ul>
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
                <h2 class="section-header__title" id="properties-title">
                    Featured Properties
                </h2>

                <p class="section-header__description">
                    Explore our handpicked selection of featured
                    properties. Each listing offers a glimpse into
                    exceptional homes and investments available
                    through Estatein.
                </p>
            </div>

            <a class="section-header__action button button--dark" href="/properties/">
                View All Properties
            </a>
        </div>

        <div class="properties-section__slider slider swiper" data-js-slider-swiper>
            <ul class="swiper-wrapper">
                <?php foreach ($estateinHomeProperties as $estateinProperty): ?>
                    <li class="swiper-slide">
                        <?php
                        include $_SERVER['DOCUMENT_ROOT']
                            . '/local/include/estatein/property-card.php';
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="properties-section__footer slider__footer">
            <a class="slider__mobile-action button button--dark" href="/properties/">
                View All Properties
            </a>

            <p class="slider__counter" aria-live="polite" aria-atomic="true">
                <span class="slider__counter-current" data-js-slider-current>
                    01
                </span>
                of
                <span data-js-slider-total>06</span>
            </p>

            <div class="slider__navigation" aria-label="Featured properties slider controls">
                <button class="slider__button slider__button--previous" type="button" aria-label="Previous property"
                    data-js-slider-prev></button>

                <button class="slider__button slider__button--next" type="button" aria-label="Next property"
                    data-js-slider-next></button>
            </div>
        </div>
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
                <h2 class="section-header__title" id="testimonials-title">
                    What Our Clients Say
                </h2>

                <p class="section-header__description">
                    Read the success stories and heartfelt testimonials
                    from our valued clients. Discover why they chose
                    Estatein for their real estate needs.
                </p>
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
                <h2
                    class="section-header__title"
                    id="faq-title">
                    Frequently Asked Questions
                </h2>

                <p class="section-header__description">
                    Find answers to common questions about Estatein's
                    services, property listings, and the real estate
                    process. We're here to provide clarity and assist
                    you every step of the way.
                </p>
            </div>

            <a
                class="section-header__action button button--dark"
                href="/#faq">
                View All FAQ’s
            </a>
        </div>

        <div
            class="faq-section__slider slider swiper"
            data-js-slider-swiper>
            <ul class="swiper-wrapper">
                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein">
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                What documents do I need to sell my
                                property through Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Find out about the necessary documentation
                                for listing and selling your property with
                                us.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/services/#unlock-value"
                            aria-label="Read more about documents needed to sell a property">
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How can I contact an Estatein agent?
                            </h3>

                            <p class="faq-card__description">
                                Discover the different ways you can get
                                in touch with our experienced agents.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/contacts/#contact-form"
                            aria-label="Read more about contacting an Estatein agent">
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein">
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein">
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein">
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein">
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein">
                            Read More
                        </a>
                    </article>
                </li>

                <li class="swiper-slide">
                    <article class="faq-card">
                        <div class="faq-card__content">
                            <h3 class="faq-card__title">
                                How do I search for properties on
                                Estatein?
                            </h3>

                            <p class="faq-card__description">
                                Learn how to use our user-friendly search
                                tools to find properties that match your
                                criteria.
                            </p>
                        </div>

                        <a
                            class="faq-card__link button button--gray"
                            href="/properties/"
                            aria-label="Read more about searching for properties on Estatein">
                            Read More
                        </a>
                    </article>
                </li>
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
                <span data-js-slider-total>06</span>
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
    </div>
</section>