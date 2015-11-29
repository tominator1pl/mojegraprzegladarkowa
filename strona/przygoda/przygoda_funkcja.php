<?php
session_start();
include_once '../../polaczZBD.php';
if(isset($_POST['wroc'])){
    $p = polacz();
    $przygoda = getFromDB($p,'players','Przy_ID','ID_Player',$_SESSION['id_player']);
    if($przygoda) {
        if(checkPrzygoda($_SESSION['id_player'])){
            rozlacz($p);
            header("Location: ../../przygoda.php?kom=sucpo");
        }
        $zapytanie = "SELECT * FROM przygody INNER JOIN przygody_types ON przygody.Przy_Type_ID = przygody_types.ID_Przy_Type INNER JOIN difficult ON przygody_types.Difficulty = difficult.ID_Dif WHERE ID_Przy = " . $przygoda . ";";
        $res = $p->query($zapytanie);
        $row = $res->fetch_assoc();
        if ($row) {
            $diff = abs(strtotime(date('Y-m-d H:i:s')) - strtotime($row['Started']));
            $newTime = floor($diff/60);
            $zapytanie2 = "UPDATE przygody SET For_Time = '".$newTime."' WHERE ID_Przy = ".$przygoda.";";
            $res2 = $p->query($zapytanie2);
            if($res2){
                rozlacz($p);
                checkPrzygoda($_SESSION['id_player']);
                header("Location: ../../przygoda.php?kom=sucpo");
            }
        }
    }
    rozlacz($p);
    checkPrzygoda($_SESSION['id_player']);
    header("Location: ../../przygoda.php?kom=error");
}
if(isset($_POST['naPrzy'])){
    if($_POST['selectedIdPrzy'] >= 0) {
        $p = polacz();
        $czas = $_POST['czas'];
        $diffi = getFromDB($p,'przygody_types','Difficulty','ID_Przy_Type',$_POST['selectedIdPrzy']);
        if($diffi == 0){
            $maxCzas = INF;
        }else{
            $maxCzas = (getFromDB($p, 'players', 'Health', 'ID_Player', $_SESSION['id_player']) / getFromDB($p, 'przygody_types', 'Difficulty', 'ID_Przy_Type', $_POST['selectedIdPrzy']));
        }
        if(is_numeric($czas) && $czas >= 1 && $czas <= $maxCzas)
        {
            $data = date('Y-m-d H:i:s');
            $zapytanie = "INSERT INTO przygody (Przy_Type_ID, Started, For_Time) VALUES ('".$_POST['selectedIdPrzy']."', '".$data."', '".$czas."');";
            $res = $p->query($zapytanie);
            $idPrzy = $p->insert_id;
            if($res){
                $zapytanie = "UPDATE players SET Przy_ID = '".$idPrzy."' WHERE ID_Player = ".$_SESSION['id_player'].";";
                $res = $p->query($zapytanie);
                echo $p->error;
                if($res){
                    rozlacz($p);
                    header("Location: ../../przygoda.php?kom=sucgo");
                }else{
                    rozlacz($p);
                    header("Location: ../../przygoda.php?kom=error");
                }
            }else{
                rozlacz($p);
                header("Location: ../../przygoda.php?kom=error");
            }
        }else{
            rozlacz($p);
            header("Location: ../../przygoda.php?kom=error");
        }
    }else{
        header("Location: ../../przygoda.php?kom=noselect");
    }
}