<html>
<head>
    <?php include 'strona/naglowek.php';
    include_once 'polaczZBD.php';
    include_once 'funkcje/item_handler.php';
    ?>
    <title>Ekwipunek</title>
</head>
<body class="jumbotron-color">
<div class="row row-w-iframe text-center">
    <h1>Ekwipunek</h1>
    <form name="ekwipunek" class="form-group" method="post" action="strona/ekwipunek/ekwipunek_funkcja.php">
        <div class="table-responsive col-sm-12">
            <div class="lead">Haisy: <?php $p = polacz(); echo getFromDB($p,'players','Money_Player','ID_Player',$_SESSION['id_player']); rozlacz($p);?></div>
            <div class="tabelki-iframe">
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
            <?php if(isset($_GET['kom'])){
                switch($_GET['kom']) {
                    case 'sucwer':
                        echo "<div class='lead'>Założono!</div>";
                        break;
                    case 'sucun':
                        echo "<div class='lead'>Zdjęto!</div>";
                        break;
                    case 'error':
                        echo "<div class='lead'>Wystapił błąd!</div>";
                        break;
                    case 'noselect':
                        echo "<div class='lead'>Nie wybrano żadnego przedmiotu.</div>";
                        break;
                }
            } ?>
        </div>
        <input type="hidden" name="selectedIdEq" value="-1">
    </form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="strona/ekwipunek/ekwipunek_skrypt.js"></script>
</body>
</html>