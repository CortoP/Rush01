<?PHP
header('Location: play.php');
session_start();
unset($_SESSION['game']);
unlink('game');
?>
