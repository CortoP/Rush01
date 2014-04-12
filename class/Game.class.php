<?PHP

require_once('Dice.trait.php');

class Game
{
	use Dice;

}

$game = new Game();

print($game->roll() . PHP_EOL);
?>