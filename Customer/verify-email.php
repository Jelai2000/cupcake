<?php
session_start();
// include('functions/userfunctions.php');
include('../config/dbcon.php');

if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $verify_query = "SELECT verify, verify_status FROM users WHERE verify = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);

    if(mysqli_num_rows($verify_query_run)>0)
    {
        $row = mysqli_fetch_array($verify_query_run);
        if($row['verify_status'] == "0")
        {
            $clicked_token = $row['verify'];
            $update_query = "UPDATE users SET verify_status='1' WHERE verify = '$clicked_token' LIMIT 1 ";
            $update_query_run = mysqli_query($con, $update_query);

            if($update_query_run)
            {
                $_SESSION['message'] = "Your email is verified. You can now login.";
                header("Location: login.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Verification Failed";
                header("Location: login.php");
                exit(0);
            }
        }
        
        else
        {
            $_SESSION['message'] = "Email Already Verified. Please Login";
            header("Location: login.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "This Token doesn't Exists";
        header("Location: login.php");

    }
}
else
{
    $_SESSION['message'] = "Not Allowed";
    header("Location: login.php");
}   
?>