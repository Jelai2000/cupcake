<?php
session_start();
include('../config/dbcon.php');


function getAllActive($table)
{
global $con;
$query = "SELECT * FROM $table WHERE status = '0' ";
return $query_run = mysqli_query($con, $query);
}

function getActiveProduct()
{
global $con;
$query = "SELECT * FROM products WHERE status = '0' ";
return $query_run = mysqli_query($con, $query);
}
function getCustomizeProduct()
{
global $con;
$query = "SELECT * FROM products WHERE customize = '1' ";
return $query_run = mysqli_query($con, $query);
}

function getAllTrending()
{
global $con;
$query = "SELECT * FROM products WHERE trending = '1' ";
return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug)
{
global $con;
$query = "SELECT * FROM $table WHERE slug = '$slug' AND status = '0' LIMIT 1 ";
return $query_run = mysqli_query($con, $query);
}

function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id = '$category_id' AND status = '0' ";
    return $query_run = mysqli_query($con, $query);
}

// function getIDActive($table,$user_id)
// {
// global $con;
// $query = "SELECT * FROM $table WHERE id = '$user_id' AND status = '0' LIMIT 1";
// return $query_run = mysqli_query($con, $query);
// //return mysqli_fetch_assoc($result);
// }

function getCartItems()
{
    global $con;
    $userId = $_SESSION['id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
    return $query_run = mysqli_query($con, $query);

}
function getOrderReceived()
{
    global $con;
    $userId = $_SESSION['id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId' AND status = '1  ' ORDER BY  id ASC";
    return $query_run = mysqli_query($con, $query);
}
function getOrderCancelled()
{
    global $con;
    $userId = $_SESSION['id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId' AND status = '2' ORDER BY  id ASC";
    return $query_run = mysqli_query($con, $query);
}
function getOrders()
{
    global $con;
    $userId = $_SESSION['id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId' AND status = '0' AND total_price!='0' ORDER BY  id ASC";
    return $query_run =  mysqli_query($con, $query);
}
function getCustomOrders()
{
    global $con;
    $userId = $_SESSION['id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId' AND total_price = '0' ORDER BY  id ASC";
    return $query_run =  mysqli_query($con, $query);
}
function getAllCategory(){
  global $con;
  $tab_query = "SELECT * FROM categories ORDER BY id ASC";
  return $tab_result = mysqli_query($con, $tab_query);
  
}

function getAllProducts($id){
  global $con;
  $product_query = "SELECT * FROM products WHERE category_id = '$id'";
  return $product_result = mysqli_query($con, $product_query);
}



function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:'.$url);
    exit();
}




class Login
{
  public $id;
  public function login($usernameemail, $password)
  {
    global $con;
    $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$usernameemail' AND verify_status = 1 OR email = '$usernameemail' AND verify_status = 1 ");
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
    $result = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}

function checkTrackingNoValid($trackingNo)
{
  global $con;
    $userId = $_SESSION['id'];
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userId' ";
    return mysqli_query($con, $query);
}

?>