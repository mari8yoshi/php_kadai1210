<?php
session_start();

include("functions.php");
checkSessionId();

$pdo = connectToDb();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
//var_dump($_POST);

//データ登録SQL作成
$sql = 'SELECT*FROM user_table WHERE lid=:lid AND lpw=:lpw';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$res = $stmt->execute();
//SQL実行時にエラーがある場合
if ($res == false) {
  showSqlErrorMsg($stmt);
}

$val = $stmt->fetch();

if ($val['id'] != "") {
  $_SESSION = array();
  $_SESSION['id'] = $val['id'];
  $_SESSION['session_id'] = session_id();
  $_SESSION['kanri_flg'] = $val['kanri_flg'];
  $_SESSION['name'] = $val['name'];
  if ($_SESSION['kanri_flg'] == 1) {
    header('Location:index_kanri.php');
  } else {
    header('Location:index.php');
  }
} else {
  header('Location:login.php');
}
exit();
