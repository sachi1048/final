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
        $sql=$pdo->query('select book_name from book');
        $sql->execute();
        $result=$sql->fetchAll();
    foreach($result as $row){
        echo '<li>',$row['book_name'],'<li>';
               }
?>
</body>
</html>
<?php require 'footer.php';?>