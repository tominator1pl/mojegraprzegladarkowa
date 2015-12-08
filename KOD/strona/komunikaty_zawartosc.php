<div class="komunikaty">
<?php
echo clearKoms($_SESSION['id_player']);
$p = polacz();
$zapytanie = "SELECT * FROM komunikaty INNER JOIN komunikaty_types ON komunikaty.Kom_Typ_ID = komunikaty_types.ID_Kom_Typ WHERE PLAYER_ID = ".$_SESSION['id_player']." ORDER BY Data_Kom DESC;";
$res = $p->query($zapytanie);
while($row = $res->fetch_assoc()){
    echo "<div class='kom-".$row['Name_Kom']."'>[".$row['Data_Kom']."][".$row['Name_Kom']."]".$row['Komunikat']."</div>";
}
?>
</div>
