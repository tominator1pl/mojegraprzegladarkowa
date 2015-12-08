<?php
session_start();
include_once '../../polaczZBD.php';
$p = polacz();
$kasaMoja = getFromDB($p,'players','Money_Player','ID_Player',$_SESSION['id_player']);
$idbanku = getFromDB($p,'players','BANK_ID','ID_Player',$_SESSION['id_player']);
$kasaBank = getFromDB($p,'bank','Money_Bank','ID_Bank',$idbanku);
$kasa = $_POST['kwota'];
if(isset($_POST['przelejDo'])){

	if(is_numeric($kasa) && $kasa >= 1 && $kasaMoja >= $kasa)
	{
		$kasa = floor($kasa);
		$kasaBank += $kasa;
		$kasaMoja -= $kasa;
		$zapytanie = "UPDATE bank SET bank.Money_Bank = '".$kasaBank."' WHERE bank.ID_Bank = '".$idbanku."';

		UPDATE players SET players.Money_Player = '".$kasaMoja."' WHERE players.ID_Player = '".$_SESSION['id_player']."';";
		$res = $p->multi_query($zapytanie);
		if($res){
			header("Location: ../../bank.php?tran=to");
		}
	}elseif(is_numeric($kasa) && $kasa >= 1 && $kasaMoja < $kasa){
		header("Location: ../../bank.php?tran=nomoney");
	}else{
		header("Location: ../../bank.php");
	}
}
if(isset($_POST['przelejZ'])){
	if(is_numeric($kasa) && $kasa >= 1 && $kasaBank >= $kasa)
	{
		$kasa = floor($kasa);
		$kasaBank -= $kasa;
		$kasaMoja += $kasa;
		$zapytanie = "UPDATE bank SET bank.Money_Bank = '".$kasaBank."' WHERE bank.ID_Bank = '".$idbanku."';

		UPDATE players SET players.Money_Player = '".$kasaMoja."' WHERE players.ID_Player = '".$_SESSION['id_player']."';";
		$res = $p->multi_query($zapytanie);
		echo $p->error;
		if($res){
			header("Location: ../../bank.php?tran=from");
		}
	}elseif(is_numeric($kasa) && $kasa >= 1 && $kasaBank < $kasa){
		header("Location: ../../bank.php?tran=nomoney");
	}else{
		header("Location: ../../bank.php");
	}
}

?>