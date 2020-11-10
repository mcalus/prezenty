<?php

session_start();

require_once('functions.php');
$homepage = '/lista';

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
    $_SESSION['message'] = 'Zalogowano!';
    header("Refresh: 0");
}

if(isset($_POST['logout']) || $_GET['page'] == 'logout') {
    unset($_SESSION['env']);
    $_SESSION['message'] = 'Wylogowano!';
    header("Location: ".$homepage);
}


$lista = getDBFile('lista');
$wylosowani = getDBFile('wylosowani');


if($_GET['page'] == 'zapisz') {
    $imie = trim($_POST['imie']);
    $mail = trim($_POST['mail']);

    if($imie) {
        $lista[] = ['imie'=>$imie, 'mail'=>$mail, 'timestamp'=>date('Y-m-d H:i:s')];
        file_put_contents('db/lista.json', json_encode($lista));

        $_SESSION['message'] = 'Zapisano Cię do listy';
    }
    
    header("Location: ".$homepage);
}

if($_GET['page'] == 'losuj') {
    if(!$wylosowani)
        $wylosowani = array();
    print_r(array_merge($wylosowani, array($_POST['losujacy'] => null)));
    $lista_losuj = array_diff($lista, array_merge($wylosowani, array($_POST['losujacy'] => null)));
    print_r($lista_losuj);
    array_merge($wylosowani, losuj($_POST['losujacy'], $lista_losuj));
    print_r($wylosowani);

    // if($wylosowany) {
        // $wylosowani[] = $wylosowany;
        file_put_contents('db/wylosowani.json', json_encode($wylosowani));

        $_SESSION['message'] = 'Wylosowałes swoją osobę na święta '. date('Y') .': '. $wylosowany[$_POST['losujacy']];
    // }

    header("Location: ".$homepage);
}

$message = '';
if($_SESSION['message']) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
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