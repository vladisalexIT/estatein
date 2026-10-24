<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<ul class="contact-hero__list" aria-label="Estatein contact options">
    <li class="contact-hero__item">
        <a
            class="contact-card"
            href="<?= htmlspecialcharsbx('mailto:' . $estateinContacts['email']) ?>"
            aria-label="<?= htmlspecialcharsbx('Email Estatein at ' . $estateinContacts['email']) ?>">
            <svg class="contact-card__arrow" width="34" height="34" viewBox="0 0 34 34" fill="none"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M6.375 27.625 27.625 6.375M27.625 22.3125V6.375H11.6875" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <span class="contact-card__icon-wrapper" aria-hidden="true">
                <img class="contact-card__icon" src="data:image/svg+xml,%3csvg%20width='82'%20height='82'%20viewBox='0%200%2082%2082'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint0_linear_104_12838)'/%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint1_linear_104_12838)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint2_linear_104_12838)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint3_linear_104_12838)'/%3e%3cpath%20d='M26.125%2036.2812V48.4375C26.125%2050.7847%2028.0278%2052.6875%2030.375%2052.6875H51.625C53.9722%2052.6875%2055.875%2050.7847%2055.875%2048.4375V36.2812L43.2274%2044.0644C41.8614%2044.905%2040.1386%2044.905%2038.7726%2044.0644L26.125%2036.2812Z'%20fill='%23A685FA'/%3e%3cpath%20d='M55.875%2033.7861V33.5625C55.875%2031.2153%2053.9722%2029.3125%2051.625%2029.3125H30.375C28.0278%2029.3125%2026.125%2031.2153%2026.125%2033.5625V33.7861L39.8863%2042.2546C40.5693%2042.6749%2041.4307%2042.6749%2042.1137%2042.2546L55.875%2033.7861Z'%20fill='%23A685FA'/%3e%3cdefs%3e%3clinearGradient%20id='paint0_linear_104_12838'%20x1='6.75'%20y1='86.5'%20x2='85.75'%20y2='-5.5'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint1_linear_104_12838'%20x1='81.75'%20y1='-10.5'%20x2='6.75'%20y2='82'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint2_linear_104_12838'%20x1='3.25'%20y1='13.5'%20x2='71.75'%20y2='72'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint3_linear_104_12838'%20x1='84.25'%20y1='86'%20x2='12.25'%20y2='35'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e" alt="" width="82" height="82"
                    loading="lazy" decoding="async" />
            </span>

            <span class="contact-card__title">
                <?= htmlspecialcharsbx($estateinContacts['email']) ?>
            </span>
        </a>
    </li>

    <li class="contact-hero__item">
        <a
            class="contact-card"
            href="<?= htmlspecialcharsbx('tel:' . $estateinContacts['phone_href']) ?>"
            aria-label="<?= htmlspecialcharsbx('Call Estatein at ' . $estateinContacts['phone_display']) ?>">
            <svg class="contact-card__arrow" width="34" height="34" viewBox="0 0 34 34" fill="none"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M6.375 27.625 27.625 6.375M27.625 22.3125V6.375H11.6875" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <span class="contact-card__icon-wrapper" aria-hidden="true">
                <img class="contact-card__icon" src="data:image/svg+xml,%3csvg%20width='82'%20height='82'%20viewBox='0%200%2082%2082'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint0_linear_104_12846)'/%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint1_linear_104_12846)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint2_linear_104_12846)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint3_linear_104_12846)'/%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M26.125%2030.375C26.125%2028.0278%2028.0278%2026.125%2030.375%2026.125H32.3181C33.537%2026.125%2034.5995%2026.9545%2034.8951%2028.137L36.4616%2034.4032C36.7208%2035.44%2036.3334%2036.5312%2035.4784%2037.1724L33.6458%2038.5469C33.4555%2038.6896%2033.4141%2038.8986%2033.4676%2039.0446C35.0762%2043.4359%2038.5641%2046.9238%2042.9554%2048.5324C43.1014%2048.5859%2043.3104%2048.5445%2043.4531%2048.3542L44.8276%2046.5216C45.4688%2045.6666%2046.56%2045.2792%2047.5968%2045.5384L53.863%2047.1049C55.0455%2047.4005%2055.875%2048.463%2055.875%2049.6819V51.625C55.875%2053.9722%2053.9722%2055.875%2051.625%2055.875H48.4375C36.1146%2055.875%2026.125%2045.8854%2026.125%2033.5625V30.375Z'%20fill='%23A685FA'/%3e%3cdefs%3e%3clinearGradient%20id='paint0_linear_104_12846'%20x1='6.75'%20y1='86.5'%20x2='85.75'%20y2='-5.5'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint1_linear_104_12846'%20x1='81.75'%20y1='-10.5'%20x2='6.75'%20y2='82'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint2_linear_104_12846'%20x1='3.25'%20y1='13.5'%20x2='71.75'%20y2='72'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint3_linear_104_12846'%20x1='84.25'%20y1='86'%20x2='12.25'%20y2='35'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e" alt="" width="82" height="82"
                    loading="lazy" decoding="async" />
            </span>

            <span class="contact-card__title">
                <?= htmlspecialcharsbx($estateinContacts['phone_display']) ?>
            </span>
        </a>
    </li>

    <li class="contact-hero__item">
        <a
            class="contact-card"
            href="<?= htmlspecialcharsbx($estateinContacts['maps_url']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            aria-label="<?= htmlspecialcharsbx(
                            'Open '
                                . $estateinContacts['hq_label']
                                . ' in Google Maps'
                        ) ?>">
            <svg class="contact-card__arrow" width="34" height="34" viewBox="0 0 34 34" fill="none"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M6.375 27.625 27.625 6.375M27.625 22.3125V6.375H11.6875" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <span class="contact-card__icon-wrapper" aria-hidden="true">
                <img class="contact-card__icon" src="data:image/svg+xml,%3csvg%20width='82'%20height='82'%20viewBox='0%200%2082%2082'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint0_linear_104_12854)'/%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint1_linear_104_12854)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint2_linear_104_12854)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint3_linear_104_12854)'/%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M40.348%2055.664C40.3908%2055.6888%2040.4244%2055.7079%2040.4482%2055.7213L40.4878%2055.7434C40.8035%2055.9167%2041.1952%2055.9154%2041.5112%2055.7439L41.5518%2055.7213C41.5756%2055.7079%2041.6092%2055.6888%2041.652%2055.664C41.7376%2055.6144%2041.8599%2055.5421%2042.0136%2055.4474C42.321%2055.2582%2042.7549%2054.9791%2043.2732%2054.6129C44.308%2053.8819%2045.6888%2052.7972%2047.0726%2051.3804C49.8268%2048.5605%2052.6875%2044.3237%2052.6875%2038.875C52.6875%2032.4202%2047.4548%2027.1875%2041%2027.1875C34.5452%2027.1875%2029.3125%2032.4202%2029.3125%2038.875C29.3125%2044.3237%2032.1732%2048.5605%2034.9274%2051.3804C36.3112%2052.7972%2037.692%2053.8819%2038.7268%2054.6129C39.2451%2054.9791%2039.679%2055.2582%2039.9864%2055.4474C40.1401%2055.5421%2040.2624%2055.6144%2040.348%2055.664ZM41%2043.125C43.3472%2043.125%2045.25%2041.2222%2045.25%2038.875C45.25%2036.5278%2043.3472%2034.625%2041%2034.625C38.6528%2034.625%2036.75%2036.5278%2036.75%2038.875C36.75%2041.2222%2038.6528%2043.125%2041%2043.125Z'%20fill='%23A685FA'/%3e%3cdefs%3e%3clinearGradient%20id='paint0_linear_104_12854'%20x1='6.75'%20y1='86.5'%20x2='85.75'%20y2='-5.5'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint1_linear_104_12854'%20x1='81.75'%20y1='-10.5'%20x2='6.75'%20y2='82'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint2_linear_104_12854'%20x1='3.25'%20y1='13.5'%20x2='71.75'%20y2='72'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint3_linear_104_12854'%20x1='84.25'%20y1='86'%20x2='12.25'%20y2='35'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e" alt="" width="82" height="82"
                    loading="lazy" decoding="async" />
            </span>

            <span class="contact-card__title">
                <?= htmlspecialcharsbx($estateinContacts['hq_label']) ?>
            </span>
        </a>
    </li>

    <li class="contact-hero__item">
        <article class="contact-card contact-card--socials" aria-labelledby="contact-socials-title">
            <svg class="contact-card__arrow" width="34" height="34" viewBox="0 0 34 34" fill="none"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M6.375 27.625 27.625 6.375M27.625 22.3125V6.375H11.6875" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <span class="contact-card__icon-wrapper" aria-hidden="true">
                <img class="contact-card__icon" src="data:image/svg+xml,%3csvg%20width='82'%20height='82'%20viewBox='0%200%2082%2082'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint0_linear_104_13261)'/%3e%3crect%20x='0.5'%20y='0.5'%20width='81'%20height='81'%20rx='40.5'%20stroke='url(%23paint1_linear_104_13261)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint2_linear_104_13261)'/%3e%3crect%20x='10.5'%20y='10.5'%20width='61'%20height='61'%20rx='30.5'%20stroke='url(%23paint3_linear_104_13261)'/%3e%3cpath%20d='M41%2055C33.2689%2055%2027%2048.7311%2027%2041H41V55Z'%20fill='%23A685FA'/%3e%3cpath%20d='M27%2027C34.7311%2027%2041%2033.2689%2041%2041H27V27Z'%20fill='%23A685FA'/%3e%3cpath%20d='M41%2055C48.7311%2055%2055%2048.7311%2055%2041H41V55Z'%20fill='%23A685FA'/%3e%3cpath%20d='M55%2041C55%2033.2689%2048.7311%2027%2041%2027V41H55Z'%20fill='%23A685FA'/%3e%3cdefs%3e%3clinearGradient%20id='paint0_linear_104_13261'%20x1='6.75'%20y1='86.5'%20x2='85.75'%20y2='-5.5'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint1_linear_104_13261'%20x1='81.75'%20y1='-10.5'%20x2='6.75'%20y2='82'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint2_linear_104_13261'%20x1='3.25'%20y1='13.5'%20x2='71.75'%20y2='72'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.323723'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3clinearGradient%20id='paint3_linear_104_13261'%20x1='84.25'%20y1='86'%20x2='12.25'%20y2='35'%20gradientUnits='userSpaceOnUse'%3e%3cstop%20stop-color='%23A685FA'/%3e%3cstop%20offset='0.576615'%20stop-color='%23A685FA'%20stop-opacity='0'/%3e%3c/linearGradient%3e%3c/defs%3e%3c/svg%3e" alt="" width="82" height="82"
                    loading="lazy" decoding="async" />
            </span>

            <h2 class="visually-hidden" id="contact-socials-title">
                Estatein social media
            </h2>

            <?php if ($estateinContacts['social_links'] !== []): ?>
                <nav
                    class="contact-card__socials-wrapper"
                    aria-label="Estatein social media">
                    <ul class="contact-card__socials-list">
                        <?php foreach (
                            $estateinContacts['social_links'] as $estateinSocial
                        ): ?>
                            <li>
                                <a
                                    class="contact-card__social-link"
                                    href="<?= htmlspecialcharsbx($estateinSocial['url']) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer">
                                    <?= htmlspecialcharsbx($estateinSocial['label']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            <?php else: ?>
                <span class="contact-card__title">
                    Social links will be available soon.
                </span>
            <?php endif; ?>
        </article>
    </li>
</ul>