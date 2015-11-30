<?php
function filtruj($nazwa){
    return mysql_real_escape_string(stripslashes($nazwa));
}
session_start();
include_once '../../polaczZBD.php';
include_once '../../funkcje/photo_handler.php';
$salt = "marynowany";
if(isset( $_POST['postac'] )) {
    if ($_POST['nick'] === '') {
        print("Proszę uzupełnić luki.");
    } else {
        $zdjecie=false;
        $nickname = $_POST['nick'];
        $p = polacz();
        $zapytanie = "SELECT COUNT(*) FROM players WHERE Name_Player = '".$nickname."';";
        $res = $p->query($zapytanie);
        $row = $res->fetch_array(MYSQL_NUM);
        if ($row[0] == 1) {
            rozlacz($p);
            header("Location: ../../kreator.php?kom=exist");
        }else {
            if (isset($_FILES['zdjeciep'])) {
                $plik = $_FILES['zdjeciep'];
                $cel = miniaturka($plik);
                $zdjloc = "avatars/" . $cel['name'];
                if (ImageJPEG($cel['dst'], "../../zdjecia/" . $zdjloc)) {
                    $zdjecie = true;
                }
            }
            $zapytanie2 = "INSERT INTO bank (Money_Bank) VALUES (100)";
            $res = $p->query($zapytanie2);
            $idBanku = $p->insert_id;
            if ($res) {
                if ($zdjecie) {
                    $zapytanie2 = "INSERT INTO players (BANK_ID, Name_Player, Avatar, Level, Experience, Health, Money_Player, Strength, Defence) VALUES ('$idBanku','$nickname','$zdjloc',1,0,100,100,2,2)";
                } else {
                    $zapytanie2 = "INSERT INTO players (BANK_ID, Name_Player, Avatar, Level, Experience, Health, Money_Player, Strength, Defence) VALUES ('$idBanku','$nickname','monkey.png',1,0,100,100,2,2)";
                }
                $res = $p->query($zapytanie2);
                $_SESSION['id_player'] = $p->insert_id;
                if ($res) {
                    $zapytanie2 = "UPDATE users SET PLAYERS_ID = '" . $_SESSION['id_player'] . "' WHERE ID_User = " . $_SESSION['id_user'] . ";";
                    $res = $p->query($zapytanie2);
                    if ($res) {
                        rozlacz($p);
                        header("Location: ../../index.php");
                    }
                }
            }
        }
        rozlacz($p);
    }
}else{
    rozlacz($p);
    header("Location: ../../index.php");
}