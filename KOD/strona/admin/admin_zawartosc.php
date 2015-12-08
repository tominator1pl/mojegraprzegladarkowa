<div class="col-md-3">
<form name='usunKonto' class='form' method='post' action="strona/admin_funkcja.php">
    <label for='inputKontoID'>Usuń konto po ID:</label>
    <input type='text' class='form-control' id='inputKontoID' name='inputKontoID' placeholder="User ID">
    <input type='submit' class="btn btn-danger" name='usunKonto' value='Usuń'>
</form>
</div>
<div class="col-md-12">
<?php
include_once 'funkcje/TableEdit.php';

if(isset($_GET['table']) && !isset($_POST['tabelaWybor'])){ //jesli nie wybralem tabeli z listy ale jest wybrana przez url
    $tabele = BaseSelect::withoutNames('tdstrona');
    $tabele->selected = $_GET['table']; //wybieramy juz ustalana tabele, by sie nie resetowała
    echo $tabele->getFormatedForm(); //tworzymy liste rozwijaną
    $tabele->rozlacz();

    $edytor = TableEdit::withoutColumns($_GET['table']);
    echo $edytor->getFormatedForm(); //tworzymy tabele do edycji
    $edytor->rozlacz();
}elseif(isset($_POST['tabelaWybor'])){ //wybranie tabeli z listy
    $_GET['table'] = $_POST['tabelaWybor'];
    $tabele = BaseSelect::withoutNames('tdstrona');
    $tabele->selected = $_POST['tabelaWybor'];
    echo $tabele->getFormatedForm();
    $tabele->rozlacz();

    $edytor = TableEdit::withoutColumns($_POST['tabelaWybor']);
    echo $edytor->getFormatedForm();
    $edytor->rozlacz();
}else{ //jesli nic nie zostalo wybrane

    $tabele = BaseSelect::withoutNames('tdstrona');
    echo $tabele->getFormatedForm();
    $tabele->rozlacz();
}
if(isset($_GET['kom'])){
    switch($_GET['kom']){
        case 'err':
            echo "<div class='lead'>Wystapił błąd!</div>";
            break;
        case 'usun':
            echo "<div class='lead'>Usunięto Konto!</div>";
            break;
    }
}
?>
</div>



