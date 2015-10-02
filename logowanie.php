<?php
if(isset($_POST['login']))
{
	$login = $_POST['login'];
	$haslo = $_POST['haslo'];
	
	$p = polacz();
	
	$zapytanie = "SELECT COUNT(*) FROM users WHERE Login LIKE '".$login."' AND Pass LIKE '".$haslo."';";
	$res = $p->query($zapytanie);
	$row = $res->fetch_array(MYSQL_NUM);
	
	if($row[0] == 1)
	{
		$_SESSION['zalogowany'] = 1;
		$zapytanie = "SELECT * FROM users WHERE Login LIKE '".$login."' AND Pass LIKE '".$haslo."';";
		$res = $p->query($zapytanie);
		$row = $res->fetch_assoc();
		$_SESSION['id_user'] = $row['ID'];
		$_SESSION['permission'] = $row['PERMISSIONS_ID'];
		header("Location: index.php");
	}
	else
	{
		echo "Niepoprawny login lub haslo";
	}
}
?>