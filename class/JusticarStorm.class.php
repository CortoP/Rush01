<?php

require_once('Ship.class.php');
require_once('Blaster.class.php');

class JusticarStorm extends Ship
{
	private static $name = 'Justicar Storm';
	private static $PV = 5;
	private static $PP = 10;
	private static $speed = 16;
	private static $shield = 0;
	private static $long = 5;
	private static $wide = 1;

	public function __construct()
	{
		$this->setName(self::$name);
		$this->setPV(self::$PV);
		$this->setPP(self::$PP);
		$this->setSpeed(self::$speed);
		$this->setShield(self::$shield);
		$this->setLong(self::$long);
		$this->setWide(self::$wide);
		$this->setState('activable');
		$this->setWeapons(new Blaster());
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
		if (file_exists("doc/JusticarStorm.doc.txt"))
			return (file_get_contents("doc/JusticarStorm.doc.txt"));
		return ("File not found : JusticarStorm.doc.txt");
	}
}

?>
