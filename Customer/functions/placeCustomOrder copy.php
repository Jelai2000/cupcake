<?php

session_start();
include('../../config/dbcon.php');



if (isset($_SESSION['authenticated'])) 
{
    $userId = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $zipcode = $_POST['zipcode'];
    $address = $_POST['address'];
    $payment_mode = $_POST['payment_mode'];
    $deliveryDate = $_POST['deliveryDate'];
    // $popular = isset($_POST['popular']) ? '1': '0';
    
    $img_receipt = $_FILES['img_receipt']['name'];

    $receipt_path = "../receipt";

    $image_extension = pathinfo($img_receipt, PATHINFO_EXTENSION);
    $receipt_filename = time().'.'.$image_extension;

    $img_custom = $_FILES['img_custom']['name'];

    $path = "../customizedCake";

    $image_ext = pathinfo($img_custom, PATHINFO_EXTENSION);
    $custom_filename = time().'.'.$image_ext;

    
    
$shippingFee = 100;
    $totalPrice = 0;
    $tracking_no = "cupcake" . rand(1111, 9999) . substr($phone, 2);
    $customCheckout_query = "INSERT INTO orders(tracking_no, user_id, name, email,	phone, address,	zipcode, total_price, shippingFee, payment_mode,deliveryDate, img_receipt, img_custom) VALUES ('$tracking_no','$userId','$name','$email','$phone','$address','$zipcode','$totalPrice','$shippingFee','$payment_mode', '$deliveryDate','$receipt_filename','$custom_filename')";

    $customCheckout_query_run = mysqli_query($con, $customCheckout_query);

    if($customCheckout_query_run)
    {
        move_uploaded_file($_FILES['img_receipt']['tmp_name'], $receipt_path . '/' . $receipt_filename);
        move_uploaded_file($_FILES['img_custom']['tmp_name'], $path.'/'.$custom_filename);
       
        $_SESSION['message'] = "Order placed successfully";
            header('Location: ../my-orders.php');
            die();
    }
    else
    {
        $_SESSION['message'] = "Order placed successfully";
        header('Location: ../my-ordefdfrs.php');
        die();
        
    }
} 
else 
{
    header('Location: ../index.php');
}
?>