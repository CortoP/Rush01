<?php
function connect()
{
	$db = mysql_connect('localhost', 'root', 'pass');
	return $db;
}
?>