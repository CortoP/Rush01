<?PHP

$speed = $_POST['speed'];
$shield = $_POST['shield'];
$weapon = $_POST['weapon'];

if ($speed + $shield + $weapon < $_GET['PP'] && $speed >= 0 && $shield >= 0 && $weapon >= 0 && $_GET['PP'] > 0)
{
	echo "Il reste ". ($_GET['PP'] - $speed - $shield - $weapon) . " PP";
}
else
{
	echo "<script>window.history.back(-1)</script>";
}


?>