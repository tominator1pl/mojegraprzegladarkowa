<?php
include_once '../polaczZBD.php';
include_once 'admin/funkcje/TableEdit.php';
$salt = "marynowany";
if(isset($_POST['nazwaTabelki'])){
    $edytor = TableEdit::withoutColumns($_POST['nazwaTabelki']);
    $posty = array();
    if($_POST['selectedID'] == "*"){
        foreach ($edytor->kolumny as $key => $value) {
            if (isset($_POST[$value.'New']) && $_POST[$value.'New'] != "") {
                $posty[] = $value;
            }
        }
        $zapytanie = "INSERT INTO ". $_POST['nazwaTabelki'] ." (";
        foreach ($posty as $key => $value) {
            $zapytanie .= $value . ", ";
        }
        $zapytanie = substr($zapytanie, 0, -2);
        $zapytanie .= ") VALUES (";
        foreach ($posty as $key => $value) {
            $war = $_POST[$value.'New'];
            if($value == 'Pass') $war = md5($salt . $war);
            $zapytanie .= "'".$war . "', ";
        }
        $zapytanie = substr($zapytanie, 0, -2);
        $zapytanie .= ");";
    }elseif(isset($_POST['usunWiersz'])){
        $idPrzed = $_POST['usunWiersz'];
        $kolName = $edytor->kolumny[0];
        $zapytanie = "DELETE FROM ".$_POST['nazwaTabelki'] . " WHERE ".$kolName." = ".$idPrzed.";";
    }else {
        foreach ($edytor->kolumny as $key => $value) {
            if (isset($_POST[$value])) {
                $posty[] = $value;
            }
        }
        $zapytanie = "UPDATE " . $_POST['nazwaTabelki'] . " SET ";
        foreach ($posty as $key => $value) {
            $war = $_POST[$value];
            if($value == 'Pass') $war = md5($salt . $war);
            $zapytanie .= $value . " = '" . $war . "', ";
        }
        $zapytanie = substr($zapytanie, 0, -2);
        $zapytanie .= " WHERE " . $edytor->kolumny[0] . " = '" . $_POST['selectedID'] . "';";
    }
    $res = $edytor->query($zapytanie);
    $edytor->rozlacz();
    if($res){
        header("Location: ../admin.php?table=" . $_POST['nazwaTabelki']);
    }else{
        header("Location: ../admin.php?table=" . $_POST['nazwaTabelki']."&kom=err");
    }
}
if(isset($_POST['usunKonto'])){
    if(is_numeric($_POST['inputKontoID']) ){
        $res = usunKonto($_POST['inputKontoID']);
        if($res){
            header("Location: ../admin.php?kom=usun");
        }else{
            header("Location: ../admin.php?kom=err");
        }
    }
}