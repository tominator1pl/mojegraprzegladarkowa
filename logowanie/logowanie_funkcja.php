<?php
function filtruj($nazwa){
	return mysql_real_escape_string(stripslashes($nazwa));
}
session_start();
include_once '../polaczZBD.php';
$salt = "marynowany";
if(isset($_POST['login']))
{
	$login = filtruj($_POST['login']);
	$haslo = filtruj($_POST['haslo']);
	$haslo = md5($salt . $haslo);
	$p = polacz();

	$zapytanie = "SELECT * FROM users WHERE Login LIKE '".$login."' AND Pass LIKE '".$haslo."';";
	$res = $p->query($zapytanie);
	$row = $res->fetch_assoc();
	
	if($row)
	{
		$_SESSION['zalogowany'] = 1;
		$_SESSION['id_user'] = $row['ID_User'];
		$_SESSION['id_player'] = $row['PLAYERS_ID'];
		$_SESSION['permission'] = $row['PERMISSIONS_ID'];
		rozlacz($p);
		header("Location: ../index.php");
	}
	else
	{
		rozlacz($p);
		header("Location: ../index.php?log=err");
	}
}
?>