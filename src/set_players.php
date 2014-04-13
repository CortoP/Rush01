<?PHP
	include('../class/Game.class.php');
	session_start();
	header('Location: play.php');
	$s = implode("", @file("game"));
	$game = unserialize($s);
//	var_dump($_POST);
	for ($i = 1; $i <= $game->getNbrP(); $i++)
	{
		$game->setPlayer(new $_POST["faction$i"]($_POST["P$i"]));
		$game->getP()[$i - 1]->setShip(new JusticarStorm());
		$game->getP()[$i - 1]->setShip(new JusticarStorm());
		$game->getP()[$i - 1]->setShip(new HammerOfRighteous());
	}
	$s = serialize($game);
	$fp = fopen("game", "w");
	fwrite($fp, $s);
	fclose($fp);
	$_SESSION['game'] = 'GO';
?>
