<?
function login_exists($login)
{
	$db = connect();
	mysql_select_db('warhammer', $db);
	$sql = 'SELECT login, password from users';
	$req = mysql_query($sql);
	while($data = mysql_fetch_assoc($req))
    {
		if ($login == $data['login'])
		{
			return 0;
		}
	}
	return 1;
	mysql_close();
}
?>