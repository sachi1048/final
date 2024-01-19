<?php require 'db-connect.php';?>
<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/regist-output.css">
    <title>Document</title>
</head>
<body>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sqlCheckAuthor = $pdo->prepare('select author_id from author where author = ?');
        $sqlCheckAuthor->execute([$_POST['author']]);
        $existingAuthor = $sqlCheckAuthor->fetch(PDO::FETCH_ASSOC);

        if ($existingAuthor) {
            $authorId = $existingAuthor['author_id'];
        } else {
            $sqlInsertAuthor = $pdo->prepare('insert into author (author) values (?)');
            if ($sqlInsertAuthor->execute([$_POST['author']])) {
                $authorId = $pdo->lastInsertId();
            } else {
                echo '作者の追加ができませんでした';
                exit; 
            }
        }
        
    
        $sqlInsertBook = $pdo->prepare('insert into book (book_name, author_id) values (?, ?)');
        if ($sqlInsertBook->execute([$_POST['book'], $authorId])) {
            echo '<h1>登録しました</h1><br>';
            echo '<div class="button"><a href="Regist-input.php">登録画面に戻る</a></div>';
        } else {
            echo '登録できませんでした';
        }
        
        
        ?>
</body>
</html>
<?php require 'footer.php';?>