<?php
namespace GDO\OpenTimes\Method;

use GDO\Core\GDO;
use GDO\OpenTimes\GDT_OpenHour;
use GDO\OpenTimes\OpenHours;
use ReflectionClass;
use GDO\Cronjob\MethodCronjob;
/**
 * Precompute shop open times.
 * @author gizmore
 */
final class OpenHourCronjob extends MethodCronjob
{
	public function run()
	{
		foreach (get_declared_classes() as $className)
		{
			if (is_subclass_of($className, 'GDO\\Core\\GDO'))
			{
				$class = new ReflectionClass($className);
				if (!$class->isAbstract())
				{
					if ($table = GDO::tableFor($className, false))
					{
					    if (!$table->gdoAbstract())
					    {
					        $this->runForGDO($table);
					    }
					}
				}
			}
		}
	}
	
	private function runForGDO(GDO $table)
	{
		foreach ($table->gdoColumnsCache() as $gdt)
		{
			if ($gdt instanceof GDT_OpenHour)
			{
				$this->runForColumn($table, $gdt);
			}
		}
	}
	
	private function runForColumn(GDO $table, GDT_OpenHour $column)
	{
		$result = $table->select()->exec();
		while ($gdo = $table->fetch($result))
		{
			$hoursText = $gdo->gdoVar($column->hoursColumn);
			$hours = new OpenHours($hoursText);
			$openClose = $hours->isOpen();
			if ($openClose === true)
			{
				$openClose = 'open';
			}
			elseif ($openClose === false)
			{
				$openClose = 'closed';
			}
			else
			{
				$openClose = 'unknown';
			}
			$gdo->saveVar($column->name, $openClose);
		}
	}

	
}


