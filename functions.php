<?php

function getDBFile($name) {
    if(!file_exists("db/". $name .".json")) {
        $fp = fopen("db/". $name .".json", 'w');
        fclose($fp);
    }
    return json_decode(file_get_contents("db/". $name .".json"), true);
}


function losuj($losujacy) {
    if($losujacy) {
        $wylosowani[] = ['imie'=>$imie, 'mail'=>$mail, 'timestamp'=>date('Y-m-d H:i:s')];
        file_put_contents('db/wylosowani.json', json_encode($wylosowani));
    }

    return $wylosowany;
}