<?php

require_once('Weapon.class.php');

class Blaster extends Weapon
{
	private static $name = 'Blaster';
	private static $ammos = 0;
	private static $small_range = 20;
	private static $medium_range = 40;
	private static $long_range = 60;

	public function __construct()
	{
		$this->setName(self::$name);
		$this->setAmmos(self::$ammos);
		$this->setSmallRange(self::$small_range);
		$this->setMediumRange(self::$medium_range);
		$this->setLongRange(self::$long_range);
		return;
	}

	public function init()
	{
		$this->setAmmos(self::$ammos);
		return;
	}
	
	public function __toString()
	{
		return 'Blaster';
	}

	public static function doc()
	{
		if (file_exists("doc/Blaster.doc.txt"))
			return (file_get_contents("doc/Blaster.doc.txt"));
		return ("File not found : Blaster.doc.txt");
	}
}

?>
