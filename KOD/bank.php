<html>
<head>
	<?php include 'strona/naglowek.php';
	include_once 'polaczZBD.php';
	?>
	<title>Bank</title>
</head>
<body class="jumbotron-color">
<div class="row row-w-iframe text-center">
    <h1>Bank</h1>
<?php $p = polacz(); ?>
		<div class="col-sm-4">
            <div class="text-center lead">Postać</div>
		    <div class="lead">Haisy: <span id="mojeHaisy"><?php echo getFromDB($p,'players','Money_Player','ID_Player',$_SESSION['id_player'])?></span></div>
		</div>
        <div class="col-sm-4 text-center">
            <form name='przelej' class='form' method='post' action="strona/bank/bank_funkcja.php">
                <label for='inputKwota'>Kwota:</label>
                <input type='text' class='form-control' id='inputKwota' name='kwota'>
                <input type='submit' class="btn btn-default" name='przelejDo' value='Wpłać'>
                <input type='submit' class="btn btn-default" name='przelejZ' value='Wypłać'>
            </form>
            <?php if(isset($_GET['tran'])){
                switch($_GET['tran']) {
                    case 'to':
                        echo "<div class='lead'>Wpłata powiodła się</div>";
                        break;
                    case 'from':
                        echo "<div class='lead'>Wypłata powiodła się</div>";
                        break;
                    case 'nomoney':
                        echo "<div class='lead'>Nie masz wystarczająco środków</div>";
                        break;
                }
            } ?>
        </div>
		<div class="col-sm-4">
            <div class="text-center lead">Konto</div>
            <div class="lead">Haisy: <span id="bankHaisy"><?php echo getFromDB($p,'bank','Money_Bank','ID_Bank',getFromDB($p,'players','BANK_ID','ID_Player',$_SESSION['id_player']))?></span></div>
		</div>
	<?php rozlacz($p); ?>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="strona/bank/bank_skrypt.js"></script>
</body>
</html>