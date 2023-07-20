<?php
require('../config/dbcon.php');
require('function.php');



$login = new Login();

if (isset($_POST["login"])) {
  $result = $login->login($_POST["usernameemail"], $_POST["password"]);

  if ($result == 1) {
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: html/seller-dashboard.php");
  } elseif ($result == 10) {
    header("Location: html/auth-login-basic.php");
    $_SESSION['status'] = "Wrong Password";
  } elseif ($result == 100) {
    header("Location: html/auth-login-basic.php");
    $_SESSION['status'] = "User Not Registered";

  }
}

// $register = new Register();

if (isset($_POST["btn_addUser"])) {


  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $_POST["confirmpassword"];
  $status = $_POST["status"];

  $filename = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "images/" . $filename;

  if ($result == 1) {
    move_uploaded_file($tempname, $folder);
    global $con;
    $duplicate = mysqli_query($con, "SELECT * FROM seller WHERE username = '$username' OR email = '$email'");
    $sha1Password = sha1($_POST["password"]);
    if (mysqli_num_rows($duplicate) > 0) {
      return 10;
      // Username or email has already taken
    } else {
      if ($password == $confirmpassword) {

        $query = "INSERT INTO seller (id,image,firstname,lastname,username,email,password,status) VALUES('','$filename','$firstname', '$lastname', '$username', '$email', '$sha1Password','$status')";
        mysqli_query($con, $query);
        return 1;
        // Registration successful
      } else {
        return 100;
        // Password does not match
      }
    }
  }


  // header("Location: login.php");
  $_SESSION['status'] = "Data inserted Successfully";

} elseif ($result == 10) {

  // header("Location: registration.php");
  $_SESSION['status'] = "Username or Email Has Already Taken";


} elseif ($result == 100) {
  // header("Location: registration.php");
  $_SESSION['status'] = "Password Does Not Match";

}



if (isset($_POST['update'])) {
  $id = mysqli_real_escape_string($db->conn, $_POST['id']);
  $inputData = [
    'firstname' => mysqli_real_escape_string($db->conn, $_POST['firstname']),
    'lastname' => mysqli_real_escape_string($db->conn, $_POST['lastname']),
    'username' => mysqli_real_escape_string($db->conn, $_POST['username']),
    'email' => mysqli_real_escape_string($db->conn, $_POST['email']),
    'status' => mysqli_real_escape_string($db->conn, $_POST['status']),

  ];
  $user = new Controller;
  $result = $user->UPDATE($inputData, $id);

  if ($result) {
    header("Location: index.php");
    $_SESSION['status'] = "User Updated Successfully";

    exit(0);
  } else {
    header("Location: index.php");
    $_SESSION['status'] = "User Update Unsuccessful ";
    exit(0);
  }
  // $path = "images";
}


if (isset($_POST['delete'])) {
  $id = mysqli_real_escape_string($db->conn, $_POST['delete']);
  $user = new Controller;
  $result = $user->DELETE($id);
  if ($result) {
    $_SESSION['message'] = "User Added Successfully";
    header("Location: index.php");
    exit(0);
  } else {
    $_SESSION['message'] = "User Not Added";
    header("Location: index.php");
    exit(0);
  }
}
?>