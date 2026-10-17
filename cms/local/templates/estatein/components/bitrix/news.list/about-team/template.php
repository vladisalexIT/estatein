<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (empty($arResult['ITEMS'])) {
    return;
}

$normalizeUrl = static function (string $value): string {
    $url = trim($value);

    if ($url === '') {
        return '';
    }

    if (preg_match('/[\x00-\x20\x7F]/', $url)) {
        return '';
    }

    if (strpos($url, '\\') !== false) {
        return '';
    }

    if ($url[0] === '/') {
        return strpos($url, '//') === 0 ? '' : $url;
    }

    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        return '';
    }

    $parts = parse_url($url);

    if (!is_array($parts)) {
        return '';
    }

    if (strtolower((string)($parts['scheme'] ?? '')) !== 'https') {
        return '';
    }

    if (
        empty($parts['host'])
        || isset($parts['user'])
        || isset($parts['pass'])
    ) {
        return '';
    }

    return $url;
};
?>

<ul class="about-team__list" role="list">
    <?php foreach ($arResult['ITEMS'] as $arItem): ?>
        <?php
        $name = trim((string)($arItem['NAME'] ?? ''));

        $position = trim(
            (string)($arItem['PROPERTIES']['POSITION']['VALUE'] ?? '')
        );

        $photoId = (int)(
            $arItem['PROPERTIES']['PHOTO']['VALUE'] ?? 0
        );

        if ($name === '' || $photoId <= 0) {
            continue;
        }

        $resizedPhoto = CFile::ResizeImageGet(
            $photoId,
            [
                'width' => 634,
                'height' => 506,
            ],
            BX_RESIZE_IMAGE_EXACT,
            true
        );

        $imageSrc = (string)($resizedPhoto['src'] ?? '');

        if ($imageSrc === '') {
            $imageSrc = (string)CFile::GetPath($photoId);
        }

        if ($imageSrc === '') {
            continue;
        }

        $socialUrl = $normalizeUrl(
            (string)(
                $arItem['PROPERTIES']['SOCIAL_URL']['VALUE'] ?? ''
            )
        );

        $contactUrl = $normalizeUrl(
            (string)(
                $arItem['PROPERTIES']['CONTACT_URL']['VALUE'] ?? ''
            )
        );

        $this->AddEditAction(
            $arItem['ID'],
            $arItem['EDIT_LINK'],
            CIBlock::GetArrayByID(
                $arItem['IBLOCK_ID'],
                'ELEMENT_EDIT'
            )
        );

        $teamItemEditAreaId = $this->GetEditAreaId(
            $arItem['ID']
        );
        ?>

        <li
            class="about-team__item"
            id="<?= htmlspecialcharsbx($teamItemEditAreaId) ?>">

            <article class="team-card">
                <div class="team-card__media">
                    <img
                        class="team-card__image"
                        src="<?= htmlspecialcharsbx($imageSrc) ?>"
                        alt="<?= htmlspecialcharsbx($name) ?>"
                        width="317"
                        height="253"
                        loading="lazy"
                        decoding="async">
                </div>

                <?php if ($socialUrl !== ''): ?>
                    <a
                        class="team-card__social-link"
                        href="<?= htmlspecialcharsbx($socialUrl) ?>"
                        aria-label="Social profile of <?= htmlspecialcharsbx($name) ?>">
                        <img
                            src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M7.55016%2021.75C16.6045%2021.75%2021.5583%2014.2467%2021.5583%207.74186C21.5583%207.53092%2021.5536%207.3153%2021.5442%207.10436C22.5079%206.40746%2023.3395%205.54425%2024%204.5553C23.1025%204.9546%2022.1496%205.21538%2021.1739%205.32874C22.2013%204.71291%2022.9705%203.74547%2023.3391%202.60577C22.3726%203.17856%2021.3156%203.58261%2020.2134%203.80061C19.4708%203.01156%2018.489%202.48912%2017.4197%202.31405C16.3504%202.13899%2015.2532%202.32105%2014.2977%202.8321C13.3423%203.34314%2012.5818%204.15471%2012.1338%205.14131C11.6859%206.12792%2011.5754%207.23462%2011.8195%208.2903C9.86249%208.19209%207.94794%207.6837%206.19998%206.7981C4.45203%205.91249%202.90969%204.66944%201.67297%203.14952C1.0444%204.23324%200.852057%205.51565%201.13503%206.73609C1.418%207.95654%202.15506%209.02345%203.19641%209.71999C2.41463%209.69517%201.64998%209.48468%200.965625%209.10592V9.16686C0.964925%2010.3041%201.3581%2011.4066%202.07831%2012.2868C2.79852%2013.167%203.80132%2013.7706%204.91625%2013.995C4.19206%2014.1931%203.43198%2014.222%202.69484%2014.0794C3.00945%2015.0574%203.62157%2015.9129%204.44577%2016.5263C5.26997%2017.1398%206.26512%2017.4806%207.29234%2017.5012C5.54842%2018.8711%203.39417%2019.6141%201.17656%2019.6106C0.783287%2019.61%200.390399%2019.5859%200%2019.5384C2.25286%2020.9837%204.87353%2021.7514%207.55016%2021.75Z'%20fill='white'/%3e%3c/svg%3e"
                            alt=""
                            width="20"
                            height="20"
                            aria-hidden="true">
                    </a>
                <?php endif; ?>

                <div class="team-card__info">
                    <h3 class="team-card__name">
                        <?= htmlspecialcharsbx($name) ?>
                    </h3>

                    <?php if ($position !== ''): ?>
                        <p class="team-card__role">
                            <?= htmlspecialcharsbx($position) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if ($contactUrl !== ''): ?>
                    <a
                        class="team-card__contact-link"
                        href="<?= htmlspecialcharsbx($contactUrl) ?>"
                        aria-label="Send a message to <?= htmlspecialcharsbx($name) ?>">
                        <span class="team-card__contact-text">
                            Say Hello <span aria-hidden="true">👋</span>
                        </span>

                        <span
                            class="team-card__contact-icon"
                            aria-hidden="true">
                            <img
                                src="data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M21.4274%202.5783C20.9274%202.0673%2020.1874%201.8783%2019.4974%202.0783L3.40742%206.7273C2.67942%206.9293%202.16342%207.5063%202.02442%208.2383C1.88242%208.9843%202.37842%209.9323%203.02642%2010.3283L8.05742%2013.4003C8.57342%2013.7163%209.23942%2013.6373%209.66642%2013.2093L15.4274%207.4483C15.7174%207.1473%2016.1974%207.1473%2016.4874%207.4483C16.7774%207.7373%2016.7774%208.2083%2016.4874%208.5083L10.7164%2014.2693C10.2884%2014.6973%2010.2084%2015.3613%2010.5234%2015.8783L13.5974%2020.9283C13.9574%2021.5273%2014.5774%2021.8683%2015.2574%2021.8683C15.3374%2021.8683%2015.4274%2021.8683%2015.5074%2021.8573C16.2874%2021.7583%2016.9074%2021.2273%2017.1374%2020.4773L21.9074%204.5083C22.1174%203.8283%2021.9274%203.0883%2021.4274%202.5783Z'%20fill='white'/%3e%3cpath%20opacity='0.4'%20d='M9.45139%2019.1423C9.74339%2019.4353%209.74339%2019.9103%209.45139%2020.2033L8.08539%2021.5683C7.93939%2021.7153%207.74739%2021.7883%207.55539%2021.7883C7.36339%2021.7883%207.17139%2021.7153%207.02539%2021.5683C6.73239%2021.2753%206.73239%2020.8013%207.02539%2020.5083L8.39039%2019.1423C8.68339%2018.8503%209.15839%2018.8503%209.45139%2019.1423ZM8.66769%2015.3543C8.95969%2015.6473%208.95969%2016.1223%208.66769%2016.4153L7.30169%2017.7803C7.15569%2017.9273%206.96369%2018.0003%206.77169%2018.0003C6.57969%2018.0003%206.38769%2017.9273%206.24169%2017.7803C5.94869%2017.4873%205.94869%2017.0133%206.24169%2016.7203L7.60669%2015.3543C7.89969%2015.0623%208.37469%2015.0623%208.66769%2015.3543Z'%20fill='white'/%3e%3c/svg%3e"
                                alt=""
                                width="18"
                                height="18">
                        </span>
                    </a>
                <?php endif; ?>
            </article>
        </li>
    <?php endforeach; ?>
</ul>