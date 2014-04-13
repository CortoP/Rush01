<?PHP

require_once '../class/Game.class.php';
session_start();
$game = unserialize($_SESSION['class']);
if (isset($_POST['submit']))
{
	if ($_POST['submit'] == 'Valid')
	{
		$s = $_POST['speed'];
		$game->map->moveShip($_POST['id'], $s);
	}
	if ($_POST['submit'] == 'TurnRight')
		$game->map->turnRight($_POST['id'], $s);
	if ($_POST['submit'] == 'TurnLeft')
		$game->map->turnLeft($_POST['id'], $s);
}
$_SESSION['class'] = serialize($game);
header('Location: board.php');
?>
