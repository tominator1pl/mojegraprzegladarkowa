<?php
session_start();
include_once '../polaczZBD.php';
$p = polacz();
$kasaMoja = getFromDB($p,'players','Money','ID',$_SESSION['id_player']);
$kasaBank = getFromDB($p,'bank','Money','ID',getFromDB($p,'players','BANK_ID','ID',$_SESSION['id_player']));
if(isset($_POST['przelejDo'])){
	$kasaDoPrzelania = $_POST['kwotaDo'];
	if($kasaMoja >= $kasaDoPrzelania)
	{
		$kasaBank += $kasaDoPrzelania;
		$kasaMoja -= $kasaDoPrzelania;
		$zapytanie = "";
		$res = $p->query($zapytanie);
		if($res){
			
		}
	}
}
if(isset($_POST['przelejZ'])){
	
}

?>