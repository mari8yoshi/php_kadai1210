<?php
//1. GETデータ取得
session_start();
include('functions.php');
checkSessionId();
//$user_id = $_GET['user_id'];
$lid = $_GET['lid'];
$lpw = $_GET['lpw'];
$user_id = $_SESSION['id'];
//2. DB接続します(エラー処理追加)
// session_start();
// include('functions.php');
// checkSessionId();

$pdo = connectToDb();

//3．データ登録SQL作成
$sql = 'DELETE FROM user_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  //select.phpへリダイレクト
  header('Location: user_select.php');
  exit;
}
