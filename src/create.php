<?PHP
session_start();
include('../class/Game.class.php');
if (!isset($_POST['name']) || !isset($_POST['nbr']) ||!isset($_POST['action'])
	|| $_POST['name'] == "" || $_POST['nbr'] < 2 || $_POST['nbr'] > 4)
{
	echo "<script>window.history.back(-1)</script>";
	return ;
}
$game = new Game(array('name' => $_POST['name'], 'nbrP' => $_POST['nbr']));
$_SESSION['game'] = 'GetSet';
$_SESSION['nbr'] = 0;
$s = serialize($game);
$fp = fopen("game", "w");
fwrite($fp, $s);
fclose($fp);
echo "<script>window.history.back(-1)</script>";
?>
