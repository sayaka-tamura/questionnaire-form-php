<!DOCTYPE html>
<html lang="en">

  <?php

    if (isset($_POST['sub1'])) {
      // Session Start
      session_start();
    } else {
        session_destroy();
        session_start();

        // To avoid Session Hijack
        // session_regenerate_id(true);

        // For countermeasure of CSRF
        // 疑似乱数のバイト文字列(16バイト)を生成
        $token_byte = openssl_random_pseudo_bytes(16);
        //バイナリのデータを16進表現に変換
        $csrf_token = bin2hex($token_byte);

        // セッション変数設定
        $_SESSION['csrf_token'] = $csrf_token;

        echo "$_SESSION'csrf_token': ".$_SESSION["csrf_token"]."<br />";
        print('session_id()は '.session_id().' です。<br>');

        if (empty($_SESSION['count'])) {
          $_SESSION['count'] =  1;
        } else {
          $_SESSION['count']++;
        }

    }

    require("template/head.php"); 
  ?>

  <body>
  <p>
  こんにちは、あなたがこのページに来たのは  <?php  echo $_SESSION ['count' ]; ?>  回目ですね。
  </p>
  <p>
  続けるには、<a href="nextpage.php?< ?php echo  htmlspecialchars (SID ); ?>" >ここをクリック</A>
  してください。
  </p>
    <div class="bg-contact3" style="background-image: url('images/bg-01.jpg');">
      <div class="container-contact3">
        <div class="wrap-contact3">
          <form method="POST" action="check.php" class="contact3-form validate-form">

            <!-- 生成したランダムな文字列をトークン文字列に設定：入力データとして”check.php”に送る -->
            <input type="hidden" name="csrf_token" value="<?=$csrf_token?>">
            
            <span class="contact3-form-title">
              Questionary
            </span>

            <div class="wrap-contact3-form-radio">
              <div class="contact3-form-radio m-r-42">
                <input class="input-radio3" id="radio1" type="radio" name="choice" value="say-hi"
                  <?php 
                    if(!isset($_SESSION['choice'])){echo 'checked="checked"';}
                    if(isset($_SESSION['choice']) && $_SESSION['choice'] == "say-hi"){echo 'checked="checked"';}
                  ?>
                >                
                <label class="label-radio3" for="radio1">
                  Say Hi
                </label>
              </div>

              <div class="contact3-form-radio">
                <input class="input-radio3" id="radio2" type="radio" name="choice" value="respond-to-a-survey"
                  <?php 
                    if(isset($_SESSION['choice']) && $_SESSION['choice'] == "respond-to-a-survey"){echo 'checked="checked"';}
                  ?>
                >
                <label class="label-radio3" for="radio2">
                  Respond to a survey
                </label>
              </div>
            </div>

            <div class="wrap-input3">
              <input class="input3" type="text" name="name" placeholder="Your Name" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?>">
              <span class="focus-input3"></span>
            </div>

            <div class="wrap-input3">
              <input class="input3" type="text" name="email" placeholder="Your Email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>">
              <span class="focus-input3"></span>
            </div>

            <div class="input3 wrap-input3 input3-select">
              <select class="selection-2" name="job">
                <option value="occupation" <?php echo array_key_exists('job', $_SESSION) && $_SESSION['job']=='occupation'?'selected':''; ?>>Occupation</option>
                <option value="student" <?php echo array_key_exists('job', $_SESSION) && $_SESSION['job']=='student'?'selected':''; ?>>Student</option>
                <option value="company_employee" <?php echo array_key_exists('job', $_SESSION) && $_SESSION['job']=='company_employee'?'selected':''; ?>>Company employee</option>
                <option value="public_official" <?php echo array_key_exists('job', $_SESSION) && $_SESSION['job']=='public_official'?'selected':''; ?>>Public official</option>
                <option value="self_employed" <?php echo array_key_exists('job', $_SESSION) && $_SESSION['job']=='self_employed'?'selected':''; ?>>Self-employed</option>
                <option value="others" <?php echo array_key_exists('job', $_SESSION) && $_SESSION['job']=='others'?'selected':''; ?>>Others</option>
              </select>
              <span class="focus-input3"></span>
            </div>

            <div class="input3 input3-select my-5 margin-radio">
              <div class="my-4">How satisfied are you with the books?</div>
              <?php
              // 配列からラジオボタンを作成する
                $ar_rate = array(
                  "5" => "Very Satisfied",
                  "4" => "Satisfied",
                  "3" => "Normal",
                  "2" => "Unsatisfied",
                  "1" => "Very Unsatisfied",
                );
                
                foreach($ar_rate as $key=>$value){
                  echo "<div class=\"contact3-form-radio\">";
                    echo "<input class=\"input-radio3\" type=\"radio\" name=\"rate1\" value=\"{$key}\" id=\"{$key}\" ";
                      if (isset($_SESSION['rate1']) && $_SESSION['rate1'] == "{$key}"){echo 'checked';}
                    echo " >";
                    echo "<label class=\"label-radio3\" for=\"{$key}\">".$value."</label>";
                  echo "</div>";
                }
              ?>
            </div>

            <div class="input3 input3-select my-5 margin-radio my-5 margin-radio">
              <div class="my-4">How about the book volume?</div>
              <?php
              foreach($ar_rate as $key=>$value){
                echo "<div class=\"contact3-form-radio\">";
                  echo "<input class=\"input-radio3\" type=\"radio\" name=\"rate2\" value=\"{$key}\" id=\"{$key}+5\" "; 
                    if (isset($_SESSION['rate2']) && $_SESSION['rate2'] == "{$key}"){echo 'checked';}
                  echo ">";
                  echo "<label class=\"label-radio3\" for=\"{$key}+5\">".$value."</label>";
                echo "</div>";
              }
              ?>
            </div>

            <div class="input3 input3-select my-5 margin-radio my-5">
              <div class="my-4">Programming languages that you have a experience</div>
              <div class="pl-0">
                <div class="form-check form-check-inline pl-0">
                  <input class="form-check-input" id="php" type="checkbox" name="tec[]" value="PHP"
                    <?php 
                      if(!isset($_SESSION['tec'])) :
                        $_SESSION['tec']=null;
                      elseif(isset($_SESSION['tec']) && (strpos($_SESSION['tec'], "PHP") === 0)):
                        echo 'checked';
                      endif;
                    ?>
                  >
                  <label class="form-check-label pl-0" for="php">PHP</label>
                </div>
                <div class="form-check form-check-inline pl-3">
                  <input class="form-check-input" id="java" type="checkbox" name="tec[]" value="Java"
                    <?php 
                      if(isset($_SESSION['tec']) && strpos($_SESSION['tec'], "Java") || (strpos($_SESSION['tec'], "Java") === 0)):
                        echo 'checked';
                      endif;
                    ?>
                  >
                  <label class="form-check-label pl-0" for="java">Java</label>
                </div>
                <div class="form-check form-check-inline pl-3">
                  <input class="form-check-input" id="ruby" type="checkbox" name="tec[]" value="Ruby"
                    <?php 
                      if(isset($_SESSION['tec']) && strpos($_SESSION['tec'], "Ruby") || (strpos($_SESSION['tec'], "Ruby") === 0)):
                        echo 'checked';
                      endif;
                    ?>
                  >
                  <label class="form-check-label pl-0" for="ruby">Ruby</label>
                </div>
                <div class="form-check form-check-inline pl-3">
                  <input class="form-check-input" id="c#" type="checkbox" name="tec[]" value="C#"
                    <?php
                      if(isset($_SESSION['tec']) && strpos($_SESSION['tec'], "C#") || (strpos($_SESSION['tec'], "C#") === 0)):
                        echo 'checked';
                      endif;
                    ?>
                  >
                  <label class="form-check-label pl-0" for="c#">C#</label>
                </div>
                <div class="form-check form-check-inline pl-3">
                  <input class="form-check-input" id="perl" type="checkbox" name="tec[]" value="Perl"
                    <?php 
                      if(isset($_SESSION['tec']) && strpos($_SESSION['tec'], "Perl") || (strpos($_SESSION['tec'], "Perl") === 0)):
                        echo 'checked';
                      endif;
                    ?>
                  >
                  <label class="form-check-label pl-0" for="perl">Perl</label>
                </div>
              </div>
            </div>

            <div class="wrap-input3 my-5">
              <textarea class="input3" name="message" placeholder="Your Message" cols="40" rows="5"><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?></textarea>
              <span class="focus-input3"></span>
            </div>

            <div class="input3 my-5">
              <div class="my-4">New Publication Information</div>
              <div class="form-check ml-4">
                <input type="hidden" name="dm" value="off">
                <input class="form-check-input" id="dm-check" type="checkbox" name="dm" value="on" 
                  <?php 
                    if(!isset($_SESSION['dm'])){echo 'checked="checked"';}
                    if(isset($_SESSION['dm']) && $_SESSION['dm'] == "Request to send"){echo 'checked="checked"';}
                  ?>
                >
                <label class="form-check-label" for="dm-check">Please send me the information</label>
              </div>
            </div>

            <div class="container-contact3-form-btn">
              <input type="submit" value="confirm" name="sub1"  class="contact3-form-btn">
            </div>

          </form>
        </div>
      </div>
    </div>
    <div id="dropDownSelect1"></div>

    <?php 
      require("template/footer.php"); 

      // Session End
      session_destroy();
    ?>
  </body>
</html>