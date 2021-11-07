<?php

  // Session Start
  session_start();

  // To avoid Session Hijack
  session_regenerate_id(true);

  // Form データが空の場合は終了
  if(empty($_POST)){
    echo "Ended Process";
    exit;
  }

  // Importing info for "Go Back Button"
  $h = $_SERVER['HTTP_HOST'];
  $r = $_SERVER['HTTP_REFERER'];

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

    echo "$_SESSION'csrf_token': ".$_SESSION["csrf_token"];

    echo "POST Info <br />";
    foreach( $_POST as $key=>$Value){
        echo "$key => $Value<br>";
    }

    echo "Session Info <br />";
    foreach( $_SESSION as $key=>$Value){
        echo "$key => $Value<br>";
    }
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
          <td><?php echo isset($ar_rate[$temp_array['rate1']]) ? $ar_rate[$temp_array['rate1']]: NULL ?></td>
        </tr>
        <tr>
          <td>How about the book volume?</td>
          <td><?php echo isset($ar_rate[$temp_array['rate2']]) ? $ar_rate[$temp_array['rate2']]: NULL ?></td>
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
            <?php
              // 必須項目に記載がなければ submit ボタンを非表示
              $class=""; 
              if ($temp_array['flag']==0) {$class="d-none";}
            ?>
            
            <?php
              echo "$_POST'csrf_token': ".$_POST["csrf_token"];
              echo "<br />";
              echo "$_SESSION'csrf_token': ".$_SESSION["csrf_token"];
              /**
              // CSRF 対策
              if (isset($_POST["csrf_token"])&& $_POST["csrf_token"] === $_SESSION['csrf_token']) {
              **/
            ?>

              <input type="submit" value="Submit Answer" name="sub1" class="<?php echo $class; ?>" />
            <?php // } ?>
            
            <?php
              if (!empty($r) && (strpos($r, $h) !== false)) : // strpos()-> 特定の文字列を含むかをチェック方法
            ?>
              <input type="button" class="form-control mt-3 btn btn-info" value="Go Back" onclick="location.href='<?= $r ?>'">
            <?php endif ?>
          </td>
        </tr>
      </table>
    </form>
    <?php require("template/footer.php"); ?>
    
  </body>
</html>