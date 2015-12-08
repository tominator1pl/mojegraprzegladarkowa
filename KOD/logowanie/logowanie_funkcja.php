<?php
/**
 * filtruj sluży do usunięcia szkodliwych znaków specjalnych
 * @param $nazwa string ciag znakow do sfiltrowania
 * @return string sfiltrowany ciag znakow
 */
function filtruj($nazwa, $p){
	return $p->real_escape_string(stripslashes($nazwa));
}
session_start();
include_once '../polaczZBD.php';
$salt = "marynowany"; // razem z haslem w md5 aby nie dało się utworzyc tzw. rainbow dictionary.
if(isset($_POST['login']))
{
	$p = polacz();
	$login = filtruj($_POST['login'],$p);
	$haslo = filtruj($_POST['haslo'],$p);
	$haslo = md5($salt . $haslo);


	$zapytanie = "SELECT * FROM users WHERE Login LIKE '".$login."' AND Pass LIKE '".$haslo."';";
	$res = $p->query($zapytanie);
	$row = $res->fetch_assoc();
	
	if($row)
	{
		if(isset($_GET['confirm'])){ // jesli jest to z linku aktywacyjnego
			$confirm = $_GET['confirm'];
			if($row['Confirm'] == $confirm){
				$zapytanie = "UPDATE users SET PERMISSIONS_ID = '2' WHERE ID_User = '".$row['ID_User']."';";
				$res = $p->query($zapytanie);
				if($res){
					$_SESSION['zalogowany'] = 1;
					$_SESSION['id_user'] = $row['ID_User'];
					$_SESSION['id_player'] = $row['PLAYERS_ID'];
					$_SESSION['permission'] = $row['PERMISSIONS_ID'];
					updateTime($_SESSION['id_user']);
					rozlacz($p);
					header("Location: ../kreator.php?kom=conf");
				}
			}else{
				rozlacz($p);
				header("Location: ../index.php?log=errconftext");
			}
		}else {
			if($row['PERMISSIONS_ID'] >= 3){
				rozlacz($p);
				header("Location: ../index.php?log=errconf");
			}else {
				$_SESSION['zalogowany'] = 1;
				$_SESSION['id_user'] = $row['ID_User'];
				$_SESSION['id_player'] = $row['PLAYERS_ID'];
				$_SESSION['permission'] = $row['PERMISSIONS_ID'];
				updateTime($_SESSION['id_user']);
				rozlacz($p);
				header("Location: ../index.php");
			}
		}
	}
	else
	{
		rozlacz($p);
		header("Location: ../index.php?log=err");
	}
}
?>