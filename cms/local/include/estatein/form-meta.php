<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
if (!isset($estateinFormType) || !in_array($estateinFormType, ['contacts', 'property_inquiry', 'property_details', 'newsletter'], true)) {
    return;
}
?>
<?= bitrix_sessid_post() ?>
<input type="hidden" name="form_type" value="<?= htmlspecialcharsbx($estateinFormType) ?>">
<div class="form-honeypot" aria-hidden="true" inert>
    <label>
        Leave this field empty
        <input type="text" name="website" tabindex="-1" autocomplete="off">
    </label>
</div>
