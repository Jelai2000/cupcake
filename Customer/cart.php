<?php

include('functions/userfunctions.php');
include('includes/header.php');
include('authentication.php');

?>


<!-- 
<div class="py-3 bg-primary">
  <div class="container">
    <h5 class="text-white">
      <a class="text-white" href="index.php">Home</a>/<a class="text-white" href="cart.php">Cart</a>
    </h5>
  </div>
</div> -->
<style>
  body{
    background-color: whitesmoke
  }
</style>
<div class="container my-4">
  <h1 class="display-3 mb-4" style="font-weight: 500; font-family: fantasy; color: black; text-shadow: 5px 8px 3px white; ">SHOPPING CART</h1>
  
  <div class="card">


    <div>
      <div class="row">
        <div class="col-md-12 mb-5">
          <div id="mycart">
            <?php $item = getCartItems();

            if (mysqli_num_rows($item) > 0) {
              ?>
              <div class="row px-5 align-items-center mt-3 p-1 bg-warning rounded">
                
                <div class="col-md-5 ">

                  <h6 class="fw-bold ">
                    Product
                  </h6>
                  <!-- <?php echo $_SESSION["id"]; ?><br> -->


                </div>
                <div class="col-md-3">
                  <h6 class="fw-bold">Price</h6>
                </div>
                <div class="col-md-2">
                  <h6 class="fw-bold">Quantity</h6>
                </div>
                <div class="col-md-2">
                  <h6 class="fw-bold ">Remove</h6>
                </div>
              </div>

              <div id="">
                <?php

                foreach ($item as $citem) {
                  ?>
                  <div class="product_data  mb-3 px-5" style="background-color: antiquewhite">
                    <hr>
                    <div class="row align-items-center">
                      <div class="col-md-2">
                        <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px">
                      </div>
                      <div class="col-md-3">
                        <h5>
                          <?= $citem['name'] ?>
                        </h5>
                      </div>
                      <div class="col-md-3">
                        <h5>₱
                          <?= $citem['selling_price'] ?>
                        </h5>
                      </div>
                      <div class="col-md-2">
                        <input type="hidden" class="prodID" value="<?= $citem['prod_id'] ?>">
                        <div class="input-group mb-3" style="width: 125px">
                          <button class="input-group-text decrement-btn updateQty">-</button>
                          <input type="text" class="form-control text-center input-qty bg-white"
                            value="<?= $citem['prod_qty'] ?>" disabled>
                          <button class="input-group-text increment-btn updateQty">+</button>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button class="btn btn-danger btn-sm deleteItem " value="<?= $citem['cid'] ?>">
                          <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                      </div>
                    </div>
                    <hr>
                  </div>
                  <?php
                }

                ?>
              </div>
              <!-- <div class="float-end">
                <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
              </div> -->
            </div>
            <div class="container mt-2 d-flex justify-content-end">
  <div class="row ">
    <div class="col-md-12 ">
     
      <?php $item = getCartItems();
      $subtotal = 0;
      $shippingFee = 100;
      $totalPrice = 0;
      foreach ($item as $citem) {
        ?>
        <!-- <div class="card product_data shadow-sm mb-3">
                        <div class="row align-items-center">
                          <p>SHIPPING</p>
                          <select>
                            <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                          </select>




                        </div>
                      </div> -->
        <?php

        $subtotal += $citem['selling_price'] * $citem['prod_qty'];
        $totalPrice =  $subtotal + $shippingFee;

      }
      ?>

      <h6 float-end>Subtotal: <span class="float-end fw-bold">₱ 
          <?= $subtotal ?>
        </span></h6>
      <h6>Shipping Fee: <span class="float-end fw-bold">₱ 
          <?= $shippingFee ?>
        </span></h6><hr>
      <h5 class="fw-bold text-danger">Total Price:<span class="float-end fw-bold"> ₱ 
          <?= $totalPrice ?>
        </span></h5>
      <div class="mt-3">
        <input type="hidden" name="payment_mode" value="COD">
        <a href="checkout.php" class="btn btn-warning text-dark">Proceed to checkout</a>
      </div>
    </div>
  </div>
</div>
            <?php
            } else {
              ?>
            <div class="card card-body text-center">
              <h4 class="py-3">Your cart is empty</h4>
            </div>
            <?php
            }
            ?>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include('includes/footer.php'); ?>