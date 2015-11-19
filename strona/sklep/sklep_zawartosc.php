<?php
$p = polacz();
$zapytanie = "SELECT * FROM shop INNER JOIN items ON shop.ITEMS_ID = items.ID_Item;";
$res = $p->query($zapytanie);
while($row = $res->fetch_assoc()){
    echo"<tr>
    <td class=\"hidden\">".$row['ID_Shop']."</td>
    <td>".$row['Name_Shop']."</td>
    <td>".$row['Price_Item']."</td>
    <td class=\"hidden\">".$row['ID_Item']."</td>
    <td class=\"hidden\">".$Itemy[$row['PHPObjectName']]->attack."</td>
    <td class=\"hidden\">".$Itemy[$row['PHPObjectName']]->speed."</td>
</tr>";
}
rozlacz($p);