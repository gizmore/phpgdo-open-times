<?php
use GDO\OpenTimes\GDT_OpenHours;
/** @var $field GDT_OpenHours **/
?>
<div class="gdt-container<?= $field->classError(); ?>">
  <?= $field->htmlIcon(); ?>
  <label <?=$field->htmlForID()?>><?= $field->displayLabel(); ?></label>
  <textarea
   <?=$field->htmlID()?>
   <?=$field->htmlName()?>
   <?=$field->htmlRequired()?>
   <?=$field->htmlDisabled()?>><?=$field->renderVar()?></textarea>
  <?= $field->htmlError(); ?>
</div>
