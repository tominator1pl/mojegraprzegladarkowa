<html>
<head>
    <?php include 'strona/naglowek.php';?>
    <title>Potwierdź Maila</title>
    <?php
    $confirm = "";
    if(isset($_GET['confirm'])){
        $confirm = "?confirm=".$_GET['confirm'];
    } ?>
</head>
<body>
<div class="container">
    <div class="jumbotron col-md-12 gora-strony text-center">
        <h1>Potwierdź Maila</h1>
    </div>
    <div class="jumbotron col-md-4 col-md-offset-4">
        <div class='text-center lead'>Proszę się zalogować</div>
        <form name='logowanie' class='form' method='post' action="logowanie/logowanie_funkcja.php<?php echo $confirm ?>">
            <label for='inputLogin'>Login:</label>
            <input type='text' class='form-control' id='inputLogin' name='login' placeholder="Login" required>
            <label for='inputPass'>Hasło:</label>
            <input type='password' class='form-control' id='inputPass' name='haslo' placeholder="Hasło" required>
            <input type='submit' name='loguj' class='btn btn-primary' value='Zaloguj'>
            <br><?php if(isset($_GET['log']) && $_GET['log'] === 'err')echo 'Nieprawidłowy Login lub Hasło'?>
        </form>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>