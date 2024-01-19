<?php require 'db-connect.php';?>
<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/update.css">
    <title>Document</title>
</head>
<body>
      <h1>更新</h1>
      <h4 class="mi"><span>テキストボックスから書名を、セレクトボックスから作者名を変更できます</span></h4>
     <div class="all">
  
  <?php
  
  try {
      $pdo = new PDO($connect, USER, PASS);

      $sqlBooks = 'SELECT book.book_id, book.book_name, author.author_id, author.author
                   FROM book
                   JOIN author ON book.author_id = author.author_id';
      $stmtBooks = $pdo->prepare($sqlBooks);
      $stmtBooks->execute();
      $resultBooks = $stmtBooks->fetchAll();

      foreach ($resultBooks as $row) {
          echo '<form action="update-output.php" method="post">';
          echo '<p>';
          echo '<input type="hidden" name="book_id" value="', $row['book_id'], '">';
          echo '<div class="id">', $row['book_id'], '</div>';
          echo '<div class="book">';
          echo '<input type="text" name="book_name" value="', $row['book_name'], '">';
          echo '</div>';
          echo '<div class="a">';
          echo '<label class="select">';
          echo '<select name="author">';

          $sqlAuthors = 'SELECT author_id, author FROM author';
          $stmtAuthors = $pdo->prepare($sqlAuthors);
          $stmtAuthors->execute();
          $resultAuthors = $stmtAuthors->fetchAll();

          foreach ($resultAuthors as $author) {
              $authorId = $author['author_id'];
              $authorName = $author['author'];

              $selected = ($authorId == $row['author_id']) ? 'selected' : '';
              echo "<option value='$authorId' $selected>$authorName</option>";
          }

          echo '</select>';
          echo '</label>';
          echo '</div>';
          echo '<div class=koushin><input type="submit" value="更新" class="update"></div>';
          echo '------------------------------------';
          echo '</form>';
          echo '</p>';
          echo "\n";
      }
  } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
  }
  ?>
  </div>
  <div class="button"><a href="menu.php">トップに戻る</a></button>

</body>
</html>

<?php require 'footer.php'; ?>