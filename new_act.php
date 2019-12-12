<?php
//session_start();
include("functions.php");

if (
  //!isset($_POST['id']) || $_POST['id'] == '' ||
  !isset($_POST['lid']) || $_POST['lid'] == '' ||
  !isset($_POST['lpw']) || $_POST['lpw'] == ''
) {
  //var_dump($_POST);
  exit('ParamError');
}

//POSTデータ取得
//$id=$_POST['id'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//DB接続
$pdo = connectToDb();
$sql = 'INSERT INTO user_table(id,name,lid, lpw,kanri_flg,life_flg)VALUES(NULL,:lid, :lid, :lpw,0 ,0)';
var_dump($sql);
// $sql = 'INSERT INTO user_table WHERE lid=:lid AND lpw=:lpw AND Life_flg=0';
//  $sql = 'SELECT*FROM user_table WHERE lid=:lid AND lpw=:lpw AND Life_flg=0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
//SQL実行時にエラーがある場合
if ($status == false) {
  //showSqlErrorMsg($stmt);
  $error=$stmt->errorInfo();
  exit('sqlError:'.$error[2]);
} else { }
header('Location: login.php');
$val = $stmt->fetch();


// $sql = 'INSERT INTO userDeta(id, email,pw)VALUES(NULL, :a1, :a2,)';

// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':a1', $email, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':a2', $pw, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
// $status = $stmt->execute();

// function h($e)
// {
//   return htmlspecialchars($e, ENT_QUOTES, 'utf-8');
// }
// //5. 該当レコードがあればSESSIONに値を代入
if ($val['id'] != '') {
  //   // ログイン成功の場合はセッション変数に値を代入
  $_SESSION = array(); // session変数を空にする 
  $_SESSION['session_id'] = session_id(); // idを格納 
  $_SESSION['kanri_flg'] = $val['kanri_flg']; // 管理者かどうかの判定 
  $_SESSION['name'] = $val['name'];
  header('Location: select.php');
} else {
  //   //ログイン失敗の場合はログイン画面へ戻る
  header('Location: login.php');
}

//exit();


if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  //index.phpへリダイレクト
  header('Location: index.php');
}


//ログイン済みの場合
if (isset($_SESSION['id'])) {
  echo 'ようこそ' .  h($_SESSION['id']) . "さん<br>";
  echo "<a href='/logout.php'>ログアウトはこちら。</a>";
  exit;
}
