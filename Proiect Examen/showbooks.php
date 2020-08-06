<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $q = $_GET['q'];
      require 'db_connect.php';

      $query = "SELECT * FROM books WHERE genre='".$q."'";
      if($q == "None"){
        $query = "SELECT * FROM books";
      }
      $result = mysqli_query($conn, $query);
      // luam datele din tabel si le punem in tabelul ala jmeker rand cu rand
      while($row = mysqli_fetch_array($result)){
        echo '
          <div class="card">
            <div class="horizontal-div">
              <img src="'.$row['img_URL'].'" class="card-image">
              <div class="card-content">
                <div class="infodiv book-title">'.$row['title'].'</div>
                <div class="infodiv book-autor">'.$row['autor'].'</div>
                <div class="infodiv book-genre">'.$row['genre'].'</div>
                <div class="infodiv book-pages">'.$row['pages'].' pages </div>
                <div class="infodiv book-publ">'.$row['publishing'].'</div>
              </div>
            </div>
            <div class="card-controls">
              <div class="add-book">
              <button class="add-btn" onclick="add_book_user(this)" value="'.$row['ID'].'">
                <img src="add-ico.png" class="add-icon"></button>
              </div>
            </div>
          </div>
        ';
      }
      // inchidem si tabelul nu?

     ?>
  </body>
</html>
