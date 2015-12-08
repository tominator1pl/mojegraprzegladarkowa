<?php
/**
 * miniaturka sluży do zmniejszenia zdjęć wysłanych na stronę jako avatar postaci
 * @param $zrodlo
 * @return array z zdjeciem zrodlowym, zdjeciem zmniejszonym i nazwa pliku
 */
function miniaturka($zrodlo){
    switch(substr($zrodlo['name'], -3)){ //switch(końcówka nazwy pliku( ostatnie 3 znaki(gif,jpg,png)))
        case "jpg":
            $src_img = imagecreatefromjpeg($zrodlo['tmp_name']); //tworzenie pliku zdjecia zrodlowego php z jpg
            break;
        case "png":
            $src_img = imagecreatefrompng($zrodlo['tmp_name']);
            break;
        case "gif":
            $src_img = imagecreatefromgif($zrodlo['tmp_name']);
            break;
    }
    if(isset($src_img)){
        $szerokosc = ImageSX($src_img);//pobranie szerokosci x
        $wysokosc = ImageSY($src_img);//pobranie wysokosci y
        $dst_wys = (200/$szerokosc)*$wysokosc;//za pomoca skali wyznaczam wysokosc miniaturkia tak aby szerokosc miniaturki byla 148
        $dst_img = ImageCreateTrueColor(200, $dst_wys);//tworzenie pustego zdjecia(szerokosc,wysokosc)
        ImageCopyResized($dst_img, $src_img, 0, 0, 0, 0, 200, $dst_wys, $szerokosc, $wysokosc);//zmiana rozmiarow(plik docelowy,plik zrodlowy,0,0,0,0,szerokosc docelowa,wysokosc docelowa,szerokosc zrodlowa,wysokosc zrodlowa)
        $arajek['dst'] = $dst_img;
        $arajek['src'] = $src_img;
        $arajek['name'] = date("Y-m-d_H-i-s").'_'.$zrodlo['name'];
        return $arajek;
    }
}