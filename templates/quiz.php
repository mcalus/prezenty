

<div class="login-box">
  <h1>Świąteczny quiz <?=$config['year']?></h1>
  <p>Odpowiedzi zapisują się do zalogowanej przeglądarki. Po wylogowaniu zostają usunięte.</p>

  <form method="post" action="/answer">
      <?php if(isset($quiz['questions'])) {
            $answersUser = $_SESSION['answers'][$_SESSION['env']];
            
            foreach($quiz['questions'] as $id=>$question) {
              if($question['active']) {
      ?>
      
      <div class="user-box">
          <input type="text" name="answer_<?=$id?>" 
            class="<?=($answersUser['answer_'.$id]['valid'] == 1?'goodAnswer':($answersUser['answer_'.$id]['valid'] == -1?'errorAnswer':''))?>" 
            value="<?=(isset($answersUser['answer_'.$id]['answer'])?$answersUser['answer_'.$id]['answer']:'')?>" 
          />
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