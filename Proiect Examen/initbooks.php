<?php

      require 'db_connect.php';
      // DROPDOWN optiuni filter
      // https://www.w3schools.com/html/html_form_elements.asp
      echo "
      <div class='drop-option'>
      Sort by genre:
      <form>
        <select class='dropper' id='genre' name='genre' onchange='ajaxFilter(this)'>";
          echo "<option value='None'>None</option>";

      // valori pt dropdown
      $query2 = "SELECT DISTINCT genre FROM books";
      $result2 = mysqli_query($conn, $query2);
      if($result2){
        if(mysqli_num_rows($result2) > 0){
          while($row2 = mysqli_fetch_array($result2)){
            echo "<option value='".$row2['genre']."'>".$row2['genre']."</option>";
          }
        }
      }

      echo "</select>";
      echo "</form></div>";


      $query = "SELECT * FROM books";
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
                  <button class="add-btn" onclick="add_book_user(this)" value="'.$row['ID'].'">
                    <img src="add-ico.png" class="add-icon"></button>
                  </div>
                </div>
              </div>
            ';
          }
          // inchidem si tabelul nu?
          echo "</div>";
        }
        else {
          // nu o gasit niciun resultat lol
          echo "No records found";
        }
      }


?>
