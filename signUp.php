<?php
session_start();
include("functions.php");
checkSessionId();
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
$sql = 'INSERT INTO user_table(id, lid, lpw,kanri)VALUES(NULL, :a1, :a2,0 )';
var_dump($sql);
// $sql = 'INSERT INTO user_table WHERE lid=:lid AND lpw=:lpw AND Life_flg=0';
//  $sql = 'SELECT*FROM user_table WHERE lid=:lid AND lpw=:lpw AND Life_flg=0';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
//SQL実行時にエラーがある場合
if ($status == false) {
  showSqlErrorMsg($stmt);
} else { }

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

if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  //index.phpへリダイレクト
  header('Location: index.php');
}


//ログイン済みの場合
// if (isset($_SESSION['EMAIL'])) {
//   echo 'ようこそ' .  h($_SESSION['EMAIL']) . "さん<br>";
//   echo "<a href='/logout.php'>ログアウトはこちら。</a>";
//   exit;
// }

?>

<!-- <!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>

<body>

  <h1>ようこそ、ログインしてください。</h1>
  <form action="login.php" method="post">
    <label for="email">email</label>
    <input type="email" name="email">
    <label for="pw">password</label>
    <input type="pw" name="pw">
    <button type="submit">Sign In!</button>
  </form>
  <h1>初めての方はこちら</h1>
  <form action="login.php" method="post">
    <label for="email">email</label>
    <input type="email" name="email">email
    <label for="pw">password</label>
    <input type="pw" name="pw">
    <button type="submit">Sign Up!</button>
    <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
  </form>
</body>


</html> -->