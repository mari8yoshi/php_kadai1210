<?php
session_start();
include('functions.php');
checkSessionId();
// if ($_SESSION['kanri_flg'] == 1) {
//     header('Location:user_select.php');
//   } else {
//     header('Location:index.php');
//   }
// exit();

// ユーザーidの指定
//$user_id=1;
$user_id = $_SESSION['id'];
//var_dump($user_id);

//DB接続
$pdo = connectToDb();

//データ表示SQL作成
$sql = 'SELECT * FROM user_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
$view = '';

if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<li class="list-group-item">';
    $view .= '<p>' . $result['lid'] . '</p>';
    $view .= '<p>' . $result['lpw'] . '</p>';

    // 削除変更ボタン
    $view .= '<a href="user_detail.php?id=' . $result['id'] . '" class="badge badge-primary">Edit</a>';
    $view .= '<a href="user_delete.php?id=' . $result['id'] . '" class="badge badge-danger">Delete</a>';
    $view .= '</li>';
  }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>user管理</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <style>
    div {
      padding: 10px;
      font-size: 16px;
    }
  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">user一覧</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index_kanri.php">todo登録</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="select.php">todo一覧</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_update.php">user登録</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_select.php">user管理</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">ログアウト</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div>
    <ul class="list-group">
      <?= $view ?>
    </ul>
  </div>

</body>

</html>