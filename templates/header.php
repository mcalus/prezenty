<!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Prezenty Całusów</title>

    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" type="text/css" href="css/snowflakes.css" />
</head>

<body class="container" id="mainBody">

<?php if($_SESSION['choosen']) { ?>
<div class="drawPopup">
    Święta <?=date('Y')?>
    <br />
    <?=$list[$_SESSION['choosen']['picker']]['name']?> robi prezent dla <b><?=$list[$_SESSION['choosen']['picked']]['name']?></b>
</div>
<?php 
    unset($_SESSION['choosen']); 
} 
?>

<!-- <canvas id="snowflakes"></canvas> -->

<?php if(isset($_SESSION['env'])) { ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Zapisz się</a>
    <a class="navbar-brand" href="/list">Lista</a>
<?php if($config['drawOpen']) { ?>
    <a class="navbar-brand" href="/draw">Losowanie</a>
<?php } ?>
    <a class="navbar-brand" href="/logout">Wyloguj</a>
</nav>


<a href="#" id="button" onClick="toggleAudio()">Play</a>

<!-- <audio controls autoplay id="bgsound" src="Carol of the Bells (from Christmas Demolition).mp3" preload="auto">  -->
<audio id="bgsound" src="Carol of the Bells (from Christmas Demolition).mp3" preload="auto">
</audio> 

<script>
    // var sample = document.getElementById("bgsound");
    // sample.play();
    // sample.autoplay = true;
    // sample.load();

    function toggleAudio() {
        var audio = document.getElementById('bgsound');
        if(!audio.paused)
            audio.pause();
        else
            audio.play();
    }
</script>


<br />

<?php } ?>

<div class="message"><?=$message?></div>
