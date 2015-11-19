<html>
<head>
    <?php include 'strona/naglowek.php';
    include_once 'polaczZBD.php';
    include_once 'funkcje/przedmioty.php';
    ?>
    <title>Sklep</title>
</head>
<body class="jumbotron-color">
<div class="row row-w-iframe text-center">
    <h1>Sklep</h1>
    <form name="sklep" class="form-group" method="post" action="strona/sklep/sklep_funkcja.php">
            <div class="table-responsive col-sm-7">
                <div class="lead">Sklep</div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td class="hidden">ID</td>
                            <td>Nazwa</td>
                            <td>Cena</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'strona/sklep/sklep_zawartosc.php';
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive col-sm-5">
                <div class="lead">Ekwipunek<span class="sklep-haisy">Haisy: <?php $p = polacz(); echo getFromDB($p,'players','Money_Player','ID_Player',$_SESSION['id_player']); rozlacz($p);?></span></div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td class="hidden">ID</td>
                        <td>Nazwa</td>
                        <td>Cena</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'strona/ekwipunek/ekwipunek_zawartosc.php';
                    ?>
                    </tbody>
                </table>
            </div>
        <input type="hidden" name="selectedIdKup" value="-1">
        <input type="hidden" name="selectedIdSpr" value="-1">
        <div class="col-sm-12">
            <input type='submit' name='kup' id="butkup" class="btn btn-default" value='Kup'>
            <input type='submit' name='spr' id="butspr" class="btn btn-default" value='Sprzedaj'>
        </div>
    </form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="strona/sklep/sklep_skrypt.js"></script>
</body>
</html>