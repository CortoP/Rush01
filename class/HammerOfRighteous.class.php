<?php

require_once('Ship.class.php');
require_once('DoubleHeavyCannons.class.php');

class HammerOfRighteous extends Ship
{
	private static $name = 'Hammer of Righteous';
	private static $PV = 8;
	private static $PP = 12;
	private static $speed = 10;
	private static $shield = 3;
	private static $long = 9;
	private static $wide = 2;

	public function __construct()
	{
		$this->setName(self::$name);
		$this->setPV(self::$PV);
		$this->setPP(self::$PP);
		$this->setSpeed(self::$speed);
		$this->setShield(self::$shield);
		$this->setLong(self::$long);
		$this->setWide(self::$wide);
		$this->setWeapons(new DoubleHeavyCannons());
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
		$this->setPP(self::$PP);
		$this->setSpeed(self::$speed);
		$this->setShield(self::$shield);
		$this->getWeapons()->init();
		print('PP reinitialized to default value : ' . self::$PP. PHP_EOL);
		print('Speed reinitialized to default value : ' . self::$speed . PHP_EOL);
		print('Shield reinitialized to default value : ' . self::$shield . PHP_EOL);
		return;
	}

	public static function doc()
	{
		if (file_exists("doc/HammerOfRighteous.doc.txt"))
			return (file_get_contents("doc/HammerOfRighteous.doc.txt"));
		return ("File not found : HammerOfRighteous.doc.txt");
	}
}

?>
