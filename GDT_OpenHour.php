<?php
namespace GDO\OpenTimes;

use GDO\Core\GDT_Enum;

final class GDT_OpenHour extends GDT_Enum
{

	public bool $writeable = false;
	public $hoursColumn;

	protected function __construct()
	{
		parent::__construct();
		$this->enumValues('open', 'closed', 'unknown');
		$this->initial('unknown');
	}

	public function hoursColumn($columnName)
	{
		$this->hoursColumn = $columnName;
		return $this;
	}

}
