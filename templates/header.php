<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Prezenty Całusów</title>
</head>

<body class="container">
<?php if(isset($_SESSION['env'])) { ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Zapisz się</a>
    <a class="navbar-brand" href="/lista">Lista</a>
<?php if($config['powerOn']) { ?>
    <a class="navbar-brand" href="/losowanie">Losowanie</a>
<?php } ?>
    <a class="navbar-brand" href="/logout">Wyloguj</a>
</nav>

<br />

<div class="message"><?=$message?></div>

<?php } ?>