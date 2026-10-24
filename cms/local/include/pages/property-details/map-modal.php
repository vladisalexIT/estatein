<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<dialog
    class="property-map-overlay"
    id="property-map-dialog"
    data-js-map-dialog
    data-catalog-url="<?= htmlspecialcharsbx(SITE_DIR . 'properties/') ?>"
    aria-labelledby="property-map-modal-title"
>
    <div class="property-map-modal">
        <button
            class="property-map-modal__close"
            data-js-map-close
            type="button"
            aria-label="Close interactive map"
        >
            &times;
        </button>

        <h2
            class="visually-hidden"
            id="property-map-modal-title"
        >
            Interactive property map
        </h2>

        <div class="property-map-modal__split-layout">
            <aside
                class="property-map-modal__side-panel"
                aria-label="Available properties"
            >
                <ul
                    class="property-map-modal__list"
                    data-js-modal-cards-list
                ></ul>
            </aside>

            <div
                class="property-map-modal__map-zone"
                role="region"
                aria-label="Property locations on map"
            >
                <div id="estatein-modal-yandex-map"></div>
            </div>
        </div>
    </div>
</dialog>
