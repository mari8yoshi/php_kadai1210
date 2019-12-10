<!-- <?php
// session_start();
// include("functions.php");

// function h($s)
// {
//   return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
// }


//ログイン済みの場合
// if (isset($_SESSION['EMAIL'])) {
//   echo 'ようこそ' .  h($_SESSION['EMAIL']) . "さん<br>";
//   echo "<a href='/logout.php'>ログアウトはこちら。</a>";
//   exit;
// }

// ?>

<!DOCTYPE html>
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