<?PHP

require_once '../class/Game.class.php';
session_start();
$game = unserialize($_SESSION['class']);
if (isset($_POST['submit']))
{
	if ($_POST['submit'] == 'Valid')
	{
		$s = $_POST['speed'];
		$ship = $game->getP()[0]->getShip(1);
		$ship->setX($s);

	}
}
$_SESSION['class'] = serialize($game);
header('Location: board.php');
?>
