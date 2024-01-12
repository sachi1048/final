<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>登録</h1>
    <a href="menu.php">トップに戻る</a>
  <form action ="Regist-output.php" method="post">
    本の名前<input type="text" name="book"><br>
    作者名<input type="text" name="author"><br>
    <button type="submit">登録</button>
</body>
</html>
<?php require 'footer.php';?>