<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$p = $GLOBALS['estateinCurrentProperty'];
?>
<h2 class="property-gallery__info-title" id="property-amenities-title">Key Features and Amenities</h2>
<ul class="property-gallery__amenity-list">
<?php foreach ($p['amenities'] ?: ['Amenities available on request'] as $line): ?>
<li class="property-gallery__amenity"><?= htmlspecialcharsbx($line) ?></li>
<?php endforeach; ?></ul>
