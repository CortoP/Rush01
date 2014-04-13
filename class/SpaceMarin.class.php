<?PHP

require_once('Player.class.php');

class SpaceMarin extends Player
{
	static protected $color = 'blue';
	static protected $_marins = 1;
	protected $_marinId;

	public function __construct($name)
	{
		parent::__construct($name);
		$this->_marinId = self::$_marins;
		$this->setColor(self::$color);
		self::$_marins += 1;
		echo "Marin matricule $this->_id.$this->_marinId!\n";
	}

	public function __toString()
	{
		return 'SpaceMarin: ( Id: ' . $this->_id . ' Name: ' . $this->_name . ' Ships:' . $this->_ships. ' )';
	}
}

?>
