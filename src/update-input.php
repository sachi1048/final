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
      <h1>一覧</h1>
      <a href="menu.php">トップに戻る</a>
      <div class="id">書籍番号</div>
      <div class="book">書名</div>
      <div class="a">作者名</div>
  <?php
  
     $pdo=new PDO($connect,USER,PASS);
          $sql=$pdo->query('select book.book_id, book.book_name, author.author
          from book
          join author on book.author_id = author.author_id');
          $sql->execute();
          $result=$sql->fetchAll();
  
      foreach($result as $row){
        echo '<form action="update-output.php" method="post">';
        echo '<intpu type="hidden" name="book_id" value="',$row['book_id'],'">';
        echo '<div class="id">',$row['book_id'],'</div>';
        echo '<div class="book">';
        echo '<input type="text" name="book_name" value="',$row['book_name'],'">';
        echo '</div>';
        echo '<div class="a">';
        echo '<input type="text" name="author" value="',$row['author'],'">';
        echo '</div>';
        echo '<div class="update"><input type="submit" value="更新"></div>';
        echo '</form>';
        echo "\n";
                 }
  ?>

</body>
</html>
<?php require 'footer.php';?>