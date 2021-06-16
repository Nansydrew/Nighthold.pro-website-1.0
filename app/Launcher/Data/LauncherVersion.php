<?php

namespace App\Launcher\Data;

class LauncherVersion
{
	public $major;
	public $minor;
	public $codeChanges;
	public $build;

	public function __construct(string $line)
	{
		list($ma, $mn, $cc, $b) = explode('.', $line);

		$major = $ma;
		$minor = $mn;
		$codeChanges = $cc;
		$build = $b;
	}

	public function compare(string $v2)
	{
		return compare($this, new LauncherVersion($v2));
	}
	public function compare(string $v1, string $v2)
	{
		return compare(new LauncherVersion($v1), new LauncherVersion($v2));
	}
	public function compare(LauncherVersion $v2)
	{
		return compare($this, $v2);
	}
	public function compare(LauncherVersion $v1, LauncherVersion $v2)
	{
		if($v1->major > $v2->major) 			return true;
		if($v1->minor > $v2->minor) 			return true;
		if($v1->codeChanges > $v2->codeChanges) return true;
		if($v1->build > $v2->build) 			return true;

		return false;
	}
}