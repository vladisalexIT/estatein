<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<section
    class="properties-map-wrapper"
    id="properties-map-wrapper"
    data-js-map-wrapper
    aria-labelledby="properties-map-title"
    aria-hidden="true"
>
    <div class="properties-map-wrapper__body">
        <h2
            class="visually-hidden"
            id="properties-map-title"
        >
            Interactive properties map
        </h2>

        <div
            class="properties-map-wrapper__container"
            id="estatein-yandex-map"
            role="region"
            aria-label="Interactive property locations map"
        ></div>
    </div>
</section>
