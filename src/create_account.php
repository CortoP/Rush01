<?PHP

$login = $_POST['login'];
$pass = hash('whirlpool', $_POST['pass']);
$db = mysql_connect('localhost', 'root', 'password');
mysql_select_db('test', $db);
$sql = 'SELECT login from users';
$req = mysql_query($sql);
while($data = mysql_fetch_assoc($req))
    {
		if ($login == $data['login'])
		{
			//Redirection vers la page principale
			echo "<script>alert('Utilisateur deja enregistre')</script>";
			return ;
		}
    }

$sql = 'INSERT INTO users (login, password) VALUES (\''.$login.'\', \''. $pass. '\')';

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
mysql_close();
?>