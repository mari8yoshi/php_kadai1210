</html> -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>新規登録</title>
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
      <a class="navbar-brand" href="#">登録</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      </ul>
      </div>
    </nav>
  </header>

  <form method="post" action="login_act.php">
    <div class="form-group">
      <label for="lid">LoginID</label>
      <input type="text" class="form-control" id="lid" name="lid">
    </div>
    <div class="form-group">
      <label for="lpw">PassWord</label>
      <input type="password" class="form-control" id="lpw" name="lpw">
    </div>
  </form>
  
  <form method="post" action="new_act.php">
    <div class="form-group">
      <label for="lid">LoginID</label>
      <input type="text" class="form-control" id="lid" name="lid">
    </div>
    <div class="form-group">
      <label for="lpw">PassWord</label>
      <input type="password" class="form-control" id="lpw" name="lpw">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success" class="nav-link" href="new_act.php">新規登録</button>
    </div>
  </form>



</body>

</html>