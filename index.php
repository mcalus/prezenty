<?php

session_start();

require_once('functions.php');

$f_config = file_get_contents("db/config.json");
if ($f_config === false) {
    // deal with error...
}

$config = json_decode($f_config, true);
if ($config === null) {
    // deal with error...
}

if(isset($config['passwords'][$_POST['pass']])) {
    $_SESSION['env'] = $config['passwords'][$_POST['pass']];
    header("Refresh: 0");
}

if(isset($_POST['logout']) || $_GET['page'] == 'logout') {
    unset($_SESSION['env']);
    header("Location: /");
}


$lista = getDBFile('lista');
$wylosowani = getDBFile('wylosowani');


if($_GET['page'] == 'zapisz') {
    $imie = trim($_POST['imie']);
    $mail = trim($_POST['mail']);

    if($imie) {
        $lista[] = ['imie'=>$imie, 'mail'=>$mail, 'timestamp'=>date('Y-m-d H:i:s')];
        file_put_contents('db/lista.json', json_encode($lista));
    }
    
    header("Location: /");
}

if($_GET['page'] == 'losuj') {
    $wylosowany = losuj($_POST['losujacy']);

    if($wylosowany) {
        $wylosowani[] = $wylosowany;
        file_put_contents('db/lista.json', json_encode($wylosowani));
    }


    header("Location: /");
}


include('templates/header.php');

if(isset($_SESSION['env'])) {
    echo $_SESSION['env'] . "<br /><br />"; 

    switch($_GET['page']) {
        case 'lista': include('templates/lista.php'); break;
        case 'losowanie': include('templates/losowanie.php'); break;
        default: include('templates/formularz.php'); 
    }
}
else {
    include('templates/logowanie.php');
}

include('templates/footer.php');