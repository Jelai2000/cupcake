<?php

include('functions/userfunctions.php');
include('includes/header.php');
?>
<style>
    body {
        background-color: #b9edfc;
    }

    .display-1,
    .customize {
        color: #78dffc;
        text-shadow: 10px 5px 3px #0082a7;

    }
</style>

<div class="container my-5">
    <div class="row">
        <span class="p-3 display-1 text-center" style="font-weight: 500; font-family: fantasy; ">CUPCAKE Menu
        </span>
       
    </div>
    <div class="card-body mt-5">
        <div class="row">
            <?php
            $allPRoducts = getActiveProduct();

            if (mysqli_num_rows($allPRoducts) > 0) {
                foreach ($allPRoducts as $item) {
                    ?>
                    <div class="col-md-4 col-sm-6 ">
                        <div class="product-grid shadow  bg-light mb-5">
                            <div class="product-image">
                                <a href="product-view.php?product=<?= $item['slug']; ?>">
                                    <img class="pic-1" src="uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100">
                                </a>
                                <!-- <span class="product-discount-label">-33%</span> -->
                               
                            </div>
                            <div class="product-content">
                               
                                <h3 class="title">
                                    <?= $item['name']; ?>
                                </h3>
                                <div class="price"><span>₱
                                        <?= $item['original_price']; ?>
                                    </span> ₱
                                    <?= $item['selling_price']; ?>
                                </div>
                                <a href="product-view.php?product=<?= $item['slug']; ?>" frole="button" class="add-to-cart">
                                    View Details</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No Product Available";
            }
            ?>
        </div>
    </div>
</div>

<!-- STEPS HOW TO CUSTOMIZE ORDER -->
<div class="p-5" style="background-color: white">
<?php include('steps-custom.php')?>

<div class="d-flex justify-content-center mt-5">
            <a class="btn lh-lg mt-4 shadow shadow-primary shadow-intensity-lg px-5 fs-4" href="cake-customizer"
                role="button" style=" background-color: #ff6f6a; border-radius: 20px; color:white">CUSTOMIZE NOW!</a>
</div>
</div>
<!-- END STEPS HOW TO CUSTOMIZE ORDER -->





<!-- FOOTER -->

<div style=" background-color: #feb2af !important; ">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="assets/images/cupcakelogo.png" alt="" width="150px">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quae explicabo ut suscipit veniam
          tenetur maxime corrupti deserunt! Odit rerum dicta praesentium! Quaerat ipsum incidunt quod, consequatur
          ratione quibusdam. Ipsa!</p>

        <ul id="ul" class="mt-5">
          <li id="li"><a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
          <li id="li"><a href="https://www.twitter.com/" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
          <li id="li"><a href="https://www.gmail.com/" target="_blank" rel="noopener noreferrer"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
          <li id="li"><a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      <div class="col-sm-2 mt-5 lh-lg">
        <h4>Cupcake</h4>
        <ul>
          <li><a href="index.php" type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
          </li>
          <li><a href="cake.php" class="text-dark"><i class="fa fa-birthday-cake" aria-hidden="true"></i> Cakes</a></li>
          <li><a href="categories.php" class="text-dark"><i class="fa fa-list" aria-hidden="true"></i> Categories</a></li>
          <li><a href="cart.php" class="text-dark"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Basket</a></li>
          <li><a href="my-orders.php" class="text-dark"><i class="fa fa-shopping-bag" aria-hidden="true"></i> My Order</a></li>
        </ul>
      </div>
      <div class="col-md-2 mt-5 lh-lg">
        <h4>Help</h4>
        <ul>
          <li><a href="" type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#FAQModal"><i class="fa fa-question-circle-o" aria-hidden="true"></i> FAQ</a></li>
          <li><a href="" class="text-dark"><i class="fa fa-list-alt" aria-hidden="true"></i> Terms and Conditions</a></li>
          <li><a href="" type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#PrivacyModal"><i class="fa fa-lock" aria-hidden="true"></i> Privacy</a>
          </li>
        </ul>
      </div>
      <div class="col-md-5 mt-5 lh-lg">
        <h4>Address</h4>
        <p><i class="fa fa-address-book-o" aria-hidden="true"></i>  PUP Main -A. Mabini Campus, Sta. Mesa, Manila</p>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19923.079412874915!2d120.35358979016507!3d15.714148997353915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33914d4f31cb943f%3A0x7a4943cd4116f599!2sSan%20Clemente%20Municipal%20Hall!5e0!3m2!1sen!2sph!4v1686641161063!5m2!1sen!2sph"
          class="w-100" height="250" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>

  </div>
</div>

<div class=" bg-danger">
  <div class="text-center">
    <p class="mb-0 text-white">All rights reserved. Copyright @ CUPcake -
      <?= date('Y') ?>
    </p>
  </div>
</div>
<?php
include('includes/footer.php');

?>