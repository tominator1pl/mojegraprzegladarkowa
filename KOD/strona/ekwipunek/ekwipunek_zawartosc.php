<?php
$p = polacz();
$zapytanie = "SELECT * FROM inventory INNER JOIN items ON inventory.ITEMS_ID = items.ID_Item WHERE PLAYERS_ID = ".$_SESSION['id_player'].";";
$res = $p->query($zapytanie);
while($row = $res->fetch_assoc()){
    $nalozono = "";
    $przed = itemReslove($row['TYPE_ID'],$row['Vars']);
    if($row['ID_Inv'] == getFromDB($p,'players','Armor','ID_Player',$_SESSION['id_player']) || $row['ID_Inv'] == getFromDB($p,'players','Weapon','ID_Player',$_SESSION['id_player'])){
        $nalozono = " (&#9733;)";
    }
    echo"<tr>
    <td class=\"hidden\">".$row['ID_Inv']."</td>
    <td>".$row['Name_Inv'].$nalozono."</td>
    <td>".($row['Price_Item']/2)."</td>
    <td class=\"hidden\">".$row['ID_Item']."</td>
    <td class=\"hidden\">".$przed['typ']."</td>
    ".$przed['tabela']."
</tr>";
}
rozlacz($p);