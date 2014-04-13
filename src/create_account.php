<?PHP

include('../connect.php');

$login = $_POST['login'];
$pass = hash('whirlpool', $_POST['pass']);
$db = connect();
mysql_select_db('warhammer', $db);
$sql = 'SELECT login from users';
$req = mysql_query($sql);
while($data = mysql_fetch_assoc($req))
    {
		if ($login == $data['login'])
		{
			//Redirection vers la page principale
			echo "<script>alert('Player always registered')</script>";
			echo "<script>window.location='/index.html'</script>";
			return ;
		}
    }

$sql = 'INSERT INTO users (login, password) VALUES (\''.$login.'\', \''. $pass. '\')';

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
mysql_close();
echo "<script>alert('Registered')</script>";
echo "<script>window.location='/index.html'</script>";
?>