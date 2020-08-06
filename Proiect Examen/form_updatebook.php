<?php
      $id_book = $_GET['idd'];
      require 'db_connect.php';

      $query = 'SELECT * FROM books WHERE ID = '.$id_book;
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      echo '
      <div class="centered-container bookform">
        <form method="post" action="updatebookdb.php?idd='.$id_book.'" target="dummyframe">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title-in" name="title-input" class="form-control" value="'.$row['title'].'"/>
          </div><br>
          <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" id="autor-in" name="autor-input" class="form-control" value="'.$row['autor'].'"/>
          </div><br>
          <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" id="genre-in" name="genre-input" class="form-control" value="'.$row['genre'].'"/>
          </div><br>
          <div class="form-group">
            <label for="pages">Pages:</label>
            <input type="text" id="pages-in" name="pages-input" class="form-control" value="'.$row['pages'].'"/>
          </div><br>
          <div class="form-group">
            <label for="publishing">Publishing:</label>
            <input type="text" id="pub-in" name="pub-input" class="form-control" value="'.$row['publishing'].'"/>
          </div><br>
          <div class="form-group">
            <label for="imgsrc">Img URI:</label>
            <input type="text" id="imgsrc-in" name="imgsrc-input" class="form-control" value="'.$row['img_URL'].'"/>
          </div><br>
          <div class="form-group">
            <input type="submit" name="add_book" value="UPDATE" class="login-pg-btn" onclick="form_updatebook.php?idd='.$id_book.'">
          </div>
        </form>
      </div>
      <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
      ';

?>
