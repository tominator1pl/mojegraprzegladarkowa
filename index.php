<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php 
		include_once 'polaczZBD.php';
		session_start();
	?>
</head>
<body>
<div class="glownaLoguj">
asd
</div>
<?php
if(isset($_SESSION['permission'])){
switch($_SESSION['permission']){
	case 0:
		echo "Siema uzytkownik";
		break;
	case 1:
		echo "Siema VIP";
		break;
	case 2:
		echo "Witam Admina";
		break;
	default:
		echo "Proszę się zalogować";
		break;
		}
}
?>
</body>
</html>