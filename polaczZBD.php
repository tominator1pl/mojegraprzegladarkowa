<?php
// Łączenie z BD
	function polacz()
	{
		$p = new mysqli("localhost", "root", "", "tdstrona");
		
		if($p->connect_errno)
		{
			echo "Błąd logowania z bazą";
		}
		else
		{
			$p->set_charset('utf8');
			return $p;
		}
	}
	
	function rozlacz($p)
	{
		mysqli_close($p);
	}
	
	function getFromDB(mysqli $pol, $tab, $kol, $chek, $ans){
		$zapytanie = "SELECT $kol FROM $tab WHERE $chek LIKE '$ans' ;";
		$res = $pol->query($zapytanie);
		$res2 = $res->fetch_assoc();
		return $res2[$kol];
	}

	function updateTime($who){
		$r = polacz();
		$czas = date('Y-m-d H:i:s');
		$zapytanie = "UPDATE users SET LastLogout = '".$czas."' WHERE ID_User = ".$who.";";
		$res = $r->query($zapytanie);
		rozlacz($r);
		return $res;
	}

function checkPrzygoda($who){
	$r = polacz();
	$przygoda = getFromDB($r,'players','Przy_ID','ID_Player',$who);
	$czas = date('Y-m-d H:i:s');
	$zapytanie = "SELECT * FROM przygody INNER JOIN przygody_types ON przygody.Przy_Type_ID = przygody_types.ID_Przy_Type WHERE ID_Przy = ".$przygoda.";";
	$res = $r->query($zapytanie);
	$row = $res->fetch_assoc();
	if($row){
		$end = strtotime($row['Started']) + ($row['For_Time']*60);
		$diff = ($end - strtotime($czas));
		if($diff <= 0){
			$money = floor($row['For_Time']*(0.1+$row['Difficulty']));
			$exp = floor($row['For_Time']*(0.2+$row['Difficulty']));
			$kasa = getFromDB($r,'players','Money_Player','ID_Player',$who);
			$dos = getFromDB($r,'players','Experience','ID_Player',$who);
			$kasa += $money;
			$dos += $exp;
			$zapytanie = "UPDATE players SET Experience = '".$dos."', Money_Player = '".$kasa."', Przy_ID = NULL WHERE ID_Player = ".$who.";
DELETE FROM przygody WHERE ID_Przy = ".$przygoda.";";
			$res = $r->multi_query($zapytanie);
			return $res;
		}
	}
	return false;
}

?>

<?php
	//header("Location: index.php")
?>

<?php
/*
//Wylogowanie
session_start();
session_destroy();
echo "Zostałeś wylogowany";
echo "<a href='logowanie.php'>Wróć na stronę logowania</a>"*/
?>