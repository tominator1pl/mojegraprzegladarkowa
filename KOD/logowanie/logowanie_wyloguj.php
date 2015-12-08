<form name='wologowanie' class='form' method='post'>
<input type='submit' class='btn btn-default' name='wyloguj' value='Wyloguj'>
</form>
<?php
$p = polacz();
$zapytanie = "SELECT PLAYERS_ID FROM users WHERE ID_User = ".$_SESSION['id_user'].";";
$res = $p->query($zapytanie);
$row = $res->fetch_assoc();
if($row && $row['PLAYERS_ID'] == null){ //jesli gracz nie utworzyl jeszcze postaci przekieruj do kreatora
	rozlacz($p);
	header("Location: ../kreator.php");
}else{
	rozlacz($p);
}
if(isset($_POST['wyloguj']))
{
	updateTime($_SESSION['id_user']);
	session_destroy();
	header("Location: ../index.php");
}
?>