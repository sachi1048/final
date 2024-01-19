<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/regist.css">
    <title>Document</title>
</head>
<body>
    <h1>登録</h1>
    
  <form action ="Regist-output.php" method="post">
    <div class="box">
    <input type="text" name="book" placeholder="書名"><br>

    <input type="text" name="author" placeholder="作者名"><br>
</div>
<!-- <button type="submit" class="button">登録</button> -->
   <div class="touroku"><input type="submit" value="登録" class="button"></div>
   <div class="back"><a href="menu.php">トップに戻る</a></div>
</body>
</html>
<?php require 'footer.php';?>