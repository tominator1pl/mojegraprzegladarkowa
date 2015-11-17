<html>
<head>
	<?php include 'strona/naglowek.php';
	include_once 'polaczZBD.php';
	?>
	<title>Bank</title>
</head>
<body class="jumbotron-color">
<div class="row row-w-iframe">
<?php $p = polacz(); ?>
		<div class="col-sm-4">
		<div class="text-center lead">Postać</div>
		<div class="lead">Haisy: <?php echo getFromDB($p,'players','Money','ID',$_SESSION['id_player'])?></div>
		<form name='przelejDo' class='form-group' method='post' action="strona/przelej.php">
		<label for='inputKwotaDo'>Wpłać do banku:</label>
		<input type='text' class='form-control' id='inputKwotaDo' name='kwotaDo'>
		<input type='submit' name='przelejDo' value='Przelej'>
		</form>
		</div>
		<div class="col-sm-4">
		<div class="text-center lead">Bank</div>
		<div class="lead">Haisy: <?php echo getFromDB($p,'bank','Money','ID',getFromDB($p,'players','BANK_ID','ID',$_SESSION['id_player']))?></div>
		<form name='przelejZ' class='form-group' method='post' action="strona/przelej.php">
		<label for='inputKwotaZ'>Wypłać z banku:</label>
		<input type='text' class='form-control' id='inputKwotaZ' name='kwotaZ'>
		<input type='submit' name='przelejZ' value='Przelej'>
		</form>
		</div>
	<?php rozlacz($p); ?>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>