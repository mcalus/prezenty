
<?php if(!$config['powerOn']) { ?>
    
<p>Przepraszamy ale losowanie jest jeszcze wyłączone (czekamy na wszystkich).</p>

<?php }else{ ?>

<p>Tutaj możesz wylosować sobie osobę do robienia prezentu. 
    Pamiętaj że jest to jednorazowe i nieodwracalne więc zastanów się dwa razy.</p>

<form method="post" action="/pick" onSubmit="return confirm('Czy na pewno chcesz losować?')">
    <select name="picker">
        <option>Kim jesteś?</option>
        <?php if($list) { 
            foreach($list as $id=>$person) {
                if(!isset($drawn[$id])) {
                    echo '<option value="'.$id.'">'.$person['name'].'</option>';
                }
            } 
        }
        ?>
    </select>
    <input type="submit" value="Losuj!" />
</form>

<?php } ?>