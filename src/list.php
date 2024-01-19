<?php require 'db-connect.php';?>
<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <title>Document</title>
</head>
<body>
    <h1>一覧</h1>
    
<?php

   $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select book.book_id, book.book_name, author.author
        from book
        join author on book.author_id = author.author_id');
        $sql->execute();
        $result=$sql->fetchAll();

    foreach($result as $row){
        echo '<ul class="list">';
        echo '<li>',$row['book_name'];
        echo ':',$row['author'],'</li>';
        echo '</ul>';
               }

               
?>

<div class="button"><a href="menu.php">トップに戻る</a></div>
</body>
</html>
<?php require 'footer.php';?>