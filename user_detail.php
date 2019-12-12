<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
checkSessionId();



// getで送信されたidを取得
if (!isset($_GET['id'])) {
  exit("Error");
}
$id = $_GET['id'];

//DB接続します
$pdo = connectToDb();

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM user_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  $rs = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>USER更新ページ</title>
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
      <a class="navbar-brand" href="#">USER更新</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">todo登録</a>
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

  <form method="post" action="user_detail_act.php">
    <div class="form-group">
      <label for="lid">ID</label>
      <input type="text" class="form-control" id="lid" name="lid" placeholder="Enter task" value="<?= $rs['lid'] ?>">
    </div>
    <div class="form-group">
      <label for="lpw">PW</label>
      <input type="text" class="form-control" id="lpw" name="lpw" value="<?= $rs['lpw'] ?>">
    </div>
    <div class="form-group">
      <label for="kanri_flg">管理者1・通常0</label>
      <input type="text" class="form-control" id="kanri_flg" name="kanri_flg" value="<?= $rs['kanri_flg'] ?>">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <input type="hidden" name="id" value="<?= $rs['id'] ?>">
  </form>

</body>

</html>