<?php
session_start();
include_once '../../polaczZBD.php';
if(isset($_POST['kup'])){
	if($_POST['selectedIdKup'] >= 0){
		$idprzedmiotu = $_POST['selectedIdKup'];
		$p = polacz();
		$kasaMoja = getFromDB($p,'players','Money_Player','ID_Player',$_SESSION['id_player']);
		
		$zapytanie = "SELECT * FROM shop INNER JOIN items ON shop.ITEMS_ID = items.ID_Item WHERE ID_Shop = ".$idprzedmiotu.";";
		$res = $p->query($zapytanie);
		$row = $res->fetch_assoc();
		if($row){
			if($kasaMoja >= $row['Price_Item'] && $row['Permission_Shop'] >= $_SESSION['permission']){
				$kasaMoja -= $row['Price_Item'];
				$zapytanie = "INSERT INTO inventory(ITEMS_ID,PLAYERS_ID,Name_Inv) VALUES (".$row['ITEMS_ID'].",".$_SESSION['id_player'].",'".$row['Name_Shop']."');

				UPDATE players SET players.Money_Player = '".$kasaMoja."' WHERE players.ID_Player = '".$_SESSION['id_player']."';";
				$res = $p->multi_query($zapytanie);
				if($res){
					rozlacz($p);
					header("Location: ../../sklep.php?kom=suckup");
				}else{
					rozlacz($p);
					header("Location: ../../sklep.php?kom=error");
				}
			}else{
				rozlacz($p);
				header("Location: ../../sklep.php?kom=nomoney");
			}
		}
		
	}else{
		header("Location: ../../sklep.php?kom=noselect");
	}
}elseif(isset($_POST['spr'])){
	if($_POST['selectedIdSpr'] >= 0){
		$idprzedmiotu = $_POST['selectedIdSpr'];
		$p = polacz();
		$kasaMoja = getFromDB($p,'players','Money_Player','ID_Player',$_SESSION['id_player']);

		$zapytanie = "SELECT * FROM inventory INNER JOIN items ON inventory.ITEMS_ID = items.ID_Item WHERE ID_Inv = ".$idprzedmiotu." AND PLAYERS_ID = ".$_SESSION['id_player'].";";
		$res = $p->query($zapytanie);
		$row = $res->fetch_assoc();
		if($row){
			$kasaMoja += ($row['Price_Item']/2);
			$zapytanie = "DELETE FROM inventory WHERE ID_Inv = ".$idprzedmiotu.";

			  UPDATE players SET players.Money_Player = '".$kasaMoja."' WHERE players.ID_Player = '".$_SESSION['id_player']."';";
			$res = $p->multi_query($zapytanie);
			if($res){
				rozlacz($p);
				header("Location: ../../sklep.php?kom=sucspr");
			}else{
				rozlacz($p);
				header("Location: ../../sklep.php?kom=error");
			}

		}else{
			rozlacz($p);
			header("Location: ../../sklep.php?kom=error");
		}

	}else{
		header("Location: ../../sklep.php?kom=noselect");
	}
}else{
	header("Location: ../../sklep.php");
}