<?PHP

require_once('Player.class.php');

class ImperialGuard extends Player
{
	static protected $color = 'red';
	static protected $_guards = 1;
	protected $_guardId;

	public function __construct($name)
	{
		parent::__construct($name);
		$this->_guardId = self::$_guards;
		$this->setColor(self::$color);
		self::$_guards += 1;
		echo "Hi sir, I'm a Imperial Guard matricule $this->_id.$this->_guardId!\n";
	}

	public function __toString()
	{
		return 'Imperial Guard: ( Id: ' . $this->_id . ' Name: ' . $this->_name . ' )';
	}
}

?>
