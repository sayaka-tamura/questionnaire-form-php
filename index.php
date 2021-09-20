<html>

  <?php require("template/head.php"); ?>

  <body>
    <div class="bg-contact3" style="background-image: url('images/bg-01.jpg');">
      <div class="container-contact3">
        <div class="wrap-contact3">
          <form method="POST" action="check.php" class="contact3-form validate-form">
            <span class="contact3-form-title">
              Questionary
            </span>
            <p>Click "Confirm" button after answering questionary</p>

            <div class="wrap-contact3-form-radio">
              <div class="contact3-form-radio m-r-42">
                <input class="input-radio3" id="radio1" type="radio" name="choice" value="say-hi" checked="checked">
                <label class="label-radio3" for="radio1">
                  Say Hi
                </label>
              </div>

              <div class="contact3-form-radio">
                <input class="input-radio3" id="radio2" type="radio" name="choice" value="get-quote">
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

            <div class="wrap-input3 input3-select">
              <div>
                <select class="selection-2" name="job">
                  <option>Occupation</option>
                  <option>Student</option>
                  <option>Company employee</option>
                  <option>Public official</option>
                  <option>Self-employed</option>
                  <option>Others</option>
                </select>
              </div>
              <span class="focus-input3"></span>
            </div>
            
            <div class="wrap-contact3-form-radio">
              <div class="contact3-form-radio m-r-42">
              <div>How satisfied are you with the books?</div>
                <div>
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
                    echo "<input type=\"radio\" name=\"rate1\" value=\"{$key}\" id=\"radio2\" class=\"input-radio3\">{$value}";
                    echo "<label class=\"input-radio3\" for=\"radio2\">".$value."</label>";
                  }
                ?>
                </div>
              </div>
            </div>
            <div>
              <div>How about the book volume?</div>
              <div>
                <?php
                foreach($ar_rate as $key=>$value){
                  echo "<input type=\"radio\" name=\"rate2\" value=\"{$key}\">{$value}";
                }
                ?>
              </div>
            </div>
            <div>
              <div>Programming languages that you have a experience</div>
              <div>
                <input type="checkbox" name="tec[]" value="PHP">PHP
                <input type="checkbox" name="tec[]" value="Java">Java
                <input type="checkbox" name="tec[]" value="Ruby">Ruby
                <input type="checkbox" name="tec[]" value="C#">C#
                <input type="checkbox" name="tec[]" value="Perl">Perl
              </div>
            </div>
            <div>
              <div>New Publication Information</div>
              <div>
                <input type="checkbox" name="dm" checked>Please send me the information
              </div>
            </div>
            <div>
              <div>Book Reviews</div>
              <div>
                <textarea name="message" cols="40" rows="5"></textarea>
              </div>
            </div>
            <div>
              <div align="right" colspan="2">
                <input type="submit" value="confirm" name="sub1">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php require("template/footer.php"); ?>
  </body>
</html>