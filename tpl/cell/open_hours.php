<?php

use GDO\OpenTimes\GDT_OpenHours;

/** @var $field GDT_OpenHours */
$value = trim((string)$field->getVar());
if ($value === '')
{
	echo '<span class="gdo-open-times-empty">' . t('open_times_not_set') . '</span>';
	return;
}
$status = $field->isOpen();
$state = $status === true ? 'open' : ($status === false ? 'closed' : 'unknown');
$label = $status === true ? 'enum_open_now' : ($status === false ? 'enum_closed_now' : 'enum_unknown');
?>
<div class="gdo-open-times-cell">
    <span class="gdo-open-state gdo-open-state-<?=html($state)?>">
        <span class="gdo-open-state-dot" aria-hidden="true"></span>
        <?=t($label)?>
    </span>
    <code><?=html($value)?></code>
</div>
