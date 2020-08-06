<?php
      // q aici e username-ul
      $q = $_GET['q'];
      require 'db_connect.php';
      $query = '
      SELECT * FROM books b
      INNER JOIN book_list bl ON b.ID = bl.ID_book
      INNER JOIN users u ON bl.ID_user = u.ID
      WHERE u.username = "'.$q.'"
      ';
      $result = mysqli_query($conn, $query);
      if($result){
        if(mysqli_num_rows($result) > 0){
          echo "<div id='carti' class='cards'>";

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
                  <button class="add-btn" onclick="remove_book_user(this)" value="'.$row['ID_book'].'">
                    <img src="remove-ico.png" class="add-icon"></button>
                  </div>
                </div>
              </div>
            ';
          }
          echo "</div>";
        }
        else {
          // nu o gasit niciun resultat lol
          echo "No records found";
        }
      }


?>
