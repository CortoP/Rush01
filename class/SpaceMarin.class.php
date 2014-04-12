<?PHP

require_once('Player.class.php');

class SpaceMarin extends Player
{
	static protected $_color = 'blue';
	static protected $_marins = 1;
	protected $_marinId;

	function __construct($name)
	{
		parent::__construct($name);
		$this->_marinId = self::$_marins;
		self::$_marins += 1;
		echo "I'm ok Marin matricule $this->_id.$this->_marinId!\n";
	}

	function __toString()
	{
		return 'SpaceMarin: ( Id: ' . $this->_id . ' Name: ' . $this->_name . ' )';
	}
}

?>