<?php

session_start();

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
    header("Location: /");
}

if(isset($_POST['logout']) || isset($_GET['logout'])) {
    unset($_SESSION['env']);
    header("Location: /");
}


include('templates/header.php');

if(isset($_SESSION['env'])) {
    echo $_SESSION['env'];

    if($_GET['page'] == 'lista') 
        include('templates/lista.php');
    if($_GET['page'] == 'losuj')
        include('templates/losuj.php');
    else 
        include('templates/formularz.php');
}
else {
    include('templates/logowanie.php');
}

include('templates/footer.php');