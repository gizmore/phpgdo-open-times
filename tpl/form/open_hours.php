<?php
use GDO\OpenTimes\GDT_OpenHours;
/** @var $field GDT_OpenHours **/
?>
<div class="gdt-container<?= $field->classError(); ?>">
  <?= $field->htmlIcon(); ?>
  <label <?=$field->htmlForID()?>><?= $field->displayLabel(); ?></label>
  <textarea
   <?=$field->htmlID()?>
   <?=$field->htmlFormName()?>
   <?=$field->htmlRequired()?>
   <?=$field->htmlDisabled()?>><?=$field->display()?></textarea>
  <?= $field->htmlError(); ?>
</div>
