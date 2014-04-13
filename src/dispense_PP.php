<?PHP

$speed = $_POST['speed'];
$shield = $_POST['shield'];
$weapon = $_POST['weapon'];
$ship = $_POST['ship'];

if ($speed + $shield + $weapon =< $_GET['PP'] && $speed >= 0 && $shield >= 0 && $weapon >= 0 && $_GET['PP'] > 0)
{
	$ship->increaseAmnos($weapon);
	$ship->increaseSpeed($speed);
	$ship->increaseShield($shield);
}
else
{
	echo "<script>window.history.back(-1)</script>";
}


?>