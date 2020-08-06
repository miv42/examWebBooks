<?php

  require "db_connect.php";

  if(isset($_POST['sign-in'])){

    $logname = $_POST['username'];
    $logpass = $_POST['password'];

    if(!empty($logname) AND !empty($logpass)){
      $sqlQuery = "SELECT ID, rights FROM users WHERE username = ? AND passwort = ? AND verification_status=1";
      $stmt = mysqli_stmt_init($conn);

      if(mysqli_stmt_prepare($stmt, $sqlQuery)){
        $param_logname = trim($logname);
        $param_logpass = trim($logpass);

        mysqli_stmt_bind_param($stmt, "ss", $param_logname, $param_logpass);

        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          mysqli_stmt_bind_result($stmt, $id, $rights);
          mysqli_stmt_fetch($stmt);
        }

        if(mysqli_stmt_num_rows($stmt) > 0){
          if($rights === 0 ){
            header('Location: ./basic_nav.html?name='.$logname);
          }
          elseif($rights === 1){
            header('Location: ./autor_nav.html?name='.$logname);
          }
          elseif($rights === 2){
            header('Location: ./admin_nav.html?name='.$logname);
          }
          else{
            header("Location: ./index.html");
          }
          //header('Location: ./basic_nav.html?name='.$logname);
        }else{
          header("Location: ./index.html");
        }
      }

  }
}

 ?>
