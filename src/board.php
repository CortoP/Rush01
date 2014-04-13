<?PHP
session_start();
include('../class/Game.class.php');
?>
<html><header style="margin-top: 50px">
<LINK rel="stylesheet" href="../css/index.css" type="text/css" />
<LINK rel="stylesheet" href="../css/map.css" type="text/css" />
</header>
<body id='body'>
<?PHP
$game = unserialize($_SESSION['class']);
?>
    <div id="main">
    <div id="playa"></div>
	<div id="board"><?PHP $game->map->htmlize()?></div>
    <div id="chat"></div>
    </div>
    </body>
</html>
