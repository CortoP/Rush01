<?PHP
abstract class Ship
{
	protected $_name;
	protected $_PV;
	protected $_span;
	protected $_PP;
	protected $_speed;
	protected $_shield;
	protected $_weapons;
	protected $_position;

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

	function getPosition()
	{
		return $this->_position;
	}

	function setName($name)
	{
		$this->_name = $name;
	}

	function setPV($PV)
	{
		$this->_PV = $PV;
	}

	function setSpan($span)
	{
		$this->_span = $span;
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

	function setPosition(array $coord)
	{
		$this->_position = array('x' => $coord['x'], 'y' => $coord['y']);
	}

	function subPP($PP)
	{
		$this->_PP -= $PP;
	}

	function addShield($PP)
	{
		$this->_shield += $PP;
	}

	function subShield($PP)
	{
		$this->_shield -= $PP;
	}

}

?>
