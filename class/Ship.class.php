<?PHP
abstract class Ship
{
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

	function am_i_alive()
	{
		if ($this->_PV > 0)
			return True;
		else
			return False;
	}

	function sub_PV($damage)
	{
		$this->_PV -= $damage;
		return ($this->am_i_alive());
	}

	function getName()
	{
		return $this->_name;
	}

	function getPV()
	{
		return $this->_PV;
	}

	function getSpan()
	{
		return $this->_span;
	}

	function getPP()
	{
		return $this->_PP;
	}

	function getSpeed()
	{
		return $this->_speed;
	}

	function getShield()
	{
		return $this->_shield;
	}

	function getWeapons()
	{
		return $this->_weapons;
	}

	function getX()
	{
		return $this->_x;
	}

	function getY()
	{
		return $this->_y;
	}

	function getOrientation()
	{
		return $this->_orientation;
	}

	function getLong()
	{
		return $this->_long;
	}

	function getWide()
	{
		return $this->_wide;
	}

	function setName($name)
	{
		$this->_name = $name;
	}

	function setPV($PV)
	{
		$this->_PV = $PV;
	}

	function setPP($PP)
	{
		$this->_PP = $PP;
	}

	function setSpeed($speed)
	{
		$this->_speed = $speed;
	}

	function setShield($shield)
	{
		$this->_shield = $shield;
	}

	function setWeapons($weapons)
	{
		$this->_weapons = $weapons;
	}

	function setX($x)
	{
		$this->_x = $x;
	}

	function setY($y)
	{
		$this->_y = $y;
	}

	function setOrientation($orientation)
	{
		$this->_orientation = $orientation;
	}

	function setLong($long)
	{
		$this->_long = $long;
	}

	function setWide($wide)
	{
		$this->_wide = $wide;
	}
	
	public static function doc()
	{
		if (file_exists("doc/Ship.doc.txt"))
			return (file_get_contents("doc/Ship.doc.txt"));
		return ("File not found : Ship.doc.txt");
	}
}

?>
