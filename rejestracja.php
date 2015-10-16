<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" media="all" rel="stylesheet" type="text/css">
	<title>Rejestracja</title>
	<?php 
		include_once 'polaczZBD.php';
		session_start();
	?>
</head>
<body>
<div class="container">
	<div class="jumbotron text-center">
	<h1>MOJA STRONA WOW</h1>
	</div>
	<?php include 'logowanie/rejestracja_zawartosc.php'; ?>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>