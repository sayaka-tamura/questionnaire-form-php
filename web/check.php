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

  <?php require("template/head.php"); ?>

  <body>
    <h1>Questionary</h1>
    <p>Please Confirm Your Answer</p>
    
    <?php
      $name = $_POST["name"];
      $email = $_POST["email"];
      $job = $_POST["job"];
      $rate1 = $_POST["rate1"];
      $rate2 = $_POST["rate2"];
      $tec = $_POST["tec"];
      $dm = $_POST["dm"];
      $message = $_POST["message"];

      $name = h($name);
      $email = h($email);
      $job = h($job);
      $rate1 = h($rate1);
      $rate2 = h($rate2);
      $message = h($message);

      if(empty($name)){
        echo "Please type your name";
        exit;
      }

      if(empty($email)){
        echo "Please type your email";
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

    <!-- アンケート回答の確認表示 -->
    <form method="POST" action="submit.php">
      <table border="1">
        <tr>
          <td>Name</td>
          <td><?php echo $name ?></td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td><?php echo $email ?></td>
        </tr>
        <tr>
          <td>Occupation</td>
          <td><?php echo $job ?></td>
        </tr>
        <tr>
          <td>How satisfied are you with the books?</td>
          <td><?php echo $ar_rate[$rate1] ?></td>
        </tr>
        <tr>
          <td>How about the book volume?</td>
          <td><?php echo $ar_rate[$rate2] ?></td>
        </tr>
        <tr>
          <td>Programming languages that you have a experience</td>
          <td><?php echo $tec ?></td>
        </tr>
        <tr>
          <td>New Publication Information</td>
          <td><?php echo $dm ?></td>
        </tr>
        <tr>
          <td>Book Reviews</td>
          <td><?php echo nl2br($message) ?></td>
        </tr>
        <tr>
          <td align="right" colspan="2">
            <input type="submit" value="Submit Answer" name="sub1">
          </td>
        </tr>
      </table>

      <!-- Hidden Field -->
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="email" value="<?php echo $email; ?>">
      <input type="hidden" name="job" value="<?php echo $job; ?>">
      <input type="hidden" name="rate1" value="<?php echo $rate1; ?>">
      <input type="hidden" name="rate2" value="<?php echo $rate2; ?>">
      <input type="hidden" name="tec" value="<?php echo $tec; ?>">
      <input type="hidden" name="dm" value="<?php echo $dm; ?>">
      <input type="hidden" name="message" value="<?php echo $message; ?>">
    </form>

    <?php require("template/footer.php"); ?>

  </body>
</html>