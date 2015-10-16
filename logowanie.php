<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Logowanie</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  
	<div class="container">
		<div class='row'>
			<div class="col-md-4 col-md-offset-4 jumbotron">
				<form class="form" method='post'>
					<h2 class="form-login-heading">Logowanie</h2>
					<label for="inputLogin">Login</label>
					<input type="text" id="inputLogin" class="form-control" placeholder="login" required autofocus name='login'>
					<label for="inputPassword">Password</label>
					<input type="password" id="inputPassword" class="form-control" placeholder="hasło" required name='haslo'>
					<button class="btn btn-lg btn-primary btn-block" type="submit" name='zaloguj'>Zaloguj</button>
				</form>
			</div>
		</div>
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>