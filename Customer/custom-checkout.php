<?php

include('functions/userfunctions.php');
include('includes/header.php');
include('authentication.php');


?>



<div class="py-5 ">
    <div class="container  ">

        <div class="card rounded checkout me-auto ms-auto" style="background-color:  rgb(227, 241, 250)">

            <div class="card-body shadow   ">
                <span class="fw-bold">DETAILS</span>
                <button class="btn btn-primary float-end"><a class="text-white" href="cart.php">Back</a></button>
                <br> <br>
                <div class="row">
                    <div class="col-md-8 rounded me-auto pb-5" style="background-color: white"><br>
                        <h5>Basic Details</h5>
                        <hr class="mb-4">
                        <form action="functions/placeCustomOrder.php" method="POST" enctype="multipart/form-data">
                            <div class="container px-5">
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <input type="text" class="form__input" name="name"
                                            placeholder="Enter your full name" class="form control" required>
                                        <label for="" class="fw-bold form__label">Name </label>
                                    </div>
                                    <div class="col-md-6 mt-3">

                                        <input type="email" class="form__input" name="email"
                                            placeholder="Enter your E-mail Address" class="form control" required>
                                        <label for="" class="fw-bold form__label">E-mail &nbsp;&nbsp;&nbsp; </label>
                                    </div>
                                    <div class="col-md-6 mt-3">

                                        <input type="text" class="form__input" name="phone"
                                            placeholder="Enter your Phone Number" class="form control" required>
                                        <label for="" class="fw-bold form__label">Phone </label>
                                    </div>
                                    <div class="col-md-6 mt-3">

                                        <input type="text" class="form__input" name="zipcode"
                                            placeholder="Enter your Pin code" class="form control">
                                        <label for="" class="fw-bold form__label">Zip Code </label required>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <label for="" class="fw-bold">Address</label>
                                        <textarea name="address" class="form control form__input" rows="5" cols="50"
                                            required></textarea>

                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <div class="mt-5">
                                            <h4 class="fw-bold">SELECT DELIVERY DATE:</h4>
                                            <input class="text-center fs-6 rounded shadow text-white" type="date"
                                                name="deliveryDate"
                                                style="background-color:gray; width: 250px; height:35px; border: none; letter-spacing: 3px; "
                                                required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>


                    <div class="col-md-4 rounded ms-auto orderDetails text-white">
                        <br>
                        <h5 class="text-white">Order Details</h5>
                        <hr>
                        <?php $item = getCartItems();
                        // $subtotal = 0;
                        $shippingFee = 100;
                        // $totalPrice = 0;

                        foreach ($item as $citem) {
                            ?>
                            
                            <?php
                            // $subtotal += $citem['selling_price'] * $citem['prod_qty'];
                            // $totalPrice += $citem['selling_price'] * $citem['prod_qty'] + $shippingFee;

                        }
                        ?>
                        <label for="" class="fw-bold text-center">Upload your customized cake</label>
                         <input class="form-control" type="file" name="img_custom" id="customized" required>
                        <br>
                        <!-- <h5 style="font-size: 12px">Subtotal: <span class="float-end fw-bold">₱
                                <?= $subtotal ?>
                            </span></h5> -->
                        <h5 style="font-size: 12px">Shipping Fee: <span class="float-end fw-bold text-danger">₱
                                <?= $shippingFee ?>
                            </span></h5>
                        <hr>
                        <!-- <h6 class="fw-bold ">Total Price: <span class="float-end fw-bold text-success">₱
                                <?= $totalPrice ?>
                            </span></h6> -->

                        <div style="">
                            <!-- <input type="hidden" name="payment_mode" value="COD"> -->

                            <div class="radio">

                                <label>
                                    <input type="radio" name="payment_mode" value="Gcash"/>
                                    <img class="" src="assets/images/GCash-Logo.png" alt="" width="80px">
                                </label>
                            </div>

                            <div id="Gcash" class="show-hide mb-3">
                                <div class="row d-flex">
                                    <div class="col-md-12 text-dark text-center">
                                    <p class="text-dark">Scan the QR Code to Pay</p>
                                        <img class="mx-auto d-block" src="assets/images/qr.png" alt="" width="100px">
                                        <img class="mx-auto d-block" src="assets/images/GCash-Logo.png" alt=""
                                            width="50px">
                                        <p style="font-size: 12px">Juan Dela Cruz<br>
                                            09203843841</p>
                                    </div>
                                    <div class="col-md-12">
                                       
                                        <label for="Gcash" class="form-label fw-bold mt-2 bg-danger rounded p-1">Upload
                                            Receipt</label>
                                        <input class="form-control" type="file" name="img_receipt" id="Gcashf">
                                       
                                    </div>
                                </div>

                            </div>

                            <div class="radio">

                                <label class="mb-2">
                                    <input type="radio" name="payment_mode" value="BPI" />
                                    <img class="" src="assets/images/bpi.png" alt="" width="50px">
                                </label>
                            </div>

                            <div id="BPI" class="show-hide mb-3">
                                <div class="row d-flex">
                                    <div class="col-md-12">
                                        <h6><strong>Account Name:</strong> Juan Dela Cruz</h6>
                                        <h6><strong>Account Number:</strong> 26549874560</h6>
                                    </div>
                                    <div class="col-md-12 text-dark">
                                        <!-- <p>Proof of Payment</p> -->
                                        <label for="MOPbpi" class="form-label fw-bold mt-2 bg-danger rounded p-1 text-light">Upload
                                            Receipt</label>
                                        <input class="form-control" type="file" name="img_receipt" id="MOPbpif">
                                        
                                    </div>
                                </div>

                            </div>

                            <div class="radio">

                                <label>
                                    <input type="radio" name="payment_mode" value="BDO" />
                                    <img style="margin-left: 5px" src="assets/images/BDO.png" alt="" width="40px">
                                </label>
                            </div>

                            <div id="BDO" class="show-hide mb-3">
                                <div class="row d-flex">
                                    <div class="col-md-12">
                                        <h6><strong>Account Name:</strong> Juan Dela Cruz</h6>
                                        <h6><strong>Account Number:</strong> 26549874560</h6>
                                    </div>
                                    <div class="col-md-12 text-dark">
                                        <!-- <p>Proof of Payment</p> -->
                                        <label for="MOPbdo" class="form-label fw-bold mt-2 bg-danger rounded p-1 text-light">Upload
                                            Receipt</label>
                                        <input class="form-control" type="file" name="img_receipt" id="MOPbdof">
                                    </div>
                                </div>

                            </div>





                            <!-- <button type="submit" name="btn_placeOrder" class="btn btn-primary w-100 ">Place
                                Order</button> -->
                            <button type="button" class="btn btn-primary btn-lg w-100" data-bs-toggle="modal"
                                data-bs-target="#placeOrder">
                                Place Order
                            </button>

                            <!-- Modal Place Order button -->

                            <div class="modal fade" id="placeOrder" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold" id="modalTitleId">Are you sure you want to
                                                continue?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body  text-dark">
                                            <p><strong class="text-danger">Refund: </strong>If you choose to cancel your order once the cake is processed, you will only be refunded 50% of your payment.
                                                <br><br>
                                                <strong class="text-danger">Reminder: </strong>To proceed in processing
                                                your order, pay 100% of the total amount order. Don't forget to upload
                                                your receipt before submitting your order. Your order will be canceled
                                                if there is no receipt attached.
                                                <br><br>
                                
                                                <strong class="text-danger">Note: </strong>Place your order at least
                                                five (5) days before your expected delivery time.
                                            </p>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" name="btn_placeOrder"
                                                class="btn btn-primary" name="btn_placeOrderCustom">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Optional: Place to the bottom of scripts -->
                            <script>
                                const myModal = new bootstrap.Modal(document.getElementById('placeOrder'), options)

                            </script>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>






<?php include('includes/footer.php'); ?>