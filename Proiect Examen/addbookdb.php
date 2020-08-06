<?php
    require "db_connect.php";

    $title = $autor = $pages = $genre = $publishing = $imgurl = "";

    $error = "";

    if(isset($_POST['add_book'])){
      $title = $_POST['title-input'];
      $autor = $_POST['autor-input'];
      $genre = $_POST['genre-input'];
      $pages = $_POST['pages-input'];
      $publishing = $_POST['pub-input'];
      $imgurl = $_POST['imgsrc-input'];

      if(empty(trim($title)) || empty(trim($autor)) || empty(trim($genre)) || empty(trim($pages)) || empty(trim($publishing)) || empty(trim($imgurl))){
        $error = "Empty input";
      }

      if(empty($error)){

        // check if already Added
        $sql = 'SELECT * FROM books WHERE title=? AND autor=?';
        $stmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($stmt, $sql)){
          mysqli_stmt_bind_param($stmt, "ss", $title, $autor);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) > 0){
            $error = "Already added";
          }
          mysqli_stmt_close($stmt);
        }

        if(empty($error)){
          $sql = 'INSERT INTO books(title, autor, pages, genre, publishing, img_URL) VALUES (?,?,?,?,?,?)';
          $stmt = mysqli_stmt_init($conn);

          if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt, "ssisss", $title, $autor, $pages, $genre, $publishing, $imgurl);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
          }
        }
      }
      else{
        echo $error;
      }

    }
 ?>
