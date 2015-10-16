<form name='wologowanie' method='post'>
<br><input type='submit' name='wyloguj' value='Wyloguj'>
</form>
<?php
if(isset($_POST['wyloguj']))
{
	session_destroy();
	header("Location: ../index.php");
}
?>