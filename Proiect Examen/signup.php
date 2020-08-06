<?php
//https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
//https://code.tutsplus.com/tutorials/how-to-implement-email-verification-for-new-members--net-3824

  // ne conectam si noi frumos la baza de date
  require "db_connect.php";
  require "index_script.js";

  // definim varibilele care tin chestiile
  $username = $password = $passwordre = $email = $firstname = $lastname = "";

  // variabile pt erori and shit
  $username_err = $password_err = $confirm_password_err = $name_err = "";

  if(isset($_POST['sign-up'])){

    // luam valorile inserate de catre user
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordre = $_POST['pw-rewrite'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $hash = md5(rand(0, 1000)); // random 32 char hash for verification

    // ai bagat ma username??
    if(empty(trim($username))){
        $username_err = "Please enter a username.";
    } else{
      // no buna da poate ii luat
      $sqlQuery = "SELECT ID FROM users WHERE username = ?";
      $stmt = mysqli_stmt_init($conn);
      // pregatim query-u' de rulat
      if(mysqli_stmt_prepare($stmt, $sqlQuery)){
        // hai sa bagam parametru
        $param_usnm = trim($username);
        mysqli_stmt_bind_param($stmt, "s", $param_usnm);

        // ATENTAT
        if(mysqli_stmt_execute($stmt)){
          // retinem ce am luat
          mysqli_stmt_store_result($stmt);

          // but is already taken?
          if(mysqli_stmt_num_rows($stmt) == 1){
            $username_err = "This username is already taken.";
          }
        } else {
          echo "bruv smth went wrong lul";
        }
        mysqli_stmt_close($stmt);
      }
    }

    // ai bagat parola??
    if(empty(trim($password))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($password)) < 6){
        $password_err = "Password must have atleast 6 characters.";
    }
    // ai bagat parola iara??
    if(empty(trim($passwordre))){
        $confirm_password_err = "Please confirm password.";
    } else{
        if(empty($password_err) && ($password != $passwordre)){
            $confirm_password_err = "Password did not match.";
        }
    }

    echo $username_err;
    echo $password_err;
    echo $confirm_password_err;
    echo $name_err;

    // acuma hai sa bagam chestiile in baza de date
    // intai verificam de erori
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err)){
      // Prepare an insert statement
        $sql = "INSERT INTO users(username, FirstName, LastName, passwort, email, verification_hash) VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt, $sql)){
          mysqli_stmt_bind_param($stmt, "ssssss", $username, $firstname, $lastname, $password, $email, $hash);
          // password_hash($password, PASSWORD_DEFAULT); //pt hash la parola

          // ATENTAT
          if(mysqli_stmt_execute($stmt)){
            // te duce la login sau main sau whatever. in cucuruz
            header("Location: index.html");
          } else{
            echo "Smth went not gucci.";
          }

          // no acuma trimitem mail de verification

          $to = $email;
          $subject = 'Signup | Verification';
          $message = '
          Lmao this worked
          This junk info was added to the junk database.
          Hope ur happy with what you did >:(
          ------------------------
          Username: '.$username.'
          Password: '.$password.'
          ------------------------
          Click this totally safe link to activate ur account. Definitely not phishing.
          http://localhost/Proiect%20Examen/verify.php?email='.$email.'&hash='.$hash.'
          ';

          $headers = 'From:maria.vanga99@gmail.com' . "\r\n";

          mail($to, $subject, $message, $headers);


          mysqli_stmt_close($stmt);
        }
    }
    // close le connection
    mysqli_close($conn);
  }

?>
