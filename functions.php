<?php

function getDBFile($name) {
    if(!file_exists("db/". $name .".json")) {
        $fp = fopen("db/". $name .".json", 'w');
        fclose($fp);
    }
    return json_decode(file_get_contents("db/". $name .".json"), true);
}


function losuj($losujacy) {
    $wylosowany = null;

    if($losujacy) {
        $wylosowany = 'A';
    }

    return $wylosowany;
}