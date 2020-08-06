<?php
  $q = $_GET['q'];
  require 'db_connect.php';
  $error= "";

/*
  $sql = "
  SELECT * FROM books
  WHERE title LIKE ? OR autor LIKE ? OR publishing LIKE ?
  ";

  $stmt = mysqli_stmt_init($conn);

  if(!empty(trim($q))){
      $thing = '"%'.$q.'%"';

      if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, 'sss', $thing, $thing, $thing);
        mysqli_stmt_execute($stmt);
        if(mysqli_stmt_num_rows($stmt) < 1){
          $error = "Nu exista";
        }
      }else{
        $error = "prepare ereror";
      }

      if(empty($error)){
        // luam datele din tabel si le punem in tabelul ala jmeker rand cu rand
        $result = mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $result);
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
        mysqli_stmt_close($stmt);
      }
      else{
        echo '<div class="centered-container">
          <div class="statusmsg">
            Error: '.$error.'
          </div>
        </div>';
      }

  }
*/

  /*************   FARA STMT MERGE LMAO   *************/
  $sql2 = '
  SELECT * FROM books
  WHERE title LIKE "%'.$q.'%" OR autor LIKE "%'.$q.'%" OR publishing LIKE "%'.$q.'%"
  ';
  if(!empty(trim($q))){
      $thing = '"%'.$q.'%"';
      $result = mysqli_query($conn, $sql2);

      if(mysqli_num_rows($result) < 1){
        $error = "nu exista";
      }

      if(empty($error)){
        echo "<div id='carti' class='cards'>";
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
        echo '</div>';
      }
      else{
        echo '<div class="centered-content-container">
          <div class="statusmsg">
            No results found.
          </div>
        </div>';
      }

  }


 ?>
