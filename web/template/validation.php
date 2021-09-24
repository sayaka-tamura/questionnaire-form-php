<?php

  function checkInput($var){ 
    // 配列かどうかのチェック
    if(is_array($var)){
      //$var が配列の場合、checkInput()関数をそれぞれの要素について呼び出す
      return array_map('checkInput', $var);
    } else {
      //NULLバイト攻撃（文字コードの値が0の文字を使いプログラムを誤作動させる攻撃）対策
      if(preg_match('/\0/', $var)){  
        die('不正な入力です。'); // die(): メッセージを出力し、現在のスクリプトを終了する
      }

      //文字エンコードのチェック
      if(!mb_check_encoding($var, 'UTF-8')){ 
        die('不正な入力です。');
      }
      
      //改行以外の制御文字及び最大文字数のチェック
      if(preg_match('/\A[\r\n\t[:^cntrl:]]{0,100}\z/u', $var) === 0){  
        die('不正な入力です。最大文字数は100文字です。また、制御文字は使用できません。');
      }
      return $var;
    } 
  }


  //エスケープ処理の関数
  function h($str){
    if(is_array($str)){
      //$strが配列の場合、h()関数をそれぞれの要素について呼び出す
      return array_map('h', $str);    
    }else{
      return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
  }

  function errorCheck($var){
      //POSTされたデータを変数に格納
      //最初は入力データがないのでこの初期化をしないとエラーとなる
      $name = isset($_POST['name']) ? $_POST['name'] : NULL;
      $email = isset($_POST['email']) ? $_POST['email'] : NULL;
      $job = isset($_POST['job']) ? $_POST['job'] : NULL;
      $rate1 = isset($_POST['rate1']) ? $_POST['rate1'] : NULL;
      $rate2 = isset($_POST['rate2']) ? $_POST['rate2'] : NULL;
      $tec = $_POST['tec'];
      $dm = $_POST["dm"];
      $message = isset($_POST['message']) ? $_POST['message'] : NULL;

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

      //POSTされたデータを整形（前後にあるホワイトスペースを削除）してエスケープ処理
      $name = h(trim($name));
      $email = h(trim($email));
      $job = h(trim($job));
      $rate1 = h(trim($rate1));
      $rate2 = h(trim($rate2));
      $tec = h(trim($tec));
      $message = h(trim($message));

      $temp_array = array("name" => $name, "email" => $email, "job" => $job, "rate1" => $rate1, "rate2" => $rate2, "tec" => $tec, "dm" => $dm, "message" => $message);

      $error = array();

      if($name == '') {
        $error[] = '*お名前は必須です。';
      } elseif (preg_match('/\A[[:^cntrl:]]{1,30}\z/u', $name) == 0) {   //制御文字でないことと文字数をチェック
        $error[] = '*お名前は30文字以内でお願いします。';
      }

      if($message == '') {
        $error[] = '*メッセージは必須です。';
      }elseif(preg_match('/\A[\r\n[:^cntrl:]]{1,500}\z/u', $message) == 0) {   //制御文字（改行を除く）でないことと文字数をチェック
        $error[] = '*メッセージは500文字以内でお願いします。';
      }

      //↑他、個別検証(rate1, rate2, tec 必須にするには)
      if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['job'])
          && isset($_POST['rate1']) && isset($_POST['rate2'])  && isset($_POST['tec']) 
          && isset($_POST['dm']) && isset($_POST['message'])) {
        if(count($error) > 0){ 
          echo '<p style="color:red;">以下のエラーがあります。</p><p style="color:red;">';
          foreach($error as $value) {
            echo $value . "<br>";
          }
          echo '</p>';
        }
      }

      return $temp_array;
  }

?>