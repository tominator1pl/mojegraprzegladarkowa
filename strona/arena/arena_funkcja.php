<?php
session_start();
include_once '../../polaczZBD.php';
include_once '../../funkcje/item_handler.php';
if(isset($_POST['walcz'])){
    if($_POST['selectedIdPos'] >= 0) {
        if($_POST['selectedIdPos'] != $_SESSION['id_player']){
            $p = polacz();
            $zapytanie = "SELECT * FROM players WHERE ID_Player = ".$_POST['selectedIdPos'].";";
            $res = $p->query($zapytanie);
            $row = $res->fetch_assoc();
            if($row){
                $zapytanie2 = "SELECT * FROM players WHERE ID_Player = ".$_SESSION['id_player'].";";
                $res2 = $p->query($zapytanie2);
                $row2 = $res2->fetch_assoc();
                if($row2) {
                    $kodBron = $row['Strength'];
                    $kodArmor = $row['Defence'];
                    $zycie = $row['Health'];
                    $hais = $row['Money_Player'];
                    if ($row['Weapon']) {
                        $zapytanieBron = "SELECT * FROM items WHERE ID_Item=" . getFromDB($p, 'inventory', 'ITEMS_ID', 'ID_Inv', $row['Weapon']) . ";";
                        $resBron = $p->query($zapytanieBron);
                        $rowBron = $resBron->fetch_assoc();
                        $przedBron = itemReslove($rowBron['TYPE_ID'], $rowBron['Vars']);
                        $kodBron = ($row['Strength'] + $przedBron['param1']);
                    }
                    if ($row['Armor']) {
                        $zapytanieArmor = "SELECT * FROM items WHERE ID_Item=" . getFromDB($p, 'inventory', 'ITEMS_ID', 'ID_Inv', $row['Armor']) . ";";
                        $resArmor = $p->query($zapytanieArmor);
                        $rowArmor = $resArmor->fetch_assoc();
                        $przedArmor = itemReslove($rowArmor['TYPE_ID'], $rowArmor['Vars']);
                        $kodArmor = ($row['Defence'] + $przedArmor['param1']);
                    }
                    $kodBron2 = $row2['Strength'];
                    $kodArmor2 = $row2['Defence'];
                    $zycie2 = $row2['Health'];
                    $hais2 = $row2['Money_Player'];
                    $exp2 = $row2['Experience'];
                    if ($row2['Weapon']) {
                        $zapytanieBron2 = "SELECT * FROM items WHERE ID_Item=" . getFromDB($p, 'inventory', 'ITEMS_ID', 'ID_Inv', $row2['Weapon']) . ";";
                        $resBron2 = $p->query($zapytanieBron2);
                        $rowBron2 = $resBron2->fetch_assoc();
                        $przedBron2 = itemReslove($rowBron2['TYPE_ID'], $rowBron2['Vars']);
                        $kodBron2 = ($row2['Strength'] + $przedBron2['param1']);
                    }
                    if ($row2['Armor']) {
                        $zapytanieArmor2 = "SELECT * FROM items WHERE ID_Item=" . getFromDB($p, 'inventory', 'ITEMS_ID', 'ID_Inv', $row2['Armor']) . ";";
                        $resArmor2 = $p->query($zapytanieArmor2);
                        $rowArmor2 = $resArmor2->fetch_assoc();
                        $przedArmor2 = itemReslove($rowArmor2['TYPE_ID'], $rowArmor2['Vars']);
                        $kodArmor2 = ($row['Defence'] + $przedArmor2['param1']);
                    }
                    $kolej = 2;
                    if($kodBron2 >= $kodBron){
                        $kolej = 2;
                    }else{
                        $kolej = 1;
                    }
                    while($zycie > 0 && $zycie2 >0){
                        switch($kolej){
                            case 1:
                                $eff = floor(($kodBron+(rand(1,$kodBron/2)))-$kodArmor2);
                                if($eff <= 0) $eff = 1 + floor(rand(1,$kodBron/4));
                                $zycie2 -= $eff;
                                $kolej = 2;
                                break;
                            case 2:
                                $eff = floor(($kodBron2+(rand(1,$kodBron2/2)))-$kodArmor);
                                if($eff <= 0) $eff = 1+ floor(rand(1,$kodBron2/4));
                                $zycie -= $eff;
                                $kolej = 1;
                                break;
                        }
                    }
                    if($zycie2 >= $zycie){
                        $nowyhais = floor($hais*(rand(1,5)/10));
                        $kasa = $hais2 + $nowyhais;
                        $dos = $exp2 + floor($nowyhais*0.8);
                        $nowyhais2 = $hais - $nowyhais;
                        $data = date('Y-m-d H:i:s');
                        $zapytanie3 = "UPDATE players SET Experience = '" . $dos . "', Money_Player = '" . $kasa . "' WHERE ID_Player = " . $_SESSION['id_player'] . ";
                        UPDATE players SET Money_Player = '" . $nowyhais2 . "' WHERE ID_Player = " . $_POST['selectedIdPos'] . ";
INSERT INTO komunikaty (PLAYER_ID, Komunikat, Kom_Typ_ID, Data_Kom) VALUES ('" . $_SESSION['id_player'] . "', 'Wygrałeś kontra " . $row['Name_Player'] . ". Zysk: Haisy-" . $nowyhais . ", Doświadczenie-" . floor($nowyhais*0.8) . ".', '0', '" . $data . "');
INSERT INTO komunikaty (PLAYER_ID, Komunikat, Kom_Typ_ID, Data_Kom) VALUES ('" . $_POST['selectedIdPos'] . "', 'Zostałeś zaatakowany przez " . $row2['Name_Player'] . ". Straty: Haisy-" . $nowyhais . "', '1', '" . $data . "');";
                        $res3 = $p->multi_query($zapytanie3);
                        if($res3){
                            rozlacz($p);
                            header("Location: ../../arena.php?kom=wyg");
                        }else{
                            rozlacz($p);
                            header("Location: ../../arena.php?kom=error");
                        }
                    }else{
                        rozlacz($p);
                        header("Location: ../../arena.php?kom=prze");
                    }

                }else{
                    rozlacz($p);
                    header("Location: ../../arena.php?kom=error");
                }

            }else{
                rozlacz($p);
                header("Location: ../../arena.php?kom=error");
            }
        }else{
            header("Location: ../../arena.php?kom=error");
        }
    }else{
        header("Location: ../../arena.php?kom=noselect");
    }
}