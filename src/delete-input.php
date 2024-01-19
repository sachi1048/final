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
      <h1>削除</h1>
      <a href="menu.php">トップに戻る</a>
      
      <table>
        <tr><th>書籍番号</th><th>書名</th><th>作者名</th></tr>
  <?php
  
     $pdo=new PDO($connect,USER,PASS);
          $sql=$pdo->query('select book.book_id, book.book_name, author.author
          from book
          join author on book.author_id = author.author_id');
          $sql->execute();
          $result=$sql->fetchAll();
  
      foreach($result as $row){
        echo '<tr>';
        echo '<td>',$row['book_id'],'</td>';
        echo '<td>',$row['book_name'],'</td>';
        echo '<td>',$row['author'],'</td>';
        echo '<td>';
        echo '<a href="delete-output.php?book_id=',$row['book_id'],'">削除</a>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
                 }
  ?>
  </table>

</body>
</html>
<?php require 'footer.php';?>