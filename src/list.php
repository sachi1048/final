<?php require 'db-connect.php';?>
<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>一覧</h1>
    <a href="menu.php">トップに戻る</a>
<?php

   $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->query('select * from book');
        $sql->execute();
        $result=$sql->fetchAll();
    foreach($result as $row){
        echo '<ul>';
        echo '<li>',$row['book_id'];
        echo ':',$row['book_name'];
        echo ':',$row['author_id'],'</li>';
        echo '</ul>';
               }
?>
</body>
</html>
<?php require 'footer.php';?>