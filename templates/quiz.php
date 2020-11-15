

<div class="login-box">
  <h1>Świąteczny quiz <?=date('Y')?></h1>

  <form method="post" action="/answer">
      <?php if(isset($quiz['questions'])) { 
            foreach($quiz['questions'] as $id=>$question) {
              if($question['active']) {
      ?>
      
      <div class="user-box">
          <input type="text" name="answer_<?=$id?>" />
          <label><?=$question['question']?></label>
      </div>

      <?php
              }
            } 
        }
      ?>
      
      <a href="#" onClick="document.forms[0].submit(); return false;">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Odpowiedz!
      </a>
  </form>
</div>