<?php

include_once('Blaster.class.php');

class JusticarStorm extends Ship {
	$name = "JusticarStorm";
	$pv = 5;
	$PP = 10;
	$speed = 16;
	$shield = 0;
	$weapons = new Blaster();

	function __construct() {
		$this->setPV($pv); 
		$this->setPP($PP);
		$this->setSpeed($speed); 
		$this->setShield($shield);
		$this->setWeapons($weapons);
		return;
	}

	public static function doc() {
		if (file_exists("doc/JusticarStorm.doc.txt"))
			return (file_get_contents("doc/JusticarStorm.doc.txt"));
		return ("File not found : JusticarStorm.doc.txt");
	}
}

?>
