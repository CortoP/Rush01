<?PHP
include('connect.php');

if (($db = connect()) != false)
{
	$sql = 'CREATE DATABASE IF NOT EXISTS warhammer';
	$req = mysql_query($sql);
	mysql_select_db('warhammer', $db);
	$sql = 'CREATE TABLE users(id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, login VARCHAR(11) NOT NULL, password VARCHAR(130) NOT NULL, victory INT DEFAULT 0, defeat INT DEFAULT 0)';
	$req = mysql_query($sql);
	echo "<script>alert('Database install')</script>";
	echo "<script>window.location='/index.php'</script>";
	mysql_close();
}

?>