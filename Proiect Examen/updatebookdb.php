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
      $id = $_GET['idd'];

      if(empty(trim($title)) || empty(trim($autor)) || empty(trim($genre)) || empty(trim($pages)) || empty(trim($publishing)) || empty(trim($imgurl))){
        $error = "Empty input";
      }

      if(empty($error)){

        // update title
        if(!empty($title)){
          $stmt = mysqli_stmt_init($conn);

          $sql = "UPDATE books SET title='".$title."' WHERE ID='".$id."'";

          if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
          }
        }

        // update autor
        if(!empty($author)){
          $stmt = mysqli_stmt_init($conn);

          $sql = "UPDATE books SET autor='".$autor."' WHERE ID='".$id."'";

          if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
          }
        }

        // update pages
        if(!empty($pages)){
          $stmt = mysqli_stmt_init($conn);

          $sql = "UPDATE books SET pages='".$pages."' WHERE ID='".$id."'";

          if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
          }
        }

        // update genre
        if(!empty($genre)){
          $stmt = mysqli_stmt_init($conn);

          $sql = "UPDATE books SET genre='".$genre."' WHERE ID='".$id."'";

          if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
          }
        }

        // update publishing
        if(!empty($publishing)){
          $stmt = mysqli_stmt_init($conn);

          $sql = "UPDATE books SET publishing='".$publishing."' WHERE ID='".$id."'";

          if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
          }
        }

        // update img url
        if(!empty($imgurl)){
          $stmt = mysqli_stmt_init($conn);

          $sql = "UPDATE books SET img_URL='".$imgulr."' WHERE ID='".$id."'";

          if(mysqli_stmt_prepare($stmt, $sql)){
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
