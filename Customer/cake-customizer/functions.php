<?php

include "config/setting.php";


if(isset($_POST['btn_addCategory']))
{
    $nameCategory = $_POST['nameCategory'];
    
    

    $request_query = "INSERT INTO category (name_category) 
    VALUEs ('$nameCategory') ";
    // SELECT id, email, contact FROM seller

    $request_query_run = mysqli_query($con, $request_query);

    if($request_query_run)
    {
    //    echo $dateToday;
    echo'<script type="text/javascript">
    alert("Successfully Added.");
    window.location = "Add-Customize-Product.php";
    </script>	';
    }
    else
    {
     
        echo'<script type="text/javascript">
        alert("Something is wrong.");
        window.location = "Add-Customize-Product.php";
        </script>	';
        
    }
}



if(isset($_POST['btn_addProduct']))
{
    $productName = $_POST['productName'];
    $productInfo = $_POST['productInfo'];
    // $nameCategory = $_POST['nameCategory'];
    $itemColor = $_POST['itemColor'];
    $cost = $_POST['cost'];
    $category = $_POST['category'];

    
    

    $request_query = "INSERT INTO product (item_model, item_info, item_color, cost, id_item_category) 
    VALUEs ('$productName','$productInfo','$itemColor','$cost','$category') ";
    // SELECT id, email, contact FROM seller

    $request_query_run = mysqli_query($con, $request_query);

    if($request_query_run)
    {
    // change the name below for the folder you want
    $dir = "$productName";
    $item = "c:/localhost/htdocs/cake-customizer/item/";
    // $file_to_write = 'test.txt';
    // $content_to_write = "The content";
        // $path = "items";
    if( is_dir($dir) === false )
    { 
        // mkdir($path."/$dir");
        mkdir($dir);


    }

    // $file = fopen($dir . '/' . $file_to_write,"w");

    // a different way to write content into
    // fwrite($file,"Hello World.");

    // fwrite($file, $content_to_write);

    // closes the file
    // fclose($file);

    // this will show the created file from the created folder on screen
    // include $dir . '/' . $file_to_write;
    echo'<script type="text/javascript">
    alert("Successfully Added.");
    
    </script>	';
    }
    else
    {
     
        echo'<script type="text/javascript">
        alert("Something is wrong.");
      
        </script>	';
        
    }
}




?>