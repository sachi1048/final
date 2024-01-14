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
            echo '追加しました';
        } else {
            echo '追加できませんでした';
        }
        
        
        ?>
</body>
</html>
<?php require 'footer.php';?>