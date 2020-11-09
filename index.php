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
}

if(isset($_POST['logout'])) {
    unset($_SESSION['env']);
}


include('templates/header.html');

if(isset($_SESSION['env'])) {
    echo $_SESSION['env'];

    include('templates/formularz.html');
}
else {
    include('templates/logowanie.html');
}

include('templates/footer.html');