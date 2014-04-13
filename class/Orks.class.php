<?PHP

require_once('Player.class.php');

class Orks extends Player
{
	static protected $_color = 'green';
	static protected $_orks = 1;
	protected $_orksId;

	public function __construct($name)
	{
		parent::__construct($name);
		$this->_orksId = self::$_orks;
		$this->setColor(self::$_color);
		self::$_orks += 1;
		echo "Orks ready to fight $this->_id.$this->_orksId!\n";
	}

	public function __toString()
	{
		return 'Orks: ( Id: ' . $this->_id . ' Name: ' . $this->_name . ' Ships:' . $this->_ships. ' )';
	}
}

?>
