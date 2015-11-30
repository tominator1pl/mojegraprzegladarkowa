<?php
$p = polacz();
$zapytanie = "SELECT * FROM players WHERE NOT ID_Player = ".$_SESSION['id_player'].";";
$res = $p->query($zapytanie);
while($row = $res->fetch_assoc()){
    $kodBron = $row['Strength'];
    $kodArmor = $row['Defence'];
    if($row['Weapon']) {
        $zapytanieBron = "SELECT * FROM items WHERE ID_Item=" . getFromDB($p, 'inventory', 'ITEMS_ID', 'ID_Inv', $row['Weapon']) . ";";
        $resBron = $p->query($zapytanieBron);
        $rowBron = $resBron->fetch_assoc();
        $przedBron = itemReslove($rowBron['TYPE_ID'], $rowBron['Vars']);
        $kodBron = ($row['Strength']+$przedBron['param1']);
    }
    if($row['Armor']) {
        $zapytanieArmor = "SELECT * FROM items WHERE ID_Item=" . getFromDB($p, 'inventory', 'ITEMS_ID', 'ID_Inv', $row['Armor']) . ";";
        $resArmor = $p->query($zapytanieArmor);
        $rowArmor = $resArmor->fetch_assoc();
        $przedArmor = itemReslove($rowArmor['TYPE_ID'], $rowArmor['Vars']);
        $kodArmor = ($row['Defence']+$przedArmor['param1']);
    }
    echo"<tr>
    <td class=\"hidden\">".$row['ID_Player']."</td>
    <td><img class='img-responsive center-block' width='30px' height='30px' src='zdjecia/".$row['Avatar']."'></td>
    <td>".$row['Name_Player']."</td>
    <td>".$row['Level']."</td>
    <td class=\"hidden\">".$kodBron."</td>
    <td class=\"hidden\">".$kodArmor."</td>
    <td>".$row['Money_Player']."</td>
</tr>";
}
rozlacz($p);