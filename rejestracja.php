<html>
<head>
	<?php include 'strona/naglowek.php';?>
	<title>Rejestracja</title>
</head>
<body>
<div class="container">
	<div class="jumbotron text-center">
	<h1>MOJA STRONA WOW</h1>
	</div>
	<?php include 'logowanie/rejestracja_zawartosc.php';
	if(isset($_GET['kom'])){
		switch($_GET['kom']) {
			case 'exists':
				echo "<div class='lead'>Użytkownik z tym logine już istnieje!</div>";
				break;
			case 'fields':
				echo "<div class='lead'>Proszę uzupełnić wszystkie luki.</div>";
				break;
			case 'passes':
				echo "<div class='lead'>Hasła się nie zgadzają!</div>";
				break;
			case 'regu':
				echo "<div class='lead'>Wymagane jest zaakceptowanie regulaminu.</div>";
				break;
		}
	}?>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>