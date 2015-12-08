	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" media="all" rel="stylesheet" type="text/css">
	<script>parent.updateKomunikaty()</script>
	<?php 
		include_once 'polaczZBD.php';
		session_start();
		if(isset($_SESSION['id_player'])){
			checkPrzygoda($_SESSION['id_player']);
			updateTime($_SESSION['id_user']);
			checkLevel($_SESSION['id_player']);
		}
		if(!isset($_GET['noscript'])){ //NOSCRIPT
			echo '
<noscript>
<meta http-equiv="refresh" content="0; url=index.php?noscript=true"/>
</noscript>';
		}elseif($_GET['noscript'] == "true"){
			echo '<script>document.location.href = "index.php";</script>';
		}
	?>