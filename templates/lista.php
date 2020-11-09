
<p>Lista zapisanych osób</p>

<ul class="lista">
    <?php
        if($lista === null) {
            echo "Nikt się jeszcze nie zapisał!";
        }
        else {
            foreach($lista as $id=>$osoba) {
                echo "<li>". $osoba['imie'] ."</li>";
            }
        }
    ?>
</ul>