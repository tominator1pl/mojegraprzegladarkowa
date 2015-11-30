<html>
<head>
    <?php include 'strona/naglowek.php';
    include_once 'polaczZBD.php';
    include_once 'funkcje/item_handler.php';
    ?>
    <title>Arena</title>
</head>
<body class="jumbotron-color">
<div class="row row-w-iframe text-center">
    <h1>Arena</h1>
    <form name="arena" class="form-group" method="post" action="strona/arena/arena_funkcja.php">
        <div class="table-responsive col-sm-12">
            <div class="lead">Życie: <?php $p = polacz(); echo getFromDB($p,'players','Health','ID_Player',$_SESSION['id_player']); rozlacz($p);?></div>
            <div class="tabelki-iframe">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td class="hidden">ID</td>
                        <td></td>
                        <td>Postać</td>
                        <td>Poziom</td>
                        <td class="hidden">Siła</td>
                        <td class="hidden">Obrona</td>
                        <td>Haisy</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'strona/arena/arena_zawartosc.php';
                    ?>
                    </tbody>
                </table>
            </div>
            <?php if(isset($_GET['kom'])){
                switch($_GET['kom']) {
                    case 'wyg':
                        echo "<div class='lead'>Wygrałeś!</div>";
                        break;
                    case 'prze':
                        echo "<div class='lead'>Przegrałeś!</div>";
                        break;
                    case 'error':
                        echo "<div class='lead'>Wystapił błąd!</div>";
                        break;
                    case 'noselect':
                        echo "<div class='lead'>Nie wybrano żadnego przeciwnika.</div>";
                        break;
                }
            } ?>
        </div>
        <input type="hidden" name="selectedIdPos" value="-1">
    </form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="strona/arena/arena_skrypt.js"></script>
</body>
</html>