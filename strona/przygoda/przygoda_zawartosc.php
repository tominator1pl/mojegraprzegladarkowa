<?php
$p = polacz();
$zapytanie = "SELECT * FROM przygody_types INNER JOIN difficult ON przygody_types.Difficulty = difficult.ID_Dif WHERE Min_Level <= ".getFromDB($p,'players','Level','ID_Player',$_SESSION['id_player']).";";
$res = $p->query($zapytanie);
while($row = $res->fetch_assoc()){
    echo"<tr>
    <td class=\"hidden\">".$row['ID_Przy_Type']."</td>
    <td>".$row['Name_Przy']."</td>
    <td>".$row['Difficulty']."</td>
    <td>".$row['Name_Dif']."</td>
</tr>";
}
rozlacz($p);