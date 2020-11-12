
<?php if(!$config['drawOpen']) { ?>
    
<p>Przepraszamy ale losowanie jest jeszcze wyłączone (czekamy na wszystkich).</p>

<?php }else{ ?>

<p>Tutaj możesz wylosować sobie osobę do robienia prezentu. 
    Pamiętaj że jest to jednorazowe i nieodwracalne więc zastanów się dwa razy.</p>
<p>Współmałżonek jest opcjonalny i nie zostanie wylosowany tylko w przypadku
    gdy nie zablokuje to innych.</p>

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

    <?php if($config['spouses']) { ?>
    <select name="spouse">
        <option>*Opcjonalny współmałżonek</option>
        <?php if($list) { 
            foreach($list as $id=>$person) {
                echo '<option value="'.$id.'">'.$person['name'].'</option>';
            } 
        }
        ?>
    </select>
    <?php } ?>

    <input type="submit" value="Losuj!" />
</form>

<?php } ?>