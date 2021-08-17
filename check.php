<?php
  // Form データが空の場合は終了
  if(empty($_POST)){
    echo "Ended Process";
    exit;
  }
  // 評価用数値と文字列の関連付け
  $ar_rate = array(
    "5" => "Very Satisfied",
    "4" => "Satisfied",
    "3" => "Normal",
    "2" => "Unsatisfied",
    "1" => "Very Unsatisfied",
  );
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Questionary</title>
  </head>
  <body>
    <h1>Questionary (2. Answer Confirmation Screen)</h1>
    <p>Please Confirm Your Answer</p>
    
    <?php
      $uname = $_POST["uname"];
      $email = $_POST["email"];
      $gender = $_POST["gender"];
      $job = $_POST["job"];
      $rate1 = $_POST["rate1"];
      $rate2 = $_POST["rate2"];
      $tec = $_POST["tec"];
      $dm = $_POST["dm"];
      $message = $_POST["message"];

      $uname = h($uname);
      $email = h($email);
      $gender = h($gender);
      $job = h($job);
      $rate1 = h($rate1);
      $rate2 = h($rate2);
      $message = h($message);

      if(empty($uname)){
        echo "Please type your name";
        exit;
      }

      if(empty($email)){
        echo "Please type your email";
        exit;
      }
      if(empty($gender)){
        echo "Please select your gender";
        exit;
      }
      if(empty($job)){
        echo "Please select your occupation";
        exit;
      }
      if(empty($rate1)){
        echo "Please select your satisfaction for the book";
        exit;
      }
      if(empty($rate2)){
        echo "Please select your satisfaction for the volume of the book";
        exit;
      }
      if(empty($tec)){
        $tec = "None";
      } else {
        $tec = implode(" ", $_POST["tec"]);
      }
      $tec = h($tec);

      if($_POST["dm"] == "on"){
        $dm = "Request to send";
      } else {
        $dm = "No Need";
      }
      if(empty($message)){
        echo "Please type your review for the book";
        exit;
      }

      function h($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
      }
    ?>
    <!-- ここから！！！ -->
    
    <!-- アンケート回答の確認表示 -->
    <form method="POST" action="submit.php">
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
            <input type="radio" name="gender" value="Male">
            <input type="radio" name="gender" value="Female">
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
  </body>
</html>