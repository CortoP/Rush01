<?PHP
session_start();
include('../class/Game.class.php');
$game = unserialize($_SESSION['class']);
$speed = $_POST['speed'];
$shield = $_POST['shield'];
$weapon = $_POST['weapon'];
$ship = $game->map->getShip($_POST['id']);
//var_dump($game->map);
printf("speed%d Sspeed%d shield%d Sshield%d Wepon%d Sweapon%d PP%d\n", $speed, $ship->getSpeed()
	, $shield, $ship->getShield(), $weapon, $ship->getWeapons()->getAmmos(), $ship->getPP());

if ($speed > $ship->getPP() || $shield < $ship->getShield() || $weapon < $ship->getWeapons()->getAmmos() ||
	($speed + $shield + $weapon  > $ship->getWeapons()->getAmmos()+ $ship->getShield() + $ship->getPP()))
{
	header('Location: board.php?Tamerepue');
}
else
{
//	header('Location: board.php?ok');
	$ship->increaseAmmos($weapon - $ship->getWeapons()->getAmmos());
	$ship->increaseSpeed($speed);
	$ship->increaseShield($shield - $ship->getShield());
	$ship->setState('chosen');
	$P = $game->getP();
	foreach ($P as $player)
	{
		if ($player->getState() == 'active')
		{
			$i = 0;
			while (($ship = $player->getShip($i)) !== -1)
				{
					if ($ship !== 1)
					{
						if ($ship->getState() === 'activable')
							$ship->setState('inactive');
					}
					$i++;
				}
		}
	}
}
$_SESSION['class'] = serialize($game);
?>
