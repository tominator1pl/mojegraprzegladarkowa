<?php
function filtruj($nazwa){
	return mysql_real_escape_string(stripslashes($nazwa));
}
session_start();
include_once '../polaczZBD.php';
$salt = "marynowany";
if(isset( $_POST['rejestruj'] )){
	if(isset($_POST['regula'])){
		if ($_POST['login'] === '' || $_POST['pass'] === '' || $_POST['nick'] === '' || $_POST['pelna'] === '' || $_POST['mail'] === '' || $_POST['pass2'] === ''){
			header("Location: ../register.php?kom=fields");
	}else{
		if ($_POST['pass'] === $_POST['pass2']){
			$p = polacz();
			$login = filtruj($_POST['login']);
			$pass = filtruj($_POST['pass']);
			$nick = filtruj($_POST['nick']);
			$pelna = filtruj($_POST['pelna']);
			$mail = filtruj($_POST['mail']);
			$passw = md5($salt . $pass);
			$confirm = md5("con" . $login);
			$czas = date('Y-m-d H:i:s');
			$zapytanie = "SELECT COUNT(*) FROM users WHERE Login LIKE '".$login."';";
			$res = $p->query($zapytanie);
			$row = $res->fetch_array(MYSQL_NUM);
			if ($row[0] == 1) {
				rozlacz($p);
				header("Location: ../register.php?kom=exists");
			} else {
				$zapytanie2 = "INSERT INTO users (PERMISSIONS_ID, Login, Pass, Nickname, Pelna, EMail, LastLogout) VALUES (2,'$login','$passw','$nick','$pelna','$mail','$czas')";
				$res = $p->query($zapytanie2);
				if($res){
					print("Konto zostało utworzone!");
					echo '<br>Przekierowanie nastąpi za 5 sekund.';
					echo '<meta http-equiv="refresh" content="5; url=../index.php"/>';
					/*$wiadomosc = "<html>
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
					if(mail($mail,"Aktywacja konta",$wiadomosc, $headers)){
						print("<br>Na podany adres email został wysłany link aktywacyjny!");
					}*/
				}
			}
			rozlacz($p);
		}else{
			header("Location: ../register.php?kom=passes");
		}
	}
	}else{
		header("Location: ../register.php?kom=regu");
	}
	
}
?>