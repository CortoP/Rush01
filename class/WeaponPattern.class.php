<?php

require_once('Weapon.class.php');

class Name extends Weapon // Remplacer Name par le nom de votre arme
{
	private static $name = 'Name'; // La meme mais avec des espaces si besoin
	private static $ammos = 2; // Nombre de munitions >= 0
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
		if (file_exists("doc/.doc.txt")) // Mettre le nom de la classe avant le .doc
			return (file_get_contents("doc/.doc.txt"));
		return ("File not found : .doc.txt");
	}
}

?>
