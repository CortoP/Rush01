<?PHP

$login = $_POST['login'];
$pass = hash('whirlpool', $_POST['pass']);
$db = mysql_connect('localhost', 'root', 'password');
mysql_select_db('test', $db);
$sql = 'SELECT login, password from users';
$req = mysql_query($sql);
while($data = mysql_fetch_assoc($req))
    {
		if ($login == $data['login'])
		{
			if ($pass == $data['password'])
			{
				echo "<script>alert('Joueur connecte')</script>";
			}
			else
			{
				echo "<script>alert('Mauvais password')</script>";
			}
			return ;
		}
    }

mysql_close();

?>