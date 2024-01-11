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
        $sql=$pdo->prepare('select book_name FROM book');
        
    foreach($sql as $row){
       /* echo '<form action ="cart-insert.php" method="post">';*/
        echo '<ul><li>',$row['book_name'],'<li>';
        
            }
?>
</body>
</html>
<?php require 'footer.php';?>