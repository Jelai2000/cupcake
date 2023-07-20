<?php

include('functions/userfunctions.php');
// include('functions/myfunctions.php');
include('includes/header.php');
include('authentication.php');

?>
<style>
    body{
        background-color:#affce5;
    }
</style>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end">

            <a href="orderReceived.php" type="button" class="btn rounded shadow" style="border: 1px solid white; border-bottom: 3px solid white;background-color:#00ffb3 ;">Order Received</a>
            <a href="customizedOrder.php" type="button" class="btn rounded shadow" style="border: 1px solid white; border-bottom: 3px solid white;background-color:#00ffb3 ;margin-left: 30px">Customized Order</a>
            <a href="orderCancelled.php" type="button" class="btn rounded shadow" style="border: 1px solid white; border-bottom: 3px solid white;background-color:#00ffb3 ; margin-left: 30px">Cancelled Order</a>
        </div>      
        <div class="col-md-12 d-flex justify-content-end">
            <h5 class="me-auto p-3 display-1 text-center"
                style="font-weight: 500; font-family: fantasy; color: #4a4a4a; text-shadow: 5px 8px 3px #00ffb3; ">
                ORDERS</h5>
           
        </div>
    </div>
</div>


<div class="container">

    <div class="row">
        <?php
        $orders = getOrders();

        if (mysqli_num_rows($orders) > 0) {
            foreach ($orders as $item) {
                ?>
                <div class="col-md-3">
                    <section class="page-contain mb-5">
                        <a href="view-order-cancel.php?t=<?= $item['tracking_no']; ?>" class="data-card">
                            <h3 style="font-size: 25px">Order#
                                <?= $item['id']; ?>
                            </h3>
                            <h6 cl>Tracking No.
                                <?= $item['tracking_no']; ?>
                            </h6>
                            <p>
                                <?= $item['name']; ?>
                            </p>

                            <span class="link-text">
                                View Details
                                <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z"
                                        fill="rgb(255, 127, 148)" />
                                </svg>
                            </span>
                        </a>


                    </section>
                </div>
                <?php
            }
        } else {
            ?>
                        <div class="container text-center">
                                    <h5 class="fw-bold bg-danger text-light p-3">No cancelled order</h5>
                            </div>

        <?php
        }
        ?>
    </div>

</div>
<?php include('includes/footer.php') ?>