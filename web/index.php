<!DOCTYPE html>
<html lang="en">

  <?php
    // Session Start
    session_start();
    
    require("template/head.php"); 
    var_dump($_SESSION);
    var_dump($_SESSION['dm']);
  ?>

  <body>
    <div class="bg-contact3" style="background-image: url('images/bg-01.jpg');">
      <div class="container-contact3">
        <div class="wrap-contact3">
          <form method="POST" action="check.php" class="contact3-form validate-form">
            <span class="contact3-form-title">
              Questionary
            </span>
            <!-- <p>Click "Confirm" button after answering questionary</p> -->

            <div class="wrap-contact3-form-radio">
              <div class="contact3-form-radio m-r-42">
                <input class="input-radio3" id="radio1" type="radio" name="choice" value="say-hi" checked="checked">
                  <!--
                    <?php if (isset($_SESSION['choice']) && $_SESSION['choice'] != "say-hi"):?>
                      checkOff();
                    <?php endif; ?>
                  --!> 
                
                <label class="label-radio3" for="radio1">
                  Say Hi
                </label>
              </div>

              <div class="contact3-form-radio">
                <input class="input-radio3" id="radio2" type="radio" name="choice" value="respond-to-a-survey">
                  <!-- <?php if (isset($_SESSION['choice']) && $_SESSION['choice'] == "respond-to-a-survey"){echo 'checked';} ?> -->
                
                <label class="label-radio3" for="radio2">
                  Respond to a survey
                </label>
              </div>
            </div>

            <div class="wrap-input3 validate-input" data-validate="Name is required">
              <input class="input3" type="text" name="name" placeholder="Your Name" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?>">
              <span class="focus-input3"></span>
            </div>

            <div class="wrap-input3 validate-input" data-validate="Valid email is required: ex@abc.xyz">
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
                  echo "<div class=\"form-check\">";
                    echo "<input class=\"form-check-input\" type=\"radio\" name=\"rate1\" value=\"{$key}\" id=\"{$key}\" ";
                      if (isset($_SESSION['rate1']) && $_SESSION['rate1'] == "{$key}"){echo 'checked';}
                    echo " >";
                    echo "<label class=\"form-check-label\" for=\"{$key}\">".$value."</label>";
                  echo "</div>";
                }
              ?>
            </div>

            <div class="input3 input3-select my-5 margin-radio my-5 margin-radio">
              <div class="my-4">How about the book volume?</div>
              <?php
              foreach($ar_rate as $key=>$value){
                echo "<div class=\"form-check\">";
                  echo "<input class=\"form-check-input\" type=\"radio\" name=\"rate2\" value=\"{$key}\" id=\"{$key}+5\" "; 
                    if (isset($_SESSION['rate2']) && $_SESSION['rate2'] == "{$key}"){echo 'checked';}
                  echo ">";
                  echo "<label class=\"form-check-label\" for=\"{$key}+5\">".$value."</label>";
                echo "</div>";
              }
              ?>
            </div>

            <div class="input3 input3-select my-5 margin-radio my-5">
              <div class="my-4">Programming languages that you have a experience</div>
              <div class="ml-4">
                <div class="form-check form-check-inline ml-0">
                  <input class="form-check-input" id="php" type="checkbox" name="tec[]" value="PHP"
                    <?php if(isset($_SESSION['tec']) && (strpos($_SESSION['tec'], "PHP") === 0)){echo 'checked';} ?>
                  >
                  <label class="form-check-label" for="php">PHP</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="java" type="checkbox" name="tec[]" value="Java"
                    <?php if(isset($_SESSION['tec']) && strpos($_SESSION['tec'], "Java") || (strpos($_SESSION['tec'], "Java") === 0)){echo 'checked';} ?>
                  >
                  <label class="form-check-label" for="java">Java</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="ruby" type="checkbox" name="tec[]" value="Ruby"
                    <?php if(isset($_SESSION['tec']) && strpos($_SESSION['tec'], "Ruby") || (strpos($_SESSION['tec'], "Ruby") === 0)){echo 'checked';} ?>
                  >
                  <label class="form-check-label" for="ruby">Ruby</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="c#" type="checkbox" name="tec[]" value="C#"
                    <?php if(isset($_SESSION['tec']) && strpos($_SESSION['tec'], "C#") || (strpos($_SESSION['tec'], "C#") === 0)){echo 'checked';} ?>
                  >
                  <label class="form-check-label" for="c#">C#</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="perl" type="checkbox" name="tec[]" value="Perl"
                    <?php if(isset($_SESSION['tec']) && strpos($_SESSION['tec'], "Perl") || (strpos($_SESSION['tec'], "Perl") === 0)){echo 'checked';} ?>
                  >
                  <label class="form-check-label" for="perl">Perl</label>
                </div>
              </div>
            </div>

            <div class="wrap-input3 validate-input my-5" data-validate="Message is required">
              <textarea class="input3" name="message" placeholder="Your Message" cols="40" rows="5"></textarea>
              <span class="focus-input3"></span>
            </div>

            <div class="input3 my-5">
              <div class="my-4">New Publication Information</div>
              <div class="form-check ml-4">
                <input type="hidden" name="dm" value="off">
                <input class="form-check-input" id="dm-check" type="checkbox" name="dm" value="on" <?php if(isset($_SESSION['dm']) && $_SESSION['dm'] == "on"){echo 'checked="checked"';}?>>
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

    <script>
      function checkOff(){

          //チェックボックスの現在のステータスを取得
          chk_status = $("#dm-check").prop("checked");
          
          //取得したステータスが true なら false を、 false なら true をセットする
          if(chk_status){
              //チェックボックスをOFFにする（チェックを外す）。
              $("#dm-check").prop("checked", false);
          }

      };
    </script> 

    <?php 
      require("template/footer.php"); 

      // Session End
      session_destroy();
    ?>
  </body>
</html>