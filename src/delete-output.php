<?php require 'db-connect.php';?>
<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/delete-output.css">
    <title>Document</title>
</head>
<body>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        
        $sql=$pdo->prepare('delete from book where book_id=?');
        if($sql->execute([$_GET['book_id']])){
            echo '<h1>削除しました</h1><br>';
            echo '<div class="button"><a href="delete-input.php">削除画面に戻る</a></button>';
        }else {
            echo '削除できませんでした';
        }
        
        ?>
</body>
</html>
<?php require 'footer.php';?>