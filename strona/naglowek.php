	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" media="all" rel="stylesheet" type="text/css">
	<?php 
		include_once 'polaczZBD.php';
		session_start();
		if(isset($_SESSION['id_user'])) updateTime($_SESSION['id_user']);
		if(!isset($_GET['noscript'])){
			echo '
<noscript>
<meta http-equiv="refresh" content="0; url=index.php?noscript=true"/>
</noscript>';
		}elseif($_GET['noscript'] == "true"){
			echo '<script>document.location.href = "index.php";</script>';
		}
	?>