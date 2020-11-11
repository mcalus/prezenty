<!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Prezenty Całusów</title>

    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" type="text/css" href="css/snowflakes.css" />
</head>

<body class="container" id="mainContainer">

<canvas id="snowflakes"></canvas>

<?php if(isset($_SESSION['env'])) { ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Zapisz się</a>
    <a class="navbar-brand" href="/list">Lista</a>
<?php if($config['powerOn']) { ?>
    <a class="navbar-brand" href="/pick">Losowanie</a>
<?php } ?>
    <a class="navbar-brand" href="/logout">Wyloguj</a>
</nav>


<a href="#" id="button" onClick="document.getElementById('bgsound').play()">Play</a>

<audio controls autoplay id="bgsound" src="C:\Users\Public\Music\Sample Music\Kalimba.mp3" preload="auto"> 

<script>
    var sample = document.getElementById("bgsound");
    sample.play();
    // sample.autoplay = true;
    // sample.load();
</script>


<br />

<div class="message"><?=$message?></div>

<?php } ?>