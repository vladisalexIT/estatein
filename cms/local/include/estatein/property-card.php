<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

if (empty($estateinProperty)) {
    return;
}

$estateinIsCatalogCard =
    ($estateinProperty['variant'] ?? 'featured') === 'catalog';

$estateinCardLabel = trim((string)(
    $estateinProperty['eyebrow'] ?? ''
));
?>

<article class="property-card<?= $estateinIsCatalogCard
                                    ? ' property-card--catalog'
                                    : '' ?>"
    data-property-id="<?= htmlspecialcharsbx(
                            (string)($estateinProperty['id'] ?? '')
                        ) ?>"
    data-property-latitude="<?= isset(
                                $estateinProperty['map_latitude']
                            )
                                ? htmlspecialcharsbx(
                                    (string)json_encode(
                                        $estateinProperty['map_latitude'],
                                        JSON_PRESERVE_ZERO_FRACTION
                                    )
                                )
                                : '' ?>"
    data-property-longitude="<?= isset(
                                    $estateinProperty['map_longitude']
                                )
                                    ? htmlspecialcharsbx(
                                        (string)json_encode(
                                            $estateinProperty['map_longitude'],
                                            JSON_PRESERVE_ZERO_FRACTION
                                        )
                                    )
                                    : '' ?>"
    data-property-location="<?= htmlspecialcharsbx(
                                (string)($estateinProperty['location'] ?? '')
                            ) ?>">
    <img
        class="property-card__image"
        src="<?= htmlspecialcharsbx($estateinProperty['image']) ?>"
        alt="<?= htmlspecialcharsbx($estateinProperty['image_alt']) ?>"
        width="512"
        height="318"
        loading="lazy"
        decoding="async">

    <div class="property-card__body">
        <?php if (
            $estateinIsCatalogCard
            && $estateinCardLabel !== ''
        ): ?>
            <p class="property-card__eyebrow">
                <?= htmlspecialcharsbx($estateinCardLabel) ?>
            </p>
        <?php endif; ?>
        <h3 class="property-card__title" data-estatein-ru="<?= htmlspecialcharsbx($estateinProperty['title_ru'] ?: $estateinProperty['title']) ?>">
            <?= htmlspecialcharsbx($estateinProperty['title']) ?>
        </h3>

        <div class="property-card__description">
            <p>
                <span data-estatein-ru="<?= htmlspecialcharsbx($estateinProperty['description_ru'] ?: $estateinProperty['description']) ?>"><?= htmlspecialcharsbx($estateinProperty['description']) ?></span>
                <a
                    class="property-card__description-link"
                    href="<?= htmlspecialcharsbx($estateinProperty['url']) ?>">
                    Read More
                </a>
            </p>
        </div>

        <?php if (!$estateinIsCatalogCard): ?>
            <ul
                class="property-card__features"
                aria-label="Property characteristics">

                <li class="property-card__feature">
                    <svg
                        class="property-card__feature-icon"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path
                            d="M4 11.5h16M5 11.5V8.8A1.8 1.8 0 0 1 6.8 7h2.4A1.8 1.8 0 0 1 11 8.8v2.7M13 11.5V8.8A1.8 1.8 0 0 1 14.8 7h2.4A1.8 1.8 0 0 1 19 8.8v2.7M4 11.5V17m16-5.5V17M6 17v2m12-2v2"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                        </path>
                    </svg>

                    <span class="property-card__feature-text">
                        <?= htmlspecialcharsbx($estateinProperty['bedrooms']) ?>
                    </span>
                </li>

                <li class="property-card__feature">
                    <svg
                        class="property-card__feature-icon"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path
                            d="M4 13h16M5 13V8a2 2 0 0 1 4 0v1h7a3 3 0 0 1 3 3v1M4 13v4m16-4v4M7 17v2m10-2v2"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                        </path>
                    </svg>

                    <span class="property-card__feature-text">
                        <?= htmlspecialcharsbx($estateinProperty['bathrooms']) ?>
                    </span>
                </li>

                <li class="property-card__feature">
                    <svg
                        class="property-card__feature-icon"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path
                            d="m3.5 11 8.5-7 8.5 7M5.5 9.5V20h13V9.5M9 20v-5h6v5"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                        </path>
                    </svg>

                    <span class="property-card__feature-text">
                        <?= htmlspecialcharsbx($estateinProperty['type']) ?>
                    </span>
                </li>
            </ul>
        <?php endif; ?>

        <div class="property-card__footer">
            <p class="property-card__price">
                <span class="property-card__price-label">
                    Price
                </span>

                <strong class="property-card__price-value">
                    <?= htmlspecialcharsbx($estateinProperty['price']) ?>
                </strong>
            </p>

            <a
                class="property-card__button button button--accent"
                href="<?= htmlspecialcharsbx($estateinProperty['url']) ?>"
                aria-label="View details for <?= htmlspecialcharsbx($estateinProperty['title']) ?>">
                View Property Details
            </a>
        </div>
    </div>
</article>

