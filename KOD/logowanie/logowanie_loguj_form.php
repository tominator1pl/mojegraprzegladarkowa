<div class='text-center lead'>Logowanie</div>
<form name='logowanie' class='form' method='post' action="logowanie/logowanie_funkcja.php">
<label for='inputLogin'>Login:</label>
<input type='text' class='form-control' id='inputLogin' name='login' placeholder="Login" required>
<label for='inputPass'>Hasło:</label>
<input type='password' class='form-control' id='inputPass' name='haslo' placeholder="Hasło" required>
<input type='submit' name='loguj' class='btn btn-primary' value='Zaloguj'>
<a class='btn btn-link' href="rejestracja.php">Zarejestruj się!</a>
    <br><?php if(isset($_GET['log'])) {
    switch ($_GET['log']) {
        case 'err':
            echo 'Nieprawidłowy Login lub Hasło';
            break;
        case 'errconf':
            echo 'Twoje konto nie zostało jeszcze aktywowane';
            break;
        case 'errconftext':
            echo 'Zły kod aktywacji';
            break;
    }
}
?>
</form>