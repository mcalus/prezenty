<?php if(!$config['joinOpen']) { ?>
    
<p>Przepraszamy ale zapisywanie jest już wyłączone (prawdopodobnie losowanie się zaczęło).</p>
    
<?php }else{ ?>

<div class="login-box">
  <h1>Zapisz się na <?=$config['title']?> <?=$config['year']?></h1>

  <form method="post" action="/save">
      <div class="user-box">
          <input type="text" name="name" />
          <label>Imię</label>
      </div>
      <a href="#" onClick="document.forms[0].submit(); return false;">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Zapisz się!
      </a>
      <!-- <input type="text" name="mail" placeholder="mail" />-->
  </form>
</div>

<?php } ?>