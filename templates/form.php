

<div class="login-box">
  <p>Zapisz się na święta <?=date('Y')?></p>

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
      <!-- <input type="text" name="mail" placeholder="mail" /> -->
      <!-- <input type="submit" value="Zapisz się!" /> -->
  </form>
</div>