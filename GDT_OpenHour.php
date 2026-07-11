<?php
namespace GDO\OpenTimes;

use GDO\Core\GDT_Enum;
use GDO\Core\GDT_Template;

final class GDT_OpenHour extends GDT_Enum
{

	public bool $writeable = false;
	public ?string $hoursColumn = null;

	protected function __construct()
	{
		parent::__construct();
		$this->enumValues('open', 'closed', 'unknown');
		$this->initial('unknown');
	}

	public function hoursColumn(string $columnName): self
	{
		$this->hoursColumn = $columnName;
		return $this;
	}

	public function renderCell(): string
	{
		return GDT_Template::php('OpenTimes', 'cell/open_hour.php', ['field' => $this]);
	}

}
