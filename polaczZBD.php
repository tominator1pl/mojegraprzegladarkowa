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
	if($przygoda) {
		$czas = date('Y-m-d H:i:s');
		$zapytanie = "SELECT * FROM przygody INNER JOIN przygody_types ON przygody.Przy_Type_ID = przygody_types.ID_Przy_Type WHERE ID_Przy = " . $przygoda . ";";
		$res = $r->query($zapytanie);
		$row = $res->fetch_assoc();
		if ($row) {
			$end = strtotime($row['Started']) + ($row['For_Time'] * 60);
			$diff = ($end - strtotime($czas));
			if ($diff <= 0) {
				$money = floor($row['For_Time'] * (0.4 + $row['Difficulty']));
				$exp = floor($row['For_Time'] * (0.8 + $row['Difficulty']));
				if (getFromDB($r, 'users', 'PERMISSIONS_ID', 'PLAYERS_ID', $who) <= 1) {
					$money = floor($money * 1.5);
					$exp = floor($exp * 1.5);
				}
				$kasa = getFromDB($r, 'players', 'Money_Player', 'ID_Player', $who);
				$dos = getFromDB($r, 'players', 'Experience', 'ID_Player', $who);
				$kasa += $money;
				$dos += $exp;
				$dataKoniec = date('Y-m-d H:i:s', $end);
				$zapytanie = "UPDATE players SET Experience = '" . $dos . "', Money_Player = '" . $kasa . "', Przy_ID = NULL WHERE ID_Player = " . $who . ";
INSERT INTO komunikaty (PLAYER_ID, Komunikat, Kom_Typ_ID, Data_Kom) VALUES ('" . $who . "', 'Twoja przygoda na " . $row['Name_Przy'] . " się zakończyła. Zysk: Haisy-" . $money . ", Doświadczenie-" . $exp . ".', '0', '" . $dataKoniec . "');
DELETE FROM przygody WHERE ID_Przy = " . $przygoda . ";";
				$res = $r->multi_query($zapytanie);
				return $res;
			}
		}
	}
	return false;
}

function clearKoms($who){
	$r = polacz();
	$zapytanie = "SELECT COUNT(*) FROM komunikaty WHERE PLAYER_ID = ".$who.";";
	$res = $r->query($zapytanie);
	$row = $res->fetch_array(MYSQL_NUM);
	if($row){
		$ilosc = $row[0]-6;
		if($ilosc < 0)$ilosc = 0;
		$zapytanie = "SELECT ID FROM komunikaty WHERE PLAYER_ID = ".$who." ORDER BY Data_Kom ASC LIMIT ".$ilosc.";";
		$res = $r->query($zapytanie);
		if($res) {
			while ($row = $res->fetch_assoc()) {
				$zapytanie = "DELETE FROM komunikaty WHERE ID = " . $row['ID'] . ";";
				$res2 = $r->query($zapytanie);
			}
		}
	}
	$err = $r->error;
	rozlacz($r);
	return $err;
}
