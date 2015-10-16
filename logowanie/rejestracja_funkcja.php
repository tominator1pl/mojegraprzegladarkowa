<?php
session_start();
include_once '../polaczZBD.php';
$salt = "marynowany";
if(isset( $_POST['rejestruj'] )){
	if(isset($_POST['regula'])){
		if ($_POST['login'] === '' || $_POST['pass'] === '' || $_POST['nick'] === '' || $_POST['pelna'] === '' || $_POST['mail'] === '' || $_POST['pass2'] === ''){
		print("Proszę uzupełnić luki.");
	}else{
		if ($_POST['pass'] === $_POST['pass2']){
			$p = polacz();
			$login = stripslashes($_POST['login']);
			$pass = stripslashes($_POST['pass']);
			$nick = stripslashes($_POST['nick']);
			$pelna = stripslashes($_POST['pelna']);
			$mail = stripslashes($_POST['mail']);
			$login = mysql_real_escape_string($login);
			$pass = mysql_real_escape_string($pass);
			$nick = mysql_real_escape_string($nick);
			$pelna = mysql_real_escape_string($pelna);
			$mail = mysql_real_escape_string($mail);
			$passw = md5($salt . $pass);
			$confirm = md5("con" . $login);
			$zapytanie = "SELECT COUNT(*) FROM users WHERE Login LIKE '".$login."';";
			$res = $p->query($zapytanie);
			$row = $res->fetch_array(MYSQL_NUM);
			if ($row[0] == 1) {
				print("Użytkownik z tym loginem już istnieje");
			} else {
				$zapytanie2 = "INSERT INTO users (PERMISSIONS_ID, Login, Pass, Nickname, Pelna, EMail) VALUES (2,'$login','$passw','$nick','$pelna','$mail')";
				$res = $p->query($zapytanie2);
				if($res){
					print("Konto zostało utworzone!<br>Proszę poczekać na aktywację od administratora!");
					echo '<br>Przekierowanie nastąpi za 5 sekund.';
					header("Refresh: 5; Location: index.php");
					/*$wiadomosc = "<html>
					<head>
					<meta charset='utf-8'>
					</head>
					<body>
					<h3>Potwierdzenie</h3>
					Dziękujemy za zarejestrowanie na naszej stronie.
					<br>Proszę wcisnąć link aktywacyjny lub skopiować do paska przeglądarki.
					<br>Link aktywacyjny: <a href='http://localhost:8080/mailconfirm.php?confirm=$confirm'>http://localhost:8080/mailconfirm.php?confirm=a</a>
					</body>
					</html>";
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= 'From: strona EZN' . "\r\n";
					if(mail($mail,"Aktywacja konta",$wiadomosc, $headers)){
						print("<br>Na podany adres email został wysłany link aktywacyjny!");
					}*/
				}
			}
			rozlacz($p);
		}else{
			print("Hasła się niezgadzają");
		}
	}
	}else{
		print("Wymagane jest zaakceptowanie regulaminu.");
	}
	
}
?>