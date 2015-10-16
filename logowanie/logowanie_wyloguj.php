<form name='wologowanie' class='form' method='post'>
<input type='submit' class='btn btn-default' name='wyloguj' value='Wyloguj'>
</form>
<?php
if(isset($_POST['wyloguj']))
{
	session_destroy();
	header("Location: ../index.php");
}
?>