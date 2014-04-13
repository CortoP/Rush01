<?PHP
session_start();
include('../class/Game.class.php');
echo '<a href="kill.php">Kill Session</a>';
if (!isset($_SESSION['game'])){?>
<form action="create.php" method='POST'>
	<label for='name'>Name the game</label>
	<input type='text' name='name' id='name' required/><br/>
	<label for='nbr'>Number of Players</label>
	<input type='number' name='nbr' id='nbr' min='2'max='4' required/><br/>
	<input type='submit' name='action' value='OK'/>
</form>
<?PHP
}
else
{
	$s = implode("", @file("game"));
	$game = unserialize($s);
	echo '<h1>'.$game->getName().'</h1>';
	if($_SESSION['game'] == 'GetSet')
	{
		echo '<form action="set_players.php" method="POST">';
		for ($i = 1; $i <= $game->getNbrP(); $i++)
		{
?>
	<div class="choosePlayer">
	<label for=<?PHP echo "'P$i'> Player $i"?></label>
	<input type='text' name='<?PHP echo "P$i' id='P$i"?>' required/><br/>
	<span>no password il faut creer un joueur pour qu'il soit jouable</span><br/>
	<select name="faction<?PHP echo $i;?>">
		Choose your faction
		<option value='ImperialGuard'>Imperial Guard</option>
		<option value='SpaceMarin'>SpaceMarin</option>
	</select></div>
<?PHP
		}
		echo '<input type="submit" name="action" value="OK"/>';
		echo '<form>';
		echo '<a href="../create_account.html">Create a Player</a>';
	}
	else if ($_SESSION['game'] == 'GO')
		var_dump($game->getP());
	$s = serialize($game);
	$fp = fopen("game", "w");
	fwrite($fp, $s);
	fclose($fp);
}
?>
