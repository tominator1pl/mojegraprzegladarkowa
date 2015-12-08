<?php
session_start();
include_once '../../polaczZBD.php';
if(isset($_POST['poziomup'])){
    $zycpkt = $_POST['zyc-pkt'];
    $silpkt = $_POST['sil-pkt'];
    $obrpkt = $_POST['obr-pkt'];
    if($zycpkt >= 0 && $silpkt >= 0 && $obrpkt >= 0){
        if($zycpkt == 0 && $silpkt == 0 && $obrpkt == 0) {
            rozlacz($p);
            header("Location: ../../levelup.php?kom=noselect");
        }
        $p = polacz();
        $zapytanie = "SELECT * FROM players WHERE ID_Player = ".$_SESSION['id_player'].";";
        $res = $p->query($zapytanie);
        $row = $res->fetch_assoc();
        if($row) {
            if (($zycpkt + $silpkt + $obrpkt) <= $row['AvaPoints']){
                $zycie = $row['Health'];
                $sila = $row['Strength'];
                $obrona = $row['Defence'];
                $punkty = $row['AvaPoints'];
                $newzycie = $zycie + ($zycpkt*5);
                $newsila = $sila + $silpkt;
                $newobrona = $obrona + $obrpkt;
                $newpunkty = $punkty - ($zycpkt + $silpkt + $obrpkt);
                $zapytanie = "UPDATE players SET Health = '".$newzycie."', Strength = '".$newsila."', Defence = '".$newobrona."', AvaPoints = '".$newpunkty."' WHERE ID_Player = ".$_SESSION['id_player'].";";
                $res = $p->query($zapytanie);
                if($res){
                    rozlacz($p);
                    header("Location: ../../postac.php?kom=levelup");
                }else{
                    rozlacz($p);
                    header("Location: ../../levelup.php?kom=error");
                }
            }else{
                rozlacz($p);
                header("Location: ../../levelup.php?kom=error");
            }
        }else{
            rozlacz($p);
            header("Location: ../../levelup.php?kom=error");
        }
    }else{
        header("Location: ../../levelup.php?kom=error");
    }
};