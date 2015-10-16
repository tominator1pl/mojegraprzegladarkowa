<<<<<<< HEAD
﻿<html>
<head>
	<link href="style.css" media="all" rel="stylesheet" type="text/css">
	<meta charset="UTF-8">
	<?php 
		include_once 'polaczZBD.php';
		session_start();
	?>
</head>
<body>
<?php include 'logowanie/logowanie_zawartosc.php'; ?>
</body>
=======
﻿<html>
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
>>>>>>> a7a62e6566ac6206f7b5a628a5ee6de6eff1131a
</html>