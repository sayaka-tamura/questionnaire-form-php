<?php
  // Form データが空の場合は終了
  if(empty($_POST)){
    echo "Ended Process";
    exit;
  }

  require("template/validation.php");
  //POSTされたデータをチェック
  $_POST = checkInput($_POST);

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
  <?php
    // 入力エラーチェック
    $temp_array = errorCheck($_POST); 
  ?>

  <body>
    <h1>Questionary</h1>
    <p>Please Confirm Your Answer</p>

    <!-- アンケート回答の確認表示 -->
    <form method="POST" action="submit.php">
      <table border="1">
        <tr>
          <td>Name</td>
          <td><?php echo $temp_array['name'] ?></td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td><?php echo $temp_array['email'] ?></td>
        </tr>
        <tr>
          <td>Occupation</td>
          <td><?php echo $temp_array['job'] ?></td>
        </tr>
        <tr>
          <td>How satisfied are you with the books?</td>
          <td><?php echo $ar_rate[$temp_array['rate1']] ?></td>
        </tr>
        <tr>
          <td>How about the book volume?</td>
          <td><?php echo $ar_rate[$temp_array['rate2']] ?></td>
        </tr>
        <tr>
          <td>Programming languages that you have a experience</td>
          <td><?php echo $temp_array['tec'] ?></td>
        </tr>
        <tr>
          <td>New Publication Information</td>
          <td><?php echo $temp_array['dm'] ?></td>
        </tr>
        <tr>
          <td>Your Message</td>
          <td><?php echo nl2br($temp_array['message']) ?></td>
        </tr>
        <tr>
          <td align="right" colspan="2">
            <input type="submit" value="Submit Answer" name="sub1">
          </td>
        </tr>
      </table>
    </form>

    <?php require("template/footer.php"); ?>

  </body>
</html>