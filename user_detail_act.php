<?php
session_start();
include('functions.php');
checkSessionId();
//入力チェック(受信確認処理追加)
if (
  !isset($_POST['lid']) || $_POST['lid'] == '' ||
  !isset($_POST['lpw']) || $_POST['lpw'] == ''||
!isset($_POST['kanri_flg']) || $_POST['kanri_flg'] == ''
) {
  exit('ParamError');
}

//POSTデータ取得
$id=$_POST['id'];
$lid     = $_POST['lid'];
$lpw   = $_POST['lpw'];
$kanri_flg=$_POST['kanri_flg'];
// $deadline  = $_POST['deadline'];
// $comment = $_POST['comment'];

//DB接続します(エラー処理追加)
$pdo = connectToDb();

//データ登録SQL作成
$sql = 'UPDATE user_table SET  lid=:a1, lpw=:a2 ,kanri_flg=:a3 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $lid, PDO::PARAM_STR);
$stmt->bindValue(':a2', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':a3', $kanri_flg, PDO::PARAM_STR);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  header('Location: user_select.php');
  exit;
}
