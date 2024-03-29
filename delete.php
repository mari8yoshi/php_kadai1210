<?php
//1. GETデータ取得
session_start();
include('functions.php');
checkSessionId();
$id   = $_GET['id'];
//$user_id = $_GET['user_id'];
// $task_id = $_GET['task_id'];
$user_id = $_SESSION['id'];

//2. DB接続します(エラー処理追加)
// session_start();
// include('functions.php');
// checkSessionId();

$pdo = connectToDb();

//3．データ登録SQL作成
$sql = 'DELETE FROM php02_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  //select.phpへリダイレクト
  header('Location: select.php');
  exit;
}
