<?php

// Session Start
session_start();

require("template/validation.php");
my_csrf_token_check();

// Form データが空の場合は終了
if (empty($_POST)) {
  echo "Ended Process";
  exit;
}

// Importing info for "Go Back Button"
$h = $_SERVER['HTTP_HOST'];
$r = $_SERVER['HTTP_REFERER'];

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

<!DOCTYPE html>
<html lang="en">

<?php require("template/head.php"); ?>

<body>
  <div class="bg-contact3" style="background-image: url('images/bg-01.jpg');">
    <div class="container-contact3">
      <div class="wrap-contact3">

        <span class="contact3-form-title">
          Questionary
        </span>

        <?php
        // 入力エラーチェック
        $temp_array = errorCheck($_POST);
        ?>

        <p class="mt-2">Please Confirm Your Answer</p>

        <!-- アンケート回答の確認表示 -->
        <form method="POST" action="submit.php">
          <table class="table table-bordered table_border_radius text-white">
            <tbody>
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
                <td><?php echo isset($ar_rate[$temp_array['rate1']]) ? $ar_rate[$temp_array['rate1']] : NULL ?></td>
              </tr>
              <tr>
                <td>How about the book volume?</td>
                <td><?php echo isset($ar_rate[$temp_array['rate2']]) ? $ar_rate[$temp_array['rate2']] : NULL ?></td>
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
            </tbody>
          </table>
          <div>
            <?php
            // 必須項目に記載がなければ submit ボタンを非表示
            $class = "";
            if ($temp_array['flag'] == 0) {
              $class = "d-none";
            }
            ?>
            <input type="hidden" name="csrf-token" value="<?php echo $_SESSION['csrf-token']; ?>">
            <input type="submit" value="Submit Answer" name="sub1" class="<?php echo $class; ?> contact3-form-btn float-left mr-3" />

            <?php
            // Check HTTP_REFERER
            if (!empty($r) && (strpos($r, $h) !== false)) : // strpos()-> 特定の文字列を含むかをチェック方法
            ?>

            <input type="hidden" name="csrf-token" value="<?php echo $_SESSION['csrf-token']; ?>">
            <input type="button" class="mt-3 contact3-form-btn" value="Go Back" onclick="location.href='<?= $r ?>'">
            
            <?php endif ?>
          </div>
        </form>
        <?php require("template/footer.php"); ?>

      </div>
    </div>
  </div>
  <?php
  require("template/footer.php");

  // Session End
  // session_destroy();
  ?>
</body>

</html>