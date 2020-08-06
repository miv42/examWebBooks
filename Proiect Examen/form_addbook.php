<?php

      require 'db_connect.php';

      echo '
      <div class="centered-container bookform">
        <form method="post" action="addbookdb.php" target="dummyframe">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title-in" name="title-input" class="form-control"/>
          </div><br>
          <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" id="autor-in" name="autor-input" class="form-control"/>
          </div><br>
          <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" id="genre-in" name="genre-input" class="form-control"/>
          </div><br>
          <div class="form-group">
            <label for="pages">Pages:</label>
            <input type="text" id="pages-in" name="pages-input" class="form-control"/>
          </div><br>
          <div class="form-group">
            <label for="publishing">Publishing:</label>
            <input type="text" id="pub-in" name="pub-input" class="form-control"/>
          </div><br>
          <div class="form-group">
            <label for="imgsrc">Img URI:</label>
            <input type="text" id="imgsrc-in" name="imgsrc-input" class="form-control"/>
          </div><br>
          <div class="form-group">
            <input type="submit" name="add_book" value="ADD" class="login-pg-btn" onclick="add_book_db()">
          </div>
        </form>
      </div>
      <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
      ';

?>
