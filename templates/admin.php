<p>Admin panel</p>
<br />

<?php 
$config = getDBFile('config');

foreach($config['enviroments'] as $key=>$value) {
    
$drawn = getDBFile('drawn', $key);
$list = getDBFile('list', $key);
$password = array_search($key, $config['passwords']);
?>

<b><?=$key?></b>

<!-- Hasło<i class="material-icons" style="cursor:pointer;" onClick="$('#formPass<?=$key?>').toggle();">arrow_down</i>
<form method="post" action="/passEnv" id="formPass<?=$key?>" style="display: none;">
    <input type="hidden" name="env" value="<?=$key?>">
    <div class="user-box">
        <input type="text" name="pass" value="<?=$password?>" />
        <label><?=$key2?></label>
    </div>
    <a href="#" onClick="$('#formPass<?=$key?>').submit(); return false;">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    Zapisz!
    </a>
</form> -->
<a href="/copyEnv" title="Skopiuj rok">
    <i class="material-icons">copy</i>
</a>
<span style="cursor:pointer;" onClick="$('#formEdit<?=$key?>').toggle();">Edytuj<i class="material-icons">arrow_down</i></span>
<form method="post" action="/editEnv" id="formEdit<?=$key?>" style="display: none;">
    <input type="hidden" name="env" value="<?=$key?>">
    <div class="user-box">
        <input type="text" name="pass" value="<?=$password?>" />
        <label>Hasło: </label>

        <?php foreach($value as $key2=>$value2) { ?>

        <input type="text" name="<?=$key2?>" value="<?=$value2?>" />
        <label><?=$key2?></label>
        <br />

        <?php } ?>
    </div>
    <a href="#" onClick="$('#formEdit<?=$key?>').submit(); return false;">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    Edytuj!
    </a>
</form>
<a href="/toggleDraw" title="<?=($value['drawOpen']?'Zatrzymaj':'Rozpocznij')?> losowanie">
    <i class="material-icons"><?=($value['drawOpen']?'stop':'start')?></i>
</a>
<a href="/restartDraw" onClick="return confirm('Czy na pewno zrestartować całe losowanie?');" title="Restart losowania">
    <i class="material-icons">restart</i>
    <?=count($drawn)?>
</a>
<a href="/deletePeople" onClick="return confirm('Czy na pewno usunąć wszystkich uczestników?');" title="Usuń uczestników">
    <i class="material-icons">delete</i>
    <?=count($list)?>
</a>

<br />

<?php
}
?>