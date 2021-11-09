<?php

// Session Start
session_start();

if (empty($_SESSION)) {
  echo "Ended this process";
  exit;
}

//DB接続関数を dbconnet.php から呼び出して接続
$db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
$db['dbname'] = ltrim($db['path'], '/');
$dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
$options = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
);

try {
  $db = new PDO($dsn, $db['user'], $db['pass'], $options);
} catch (PDOException $e) {
  echo 'Error: ' . h($e->getMessage());
}

?>

<html>

<?php require("template/head.php"); ?>

<body>
  <div class="bg-contact3" style="background-image: url('images/bg-01.jpg');">
    <div class="container-contact3">
      <div class="wrap-contact3">
        <span class="contact3-form-title">
          Questionary
        </span>

        <!-- 処理結果を表示 -->

        <?php

        // Sanitize
        function h($str)
        {
          return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
        }

        // 必須入力値の取得、その後
        //SESSSION データを整形（前後にあるホワイトスペースを削除）してエスケープ処理      
        $name = h($_SESSION["name"]);
        $email = h($_SESSION["email"]);
        $dm = h($_SESSION["dm"]);
        $message = h($_SESSION["message"]);

        // データの追加
        if ($_SESSION['choice'] == "say-hi") {

          $sql = "INSERT INTO answers (name, email, dm, message) VALUES (:name, :email, :dm, :message)";

          $stmt = $db->prepare($sql);

          // 必須項目のセット
          $stmt->bindParam(":name", $name);
          $stmt->bindParam(":email", $email);
          $stmt->bindParam(":dm", $dm);
          $stmt->bindParam(":message", $message);

          // SQL の実行
          $stmt->execute();
        } else if ($_SESSION['choice'] == "respond-to-a-survey") {

          $sql = "INSERT INTO answers (name, email, job, satisfaction, volume, exp_language, dm, message) VALUES (:name, :email, :job, :rate1, :rate2, :tec, :dm, :message)";

          $stmt = $db->prepare($sql);

          // 必須項目のセット
          $stmt->bindParam(":name", $name);
          $stmt->bindParam(":email", $email);
          $stmt->bindParam(":dm", $dm);
          $stmt->bindParam(":message", $message);

          // 任意入力項目の取得
          $job = h($_SESSION["job"]);
          $rate1 = h($_SESSION["rate1"]);
          $rate2 = h($_SESSION["rate2"]);
          $tec = h($_SESSION["tec"]);

          // 任意項目のセット
          $stmt->bindParam(":job", $job);
          $stmt->bindParam(":rate1", $rate1);
          $stmt->bindParam(":rate2", $rate2);
          $stmt->bindParam(":tec", $tec);

          // SQL の実行
          $stmt->execute();
        }

        // SQL 実行判定
        $error = $stmt->errorInfo();
        if ($error[0] != "00000") {
          $result_message = "データの追加に失敗しました。{$error[2]}";
        } else {
          $result_message = "データを追加しました。データ番号：" . $db->lastInsertId() . "<br/>";
          $result_message += "Thank you for your cooperation!";
        }

        ?>

        <p><?php echo $result_message; ?></p>

        <?php
        require("template/footer.php");

        // Session End
        session_destroy();
        ?>
      </div>
    </div>
  </div>
</body>

</html>