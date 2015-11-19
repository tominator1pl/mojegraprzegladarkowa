<?php
$p = polacz();
$zapytanie = "SELECT * FROM inventory INNER JOIN items ON inventory.ITEMS_ID = items.ID_Item WHERE PLAYERS_ID = ".$_SESSION['id_player'].";";
$res = $p->query($zapytanie);
echo $p->error;
while($row = $res->fetch_assoc()){
    echo"<tr>
    <td class=\"hidden\">".$row['ID_Inv']."</td>
    <td>".$row['Name_Inv']."</td>
    <td>".($row['Price_Item']/2)."</td>
    <td class=\"hidden\">".$row['ID_Item']."</td>
    <td class=\"hidden\">".$Itemy[$row['PHPObjectName']]->attack."</td>
    <td class=\"hidden\">".$Itemy[$row['PHPObjectName']]->speed."</td>
</tr>";
}
rozlacz($p);