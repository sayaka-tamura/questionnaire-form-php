<!DOCTYPE html>
<html lang="en">

  <?php
    // Session Start
    session_start();
    
    require("template/head.php"); 
    var_dump($_SESSION);
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
                <label class="label-radio3" for="radio1">
                  Say Hi
                </label>
              </div>

              <div class="contact3-form-radio">
                <input class="input-radio3" id="radio2" type="radio" name="choice" value="respond-to-a-survey">
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
                    echo "<input class=\"form-check-input\" type=\"radio\" name=\"rate1\" value=\"{$key}\" id=\"radio2\">";
                    echo "<label class=\"form-check-label\" for=\"radio2\">".$value."</label>";
                  echo "</div>";
                }
              ?>
            </div>
            <div class="input3 input3-select my-5 margin-radio my-5 margin-radio">
              <div class="my-4">How about the book volume?</div>
              <?php
              foreach($ar_rate as $key=>$value){
                echo "<div class=\"form-check\">";
                  echo "<input class=\"form-check-input\" type=\"radio\" name=\"rate2\" value=\"{$key}\" id=\"radio2\">"; 
                  echo "<label class=\"form-check-label\" for=\"radio2\">".$value."</label>";
                echo "</div>";
              }
              ?>
            </div>

            <div class="input3 input3-select my-5 margin-radio my-5">
              <div class="my-4">Programming languages that you have a experience</div>
              <div>
                <div class="form-check form-check-inline ml-0">
                  <input type="checkbox" name="tec[]" value="PHP"
                    <?php if (isset($_SESSION['tec']) && $_POST['tec'] == "PHP") echo 'checked'; ?>
                  >
                  <label class="form-check-label">PHP</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="tec[]" value="Java"
                    <?php if (isset($_SESSION['tec']) && $_POST['tec'] == "Java") echo 'checked'; ?>
                  >
                  <label class="form-check-label">Java</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="tec[]" value="Ruby"
                    <?php if (isset($_SESSION['tec']) && $_POST['tec'] == "Ruby") echo 'checked'; ?>
                  >
                  <label class="form-check-label">Ruby</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="tec[]" value="C#"
                    <?php if (isset($_SESSION['tec']) && $_POST['tec'] == "C#") echo 'checked'; ?>
                  >
                  <label class="form-check-label">C#</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="tec[]" value="Perl"
                    <?php if (isset($_SESSION['tec']) && $_POST['tec'] == "Perl") echo 'checked'; ?>
                  >
                  <label class="form-check-label">Perl</label>
                </div>
              </div>
            </div>

            <div class="wrap-input3 validate-input my-5" data-validate="Message is required">
              <textarea class="input3" name="message" placeholder="Your Message" cols="40" rows="5"></textarea>
              <span class="focus-input3"></span>
            </div>

            <div class="input3 my-5">
              <div class="my-4">New Publication Information</div>
              <div class="form-check form-check-inline">
                <input type="checkbox" name="dm" checked>
                <label class="form-check-label">Please send me the information</label>
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