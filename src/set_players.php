<?PHP
	include('../class/Game.class.php');
	session_start();
//	header('Location: play.php');
	$game = unserialize($_SESSION['class']);
//	var_dump($_POST);
	for ($i = 1; $i <= $game->getNbrP(); $i++)
	{
		$P = new $_POST["faction$i"]($_POST["P$i"]);
		$game->setPlayer($P);
		$game->getP()[$i - 1]->setShip(new JusticarStorm());
		$game->getP()[$i - 1]->setShip(new JusticarStorm());
		$game->getP()[$i - 1]->setShip(new HammerOfRighteous());
		$maparray["p$i"] = $P;
	}
	$maparray['nbP'] = $game->getNbrP();
	$game->setMap($maparray);
	var_dump($game);
	$_SESSION['class'] = serialize($game);
	$_SESSION['game'] = 'GO';
?>
