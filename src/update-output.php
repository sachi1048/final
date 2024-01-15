<?php require 'db-connect.php';?>
<?php require 'header.php';?>
<?php require 'menu.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
   $pdo=new PDO($connect,USER,PASS);

   if(isset($_POST['author_id'], $_POST['book_name'], $_POST['book_id'])) {
   $authorId = $_POST['author_id'];
   $sqlGetAuthor=$pdo->prepare('select * from author where author_id = ?');
   $sqlGetAuthor->execute([$authorId]);
   $existingAuthor=$sqlGetAuthor->fetch(PDO::FETCH_ASSOC);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sqlUpdateBook = $pdo->prepare('update book set book_name = ?, author_id = ? where book_id = ?');
   $pdo->beginTransaction();
        if ($sqlUpdateBook->execute([$_POST['book_name'], $authorId, $_POST['book_id']])) {
            echo '更新しました';
            $pdo->commit();
        } else {
            echo '更新できませんでした';
            $pdo->rollBack();
        }
   }
?>
</body>
</html>
<?php require 'footer.php';?>