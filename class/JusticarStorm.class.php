<?php

require_once('Ship.class.php');
require_once('Blaster.class.php');
require_once('Dice.trait.php');

class JusticarStorm extends Ship 
{
	use Dice;
	private static $name = 'Justicar Storm';
	private static $PV = 5;
	private static $PP = 10;
	private static $speed = 16;
	private static $shield = 0;

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

	public function increaseShield($PP)
	{
		if ($PP > $this->_PP)
			print('Not enough PP' . PHP_EOL);
		else
		{
			$this->_shield += $PP;
			$this->_PP -= $PP;
			print('Shield has been increased by ' . $PP . PHP_EOL);
		}
	}

	public function increaseSpeed($PP)
	{
		if ($PP > $this->_PP)
			print('Not enough PP' . PHP_EOL);
		else
		{
			$this->_PP -= $PP;
			while ($PP > 0)
			{
				$total += $this->roll();
				$PP--;
			}
			$this->_speed += $total;
			print('Speed has been increased by ' . $total . PHP_EOL);
		}
	}

	public function increaseCharges($PP)
	{
		if ($PP > $this->_PP)
			print('Not enough PP' . PHP_EOL);
		else
		{
			$this->_PP -= $PP;
			$ammos = 0;
			while ($PP > 0)
			{
				if ($this->roll() >= 4)
					$ammos++;
				$PP--;
			}
			$weap = $this->_weapons;
			$weap->addAmmos($ammos);
			print('Ammos has been increased by ' . $ammos . PHP_EOL);
		}
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
