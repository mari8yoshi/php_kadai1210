<?php
//共通で使うものを別ファイルにしておきましょう。

//DB接続関数（PDO）
function connectToDb()
{
  $dbn = 'mysql:dbname=gsacfl02_03;charset=utf8;port=3306;host=localhost';
  $user = 'root';
  $pwd = '';
  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('dbError:' . $e->getMessage());
  }
}

// テーブル名
$todo_table = 'User_table';

//SQL処理エラー
function showSqlErrorMsg($stmt)
{
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
}

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function checkSessionId()
{
  if (!isset($_SESSION['session_id']) || $_SESSION['session_id'] != session_id())
    header('Location: login.php');
  else {
    session_regenerate_id(true);
    $_SESSION['session_id'] = session_id();
  }
}

