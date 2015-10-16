<div class="col-md-4 col-md-offset-4 jumbotron">
<?php
if(isset($_SESSION['permission'])){
switch($_SESSION['permission']){
	case 0:
		echo "Witam Admina";
		include 'logowanie_wyloguj.php';
		break;
	case 1:
		echo "Siema VIP";
		include 'logowanie_wyloguj.php';
		break;
	case 2:
		echo "Siema uzytkownik";
		include 'logowanie_wyloguj.php';
		break;
	case 3:
		echo "Twoje konto nie zostało jeszcze aktywowane.";
		include 'logowanie_wyloguj.php';
		break;
	default:
		include 'logowanie_loguj_form.php';
		break;
		}
}else{include 'logowanie_loguj_form.php';}
?>
</div>