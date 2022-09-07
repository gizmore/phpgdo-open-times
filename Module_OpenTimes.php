<?php
namespace GDO\OpenTimes;

use GDO\Core\GDO_Module;

/**
 * Include open times library.
 * If angular or material is used, angular ctrls will be loaded.
 * @author gizmore
 * @version 6.10.1
 * @since 6.3.0
 */
final class Module_OpenTimes extends GDO_Module
{
	public int $priority = 20;
	public $module_license = "BSD";
	public function onLoadLanguage() : void { $this->loadLanguage('lang/open_times'); }
	
	public function onIncludeScripts() : void
	{
		$this->addBowerJS('opening_hours/build/opening_hours.js');
	}

}
