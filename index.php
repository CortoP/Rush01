<?PHP
   session_start();
?>

<html>
  <header style="margin-top: 50px">
	<LINK rel="stylesheet" href="css/index.css" type="text/css"/>
	<center>
	<img src='Title_warhammer.png'/>
	</center>
  </header>
  <body id = body>
	<div id='container'>
	  <div id='create_account' onClick="location.href='src/create_account.html'">
		CREATE ACCOUNT
	  </div>
	  <?php if(!isset($_SESSION['log_user'])){ ?>
	  <div id='Connect' onClick="location.href='src/log_in.html'">
		CONNECT
	  </div>
	  <?php }else{ ?>
	  <div id='Connect' onClick="location.href='src/log_out.php'">
		DISCONNECT
	  </div>
	  <?php } if(isset($_SESSION['log_user'])){?>
	  <div id='Play' onClick="location.href='src/play.php'">
		PLAY
	  </div>
	  <?php }else{ ?>
	  <div id='Play' onClick="alert('You need to be connected to play')">
		PLAY
	  </div>
	  <?php } ?>
	</div>
  </body>
</html>
