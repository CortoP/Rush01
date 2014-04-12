<?PHP

require_once('Player.class.php');

class ImperialGuard extends Player
{
	static protected $_color = 'red';
	static protected $_guards = 1;
	protected $_guardId;

	function __construct($name)
	{
		parent::__construct($name);
		$this->_guardId = self::$_guards;
		self::$_guards += 1;
		echo "Hi sir, I'm a Imperial Guard matricule $this->_id.$this->_guardId!\n";
	}

	function __toString()
	{
		return 'Imperial Guard: ( Id: ' . $this->_id . ' Name: ' . $this->_name . ' )';
	}
}

?>