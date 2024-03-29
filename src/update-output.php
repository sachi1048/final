<?php require 'db-connect.php';?>
<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/update-output.css">
    <title>Document</title>
</head>
<body>
<?php
 $pdo=new PDO($connect,USER,PASS);
  
  
   $sql=$pdo->prepare('update book
   join author on book.author_id = author.author_id
   set book.book_name = ?, book.author_id = ?
   WHERE book.book_id = ?;');

   if(empty($_POST['book_name'])){
    echo '書名を入力してください';
   }else if(empty($_POST['author'])){
    echo '作者を入力してください';
   }else if($sql->execute([htmlspecialchars($_POST['book_name']),$_POST['author'],$_POST['book_id']])) {
    
        echo '<h1>更新しました</h1>';
        echo '<div class="button"><a href="update-input.php">更新画面に戻る</a></div>';
    
   }else{
    echo '更新できませんでした';
   }


?>
</body>
</html>
<?php require 'footer.php';?>


