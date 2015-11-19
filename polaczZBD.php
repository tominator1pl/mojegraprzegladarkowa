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