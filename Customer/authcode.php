<?php 
session_start();
include('config/dbcon.php');
include('functions/userfunctions');

if(isset($_POST['btn_register']))
{
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);
    $cpassword =  mysqli_real_escape_string($con, $_POST['cpassword']);

    if($password == $cpassword)
    {
        //INSERT USER DATA
        $insert_query = "INSERT INTO users (username,phone,email,password) VALUES ('$username','$phone','$email','$password')";
        $insert_query_run = mysqli_query($con, $insert_query);
        if($insert_query_run)
        {
            $_SESSION['message'] = "Registered Successfully";
            header("Location: login.php");
        }
        else
        {
            $_SESSION['message'] = "Something went wrong";
        header("Location: register.php");
        }
    }
    else
    {
        $_SESSION['message'] = "Password do not match";
        header("Location: register.php");
    }
}

?>