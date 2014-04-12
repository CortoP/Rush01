<?php

include_once('Weapon.class.php');

class Blaster extends Weapon {
	$loads = 0;
	$small_scope = 20;
	$medium_scope = 40;
	$large_scope = 60;

	function __construct() {
		$this->setLoads($loads);
		$this->setSmallScope($small_scope);
		$this->setMediumScope($medium_scope);
		$this->setLargeScope($large_scope);
		return;
	}

	public static function doc() {
		if (file_exists("doc/Blaster.doc.txt"))
			return (file_get_contents("doc/Blaster.doc.txt"));
		return ("File not found : Blaster.doc.txt");
	}
}

?>
