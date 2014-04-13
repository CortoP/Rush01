<?php

require_once('Ship.class.php');
require_once('.class.php'); // Mettre la classe de l'arme que vous voulez pour le ship

class Name extends Ship // Remplacer Name par le nom badass de votre ship
{
	private static $name = 'Name'; // La meme mais avec des espaces si besoin
	private static $PV = 5; // Mettre les valeurs de chaque attribut pour votre ship
	private static $PP = 10; // Comparer les valeurs avec les ships existants
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
		$this->setWeapons(new WeaponName()); // Remplacer WeaponName par le nom de la classe de l'arme souhaitee
		print('Justicar Storm at your command, sir' . PHP_EOL); // Just for fun
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
		print('PP reinitialized to default value : ' . self::$PP. PHP_EOL);
		print('Speed reinitialized to default value : ' . self::$speed . PHP_EOL);
		print('Shield reinitialized to default value : ' . self::$shield . PHP_EOL);
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
