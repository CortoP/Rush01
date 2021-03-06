<?PHP

require_once('Ship.class.php');

abstract class Player
{
	protected $_name;
	protected $_id;
	protected $_ships;  //array of ships [ship_id => ship]
	protected $_color;
	static protected $_playerId = 1;
	protected $_state;
	protected $_step;

	public function __construct($name)
	{
		$this->setName($name);
		$this->setId(self::$_playerId);
		self::$_playerId += 1;
		$this->setState('inactive');
	}

	public function __toString()
	{
		return 'Player: ( Id: ' . $this->_id . ' Name: ' . $this->_name . ' )';
	}

	public function getName()
	{
		return ($this->_name);
	}

	public function getId()
	{
		return ($this->_id);
	}

	public function getShip($id)
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

	public function getColor()
	{
		return $this->_color;
	}

	public function setName($name)
	{
		if (is_string($name) && $name != '')
		{
			$this->_name = $name;
			return (0);
		}
		else
			return (-1);
	}

	public function setId($id)
	{
		if (is_numeric($id) && $id > 0 && $id <= 4)
		{
			$this->_id = $id;
			return (0);
		}
		else
			return (-1);
	}

	public function setShip($ship)
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

	public function setColor($color)
	{
		$this->_color = $color;
	}

	public function initShips()
	{
		if (isset($this->_ships[0]))
		{
			foreach ($this->_ships as $ship)
			{
				$ship->init();
			}
		}
	}

	public function setState($state)
	{
		if ($state == 'active' || $state == 'inactive' || $state == 'played' || $state == 'dead')
		{
			$this->_state = $state;
		}
		else
			return (1);
	}

	public function setStep($step)
	{
		if ($step == 'PP' || $step == 'move' || $step == 'shot' || $step == 'end')
		{
			$this->_step = $step;
		}
	}

	public function getState()
	{
		return ($this->_state);
	}

	public function getStep()
	{
		return ($this->_step);
	}

}

?>
