<?PHP

require_once('Dice.trait.php');
require_once('Map.class.php');
require_once('ImperialGuard.class.php');
require_once('SpaceMarin.class.php');
require_once('HammerOfRighteous.class.php');
require_once('Eldars.class.php');
require_once('FetishitsOrks.class.php');
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

	public function setMap(array $kwargs){
		$this->map = new Map($kwargs);
	}

	public function initPlayers()
	{
		$flag = 0;
		foreach ($this->_players as $player)
		{
			if ($flag == 0 && $player->getState() == 'inactive')
			{
				$flag = 1;
				$player->setState('active');
/*				$i = 0;
				while (($ship = $player->getShip($i)) !== -1)
				{
					if ($ship !== 1)
						$ship->setState('activable');
					$i++;
				}*/
			}
			$player->initShips();
		}
	}

	public function changePlayer()
	{
		foreach ($this->_players as $key => $player)
		{
			if ($player->getState() == 'active')
			{
				$key2 = $key + 1;
				while ($key2 < count($this->_players) && $this->_players[$key2]->getState() != 'inactive')
					$key2 += 1;
				if ($this->_players[$key2]->getState() == 'inactive')
				{
					$this->_players[$key] = 'inactive';
					$this->_players[$key2] = 'active';
				}
			}
		}
		$flag = 0;
		foreach ($this->_players as $key => $player)
		{
			if ($player->getState() != 'dead')
			{
				$flag += 1;
				if ($flag == 1)
				   $win = $key;
			}
		}
		if ($flag == 1)
		{
			echo "<script>alert('One player wins')</script>";
			echo "<script>window.location('/index.php')</script>";
		}
		else
		{
			$this->initPlayers();
		}
	}
}
?>
