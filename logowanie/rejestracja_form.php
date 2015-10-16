<div class="col-md-4 col-md-offset-4 jumbotron">
	<a class='btn btn-link' href="index.php">Powrót na stronę główną</a>
	<div class='text-center lead'>Rejestracja</div>
	<form name='rejestracja' class='form' method='post' action="logowanie/rejestracja_funkcja.php">
	<label for='inputLogin'>Login:</label>
	<input type='text' class='form-control' id='inputLogin' name='login' placeholder="Login" required>
	<label for='inputNick'>Nickname:</label>
	<input type='text' class='form-control' id='inputNick' name='nick' placeholder="Nickname" required>
	<label for='inputName'>Imię i Nazwisko:</label>
	<input type='text' class='form-control' id='inputName' name='pelna' placeholder="Nickname" required>
	<tr><td>Adres E-mail:</td><td><input type='text'  name='mail'></td></tr>
	<tr><td>Hasło:</td><td><input type='password' name='pass'></td></tr>
	<tr><td>Powtórz hasło:</td><td><input type='password' name='pass2'></td></tr>
	<tr><td>Akceptuje <a href="regulamin.html" target="_blank">Regulamin</a></td><td><input type='checkbox' name='regula'></td></tr>
	</table>
	<br><input type='submit' name='rejestruj' value='Wyślij'>
	</form>
</div>