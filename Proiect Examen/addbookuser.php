<?php
      // q aici e username-ul
      $q = $_GET['q'];
      $id_book = $_GET['idd'];
      require 'db_connect.php';

      $error = "";

      // prima si prima data luam id-ul de user dupa username ok?
      $sqlQuery = '
      SELECT ID FROM users
      WHERE username = ?';

      $stmt = mysqli_stmt_init($conn);

      if(mysqli_stmt_prepare($stmt, $sqlQuery)){
        mysqli_stmt_bind_param($stmt, "s", $q);

        if(mysqli_stmt_execute($stmt)){

          mysqli_stmt_store_result($stmt);
          mysqli_stmt_bind_result($stmt, $id_user);
          mysqli_stmt_fetch($stmt);
        }
        mysqli_stmt_close($stmt);
      }

      // BOON avem userid acuma hai sa vedem daca deja a adugat cartea huh
      $sqlQuery = '
      SELECT * FROM book_list
      WHERE ID_book = ? AND ID_user = ? ';

      $stmt = mysqli_stmt_init($conn);

      if(mysqli_stmt_prepare($stmt, $sqlQuery)){
        mysqli_stmt_bind_param($stmt, "ii", $id_book, $id_user);
        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) > 0){
            $error="already added";
            echo 'aadd';
            }
          }
          mysqli_stmt_close($stmt);
        }

      // No daca totu e bine putem adauga in bd

      if(empty($error)){
        $sql = 'INSERT INTO book_list(ID_book, ID_user) VALUES (?, ?)';
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sql)){
          mysqli_stmt_bind_param($stmt, "ii", $id_book, $id_user);
        }
        if(mysqli_stmt_execute($stmt)){
            echo 'succ';
        }
        mysqli_stmt_close($stmt);
      }
?>
