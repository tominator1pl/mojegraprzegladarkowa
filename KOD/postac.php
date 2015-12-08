<html>
<head>
	<?php include 'strona/naglowek.php';
	include_once 'polaczZBD.php';
	include_once 'funkcje/item_handler.php';
	?>
	<title>Postać</title>
</head>
<body class="jumbotron-color">
<div class="row row-w-iframe">
	<div class="text-center"><h1>Postać</h1></div>
<?php $p = polacz();
	$zapytanie = "SELECT * FROM players WHERE ID_Player = ".$_SESSION['id_player'].";";
	$res = $p->query($zapytanie);
	$row = $res->fetch_assoc();
	$kodBron = "";
	$kodArmor = "";
	$nameBron = "";
	$nameArmor = "";
	if($row['Weapon']){
		$zapytanieBron = "SELECT * FROM inventory INNER JOIN items ON inventory.ITEMS_ID = items.ID_Item WHERE ID_Inv = ".$row['Weapon'].";";
		$resBron = $p->query($zapytanieBron);
		$rowBron = $resBron->fetch_assoc();
		$przedBron = itemReslove($rowBron['TYPE_ID'],$rowBron['Vars']);
		$kodBron = "+".$przedBron['param1']." (".($row['Strength']+$przedBron['param1']).")";
		$nameBron = $rowBron['Name_Inv'];
	}
	if($row['Armor']) {
		$zapytanieArmor = "SELECT * FROM inventory INNER JOIN items ON inventory.ITEMS_ID = items.ID_Item WHERE ID_Inv = " . $row['Armor'] . ";";
		$resArmor = $p->query($zapytanieArmor);
		$rowArmor = $resArmor->fetch_assoc();
		$przedArmor = itemReslove($rowArmor['TYPE_ID'], $rowArmor['Vars']);
		$kodArmor = "+".$przedArmor['param1']." (".($row['Defence']+$przedArmor['param1']).")";
		$nameArmor = $rowArmor['Name_Inv'];
	}
	$punkty = $row['AvaPoints'];
	$kodPunkty = "";
	if($punkty){
		$kodPunkty = " <a href='levelup.php'>Rozdaj pkt.(".$punkty.")</a>";
	}
?>
	<div class="col-sm-4">
		<div class='text-center'><h1>Statystyki</h1></div>
		<div class="lead">Poziom: <?php $lvl = $row['Level']; echo $lvl.$kodPunkty?></div>
		<div class="lead">Doświadczenie: <?php $exp = $row['Experience']; echo $exp."/".(pow(2,$lvl-1)*100)?></div>
		<div class="lead">Życie: <?php echo $row['Health']?></div>
		<div class="lead">Haisy: <?php echo $row['Money_Player']?></div>
		<div class="lead">Siła: <?php echo $row['Strength'].$kodBron?></div>
		<div class="lead">Obrona: <?php echo $row['Defence'].$kodArmor?></div>
		<div class="lead">Broń: <?php echo $nameBron?></div>
		<div class="lead">Zbroja: <?php echo $nameArmor?></div>
	</div>
	<div class="col-sm-4">
	<div class="text-center lead">Pseudonim: <?php echo getFromDB($p,'players','Name_Player','ID_Player',$_SESSION['id_player'])?></div>
	<div><img class="img-responsive center-block" src="zdjecia/<?php echo getFromDB($p,'players','Avatar','ID_Player',$_SESSION['id_player'])?>"></div>
		<?php if(isset($_GET['kom'])){
			switch($_GET['kom']) {
				case 'error':
					echo "<div class='lead text-center'>Wystapił błąd!</div>";
					break;
				case 'levelup':
					echo "<div class='lead text-center'>Rozdano Punkty!</div>";
					break;
			}
		} ?>
	</div>
	<?php rozlacz($p); ?>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>