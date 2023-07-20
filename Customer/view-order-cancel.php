<?php

include('functions/userfunctions.php');
include('includes/header.php');

include('authentication.php');

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);
    if (mysqli_num_rows($orderData) < 0) {
        ?>
        <h4>Something went wrong</h4>
        <?php
        die();
    }
} else {
    ?>
    <h4>Something went wrong</h4>
<?php
        die();
}

$data = mysqli_fetch_array($orderData);
?>

<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 mt-3">
        <div class="first d-flex justify-content-between align-items-center mb-3">
            <div class="info">
                <span class="d-block name">Thank you,
                    <?= $data['name']; ?>
                </span>
                <span class="d-block ">
                    <?= $data['address']; ?>,
                    <?= $data['zipcode']; ?>
                </span>
                <span class="d-block">
                    <?= $data['email']; ?>
                </span>
                <span class="d-block">
                    <?= $data['phone']; ?>
                </span>
                <!-- <span class="order">Tracking No.
                    <?= $data['tracking_no']; ?>
                </span> -->

            </div>

            <img src="https://i.imgur.com/NiAVkEw.png" width="40" />


        </div>

        <hr>
        <div class="text">
            <?php
            $userId = $_SESSION['id'];

            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*,oi.qty as orderqty, p.* FROM orders o, order_items oi, products p WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no' ";
            $order_query_run = mysqli_query($con, $order_query);

            if (mysqli_num_rows($order_query_run) > 0) {
                foreach ($order_query_run as $item) {
                    ?>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2"><img src="uploads/<?= $item['image']; ?>" width="40px" height="40px"
                                    alt="<?= $item['name']; ?>"> </div>
                            <div class="col-sm-5" style="font-size: 13px">
                                <?= $item['name']; ?>
                            </div>

                            <div class="col-sm-3 align-middle" style="font-size: 13px">₱
                                <?= $item['price']; ?>
                            </div>
                            <div class="col-sm-2 align-middle" style="font-size: 12px">x
                                <?= $item['orderqty']; ?>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </div>


        <div class="row mt-4">
            <div class="col">
                <div class="row justify-content-between">
                    <div class="col-auto ">
                        <p class="mb-1 text-dark"><b>Order Details</b></p>
                    </div>

                </div>
                <div class="row justify-content-between">
                    <div class="flex-sm-col text-right col">
                        <p class="mb-1"><b>Payment</b></p>
                    </div>
                    <div class="flex-sm-col col-auto">
                        <p class="mb-1">
                            <?= $data['payment_mode']; ?>
                        </p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="flex-sm-col text-right col">
                        <p class="mb-1"><b>Subtotal</b></p>
                    </div>
                    <div class="flex-sm-col col-auto">
                        <p class="mb-1">₱
                            <?= $data['total_price']; ?>
                        </p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="flex-sm-col text-right col">
                        <p class="mb-1"> <b>Shipping Fee</b></p>
                    </div>
                    <div class="flex-sm-col col-auto">
                        <p class="mb-1">₱
                            <?= $data['shippingFee']; ?>
                        </p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="flex-sm-col text-right col">
                        <p class="mb-1"><b>Total</b></p>
                    </div>
                    <div class="flex-sm-col col-auto">
                        <p class="mb-1">₱
                            <?= $data['shippingFee'] + $data['total_price']; ?>
                        </p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="flex-sm-col text-right col">
                        <p class="mb-1"><b>Payment Status</b></p>
                    </div>
                    <div class="flex-sm-col col-auto">
                        <p class="mb-1">
                            <?php
                            if ($data['payment_status'] == 0) {
                                echo "Checking";
                            } else if ($data['payment_status'] == 1) {
                                echo "Partially Paid";
                            } else if ($data['payment_status'] == 2) {
                                echo "Fully Paid";
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="flex-sm-col text-right col">
                        <p class="mb-1"><b>Order Status</b></p>
                    </div>
                    <div class="flex-sm-col col-auto">
                        <p class="mb-1">
                            <?php
                            if ($data['status'] == 0) {
                                echo "<p class='bg-warning text-light p-1 rounded'>Under Process</p>";
                            } else if ($data['status'] == 1) {
                                echo "<p class='bg-success text-light p-1 rounded'>Completed</p>";
                            } else if ($data['status'] == 2) {
                                echo "<p class='bg-danger text-light p-1 rounded'>Cancelled</p>";
                            }
                            ?>
                        </p>
                    </div>
                    <div class="row justify-content-between">
                        <div class="flex-sm-col text-right col">
                            <p class="mb-1"><b>DELIVERY DATE</b></p>
                        </div>
                        <div class="flex-sm-col col-auto">
                            <p class="mb-1">
                                <?= $data['deliveryDate']; ?>
                            </p>
                        </div>
                    </div>
                    </p>
                </div>

            </div>
        </div>
        
        <div class="row invoice mt-2">
            <div class="col">
                <p class="mb-1 order"> Tracking Number :
                    <?= $data['tracking_no']; ?>
                </p>
                <p class="mb-1 order">Order Date :
                    <?= $data['created_at']; ?>
                </p>

            </div>
        </div>
        <div class="text-center">

        <?php
$exp_date=$data['deliveryDate'];;
// $today_date=date('2017/04/30');
$today_date=date('Y/m/d');

$exp=strtotime($exp_date);
$td=strtotime($today_date);


if($td>=$exp)
{
  $diff=$td-$exp;
  $x=abs(floor($diff / (60 * 60 * 24)));
//   echo "product expired";
//   echo "<br/>DAYS:".$diff;
}
else
{
  $diff=$td-$exp;
  $x=abs(floor($diff / (60 * 60 * 24)));
  if (($data['status'] == 0) || ($data['status'] == 1)){
    if($x>2) {
        echo '<button type="button" display="none" class="btn btn-primary mt-3 w-100" data-bs-toggle="modal" data-bs-target="#modalId"
        >CANCEL ORDER</button>';
    }else {
        echo '<button type="submit" class="btn btn-primary mt-3 w-100" data-bs-toggle="modal" data-bs-target="#cancel">
        CANCEL ORDER </button>';
        echo "<span class='text-danger'>".$x."  days</span>";
    }
}
}
?>
</div>  

        <!-- Modal trigger button -->

        <!-- <button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
            CANCEL ORDER
        </button> -->



    </div>
</div>

<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="cancel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="code.php" method="POST">
                            <div class="screen-body-item">
                                <div class="app-form">
                                <div class="modal-body">
                                    <p>Your order will soon be delivered. If you decide to continue canceling your order, you will only be
                                        refunded 50% of the total amount you order.
                                        <br><br>
                                        <strong class: text-danger>Note:</strong> Cancellation is valid before 3-2 days of the selected
                                        delivery date.
                                    </p>
                                </div>
                                <!-- hidden inputs -->
                                <input name="tracking_no" type="hidden" value="<?=$data['tracking_no'];?>">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                        name="btn_CancelOrder">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cancel Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="code.php" method="POST">
                            <div class="screen-body-item">
                                <div class="app-form">
                                    <div class="modal-body">
                                        ARE YOU SURE YOU WANT TO CONTINUE?
                                    </div>
                                        <!-- hidden inputs -->
                                    <input name="tracking_no" type="hidden" value="<?=$data['tracking_no'];?>">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit"  class="btn btn-primary"
                                        name="btn_CancelOrder">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



<?php include('includes/footer.php'); ?>

<Script>
    success:function(data){
            $("#value10").html(data.price);
            $("#total").html(data.newtotal);
            $("#toohigh").html(data.toohigh);
            if(data.toohigh == '1') {
                $("#subbut").attr('disabled', 'disabled');
            } else if(data.toohigh == '0'){
                $("#subbut").attr('disabled', 'disabled');
            }
        }
</Script>