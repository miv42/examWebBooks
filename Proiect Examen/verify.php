<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <script src="index_script.js"></script>
    <title>Verification Page</title>
  </head>
  <body>
    <?php
      require 'db_connect.php';

      if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        // verificam datele + punem datele
        $emailv = $_GET['email'];
        $hashv = $_GET['hash'];
        $match = 0;
        // verificam daca avem asa ceva in bd
        $sqlQuery = "SELECT email, verification_hash, verification_status FROM users WHERE email=? AND verification_hash=? AND verification_status=0";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sqlQuery)){
          $param_mail = trim($emailv);
          $param_hash = trim($hashv);
          mysqli_stmt_bind_param($stmt, "ss", $param_mail, $param_hash);
          if(mysqli_stmt_execute($stmt)){
            // retinem ce am luat
            mysqli_stmt_store_result($stmt);
            $match = mysqli_stmt_num_rows($stmt);
          }
        }

        //echo $match; // folosim asta ca sa activam sau nu

        if($match > 0){
          // activam contu
          $sqlUpdate = "UPDATE users SET verification_status = 1 WHERE email='".$emailv."' AND verification_hash='".$hashv."' AND verification_status=0";
          $stmt2 = mysqli_stmt_init($conn);
          mysqli_stmt_prepare($stmt2, $sqlUpdate);
          mysqli_stmt_execute($stmt2);

          echo '
          <div class="ribbon">
            <button class="home-btn" onclick="home_redirect()">HOME</button>
          </div>
          <div class="centered-container">
            <div class="statusmsg">
              Registered successfully! :D
            </div>
          </div>
            ';
        }else{
          // o mai fost activat odata lmao de ce ai apasa pe linku ala de 2 ori
          echo '
          <div class="ribbon">
            <button class="home-btn" onclick="home_redirect()">HOME</button>
          </div>
          <div class="centered-container">
            <div class="statusmsg">
              Did you actually try to activate twice? Dumbass..
            </div>
          </div>
            ';
        }
      }
    ?>


  </body>
</html>
