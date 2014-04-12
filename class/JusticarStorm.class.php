<?php

require_once('Ship.class.php');
require_once('Blaster.class.php');

class JusticarStorm extends Ship 
{
	static private $name = 'Justicar Storm';
	static private $PV = 5;
	static private $PP = 10;
	static private $speed = 16;
	static private $shield = 0;

	public function __construct() 
	{
		$this->setName(self::$name);
		$this->setPV(self::$PV); 
		$this->setPP(self::$PP);
		$this->setSpeed(self::$speed); 
		$this->setShield(self::$shield);
		$this->setWeapons(new Blaster());
		return;
	}

	public function init()
	{
		$this->setPP(self::$PP);
		$this->setSpeed(self::$speed); 
		$this->setShield(self::$shield);
		return;
	}

	public function __toString()
	{
		return 'Justicar Storm';
	}

	public static function doc()
	{
		if (file_exists("doc/JusticarStorm.doc.txt"))
			return (file_get_contents("doc/JusticarStorm.doc.txt"));
		return ("File not found : JusticarStorm.doc.txt");
	}
}

?>
