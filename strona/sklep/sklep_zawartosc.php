<?php
$p = polacz();
$zapytanie = "SELECT * FROM shop INNER JOIN items ON shop.ITEMS_ID = items.ID_Item WHERE Permission_Shop >= ".$_SESSION['permission'].";";
$res = $p->query($zapytanie);
while($row = $res->fetch_assoc()){
    $przed = itemReslove($row['TYPE_ID'],$row['Vars']);
    echo"<tr>
    <td class=\"hidden\">".$row['ID_Shop']."</td>
    <td>".$row['Name_Shop']."</td>
    <td>".$row['Price_Item']."</td>
    <td class=\"hidden\">".$row['ID_Item']."</td>
    <td class=\"hidden\">".$przed['typ']."</td>
    ".$przed['tabela']."
    <td class=\"hidden\">".$row['Permission_Shop']."</td>
</tr>";
}
rozlacz($p);