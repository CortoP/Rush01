<?PHP

require_once 'SpaceMarin.class.php';
require_once 'ImperialGuard.class.php';
require_once 'JusticarStorm.class.php';

$playerOne = new SpaceMarin('player1');
$playerTwo = new SpaceMarin('player2');
$playerThree = new ImperialGuard('player3');
$playerFour = new SpaceMarin('player4');


$weap = new JusticarStorm();

print("\n\n" . $weap->getName() . PHP_EOL);

if ($playerOne->setShip($weap) == -1)
{
	print("\n\nArming weapon fail");
}

if ($playerOne->setShip(new JusticarStorm()) == -1)
{
	print("\n\nSecond arming weapon fail");
}


print_r("\n\n".$playerOne."\n\n");
print($playerOne->getShip(1)->getName());
//print("\n\n".$playerThree."\n\n");

?>