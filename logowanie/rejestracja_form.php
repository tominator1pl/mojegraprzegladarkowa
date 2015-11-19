<div class="col-md-4 col-md-offset-4 jumbotron">
	<div class='text-center'><a class='btn btn-link' href="index.php">Powrót na stronę główną</a></div>
	<div class='text-center lead'>Rejestracja</div>
	<form name='rejestracja' class='form-group' method='post' action="logowanie/rejestracja_funkcja.php">
	<label for='inputLogin'>Login:</label>
	<input type='text' class='form-control' id='inputLogin' name='login' placeholder="Login" required>
	<label for='inputNick'>Nickname:</label>
	<input type='text' class='form-control' id='inputNick' name='nick' placeholder="Nickname" required>
	<label for='inputName'>Imię i Nazwisko:</label>
	<input type='text' class='form-control' id='inputName' name='pelna' placeholder="Imię i Nazwisko" required>
	<label for='inputEmail'>Adres E-mail:</label>
	<input type='text' class='form-control' id='inputEmail' name='mail' placeholder="E-mail" required>
	<label for='inputPass'>Hasło:</label>
	<input type='password' class='form-control' id='inputPass' name='pass' placeholder="Hasło" required>
	<label for='inputPass2'>Powtórz hasło:</label>
	<input type='password' class='form-control' id='inputPass2' name='pass2' placeholder="Hasło" required>
	<label>Akceptuje <a href="regulamin.html" target="_blank">Regulamin</a>&nbsp;<input type='checkbox' name='regula'></label>
	</table>
	<br><input type='submit' name='rejestruj' class="btn btn-default"  value='Wyślij'>
	</form>
</div>