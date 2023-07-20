

<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
  
  $host ="localhost";
  $username = "root";
  $password = "";
  $database = "gtpcom_desain";

  //CREATING DATABASE CONNECTION
  $con = mysqli_connect($host, $username, $password, $database);

  $base_site_name = "cm";
  $base_url = "localhost/".$base_site_name;
  $base_name_site = "Customization";
  
?>  