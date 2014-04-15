<?PHP
session_start();
include('../class/Game.class.php');
?>
<html><head style="margin-top: 50px">
<LINK rel="stylesheet" href="../css/index.css" type="text/css" />
<LINK rel="stylesheet" href="../css/map.css" type="text/css" />
</head>
<body id='body'>
<a href="kill.php">Kill</a>
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
<?PHP
$_SESSION['class'] = serialize($game);
?>
