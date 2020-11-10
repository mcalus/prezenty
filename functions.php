<?php

function getDBFile($name) {
    if(!file_exists("db/". $name .".json")) {
        $fp = fopen("db/". $name .".json", 'w');
        fclose($fp);
    }
    return json_decode(file_get_contents("db/". $name .".json"), true);
}


function losuj($losujacy, $lista_losuj) {
    $wylosowany = array();

    if($losujacy) {
        $wylosowany[$losujacy] = array_rand($lista_losuj);
    }

    return $wylosowany;
}