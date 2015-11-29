<html>
<head>
    <?php include 'strona/naglowek.php';
    include_once 'polaczZBD.php';
    include_once 'funkcje/item_handler.php';
    ?>
    <title>Przygoda</title>
</head>
<body class="jumbotron-color">
<div class="row row-w-iframe text-center">
    <h1>Przygoda</h1>
    <form name="przygoda" class="form-group" method="post" action="strona/przygoda/przygoda_funkcja.php">
        <div class="table-responsive col-sm-12">
            <?php
            $p = polacz();
            $przygoda = getFromDB($p,'players','Przy_ID','ID_Player',$_SESSION['id_player']);
            if($przygoda){
                $zapytanie = "SELECT * FROM przygody INNER JOIN przygody_types ON przygody.Przy_Type_ID = przygody_types.ID_Przy_Type INNER JOIN difficult ON przygody_types.Difficulty = difficult.ID_Dif WHERE ID_Przy = ".$przygoda.";";
                $res = $p->query($zapytanie);
                $row = $res->fetch_assoc();
                if($row){
                    $end = strtotime($row['Started']) + ($row['For_Time']*60);
                    $diff = ($end - strtotime(date('Y-m-d H:i:s')));
                    ?>
                    <div class="lead">Aktualnie na przygodzie</div>
                    <div class="lead"><?php echo $row['Name_Przy']." - Zysk: ".$row['Name_Dif'] ?></div>
                    <h2>Pozostało:
                        <div id="CzasPoz">
                            <?php echo $diff; ?>
                        </div>
                    </h2>
                    <input type="submit" class="btn btn-default" name="wroc" value="Wróć z przygody">
                    <?php
                }
            }else{ ?>
            <div class="lead">Życie: <span class="zycie"><?php echo getFromDB($p,'players','Health','ID_Player',$_SESSION['id_player']); rozlacz($p);?></span></div>
            <div class="tabelki-iframe">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td class="hidden">ID</td>
                        <td>Miejsce</td>
                        <td>-Życia na minutę</td>
                        <td>Zysk</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'strona/przygoda/przygoda_zawartosc.php';
                    ?>
                    </tbody>
                </table>
            </div>
            <?php }
            if(isset($_GET['kom'])){
                switch($_GET['kom']) {
                    case 'sucpo':
                        echo "<div class='lead'>Powrócono z przygody!</div>";
                        break;
                    case 'sucgo':
                        echo "<div class='lead'>Przygoda rozpoczęta!</div>";
                        break;
                    case 'error':
                        echo "<div class='lead'>Wystapił błąd!</div>";
                        break;
                    case 'noselect':
                        echo "<div class='lead'>Nie wybrano żadnego przedmiotu.</div>";
                        break;
                }
            }?>

        </div>
        <input type="hidden" name="selectedIdPrzy" value="-1">
    </form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="strona/przygoda/przygoda_skrypt.js"></script>
</body>
</html>