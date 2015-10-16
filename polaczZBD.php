<<<<<<< HEAD
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
	
	function rozlacz($p)
	{
		mysqli_close($p);
	}
?>

<?php
	//header("Location: index.php")
?>

<?php
/*
//Wylogowanie
session_start();
session_destroy();
echo "Zostałeś wylogowany";
echo "<a href='logowanie.php'>Wróć na stronę logowania</a>"*/
?>
=======
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
>>>>>>> a7a62e6566ac6206f7b5a628a5ee6de6eff1131a
