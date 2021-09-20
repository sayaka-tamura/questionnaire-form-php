<html>

  <?php require("template/head.php"); ?>

  <body>
    <div class="bg-contact3" style="background-image: url('images/bg-01.jpg');">
      <h1>Questionary</h1>
      <p>Click "Confirm" button after answering questionary</p>
      <form method="POST" action="check.php">
        <table border="1">
          <tr>
            <td>Name</td>
            <td><input type="text" name="uname" size="50"></td>
          </tr>
          <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" size="50"></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>
              <input type="radio" name="gender" value="Male">Male
              <input type="radio" name="gender" value="Female">Female
            </td>
          </tr>
          <tr>
            <td>Occupation</td>
            <td>
              <select name="job">
                <option value="">▼ Select</option>
                <option>Student</option>
                <option>Company employee</option>
                <option>Public official</option>
                <option>Self-employed</option>
                <option>Others</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>How satisfied are you with the books?</td>
            <td>
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
                echo "<input type=\"radio\" name=\"rate1\" value=\"{$key}\">{$value}";
              }
            ?>
            </td>
          </tr>
          <tr>
            <td>How about the book volume?</td>
            <td>
              <?php
              foreach($ar_rate as $key=>$value){
                echo "<input type=\"radio\" name=\"rate2\" value=\"{$key}\">{$value}";
              }
              ?>
            </td>
          </tr>
          <tr>
            <td>Programming languages that you have a experience</td>
            <td>
              <input type="checkbox" name="tec[]" value="PHP">PHP
              <input type="checkbox" name="tec[]" value="Java">Java
              <input type="checkbox" name="tec[]" value="Ruby">Ruby
              <input type="checkbox" name="tec[]" value="C#">C#
              <input type="checkbox" name="tec[]" value="Perl">Perl
            </td>
          </tr>
          <tr>
            <td>New Publication Information</td>
            <td>
              <input type="checkbox" name="dm" checked>Please send me the information
            </td>
          </tr>
          <tr>
            <td>Book Reviews</td>
            <td>
              <textarea name="message" cols="40" rows="5"></textarea>
            </td>
          </tr>
          <tr>
            <td align="right" colspan="2">
              <input type="submit" value="confirm" name="sub1">
            </td>
          </tr>
        </table>
      </form>
    </div>

    <?php require("template/footer.php"); ?>
  </body>
</html>