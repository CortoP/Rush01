<?PHP

include('../connect.php');

$login = $_POST['login'];
$pass = hash('whirlpool', $_POST['pass']);
$db = connect();
mysql_select_db('warhammer', $db);
$sql = 'SELECT login, password from users';
$req = mysql_query($sql);
while($data = mysql_fetch_assoc($req))
    {
		if ($login == $data['login'])
		{
			if ($pass == $data['password'])
			{
				echo "<script>alert('Player connected')</script>";
				echo "<script>window.location='/index.html'</script>";
			}
			else
			{
				echo "<script>alert('Wrong password')</script>";
				echo "<script>window.location='/index.html'</script>";
			}
			return ;
		}
    }

mysql_close();

?>