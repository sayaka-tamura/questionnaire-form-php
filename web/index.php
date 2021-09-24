<!DOCTYPE html>
<html lang="en">

  <?php require("template/head.php"); ?>

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
              <input class="input3" type="text" name="name" placeholder="Your Name">
              <span class="focus-input3"></span>
            </div>

            <div class="wrap-input3 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
              <input class="input3" type="text" name="email" placeholder="Your Email">
              <span class="focus-input3"></span>
            </div>

            <div class="input3 wrap-input3 input3-select">
              <select class="selection-2" name="job">
                <option>Occupation</option>
                <option>Student</option>
                <option>Company employee</option>
                <option>Public official</option>
                <option>Self-employed</option>
                <option>Others</option>
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
                  <input type="checkbox" name="tec[]" value="PHP">
                  <label class="form-check-label">PHP</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="tec[]" value="Java">
                  <label class="form-check-label">Java</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="tec[]" value="Ruby">
                  <label class="form-check-label">Ruby</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="tec[]" value="C#">
                  <label class="form-check-label">C#</label>
                </div>
                <div class="form-check form-check-inline">
                  <input type="checkbox" name="tec[]" value="Perl">
                  <label class="form-check-label">Perl</label>
                </div>
              </div>
            </div>

            <div class="wrap-input3 validate-input my-5" data-validate = "Message is required">
              <textarea class="input3" name="message" placeholder="Your Message" cols="40" rows="5"></textarea>
              <span class="focus-input3"></span>
            </div>

            <div class="input3 my-5">
              <div class="my-4">New Publication Information</div>
              <div class="form-check form-check-inline">
                <input type="checkbox" name="dm" value="Please send me the information" checked>
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
    
    <?php require("template/footer.php"); ?>
  </body>
</html>