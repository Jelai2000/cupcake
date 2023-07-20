<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    // session_start(); --ibalik if kailangan
include('../config/dbcon.php');
//          




if(isset($_POST['btn_updateRequest']))
{
    $requestID = $_POST['id'];
    $request_status = $_POST['status'];

    $updateRequest_query = "UPDATE request SET status='$request_status' WHERE id = '$requestID'  ";
    $updateRequest_query_run = mysqli_query($con, $updateRequest_query);

    header("Location: allRequests.php");
    die();

      



}   


else
{
    header('Location: dashboard.php');
}


?>