<?PHP

require_once('Dice.trait.php');

abstract class Ship
{
	use Dice;
	protected $_name;
	protected $_PV;
	protected $_PP;
	protected $_speed;
	protected $_shield;
	protected $_weapons;
	protected $_x;
	protected $_y;
	protected $_orientation;
	protected $_long;
	protected $_wide;
	protected $_state;

	/* ---------- Getters ----------*/

	public function getState()
	{
		return $this->_state;
	}

	public function getName()
	{
		return $this->_name;
	}

	public function getPV()
	{
		return $this->_PV;
	}

	public function getPP()
	{
		return $this->_PP;
	}

	public function getSpeed()
	{
		return $this->_speed;
	}

	public function getShield()
	{
		return $this->_shield;
	}

	public function getWeapons()
	{
		return $this->_weapons;
	}

	public function getX()
	{
		return $this->_x;
	}

	public function getY()
	{
		return $this->_y;
	}

	public function getOrientation()
	{
		return $this->_orientation;
	}

	public function getLong()
	{
		return $this->_long;
	}

	public function getWide()
	{
		return $this->_wide;
	}

	/* ---------- Setters ----------*/

	public function setState($state)
	{
		$this->_state = $state;
	}

	public function setName($name)
	{
		$this->_name = $name;
	}

	public function setPV($PV)
	{
		$this->_PV = $PV;
	}

	public function setPP($PP)
	{
		$this->_PP = $PP;
	}

	public function setSpeed($speed)
	{
		$this->_speed = $speed;
	}

	public function setShield($shield)
	{
		$this->_shield = $shield;
	}

	public function setWeapons($weapons)
	{
		$this->_weapons = $weapons;
	}

	public function setX($x)
	{
		$this->_x = $x;
	}

	public function setY($y)
	{
		$this->_y = $y;
	}

	public function setOrientation($orientation)
	{
		$this->_orientation = $orientation;
	}

	public function setLong($long)
	{
		$this->_long = $long;
	}

	public function setWide($wide)
	{
		$this->_wide = $wide;
	}

	/* ---------- Other methods ---------- */

	public function amIAlive()
	{
		if ($this->_PV > 0)
		{
			print($this->_name . ' is still standing' . PHP_EOL);
			return True;
		}
		else
		{
			print($this->_name . ' has been destroyed' . PHP_EOL);
			return False;
		}
	}

	public function subPV($damage)
	{
		$this->_PV -= $damage;
		print($this->_name . ' has been hit for ' . $damage . PHP_EOL);
		return ($this->amIAlive());
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

	public function increaseAmmos($PP)
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

	public static function doc()
	{
		if (file_exists("doc/Ship.doc.txt"))
			return (file_get_contents("doc/Ship.doc.txt"));
		return ("File not found : Ship.doc.txt");
	}
}

?>
