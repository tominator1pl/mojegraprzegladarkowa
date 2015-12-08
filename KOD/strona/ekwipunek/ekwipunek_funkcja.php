<?php
session_start();
include_once '../../polaczZBD.php';
if(isset($_POST['uzyj'])){
    if($_POST['selectedIdEq'] >= 0){
        $idprzedmiotu = $_POST['selectedIdEq'];
        $p = polacz();

        $zapytanie = "SELECT * FROM inventory INNER JOIN items ON inventory.ITEMS_ID = items.ID_Item WHERE ID_Inv = ".$idprzedmiotu." AND PLAYERS_ID = ".$_SESSION['id_player'].";";
        $res = $p->query($zapytanie);
        $row = $res->fetch_assoc();
        if($row){
            switch($row['TYPE_ID']){
                case '1':
                    if($idprzedmiotu == getFromDB($p,'players','Weapon','ID_Player',$_SESSION['id_player'])){
                        $zapytanie = "UPDATE players SET Weapon = NULL WHERE players.ID_Player = ".$_SESSION['id_player'].";";
                        $res = $p->query($zapytanie);
                        if($res) {
                            rozlacz($p);
                            header("Location: ../../ekwipunek.php?kom=sucun");
                        }else{
                            rozlacz($p);
                            header("Location: ../../ekwipunek.php?kom=error");
                        }
                    }else {
                        $zapytanie = "UPDATE players SET Weapon = '" . $idprzedmiotu . "' WHERE players.ID_Player = " . $_SESSION['id_player'] . ";";
                        $res = $p->query($zapytanie);
                        if ($res) {
                            rozlacz($p);
                            header("Location: ../../ekwipunek.php?kom=sucwer");
                        } else {
                            rozlacz($p);
                            header("Location: ../../ekwipunek.php?kom=error");
                        }
                    }
                    break;
                case '2':
                    if($idprzedmiotu == getFromDB($p,'players','Armor','ID_Player',$_SESSION['id_player'])){
                        $zapytanie = "UPDATE players SET Armor = NULL WHERE players.ID_Player = ".$_SESSION['id_player'].";";
                        $res = $p->query($zapytanie);
                        if($res) {
                            rozlacz($p);
                            header("Location: ../../ekwipunek.php?kom=sucun");
                        }else{
                            rozlacz($p);
                            header("Location: ../../ekwipunek.php?kom=error");
                        }
                    }else {
                        $zapytanie = "UPDATE players SET Armor = '" . $idprzedmiotu . "' WHERE players.ID_Player = " . $_SESSION['id_player'] . ";";
                        $res = $p->query($zapytanie);
                        if ($res) {
                            rozlacz($p);
                            header("Location: ../../ekwipunek.php?kom=sucwer");
                        } else {
                            rozlacz($p);
                            header("Location: ../../ekwipunek.php?kom=error");
                        }
                    }
                    break;
            }
        }else{
            rozlacz($p);
            header("Location: ../../ekwipunek.php?kom=error");
        }
    }else{
        header("Location: ../../ekwipunek.php?kom=noselect");
    }
}