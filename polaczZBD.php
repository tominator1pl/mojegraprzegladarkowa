<?php
// Łączenie z BD
	function polacz()
	{
		$p = new mysqli("localhost", "root", "", "tdstrona");
		
		if($p->connect_errno)
		{
			echo "Błąd logowania z bazą";
		}
		else
		{
			return $p;
		}
	}
	
	function rozlacz()
	{
		mysqli_close($p);
	}
?>

<?php
	/*header("index.php")
?>

<?php
//Wylogowanie
session_start();
session_destroy();
echo "Zostałeś wylogowany";
echo "<a href='logowanie.php'>Wróć na stronę logowania</a>"*/
?>
