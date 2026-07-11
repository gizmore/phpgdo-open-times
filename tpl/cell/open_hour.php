<?php

use GDO\OpenTimes\GDT_OpenHour;

/** @var $field GDT_OpenHour */
$value = $field->getValue() ?: 'unknown';
$labels = [
	'open' => 'enum_open',
	'closed' => 'enum_closed',
	'unknown' => 'enum_unknown',
];
?>
<span class="gdo-open-state gdo-open-state-<?=html($value)?>">
    <span class="gdo-open-state-dot" aria-hidden="true"></span>
    <?=t($labels[$value] ?? 'enum_unknown')?>
</span>
