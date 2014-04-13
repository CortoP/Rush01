<?PHP

require_once('Dice.trait.php');
require_once('Map.class.php');
class Game
{
	use Dice;
	private $_name;
	private $_players;
	private $_nbPlayers;
	private $_pId;
	private $_turn;
	private $_phase;
	public $map;

	public function __construct(array $kwargs)
	{
		$this->_name = $kwargs['name'];
		$this->_nbPlayers = $kwargs['nbrP'];
	}

	public function getName(){return $this->_name;}
	public function getNbrP(){return $this->_nbPlayers;}
	public function getP(){return $this->_players;}

	public function setPlayer($p){
		$this->_players[] = $p;
	}
}
?>
