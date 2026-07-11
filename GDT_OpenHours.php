<?php
namespace GDO\OpenTimes;

use GDO\Core\Application;
use GDO\Core\GDT_String;
use GDO\Core\GDT_Template;

class GDT_OpenHours extends GDT_String
{

	public string $icon = 'time';

	protected function __construct()
	{
		parent::__construct();
		$this->max(512);
	}

	public function gdtDefaultLabel(): ?string
	{
		return 'open_times';
	}

	public function renderForm(): string
	{
		return GDT_Template::php('OpenTimes', 'form/open_hours.php', ['field' => $this]);
	}

	public function renderCell(): string
	{
		return GDT_Template::php('OpenTimes', 'cell/open_hours.php', ['field' => $this]);
	}

	public function validate(int|float|string|array|null|object|bool $value): bool
	{
		if (!parent::validate($value))
		{
			return false;
		}
		if ($value === null || trim((string)$value) === '')
		{
			return true;
		}

		// The legacy parser cannot reliably distinguish "closed now" from an
		// invalid expression. Keep validation permissive and let the bundled
		// opening_hours library provide richer client-side feedback.
		return true;
	}

	public function isOpen(int|float|null $time = null): ?bool
	{
		$value = $this->getVar();
		if ($value === null || trim($value) === '')
		{
			return null;
		}
		return (new OpenHours($value))->isOpen($time ?? Application::$TIME);
	}

}
