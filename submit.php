<?php
  // Form データが空の場合は終了
  if(empty($_POST)){
    echo "Ended this process";
    exit;
  }
?>

<html>

  <?php require("template/head.php"); ?>

  <body>
    <h1>Questionary</h1>
        <!-- 処理結果を表示 -->

    <?php
      // Sanitize
      function h($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
      }

      // 入力値の取得
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
      $tec = h($tec);
      $dm = h($dm);
      $message = h($message);

      // 回答を書き込む準備
      $line = array($uname, $email, $gender, $job, $rate1, $rate2, $tec, $dm, $message);

      // ファイルへの書き込み
      $file_name = "answer.csv";
      $fp = fopen($file_name, "a");
      $return = $fputcsv($fp, $line);
      $fclose($fp);

      if($return){
        $result_message = "Thank you for your answer!";
      }else{
        $result_message = "Error!!";
      }
    ?>

    <p><?php echo $result_message; ?></p>

    <?php require("template/footer.php"); ?>
    
  </body>
</html>