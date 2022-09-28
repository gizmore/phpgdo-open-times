<?php
namespace GDO\OpenTimes;

use GDO\Core\GDT_Enum;

final class GDT_OpenHour extends GDT_Enum
{
	public $writeable = false;
	
	protected function __construct()
	{
		parent::__construct();
		$this->enumValues('open', 'closed', 'unknown');
		$this->initial('unknown');
	}
	
	public $hoursColumn;
	public function hoursColumn($columnName)
	{
		$this->hoursColumn = $columnName;
		return $this;
	}
	
}
