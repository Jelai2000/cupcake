<?php
// session_start();
// include('functions/userfunctions');
if(!isset($_SESSION['authenticated']))
{
    redirect("login.php", 'Log in to continue');
}
?>