<?php

abstract class Weapon
{
	protected $_name;
	protected $_ammos;
	protected $_small_range;
	protected $_medium_range;
	protected $_long_range;
	protected $_actionField;

	function getName()
	{
		return $this->_name;
	}

	function getAmmos()
	{
		return $this->_ammos;
	}

	function getMediumRange()
	{
		return $this->_medium_range;
	}

	function getSmallRange()
	{
		return $this->_small_range;
	}

	function getLongRange()
	{
		return $this->_long_range;
	}

	function setName($name)
	{
		$this->_name = $name;
	}

	function setAmmos($ammos)
	{
		$this->_ammos = $ammos;
	}

	function setSmallRange($small_range)
	{
		$this->_small_range = $small_range;
	}

	function setMediumRange($medium_range)
	{
		$this->_medium_range = $medium_range;
	}

	function setLongRange($long_range)
	{
		$this->_long_range = $long_range;
	}

	function addAmmos($ammos)
	{
		$this->_ammos += $ammos;
		print('Ammos added' . PHP_EOL);
	}

	public static function doc() {
		if (file_exists("doc/Weapon.doc.txt"))
			return (file_get_contents("doc/Weapon.doc.txt"));
		return ("File not found : Weapon.doc.txt");
	}
}

?>
