
<p>Lista zapisanych osób</p>

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