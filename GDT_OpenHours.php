<?php
namespace GDO\OpenTimes;

use GDO\Core\Application;
use GDO\Core\GDT_Template;
use GDO\Core\GDT_String;

class GDT_OpenHours extends GDT_String
{
	public function defaultLabel() : self { return $this->label('open_times'); }
	
// 	public $editable = true;
// 	public $writeable = true;
	public string $icon = 'time';

	public function renderForm() : string
	{
		return GDT_Template::php('OpenTimes', 'form/open_hours.php', ['field' => $this]);
	}
	
	public function isOpen($time=null)
	{
	    $time = $time === null ? Application::$TIME : $time;
		$oh = $this->getValue();
		$oh->isOpen($time);
	}
	
//	 public function initJSON()
//	 {
//		 return $this->getValue();
//	 }
	
//	 public function getValue()
//	 {
//		 return new OpenHours($this->getValue());
//	 }
	
	public function validate($value) : bool
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
}
