<?php
if(isset($_SESSION['permission'])){
	header("Location: ../index.php");
}else{include 'rejestracja_form.php';}
?>