<?php

use GDO\OpenTimes\GDT_OpenHours;

/** @var $field GDT_OpenHours */
?>
<div class="gdt-container gdo-open-times<?=$field->classError();?>">
    <div class="form-label">
        <label<?=$field->htmlForID()?>><?=$field->renderLabel();?></label>
    </div>
    <div class="gdo-open-times-input">
        <div class="gdo-open-times-icon"><?=$field->htmlIcon();?></div>
        <textarea
            class="form-control"
            rows="3"
            spellcheck="false"
            autocomplete="off"
            placeholder="<?=t('open_times_placeholder')?>"
            data-open-times-input
            <?=$field->htmlFocus()?>
            <?=$field->htmlID()?>
            <?=$field->htmlName()?>
            <?=$field->htmlRequired()?>
            <?=$field->htmlDisabled()?>><?=html($field->getVar() ?? '')?></textarea>
    </div>
    <div class="gdo-open-times-presets" aria-label="<?=t('open_times_examples')?>">
        <span><?=t('open_times_examples')?>:</span>
        <button type="button" data-open-times-value="24/7">24/7</button>
        <button type="button" data-open-times-value="Mo-Fr 09:00-18:00">Mo–Fr</button>
        <button type="button" data-open-times-value="Mo-Fr 09:00-18:00; Sa 10:00-14:00">+ Sa</button>
        <button type="button" data-open-times-value="Mo-Su 18:00-02:00"><?=t('open_times_evening')?></button>
    </div>
    <div class="gdo-open-times-help"><?=t('open_times_help')?></div>
    <div class="gdo-open-times-preview" data-open-times-preview aria-live="polite"></div>
    <?=$field->htmlError();?></div>
