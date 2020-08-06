<?php
      $id_book = $_GET['idd'];
      require 'db_connect.php';
      $error ="";
      $sql = 'DELETE FROM book_list WHERE ID_book = ?';
      $stmt = mysqli_stmt_init($conn);
      if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $id_book);
        if(mysqli_stmt_execute($stmt)){
        }
        else{
          $error = "nich gut";
        }
        mysqli_stmt_close($stmt);
      }


      if(empty($error)){
        $sql = 'DELETE FROM books WHERE ID = ?';
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sql)){
          mysqli_stmt_bind_param($stmt, "i", $id_book);
        }
        if(mysqli_stmt_execute($stmt)){
            echo 'succ';
        }
        mysqli_stmt_close($stmt);
      }


?>
