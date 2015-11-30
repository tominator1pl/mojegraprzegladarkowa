<html>
<head>
	<?php include 'strona/naglowek.php';?>
	<title>Głowna</title>
</head>
<body>
<div class="container">
	<div class="jumbotron col-md-12 gora-strony">
		<div class="row">
			<div class="text-center col-md-9 col-sm-9 col-xs-12 moje-logo">
				<!--<h1>MOJA STRONA MOŻe</h1>-->
				<img src="zdjecia/logo.png" class="img-responsive">
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<?php
				if(!isset($_GET['noscript'])){
					include 'logowanie/logowanie_zawartosc.php';
				}
				?>
			</div>
		</div>
	</div>
	
	<?php
	if(!isset($_GET['noscript'])){
		include 'strona/strona_zawartosc.php';
	}elseif($_GET['noscript'] == "true"){
		include 'strona/strona_noscript.php';
	}
	?>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="strona/strona_skrypt.js"></script>
</body>
</html>