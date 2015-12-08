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
if(isset( $_POST['rejestruj'] )){
	if(isset($_POST['regula'])){ //zaakceptowano regulamin
		if ($_POST['login'] === '' || $_POST['pass'] === '' || $_POST['nick'] === '' || $_POST['pelna'] === '' || $_POST['mail'] === '' || $_POST['pass2'] === ''){ //wszystkie pola uzupelniane
			header("Location: ../rejestracja.php?kom=fields");
		}else{
		if ($_POST['pass'] === $_POST['pass2']){ //hasla sie zgadzja
			$p = polacz();
			$login = filtruj($_POST['login'], $p);
			$pass = filtruj($_POST['pass'], $p);
			$nick = filtruj($_POST['nick'], $p);
			$pelna = filtruj($_POST['pelna'], $p);
			$mail = filtruj($_POST['mail'], $p);
			$passw = md5($salt . $pass);
			$confirm = md5("con" . $login);
			$czas = date('Y-m-d H:i:s');
			$zapytanie = "SELECT COUNT(*) FROM users WHERE Login LIKE '".$login."';";
			$res = $p->query($zapytanie);
			$row = $res->fetch_array(MYSQL_NUM);
			if ($row[0] == 1) {
				rozlacz($p);
				header("Location: ../rejestracja.php?kom=exists");
			} else {
				$zapytanie2 = "INSERT INTO users (PERMISSIONS_ID, Login, Pass, Nickname, Pelna, EMail, LastLogout, Confirm) VALUES (3,'$login','$passw','$nick','$pelna','$mail','$czas','$confirm')";
				$res = $p->query($zapytanie2);
				$iduzytkownika = $p->insert_id;
				if($res){
					print("Konto zostało utworzone!");
					echo '<br>Przekierowanie nastąpi za 5 sekund.';
					echo '<meta http-equiv="refresh" content="5; url=../index.php"/>';
					$wiadomosc = "<html>
					<head>
					<meta charset='utf-8'>
					</head>
					<body>
					<h3>Potwierdzenie</h3>
					Dziękujemy za zarejestrowanie na naszej stronie.
					<br>Proszę kliknąć link aktywacyjny lub skopiować go do paska przeglądarki.
					<br>Link aktywacyjny: <a href='http://localhost/mailconfirm.php?confirm=$confirm'>http://localhost/mailconfirm.php?confirm=$confirm</a>
					</body>
					</html>";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: MOJA STRONA MOŻe' . "\r\n";
					if(mail($mail,"Aktywacja konta",$wiadomosc, $headers)){ //wysylanie Emaila, jesli sie udalo(na hastingu sie udaje) to wymagana jest aktywacja
						print("<br>Na podany adres email został wysłany link aktywacyjny!");
					}else{ // jesli nie udalo sie wyslac emaila ustaw uprawnienia jako juz zaakceptowany
						$zapytanie2 = "UPDATE users SET PERMISSIONS_ID = '2' WHERE ID_User = '$iduzytkownika'";
						$res = $p->query($zapytanie2);
					}
				}
			}
			rozlacz($p);
		}else{
			header("Location: ../rejestracja.php?kom=passes");
		}
	}
	}else{
		header("Location: ../rejestracja.php?kom=regu");
	}
	
}
?>