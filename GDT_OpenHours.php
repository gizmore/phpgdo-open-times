<?php
namespace GDO\OpenTimes;

use GDO\Core\Application;
use GDO\Core\GDT_String;
use GDO\Core\GDT_Template;

class GDT_OpenHours extends GDT_String
{

	public string $icon = 'time';

	public function gdtDefaultLabel(): ?string
    { return 'open_times'; }

	public function renderForm(): string
	{
		return GDT_Template::php('OpenTimes', 'form/open_hours.php', ['field' => $this]);
	}

	public function validate(int|float|string|array|null|object|bool $value): bool
	{
		if (!parent::validate($value))
		{
			return false;
		}
		if ($value === null)
		{
			return true;
		}
		$ot = new OpenHours($value);
		return $ot->isOpen() !== null;
	}

//	 public function initJSON()
//	 {
//		 return $this->getValue();
//	 }

//	 public function getValue()
//	 {
//		 return new OpenHours($this->getValue());
//	 }

	public function isOpen($time = null)
	{
		$time = $time === null ? Application::$TIME : $time;
		$oh = $this->getValue();
		$oh->isOpen($time);
	}

}
