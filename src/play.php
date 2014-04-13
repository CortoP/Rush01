<header style="margin-top: 32px">
<LINK rel="stylesheet" href="../css/index.css" type="text/css" />
<?PHP
session_start();
include('../class/Game.class.php');
echo '<a href="kill.php">Kill Session</a>';
if (!isset($_SESSION['game'])){
?>
<center>
	<a href="/index.html"> <img src="../Title_Warhammer.png"> </a>
</center>
</header>
<body id='body'>
<form action="create.php" method='POST' id="container">
	<div id="create_account">
		 <label for='name'>Name of the game</label>
		 <input type='text' name='name' id='name' required/><br/>
	</div>
	<div id="Connect">
		 <label for='nbr'>Number of Players</label>
		 <input type='number' name='nbr' id='nbr' min='2'max='4' required/><br/>
	</div>
	<div id="submit">
		 <input type='submit' name='action' value='OK'/>
	</div>
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
	<label for=<?PHP echo "'P$i'> Player $i"?></label>
	<input type='text' name='<?PHP echo "P$i' id='P$i"?>' required/><br/>
	<span>no password yet, ajouter choix de faction</span><br/>
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
</body>