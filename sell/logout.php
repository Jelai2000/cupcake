<?php
require 'function.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: html/auth-login-basic.php");