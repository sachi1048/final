<?php require 'db-connect.php';?>
<?php require 'header.php';?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/author.css">
    <title>Document</title>
</head>
<body>
<h1>作者別</h1>
     <h4 class="mi"><span>作者名を選択すると、作者ごとの書籍一覧を表示できます</span></h4>
<?php
  $pdo=new PDO($connect,USER,PASS);
  $sql=$pdo->query('select distinct book.author_id,author.author
  from book
  join author on book.author_id = author.author_id');
  $sql->execute();
  $result=$sql->fetchAll();

foreach($result as $row){
  echo '<ul class="list">';
  echo '<li><a href="author-output.php?author_id='. $row['author_id'].'">'.$row['author'],'</a></li>';
  echo '</ul>';
         }

?>
         <div class=button><a href="menu.php">トップに戻る</a></div>



</body>
</html>
<?php require 'footer.php';?>


