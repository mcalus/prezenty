<!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Prezenty Całusów</title>

    <!-- <link rel="stylesheet" href="css/mini-default.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/snowflakes.css" /> -->
    <link rel="stylesheet" type="text/css" href="css/christmasBall.css" />
    <link href='https://fonts.googleapis.com/css?family=Sancreek' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/forms.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />

    <link rel="stylesheet" href="css/icon.css"/>
</head>

<body class="container" id="mainBody">

<!-- <canvas id="snowflakes"></canvas> -->

<?php if(isset($_SESSION['env'])) { ?>

<!-- Christmass ball template -->
<div class="l-container home">
  <div class="illust-container">
    <div class="illust-level illust-level--intro">
      <div class="illustItem illustItem--bgGrass"></div>
      <div class="illustItem illustItem--fencePost illustItem--fencePost--first">
        <img src="/img/ChristmasBall/fencepost.svg" alt="Fence post">
        <div class="illustItem illustItem--northpole illustItem--fence-arrow illustItem--fence-arrow-left symbol symbol--northpole">
          <img src="/img/ChristmasBall/fence-arrow-left.svg" alt="Fence post Arrow Left">
          <h2 class="symbol-title">Biegun północny</h2>
        </div>
        <div class="illustItem illustItem--grotto illustItem--fence-arrow illustItem--fence-arrow-right symbol symbol--grotto">
          <img src="/img/ChristmasBall/fence-arrow-right.svg" alt="Fence post Arrow Right">
          <h2 class="symbol-title">Gdynia</h2>
        </div>
      </div>
      <div class="illustItem illustItem--holly symbol symbol--holly">
        <img src="/img/ChristmasBall/holly.svg" alt="Holly">
      </div>

      <div class="illustItem illustItem--fencePost illustItem--fencePost--second">
        <img src="/img/ChristmasBall/fencepost.svg" alt="Fence post">
        <div class="illustItem illustItem--lapland illustItem--fence-arrow illustItem--fence-arrow-right symbol symbol--lapland">
          <img src="/img/ChristmasBall/fence-arrow-right.svg" alt="Fence post arrow right">
          <h2 class="symbol-title">Venlo</h2>
        </div>
      </div>
      <div class="illustItem illustItem--ivy symbol symbol--ivy">
        <img src="/img/ChristmasBall/ivy.svg" alt="Ivy">
      </div>
    </div>
  </div>
  <div class="illust-level--town">
    <div class="illustItem illustItem--snowglobe">
      <img src="/img/ChristmasBall/snowglobe.svg" alt="Snow Globe">
    </div>
    <div class="illustItem illustItem--town">
      <img class="svg-town" src="/img/ChristmasBall/town.svg" alt="Town">
      <div class="svg-house">
        <img src="/img/ChristmasBall/house.svg" alt="House">
        <img class="svg-lights" src="/img/ChristmasBall/lights.svg" alt="lights">
      </div>
      <img class="svg-sleigh" src="/img/ChristmasBall/sleigh.svg" alt="Sleigh">
      <div class="svg-star inactive">
        <img src="/img/ChristmasBall/star.svg" alt="Star">
      </div>
      <img class="svg-sledge" src="/img/ChristmasBall/sledge.svg" alt="sledge">
      <img class="svg-robins" src="/img/ChristmasBall/robins.svg" alt="robins">
      <img class="svg-peace" src="/img/ChristmasBall/peace.svg" alt="peace">
      <img class="svg-shopping" src="/img/ChristmasBall/shopping.svg" alt="shopping">
      <div class="svg-carollers">
        <img src="/img/ChristmasBall/carolers.svg" alt="carollers">
      </div>
      <img class="svg-firstfloor" src="/img/ChristmasBall/firstfloor.svg" alt="firstfloor">
      <img class="svg-secondfloor" src="/img/ChristmasBall/secondfloor.svg" alt="secondfloor">
      <img class="svg-nativity" src="/img/ChristmasBall/nativity.svg" alt="nativity">
      
      <div class="illust-level illust-level--symbolsTown">
        <div class="illustItem illustItem--yuletide symbol symbol--yuletide">
          <h2 class="symbol-title"><?=$config['title']?> <?=$config['year']?></h2>
        </div>
        <div class="symbols--outside">
          <div class="illustItem illustItem--carols symbol symbol--carols">
            <h2 class="symbol-title">Wesołych świąt!</h2>
          </div>
        </div>
        <div class="symbols--inside inactive">
          <div class="illustItem illustItem--nutcracker symbol symbol--nutcracker">
            <h2 class="symbol-title">Jaś</h2>
          </div>
          <div class="illustItem illustItem--present symbol symbol--present">
            <h2 class="symbol-title">Nela</h2>
          </div>
          <div class="illustItem illustItem--mincepie symbol symbol--mincepie">
            <h2 class="symbol-title">Dudy!</h2>
          </div>
          <div class="illustItem illustItem--christmascards symbol symbol--christmascards">
            <h2 class="symbol-title">Wesołych świąt!</h2>
          </div>
          <div class="illustItem illustItem--bingcrosby symbol symbol--bingcrosby">
            <h2 class="symbol-title">Mirek</h2>
          </div>
          <div class="illustItem illustItem--mariahcarey symbol symbol--mariahcarey">
            <h2 class="symbol-title">Jagoda</h2>
          </div>
          <div class="illustItem illustItem--endquote">
            <h2 class="symbol-title"><span class="symbol-title-sub">Wesołych</span>i radosnych świąt Bożego Narodzenia!</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="scroll-proxy"></div>
  <div class="page-footer">
    <ul class="unstyled page-footer-links">
        <li>
            <a href="#" onClick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;">Wróć do menu</a>
            <br />
            <a class="page-footer-info" href="https://twitter.com/AshNolan_" target="_blank">Template by AshNolan_</a>
            <br /><?=$config['for_extras']?>
        </li>
    </ul>
  </div>
</div>


<div class="mainDiv">

<?php if($_SESSION['choosen']) { ?>
<div id="drawPopup" class="drawPopup">
    <?=$config['title']?> <?=$config['year']?>
    <br />
    <b><?=$list[$_SESSION['choosen']['picker']]['name']?></b> robi prezent dla <b><?=$list[$_SESSION['choosen']['picked']]['name']?></b>
    <?php
      if(isset($config['for_extras']) && $config['for_extras'] != "")
        echo '<br />'.$config['for_extras'];
    ?>
    <br />
</div>
<?php 
    unset($_SESSION['choosen']); 
} 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<?php if($_SESSION['env'] != 'admin') { ?>
    <a href="#" id="musicButton" onClick="toggleAudio(); return false;"><?=($_COOKIE['userPause']=="0"?'Stop':'Play')?></a>
<?php if($config['joinOpen']) { ?>
    <a class="navbar-brand" href="/">Zapisz się</a>
<?php } ?>
    <a class="navbar-brand" href="/list">Lista</a>
<?php if($config['drawOpen']) { ?>
    <a class="navbar-brand" href="/draw">Losowanie</a>
<?php } ?>
<?php if($config['quiz']) { ?>
    <a class="navbar-brand" href="/quiz">Quiz</a>
<?php } ?>
<?php } ?>
    <a class="navbar-brand" href="/logout">Wyloguj</a>
</nav>

<?php if($config['song']) { ?>
<audio loop id="bgsound" src="audio/<?=$config['song']?>" preload="auto"></audio> 
<?php } ?>

<?php } ?>

<div class="message"><?=$message?></div>
