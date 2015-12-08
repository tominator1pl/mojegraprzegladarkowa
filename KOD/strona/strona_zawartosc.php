<?php
if(isset($_SESSION['permission'])){
	include 'strona_po_zalogowaniu.php';
}else{include 'strona_przed_zalogowaniem.php';}
?>