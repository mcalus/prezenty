<?php

session_start();

// All starting variables (maybe that should be CONST)
require_once('functions.php');
$homepage = '/list';
$config = getDBFile('config');
$list = getDBFile('list');
$drawn = getDBFile('drawn');

// ACTION - Logging into system
if($_POST['pass']) {
    if(isset($config['passwords'][$_POST['pass']])) {
        $_SESSION['env'] = $config['passwords'][$_POST['pass']];
        $_SESSION['message'] = 'Zalogowano!';
    }
    else {
        $_SESSION['message'] = 'Błędne hasło!';
    }

    header("Refresh: 0");
    die();
}

// ACTION - Logout from the system
if(isset($_POST['logout']) || $_GET['page'] == 'logout') {
    unset($_SESSION['env']);
    $_SESSION['message'] = 'Wylogowano!';
    header("Location: ".$homepage);
    die();
}

// ACTION - Save person to a list
if($_GET['page'] == 'save') {
    $name = trim($_POST['name']);
    // $mail = trim($_POST['mail']);
    $mail = '';

    if($name) {
        $list[] = ['name'=>$name, 'mail'=>$mail, 'timestamp'=>date('Y-m-d H:i:s')];
        file_put_contents('db/list.json', json_encode($list, JSON_FORCE_OBJECT));

        $_SESSION['message'] = 'Zapisano Cię do listy prezentów na rok '.date('Y');
    }
    
    header("Location: ".$homepage);
    die();
}

// ACTION - draw a person from the list
if($_GET['page'] == 'pick') {
    $choosen = draw($_POST['picker'], $list, $drawn, $_POST['spouse']);

    if($choosen) {
        // $drawn = array_merge($drawn, $choosen);
        $drawn[$_POST['picker']] = $choosen;

        file_put_contents('db/drawn.json', json_encode($drawn, JSON_FORCE_OBJECT));

        $_SESSION['message'] = 'Wylosowałes swoją osobę na święta '. date('Y') .': <b>'. $list[$choosen['picked']]['name'] .'</b>';
        $_SESSION['choosen'] = $choosen;
        $_SESSION['choosen']['picker'] = $_POST['picker'];
    }
    
    header("Location: ".$homepage);
    die();
}


// Get flash messages from other actions
$message = '';
if($_SESSION['message']) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}


// HTML template header
include('templates/header.php');

// Check if you are looged in and to which environment
if(isset($_SESSION['env'])) {
    echo $_SESSION['env'] . "<br /><br />"; 

    // Which sub page to display
    switch($_GET['page']) {
        // List of all saved persons
        case 'list': include('templates/list.php'); break;
        // Form to choose as who you want to draw a person
        case 'draw': include('templates/draw.php'); break;
        // Form to save on list
        default: include('templates/form.php'); 
    }
}
else {
    // When you are not logged in
    include('templates/login.php');
}

// HTML template footer
include('templates/footer.php');