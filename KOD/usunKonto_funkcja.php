<html>
<head>
    <?php include 'strona/naglowek.php';?>
    <title>Usunąć Konto?</title>
</head>
<body>
<div class="container">
        <div class="jumbotron col-md-12 gora-strony text-center">
            <h1>Usunąć Konto?</h1>
        </div>
    <div class="jumbotron col-md-12 text-center">
        <h2>Czy napewno?</h2>
        <form name='usunKonto' class='form' method='post'>
            <input type='submit' class='btn btn-danger' name='usunKonto' value='Usuń'>
            <a href="index.php"><input type='button' class='btn btn-default' value='Anuluj'></a>
        </form>
        <?php
        if(isset($_POST['usunKonto'])){
            $res = usunKonto($_SESSION['id_user']);
            if($res){
                session_destroy();
                header("Location: ../index.php");
            }
        }
        ?>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>