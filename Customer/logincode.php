<?php
// session_start();
include('config/dbcon.php');
include('functions/userfunctions.php');



$login = new Login();

if (isset($_POST["btn_login"])) {
  $result = $login->login($_POST["usernameemail"], $_POST["password"]);

  if ($result == 1) {
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: index.php");
  } elseif ($result == 10) {
    header("Location: login.php"); 
    $_SESSION['message'] = "Wrong Password";
  } elseif ($result == 100) {
    header("Location: login.php");
    $_SESSION['message'] = "User Not Verified";
    
  }
  else{
    header("Location: asdaf.php");
  }
}

?>