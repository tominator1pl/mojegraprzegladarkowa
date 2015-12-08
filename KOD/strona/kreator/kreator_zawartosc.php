<?php
if(isset($_SESSION['permission'])){
    $p = polacz();

    $zapytanie = "SELECT PLAYERS_ID FROM users WHERE ID_User = ".$_SESSION['id_user'].";";
    $res = $p->query($zapytanie);
    $row = $res->fetch_assoc();
    if($row && $row['PLAYERS_ID'] == null){
        include 'kreator_form.php';
    }else{
        rozlacz($p);
        header("Location: ../index.php");
    }
}else{
    header("Location: ../index.php");
}