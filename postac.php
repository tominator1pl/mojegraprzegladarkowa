<html>
<head>
	<?php include 'strona/naglowek.php';
	include_once 'polaczZBD.php';
	?>
	<title>Postać</title>
</head>
<body class="jumbotron-color">
<div class="row row-w-iframe">
<?php $p = polacz(); ?>
	<div class="col-sm-4">
		<div class='text-center'><h1>Statystyki</h1></div>
		<div class="lead">Poziom: <?php $lvl = getFromDB($p,'players','Level','ID',$_SESSION['id_player']); echo $lvl?></div>
		<div class="lead">Doświadczenie: <?php $exp = getFromDB($p,'players','Experience','ID',$_SESSION['id_player']); echo $exp."/".$lvl*$lvl*100?></div>
		<div class="lead">Haisy: <?php echo getFromDB($p,'players','Money','ID',$_SESSION['id_player'])?></div>
		<div class="lead">Siła: <?php echo getFromDB($p,'players','Strength','ID',$_SESSION['id_player'])?></div>
		<div class="lead">Obrona: <?php echo getFromDB($p,'players','Defence','ID',$_SESSION['id_player'])?></div>
		<div class="lead">Broń: <?php echo getFromDB($p,'players','Weapon','ID',$_SESSION['id_player'])?></div>
		<div class="lead">Zbroja: <?php echo getFromDB($p,'players','Armor','ID',$_SESSION['id_player'])?></div>
	</div>
	<div class="col-sm-4">
	<div class="text-center lead">Pseudonim: <?php echo getFromDB($p,'players','Name','ID',$_SESSION['id_player'])?></div>
	<div><img src="zdjecia/monkey.png" width="90%" height="70%"></div>
	</div>
	<?php rozlacz($p); ?>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>