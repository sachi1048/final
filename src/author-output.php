<?php require 'db-connect.php';?>
<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/author-output.css">
    <title>Document</title>
</head>
<body>
<h1>書名</h1>
      
<?php

if(isset($_GET['author_id'])){
    $author_id=$_GET['author_id'];
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('select book_id,book_name from book where author_id= :author_id');
    $sql->bindParam(':author_id',$author_id,PDO::PARAM_INT);
  $sql->execute();
  $result=$sql->fetchAll();
 if($result){
    echo '<ul class="list">';
    foreach($result as $row){
        echo '<li>'.$row['book_name'].'</li>';
    }
        echo '</ul>';
      
               }else{
                echo '選択された作者の本は登録されていません';
               }
               
      
      }
    
 

  
?>
<div class="button"><a href="author.php" >作者画面に戻る</a></div>
</body>
</html>
<?php require 'footer.php';?>


