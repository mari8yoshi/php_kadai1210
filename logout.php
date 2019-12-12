<?php
session_start();

if (isset($_SESSION["id"])) {
  echo 'Logoutしました。';
} else {
  echo 'SessionがTimeoutしました。';
}
//セッション変数のクリア
$_SESSION = array();
//セッションクッキーも削除
if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(),'',time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"]
  );
}
//セッションクリア
session_destroy();

//Cookie情報の削除
setcookie('lid','',time()-42000);
setcookie('lpw','',time()-42000);

header('Location: login.php');
exit();
?>
