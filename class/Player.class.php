<?PHP

require_once('Ship.class.php');

abstract class Player
{
	protected $_name;
	protected $_id;
	protected $_ships;  //array of ships [ship_id => ship]
	static protected $_playerId = 1;

	function __construct($name)
	{
		$this->setName($name);
		$this->setId(self::$_playerId);
		self::$_playerId += 1;
	}

	function __toString()
	{
		return 'Player: ( Id: ' . $this->_id . ' Name: ' . $this->_name . ' )';
	}

	function getName()
	{
		return ($this->_name);
	}

	function getId()
	{
		return ($this->_id);
	}

	function getShip($id)
	{
		if (isset($this->_ships[$id]))
		{
			if ($this->_ships[$id]->getState() != 'dead')
		   	    return ($this->_ships[$id]);
			else
				return 1;
		}
		else
			return (-1);
	}

	function setName($name)
	{
		if (is_string($name) && $name != '')
		{
			$this->_name = $name;
			return (0);
		}
		else
			return (-1);
	}

	function setId($id)
	{
		if (is_numeric($id) && $id > 0 && $id <= 4)
		{
			$this->_id = $id;
			return (0);
		}
		else
			return (-1);
	}

	function setShip($ship)
	{
		if (get_parent_class($ship) == 'Ship')
		{
			if (isset($this->_ships[0]))
			   array_push($this->_ships, $ship);
		  	else
			   $this->_ships = array($ship);
			return (0);
		}
		return (-1);
	}
}


?>
