<html>
<head>
    <?php include 'strona/naglowek.php';
    include_once 'polaczZBD.php';
    $p = polacz();
    $zapytanie = "SELECT * FROM players WHERE ID_Player=".$_SESSION['id_player'].";";
    $res = $p->query($zapytanie);
    $row = $res->fetch_assoc();
    ?>
    <title>Nowy Poziom</title>
</head>
<body class="jumbotron-color">
<div class="row row-w-iframe text-center">
    <h1>Nowy Poziom</h1>
    <form name="poziom" class="form-group" method="post" action="strona/poziom/poziom_funkcja.php">
        <div class="col-sm-12">
            <div class="lead">Poziom: <?php echo $row['Level'];?>
            <br>Punkty do rozdania: <span id="punkty"><?php echo $row['AvaPoints'];?></span></div>
            <table border="0">
                <tr>
                <td><span class="lead">Życie: <span id="zycie"><?php echo $row['Health'];?></span>&nbsp;</span></td>
                <td><input type="button" class="btn btn-default" value="-" id="zyc-minus" disabled></td>
                <td><input type="button" class="btn btn-primary" value="+" id="zyc-plus"></td>
                    <input type="hidden" id="zyc-pkt" name="zyc-pkt" value="0">
                </tr>
                <tr>
                    <td><span class="lead">Siła: <span id="sila"><?php echo $row['Strength'];?></span>&nbsp;</span></td>
                    <td><input type="button" class="btn btn-default" value="-" id="sil-minus" disabled></td>
                    <td><input type="button" class="btn btn-primary" value="+" id="sil-plus"></td>
                    <input type="hidden" id="sil-pkt" name="sil-pkt" value="0">
                </tr>
                <tr>
                    <td><span class="lead">Obrona: <span id="obrona"><?php echo $row['Defence'];?></span>&nbsp;</span></td>
                    <td><input type="button" class="btn btn-default" value="-" id="obr-minus" disabled></td>
                    <td><input type="button" class="btn btn-primary" value="+" id="obr-plus"></td>
                    <input type="hidden" id="obr-pkt" name="obr-pkt" value="0">
                </tr>
            </table>
            <input type="submit" name="poziomup" class="btn btn-default" value="Zaakceptuj">
            <?php if(isset($_GET['kom'])){
                switch($_GET['kom']) {
                    case 'error':
                        echo "<div class='lead'>Wystapił błąd!</div>";
                        break;
                    case 'noselect':
                        echo "<div class='lead'>Nie rozdano żadnych punktów.</div>";
                        break;
                }
            } ?>
        </div>
    </form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="strona/poziom/poziom_skrypt.js"></script>
</body>
</html>