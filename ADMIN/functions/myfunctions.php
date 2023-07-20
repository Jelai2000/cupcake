<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
// session_start();
include('../config/dbcon.php');

function getAllRequest()
{
global $con;
$query = "SELECT * FROM request ORDER BY status ASC ";
return $query_run = mysqli_query($con, $query);
}
function getRequest()
{
global $con;
$query = "SELECT * FROM request WHERE status = '0' ";
return $query_run = mysqli_query($con, $query);
}
function getCompleteRequest()
{
global $con;
$query = "SELECT * FROM request WHERE status = '2' ";
return $query_run = mysqli_query($con, $query);
}
function getWorkingRequest()
{
global $con;
$query = "SELECT * FROM request WHERE status = '1' ";
return $query_run = mysqli_query($con, $query);
}




?>

