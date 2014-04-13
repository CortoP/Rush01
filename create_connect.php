<?PHP
$login = $_POST['login'];
$pass = $_POST['passwd'];

$file = fopen('connect.php', 'w');
$content = "<?php\nfunction connect()\n{\n\$db = mysql_connect('localhost', '".$login."', '".$pass."');\nreturn \$db;\n}                                                                     ?>\n";
fputs($file, $content);
fclose($file);
echo"<script>window.location='/install.php'</script>";
?>