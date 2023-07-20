<?php

session_start();
include('../../config/dbcon.php');


function getAll($table)
{
global $con;
$query = "SELECT * FROM $table";
return $query_run = mysqli_query($con, $query);
}

function getAllUsers()
{
global $con;
$query = "SELECT * FROM seller";
return $query_run = mysqli_query($con, $query);
}




function getByID($table, $id)
{
global $con;
$query = "SELECT * FROM $table WHERE id = '$id' ";
return $query_run = mysqli_query($con, $query);
}



function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:'.$url);
    exit(0);
}
function checkRequestID($request)
{
  global $con;
    $query = "SELECT * FROM request WHERE id='$request '";
    return mysqli_query($con, $query);
}
function getCustomizedOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status ='0' AND total_price='0'  ";
    return $query_run = mysqli_query($con, $query);
}
function getOrderCustomizedHistory()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status ='1' AND total_price='0'";
    return $query_run = mysqli_query($con, $query);
}
function getCustomCancelled()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status ='2' AND total_price='0' ";
    return $query_run = mysqli_query($con, $query);
}
function getAllOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status='0' AND total_price !='0' ";
    return $query_run = mysqli_query($con, $query);
}

function getOrderHistory()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status='1' AND total_price !='0' ";
    return $query_run = mysqli_query($con, $query);
}
function getOrderCancelled()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status ='2' AND total_price !='0' ";
    return $query_run = mysqli_query($con, $query);
}
function getCompleteOrders()
{
    global $con;
    $query = "SELECT * FROM orders WHERE status='1'  ";
    return $query_run = mysqli_query($con, $query);
}

function getOrderTransactions()
{
    global $con;
    $query = "SELECT * FROM orders";
    return $query_run = mysqli_query($con, $query);
}
function getRefundHistory()
{
    global $con;
    $query = "SELECT * FROM orders WHERE refund_status !='0'";
    return $query_run = mysqli_query($con, $query);
}
function getAllQTYOrder()
{
    global $con;
    $query = "SELECT * FROM order_items";
    return $query_run = mysqli_query($con, $query);
}
function getAllCategory(){
  global $con;
  $tab_query = "SELECT * FROM categories ORDER BY id ASC";
  return $tab_result = mysqli_query($con, $tab_query);
  
}

function checkTrackingNoValid($trackingNo)
{
  global $con;
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo'";
    return mysqli_query($con, $query);
}

function getSeller($sellerID)
{
    global $con;
    // $sellerID = $_SESSION['id'];
    $query = "SELECT * FROM seller WHERE id='$sellerID'";
    return $query_run = mysqli_query($con, $query);
}

function getAllRequest()
{
global $con;
$query = "SELECT * FROM request ORDER BY status ASC ";
return $query_run = mysqli_query($con, $query);
}

class Register 
{
  public function registration($filename, $firstname, $lastname, $username, $email, $password, $confirmpassword, $status)
  {
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
}

class Request 
{
  

  public function Request_()
  {
    global $con;
    $datetoday=date("Y/m/d");

        $query = "INSERT INTO seller (name,email,request,message,datetoday,status) VALUES('name','email', 'request', 'message', '$datetoday', Null')";
        mysqli_query($con, $query);
        
    
  }
}

class Login
{
  public $id;
  public function login($usernameemail, $password)
  {
    global $con;
    $result = mysqli_query($con, "SELECT * FROM seller WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    $password = sha1($_POST["password"]);
    if (mysqli_num_rows($result) > 0) {
      if ($password == $row["password"]) {
        $this->id = $row["id"];
        $_SESSION['authenticated'] = TRUE;
        $_SESSION['auth_user'] = [
            'id'=> $row['user_id'],
            'username' => $row['username'],
            'email' => $row['email'],];
            
        return 1;
        // Login successful
      } else {
        return 10;
        // Wrong password
      }
    } else {
      return 100;
      // User not registered
    }
  }

  public function idUser()
  {
    return $this->id;
  }
}
class select 
{
  public function selectUserById($id)
  {
    global $con;
    $result = mysqli_query($con, "SELECT * FROM seller WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}

class Controller 
{
  public function SELECT()
  {
    global $con;
    $userQuery = "SELECT * FROM seller";
    $result = mysqli_query($con, $userQuery);
    if (mysqli_num_rows($result) > 0) {
      return $result;
    } else {
      return false;
    }
  }

  public function EDIT($id)
  {
    global $con;
    $id = mysqli_real_escape_string($con, $id);
    $userQuery = "SELECT * FROM seller WHERE id='$id' LIMIT 1";
    $result = $con->query($userQuery);
    if ($result->num_rows == 1) {
      $data = $result->fetch_assoc();
      return $data;
    } else {
      return false;
    }
  }

  public function UPDATE($inputData, $id)
  {
    global $con;
    $id = mysqli_real_escape_string($con, $id);
    $firstname = $inputData['firstname'];
    $lastname = $inputData['lastname'];
    $username = $inputData['username'];
    $email = $inputData['email'];
    $status = $inputData['status'];

    $new_image = $_FILES['image']['name'];
    $old = $_POST['old_image'];

    $sha1Password = sha1($_POST["password"]);


    if (!empty($new_image)) {
      $tempname = $_FILES[$new_image]["tmp_name"];
      $update_filename = $new_image;
    } else {
      $update_filename = $old;
    }

    $userQuery = "UPDATE seller SET image='$update_filename',firstname='$firstname', lastname='$lastname', username='$username' , email='$email' ,status='$status' WHERE id='$id' LIMIT 1";
    $result = $con->query($userQuery);
    if ($result) {
      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      $update_filename = "images/" . $filename;

      if ($_FILES['image']['name'] != "") {
        move_uploaded_file($tempname, $update_filename);
        if (file_exists("images/" . $old)) {
          unlink("images/" . $old);
        }
      }
      return true;
    } else {
      return false;
    }
  }


  public function DELETE($id)
  {
    global $con;
    $id = mysqli_real_escape_string($con, $id);
    $cat = "SELECT * FROM seller WHERE id='$id'";
    $run = mysqli_query($con, $cat);
    $data = mysqli_fetch_assoc($run);
    $image = $data['image'];
    $userDeleteQuery = "DELETE FROM seller WHERE id='$id' LIMIT 1";
    $result = $con->query($userDeleteQuery);
    if ($result) {

      if (file_exists("images/" . $image)) {
        unlink("images/" . $image);
      }

      return true;
    } else {
      return false;
    }
  }



}