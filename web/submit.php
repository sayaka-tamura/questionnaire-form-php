<?php
  // Form データが空の場合は終了
  if(empty($_POST)){
    echo "Ended this process";
    exit;
  }

  // Session Start
  session_start();
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
      $name = $_SESSION["name"];
      $email = $_SESSION["email"];
      $job = $_SESSION["job"];
      $rate1 = $_SESSION["rate1"];
      $rate2 = $_SESSION["rate2"];
      $tec = $_SESSION["tec"];
      $dm = $_SESSION["dm"];
      $message = $_SESSION["message"];

      $name = h($name);
      $email = h($email);
      $job = h($job);
      $rate1 = h($rate1);
      $rate2 = h($rate2);
      $tec = h($tec);
      $dm = h($dm);
      $message = h($message);

      // 回答を書き込む準備
      $line = array($name, $email, $job, $rate1, $rate2, $tec, $dm, $message);

      // ファイルへの書き込み
      
      $file_name = "answer.csv";
      $fp = fopen($file_name, "a");
      $return = fputcsv($fp, $line);
      fclose($fp);
      
      if($return){
        $result_message = "Thank you for your answer!";
      }else{
        $result_message = "Error!!";
      }
    ?>

    <p><?php echo $result_message; ?></p>

    <?php 
      require("template/footer.php");
      
      // Session End
      session_destroy();  
    ?>

  </body>
</html>