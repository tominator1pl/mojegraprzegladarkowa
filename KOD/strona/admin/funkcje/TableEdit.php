<?php

/**
 * Class TableEdit
 * Sluży do pobierania z bazy danych tabeli i sformatowaniu jej do formulaza;
 */
class TableEdit
{
    private $p;
    public $visibility = array();
    public $tabela;
    public $kolumny;
    public $nazwaneKolumny;
    public $error;
    public function __construct(){
        $this->p=polacz();
    }
    public function rozlacz(){
        rozlacz($this->p);
    }

    /**
     * Tworzenie objektu bez ustawiania nazw kolumn, pobierane sa z bazy
     * @param $table string nazwa tabeli
     * @return TableEdit
     */
    public static function withoutColumns($table){
        $instance = new self();
        $instance->tabela = $table;
        $instance->loadColumns($table);
        $instance->nazwaneKolumny = $instance->kolumny;
        $instance->setAllColumnsVisibility(2);
        return $instance;
    }

    /**
     * Tworzenie objektu z ustawionymi nazwami kolumn
     * @param $table string nazwa tabeli
     * @param array $columns tablica nazw kolumn w postaci array('kolumna pierwsza','kolumna druga',...)
     * @return TableEdit
     */
    public static function withColumns($table,array $columns){
        $instance = new self();
        $instance->tabela = $table;
        $instance->nazwaneKolumny = $columns;
        $instance->loadColumns($table);
        $instance->setAllColumnsVisibility(2);
        return $instance;
    }

    /**
     * Wczytywanie nazw kolumn z bazy danych
     * @param $table string nazwa tabeli
     */
    protected function loadColumns($table){
        $zapytanie = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='tdstrona' AND TABLE_NAME='".$table."';";
        $res = $this->p->query($zapytanie);
        $this->error = $this->p->error;
        $columns = array();
        while($row = $res->fetch_assoc()){
            array_push($columns,$row['COLUMN_NAME']);
        }
        $this->kolumny = $columns;
    }

    /**
     * Zmiana nazwy kolumny
     * @param $index int nr kolumny od 0
     * @param $newname string nowa nazwa dla tej kolumny
     */
    public function changeColumnName($index, $newname){
        $this->kolumny[$index] = $newname;
    }

    /**
     * sprawdza widocznosc poszczegolnych kolumn
     * @param $vis
     * @return int
     */
    private function checkVis($vis){
        switch($vis){
            case '0':
            case '1':
            case '2':
                break;
            case 'none':
                $vis = 0;
                break;
            case 'hide':
                $vis = 1;
                break;
            case 'all':
                $vis = 2;
                break;
            default:
                $vis = 2;
                break;
        }
        return $vis;
    }

    /**
     * Ustawia widoczność wszystkich kolumn
     * @param $vis
     */
    public function setAllColumnsVisibility($vis){
        $vis = $this->checkVis($vis);
        foreach($this->kolumny as $key=>$value){
            $this->visibility[$key] = $vis;
        }
    }

    /**
     * Ustawia widocznosc danej kolumny
     * @param $index int nr kolumny od 0
     * @param $vis
     */
    public function setColumnVisibility($index,$vis){
        $vis = $this->checkVis($vis);
        $this->visibility[$index] = $vis;
    }

    /**
     * Zwraca surowe rzędy w postaci
     * array(
     *   [0] => array(
     *     [0] => 'wartosc pierwszej kolumny w pierwszym rzedzie',
     *     [1] => 'wartosc drugiej kolumny w pierwszym rzedzie'
     *     ),
     *   [1] => array(
     *     [0] => 'wartosc pierwszej kolumny w drugim rzedzie'
     *     )
     *   )
     * @return array
     */
    public function getRows(){
        $zapytanie = "SELECT * FROM ".$this->tabela.";";
        $res = $this->p->query($zapytanie);
        $return = array();
        while($row = $res->fetch_array(MYSQL_NUM)){
            if($this->tabela == 'users')$row[4] = "***";
            $return[] = $row;
        }
        return $return;
    }

    /**
     * Zwroaca sformatowane rzędy w postaci
     * array(
     *   [0] => '<tr><td>wartosc pierwszej kolumny w pierwszym rzedzie</td><td></td>wartosc drugiej kolumny w pierwszym rzedzie</tr>',
     *   [1] => '<tr><td>wartosc pierwszej kolumny w drugim rzedzie</td><td></td>wartosc drugiej kolumny w drugim rzedzie</tr>'
     *   )
     * @return array
     */
    public function getFormatedRows(){
        $return = array();
        foreach($this->getRows() as $row){
            $textrow = "";
            for($i = 0; $i < sizeof($row);$i++){
                switch($this->visibility[$i]){
                    case 0:
                        break;
                    case 1:
                        $textrow .= "<td class='hidden'>".$row[$i]."</td>";
                        break;
                    case 2:
                        $textrow .= "<td>".$row[$i]."</td>";
                        break;
                }
            }
            $return[] = "<tr>".$textrow."<td><button type='submit' class='btn btn-danger' name='usunWiersz' value='".$row[0]."'><img src='zdjecia/del.png'></button></td></tr>";
        }
        return $return;
    }

    /**
     * Zwraca juz w pelni sformatowana tabele
     * @return string
     */
    public function getFormatedTable(){
        $thead1 = "";
        $thead2 = "";
        $tbody = "";
        $rzedy = $this->getFormatedRows();
        foreach($this->kolumny as $key=>$value){
            switch($this->visibility[$key]){
                case 0:
                    break;
                case 1:
                    $thead1 .= "<td class='hidden'>".$value."</td>";
                    break;
                case 2:
                    $thead1 .= "<td>".$value."</td>";
                    break;
            }
        }
        foreach($this->nazwaneKolumny as $key=>$value){
            switch($this->visibility[$key]){
                case 0:
                    break;
                case 1:
                    $thead2 .= "<td class='hidden'>".$value."</td>";
                    break;
                case 2:
                    $thead2 .= "<td>".$value."</td>";
                    break;
            }
        }
        $thead1 .= "<td>Usuń</td>";
        $thead2 .= "<td>Usuń</td>";
        foreach($rzedy as $rzad){
            $tbody .= $rzad;
        }

        $return = "<table class='table table-hover'>
                    <thead>
                    <tr class='hidden'>".$thead1."</tr>
                    <tr>".$thead2."</tr>
                    </thead>
                    <tbody>".$tbody."</tbody>
                </table>";
        return $return;
    }

    /**
     * Zwraca Tabele razem z formularzem
     * @return string
     */
    public function getFormatedForm(){
        $return = '<div class="tabelki-admin"><form name="admin" class="form-group" method="post" action="strona/admin_funkcja.php">';
        $return .= '<input type="hidden" name="nazwaTabelki" value="'.$this->tabela.'">';
        $tabelka = $this->getFormatedTable();
        $return .= $tabelka;
        $return .= '<input type="hidden" name="selectedID" value="-1"></form></div>';
        return $return;
    }
    public function query($zapytanie){
        $res = $this->p->query($zapytanie);
        $this->error = $this->p->error;
        return $res;
    }
}

/**
 * Class BaseSelect
 * Sluży do utworzenie dropdown listy z nazwami tabel do wyboru
 */
class BaseSelect{
    private $p;
    public $visibility = array();
    public $selected = '0';
    public $baza;
    public $tabele;
    public $nazwaneTabele;
    public $error;
    public function __construct(){
        $this->p=polacz();
    }
    public function rozlacz(){
        rozlacz($this->p);
    }
    /**
     * Tworzenie objektu bez ustawiania nazw tabel, pobierane sa z bazy
     * @param $base string nazwa bazy
     * @return TableEdit
     */
    public static function withoutNames($base){
        $instance = new self();
        $instance->baza = $base;
        $instance->loadNames($base);
        $instance->nazwaneTabele = $instance->tabele;
        $instance->setAllTableVisibility(1);
        return $instance;
    }
    /**
     * Tworzenie objektu z ustawionymi nazwami tabel
     * @param $base string nazwa bazy
     * @param array $tables tablica nazw tabel w postaci array('tabela pierwsza','tabla druga',...)
     * @return TableEdit
     */
    public static function withNames($base,array $tables){
        $instance = new self();
        $instance->baza = $base;
        $instance->nazwaneTabele = $tables;
        $instance->loadNames($base);
        $instance->setAllTableVisibility(1);
        return $instance;
    }
    /**
     * Wczytywanie nazw tabel z bazy danych
     * @param $base string nazwa bazy
     */
    protected function loadNames($base){
        $zapytanie = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$base."';";
        $res = $this->p->query($zapytanie);
        $this->error = $this->p->error;
        $columns = array();
        while($row = $res->fetch_assoc()){
            array_push($columns,$row['TABLE_NAME']);
        }
        $this->tabele = $columns;
    }
    /**
     * Zmiana nazwy tabeli
     * @param $index int nr tabeli od 0
     * @param $newname string nowa nazwa dla tej tabeli
     */
    public function changeTableName($index, $newname){
        $this->tabele[$index] = $newname;
    }
    /**
     * sprawdza widocznosc poszczegolnych tabel
     * @param $vis
     * @return int
     */
    private function checkVis($vis){
        switch($vis){
            case '0':
            case '1':
                break;
            case 'none':
                $vis = 0;
                break;
            case 'all':
                $vis = 1;
                break;
            default:
                $vis = 1;
                break;
        }
        return $vis;
    }
    /**
     * Ustawia widoczność wszystkich tabel
     * @param $vis
     */
    public function setAllTableVisibility($vis){
        $vis = $this->checkVis($vis);
        foreach($this->tabele as $key=>$value){
            $this->visibility[$key] = $vis;
        }
    }
    /**
     * Ustawia widocznosc danej tabeli
     * @param $index int nr tabeli od 0
     * @param $vis
     */
    public function setTableVisibility($index,$vis){
        $vis = $this->checkVis($vis);
        $this->visibility[$index] = $vis;
    }
    /**
     * Zwroaca sformatowane tabele w postaci
     * array(
     *   [0] => '<option value='NAZWA_W_BAZIE'>Nazwa czytelna</option>',
     *   [1] => '<option value='NAZWA_W_BAZIE'>Nazwa czytelna</option>'
     *   )
     * @return array
     */
    public function getFormatedNames(){
        $return = array();
        $nazwy = $this->tabele;
        foreach($nazwy as $key=>$value){
            switch($this->visibility[$key]){
                case 0:
                    break;
                case 1:
                    if($this->selected == $value){
                        $return[] = "<option value='".$value."' selected>".$this->nazwaneTabele[$key]."</option>";
                    }else {
                        $return[] = "<option value='" . $value . "'>" . $this->nazwaneTabele[$key] . "</option>";
                    }
                    break;
            }
        }
        return $return;
    }

    /**
     * Zwraca calego dropdown liste
     * @return string
     */
    public function getFormatedSelect(){
        $tabelki = $this->getFormatedNames();
        $return = "<label for='tabelaWybor'>Wybierz Tabelę do Edycji:</label><select class='form-control' id='tabelaWybor' onchange=\"if (this.selectedIndex > 0) $('form[name=admin-tabela]').submit();\" name='tabelaWybor'>";
        $return .= "<option value='-1'>-</option>";
        foreach($tabelki as $key=>$value){
            $return .= $value;
        }
        $return .= "</select>";
        return $return;
    }

    /**
     * Zwraca dropdown liste z formularzem
     * @return string
     */
    public function getFormatedForm(){
        $selekt = $this->getFormatedSelect();
        $return = '<form name="admin-tabela" class="form-group" method="post">';
        $return .= $selekt;
        $return .= "</form>";
        return $return;
    }
}