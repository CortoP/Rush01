<?php

require_once('Weapon.class.php');

class DoubleHeavyCannons extends Weapon
{
	private static $name = 'Double Heavy Cannons';
	private static $ammos = 2;
	private static $small_range = 30;
	private static $medium_range = 60;
	private static $long_range = 90;

	public function __construct()
	{
		$this->setName(self::$name);
		$this->setAmmos(self::$ammos);
		$this->setSmallRange(self::$small_range);
		$this->setMediumRange(self::$medium_range);
		$this->setLongRange(self::$long_range);
		return;
	}
	
	public function __destruct()
	{
		return;
	}

	public function __toString()
	{
		return self::$name;
	}

	public function init()
	{
		$this->setAmmos(self::$ammos);
		print('Ammos reinitialized to default value : ' . self::$ammos . PHP_EOL);
		return;
	}

	public static function doc()
	{
		if (file_exists("doc/DoubleHeavyCannons.doc.txt"))
			return (file_get_contents("doc/DoubleHeavyCannons.doc.txt"));
		return ("File not found : DoubleHeavyCannons.doc.txt");
	}
}

?>
