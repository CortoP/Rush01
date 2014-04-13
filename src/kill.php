<?PHP
header('Location: play.php');
session_start();
unset($_SESSION['game']);
unset($_SESSION['class']);
unset($_SESSION);
?>
