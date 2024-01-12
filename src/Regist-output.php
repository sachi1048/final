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
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sqlbook=$pdo->prepare('insert into book(book_name) values (?)');

        $sqlauthor=$pdo->prepare('insert into author(author) values (?)');

        if(empty($_POST['book'])){
            echo '本の名前を入力してください';
        }else if(empty($_POST['author'])){
            echo '作者名を入力してください';
        }else if($sqlbook->execute([$_POST['book']]) && $sqlauthor->execute([$_POST['author']])){
            echo '追加しました';
        }else{
            echo '追加できませんでした';
        }
        ?>
</body>
</html>
<?php require 'footer.php';?>