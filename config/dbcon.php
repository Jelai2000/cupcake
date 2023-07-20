<?php
  
  $host ="localhost";
  $username = "root";
  $password = "";
  $database = "cupcake";

  // $host ="localhost";
  // $username = "root";
  // $password = "";
  // $database = "gtpcom_desain";

  //  $base_site_name = "cm";
  // $base_url = "localhost/".$base_site_name;
  // $base_name_site = "Desain";

  //CREATING DATABASE CONNECTION
  $con = mysqli_connect($host, $username, $password, $database);
  

  //CHECK DATABASE CONNECTION
  if(!$con)
  {
    die("Connection Failed: ". mysqli_connect_error());
  }

  
?>