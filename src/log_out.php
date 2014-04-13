<?PHP
	session_start();
	unset($_SESSION['log_user']);
	echo "<script>window.location='/index.php'</script>";
?>