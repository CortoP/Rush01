<?PHP

require_once('Player.class.php');

class Eldars extends Player
{
	protected $_color = 'green';
	static protected $_eldars = 1;
	protected $_eldarsId;

	public function __construct($name)
	{
		parent::__construct($name);
		$this->_eldarsId = self::$_eldars;
		$this->setColor($this->_color);
		self::$_eldars += 1;
		echo "Eldars matricule $this->_id.$this->_eldarsId!\n";
	}

	public function __toString()
	{
		return 'Eldars: ( Id: ' . $this->_id . ' Name: ' . $this->_name . ' Ships:' . $this->_ships. ' )';
	}
}

?>
