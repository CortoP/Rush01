<html>
	<head>
		<meta charset="utf-8">
        <LINK rel="stylesheet" href="../css/map.css">
        <TITLE>Jeu qui poutre sa maman</TITLE>
	</head>
	<body>
<?PHP
include('class/Map.class.php');
$map = new Map;
$map->fire(1, 115);
$map->htmlize();
//print($map);
?>
	</body>
</html>
