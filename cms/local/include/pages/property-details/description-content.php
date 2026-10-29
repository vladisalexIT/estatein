<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$p = $GLOBALS['estateinCurrentProperty'];
?>
<h2 class="property-gallery__info-title" id="property-description-title">Description</h2>
<div class="property-gallery__info-text" data-estatein-ru="<?= htmlspecialcharsbx($GLOBALS['estateinCurrentProperty']['description_ru'] ?: ($GLOBALS['estateinCurrentProperty']['description'] ?? '')) ?>"><p><?= nl2br(htmlspecialcharsbx($p['description'])) ?></p></div>
<dl class="property-gallery__stats">
<?php foreach (['Bedrooms'=>'bedrooms','Bathrooms'=>'bathrooms','Area'=>'size'] as $label=>$key): ?>
<div class="property-gallery__stat"><dt class="property-gallery__stat-label"><?= $label ?></dt>
<dd class="property-gallery__stat-value"><?= htmlspecialcharsbx($p[$key] !== '' ? $p[$key] . ($key === 'size' ? ' sq ft' : '') : 'On request') ?></dd></div>
<?php endforeach; ?>
</dl>
