<form name='admin-wyjdz' class='form' method='post'>
    <input type='submit' class='btn btn-default' name='wyjdz' value='Wyjdź z panelu'>
</form>
<?php
if(isset($_POST['wyjdz']))
{
    header("Location: ../../index.php");
}
?>