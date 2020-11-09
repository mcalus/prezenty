
<?php if(!$config['powerOn']) { ?>
    
<p>Przepraszamy ale losowanie jest jeszcze wyłączone (czekamy na wszystkich).</p>

<?php }else{ ?>

<p>Tutaj możesz wylosować sobie osobę do robienia prezentu. 
    Pamiętaj że jest to jednorazowe i nieodwracalne więc zastanów się dwa razy.</p>

<form method="post" action="/losuj" onSubmit="return confirm('Czy na pewno chcesz losować?')">
    <select name="losujacy">
        <option>Kim jesteś?</option>
        <?php if($lista) { 
            foreach($lista as $id=>$osoba) {
                echo '<option value="'.$id.'">'.$osoba['imie'].'</option>';
            } 
        }
        ?>
    </select>
    <input type="submit" value="Losuj!" />
</form>

<?php } ?>