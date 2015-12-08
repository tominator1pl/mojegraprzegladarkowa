<?php
/**
 * itemResolve służy do rozbicie bazodanowego pola Vars w tabeli items na poszczegolne parametry.
 * @param $typ string typ przedmiotu
 * @param $args string argumenty
 * @return array z poszczegolnymi parametrami, typem przedmiotu i zformatowane kolumny do wpisania do tabeli
 */
function itemReslove($typ,$args){
    $resTabela = null;
    $resTyp = $typ;
    switch($typ){
        case 1:
            $attack = substr($args,strpos($args,"attack")+7);
            $attack = substr($attack,0,strpos($attack,";"));
            $speed = substr($args,strpos($args,"speed")+6);
            $speed = substr($speed,0,strpos($speed,";"));
            $resTabela = "<td class=\"hidden\">".$attack."</td><td class=\"hidden\">".$speed."</td>";
            $arr['param1'] = $attack;
            $arr['param2'] = $speed;
            break;
        case 2:
            $defence = substr($args,strpos($args,"defence")+8);
            $defence = substr($defence,0,strpos($defence,";"));
            $resTabela = "<td class=\"hidden\">".$defence."</td><td class=\"hidden\"></td>";
            $arr['param1'] = $defence;
            break;
    }
    $arr['typ'] = $resTyp;
    $arr['tabela'] = $resTabela;

    return $arr;
}