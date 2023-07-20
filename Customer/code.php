<!-- <?php
// session_start();
include('../config/dbcon.php');
include('functions/myfunctions.php');

if(isset($_POST['btn_payment']))
{
    $track_no = $_POST['tracking_no'];
    $payment_status = $_POST['payment_mode'];

    $paymentMode_query = "SELECT orders SET payment_mode=' $payment_status' WHERE tracking_no='$track_no' ";
    $paymentMode_query_run = mysqli_query($con, $paymentMode_query);

    redirect("view-order.php?t=$track_no", "Payment successfully selected");

}
else if(isset($_POST['btn_CancelOrder']))
{
    $track_no = $_POST['tracking_no'];
    // $order_status = $_POST['status'];
    // $payment_status = $_POST['payment_status'];

    $cancelOrder_query = "UPDATE orders SET status= 2  WHERE tracking_no='$track_no' ";
    $cancelOrder_query_run = mysqli_query($con, $cancelOrder_query);

    redirect("view-order-cancel.php?t=$track_no", "Order Status Cancelled Successfully");

}

 
else
{
    header('Location: index.php');
}
?> -->