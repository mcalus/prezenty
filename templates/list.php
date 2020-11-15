
<h1>Lista zapisanych osób na <?=$config['title']?> <?=date('Y')?></h1>

<ul class="list">
    <?php
        if($list === null) {
            echo "Nikt się jeszcze nie zapisał!";
        }
        else {
            foreach($list as $id=>$person) {
                echo "<li".(isset($drawn[$id])?' class="picked" title="Wylosowano już osobę"':'').">". $person['name'] ."</li>";
            }
        }
    ?>
</ul>