<?php

abstract class Weapon
{
	protected $_name;
	protected $_ammos;
	protected $_small_range;
	protected $_medium_range;
	protected $_long_range;

	/* ---------- Getters ----------*/

	public function getName()
	{
		return $this->_name;
	}

	public function getAmmos()
	{
		return $this->_ammos;
	}

	public function getMediumRange()
	{
		return $this->_medium_range;
	}

	public function getSmallRange()
	{
		return $this->_small_range;
	}

	public function getLongRange()
	{
		return $this->_long_range;
	}

	/* ---------- Setters ----------*/

	public function setName($name)
	{
		$this->_name = $name;
	}

	public function setAmmos($ammos)
	{
		$this->_ammos = $ammos;
	}

	public function setSmallRange($small_range)
	{
		$this->_small_range = $small_range;
	}

	public function setMediumRange($medium_range)
	{
		$this->_medium_range = $medium_range;
	}

	public function setLongRange($long_range)
	{
		$this->_long_range = $long_range;
	}

	/* ---------- Other methods ---------- */

	public function addAmmos($ammos)
	{
		$this->_ammos += $ammos;
	}

	public function openFire()
	{
		if ($this->_ammos > 0)
		{
			print($this->_name . ' is opening fire!' . PHP_EOL);
			$this->_ammos--;
		}
	}

	public static function doc()
	{
		if (file_exists("doc/Weapon.doc.txt"))
			return (file_get_contents("doc/Weapon.doc.txt"));
		return ("File not found : Weapon.doc.txt");
	}
}

?>
