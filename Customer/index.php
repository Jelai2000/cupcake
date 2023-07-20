<?php

// session_start();
// include('authentication.php');
// require('fun.php');

include('functions/userfunctions.php');
include('includes/header.php');
// include('includes/slider.php');



// $select = new select();

// if (!empty($_SESSION["id"])) {
//   $user = $select->selectUserById($_SESSION["id"]);
// } else {
//   // header("Location: login.php");
//   // $user =$select->selectUserById($_SESSION[]);
// }

?>


<style>
  body {
    background-image: linear-gradient(white, #ff79c6, #ff79c6);
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <img src="assets/images/cupcakelogo.png"
        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
    </div>
    <div class="col-md-6 text-center pt-5">
      <h5 class="fs-1 fw-normal">Sweetly Simple,<br> Delightfully Customized:<br> Order Your Perfect Treat Online!</h5>
      <p>What are you waiting for, order now.</p>
      <button class="col btn btn-purple-moon btn-rounded"><a href="cake-customizer" class="text-white">Customize Now</a></button>
    </div>
  </div>
</div>
<section id="second" class="red" style="margin-bottom: -150px">
  <svg class="separator" width="100%" height="120" viewBox="0.1 0.1 180 40" preserveAspectRatio="none">
    <g transform="translate(-18.298844,-77.973964)">
      <path style="fill:rgb(99, 234, 241);"
        d="M 31.615583,86.351641 H 192.16499 v 26.901969 c 0,0 -32.03411,-14.237983 -59.62682,-12.72484 -22.34188,1.2252 -54.779359,9.72634 -54.779359,9.72634 0,0 -22.029534,3.62882 -34.471238,-1.88988 -12.441702,-5.51871 -11.67199,-22.013589 -11.67199,-22.013589 z" />
      <path style="fill:#fdd4eb;"
        d="M 18.441597,78.106256 H 198.58126 v 39.288614 c 0,0 -43.10672,-27.825245 -73.47599,-19.687823 -30.369264,8.137423 -46.832208,12.548653 -46.832208,12.548653 0,0 -32.775418,8.05972 -46.735258,0 C 17.577964,102.19598 18.441597,78.106256 18.441597,78.106256 Z" />
    </g>
  </svg>

</section>



<!-- TRENDING CAKES -->

<div class="pt-5">
  <div class="container-fluid" style="background-color:#b9edfc; ">
    <div class="row">
      <div class="col-md-12 p-5" style="margin-top: 100px">
        <h4 class="display-4 fw-bold" style="color:#4A4A4A">Best Seller</h4>
        <div class="underline mb-3"></div>
        <div class="owl-carousel owl-theme">
          <?php
          $trendingProducts = getAllTrending();
          if (mysqli_num_rows($trendingProducts) > 0) {
            foreach ($trendingProducts as $item) {
              ?>
              <div class="item">
                <a href="product-view.php?product=<?= $item['slug']; ?> ">
                  <div class="card" style="background-color: transparent; border: 0px solid transparent">
                    <div class="card-body shadow"
                      style="background-image: url('assets/images/bg-trend.png'); border-radius: 20px; background-repeat: no-repeat; background-size: cover;">
                      <p class=" fw-bold" style="color: red;">₱
                        <?= $item['selling_price']; ?>
                      </p>
                      <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">

                    </div>

                    <h6 class="text-center text-white p-3 mt-3  fw-bold p-2"
                      style="background-color: #4A4A4A; border-radius: 10px; border: 2px solid pink; border-bottom: 5px solid pink; color:#4A4A4A">
                      <?= $item['name']; ?>
                    </h6>

                  </div>
                </a>
              </div>

              <?php
            }
          }
          ?>

        </div>
        <div class="container d-flex justify-content-center" style="margin-top: 80px; ">
          <button type="button" class=" btn btn-purple-moon" style="border-radius: 20px; padding: 10px 50px; "><a
              href="cake.php" style="text-decoration: none; color: white;"> View All </a></button>
        </div>
      </div>

    </div>
  </div>
</div>
<!--END TRENDING CAKES -->

<!-- STEPS HOW TO ORDER -->
<div class="p-5" style="background-color: white">
<?php include('steps.php')?>
</div>
<!-- END STEPS HOW TO ORDER -->

<!-- PRODUCTS -->
<div class="" style="background-color: #f7f4b4">
  <?php include('cat.php') ?>
</div>
<!-- END OF PRODUCTS -->

<!-- FOOTER -->









<div
  style="background-image: url('assets/images/footer-bg.png'); background-size: cover; background-repeat: no-repeat; background-color: #fce4bd !important;">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <img src="assets/images/cupcakelogo.png" alt="" width="150px">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam quae explicabo ut suscipit veniam
          tenetur maxime corrupti deserunt! Odit rerum dicta praesentium! Quaerat ipsum incidunt quod, consequatur
          ratione quibusdam. Ipsa!</p>

        <ul id="ul" class="mt-5">
          <li id="li"><a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer"><i
                class="fab fa-facebook" aria-hidden="true"></i></a></li>
          <li id="li"><a href="https://www.twitter.com/" target="_blank" rel="noopener noreferrer"><i
                class="fab fa-twitter" aria-hidden="true"></i></a></li>
          <li id="li"><a href="https://www.gmail.com/" target="_blank" rel="noopener noreferrer"><i
                class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
          <li id="li"><a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"><i
                class="fab fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </div>
      <div class="col-sm-2 mt-5 lh-lg">
        <h4>Cupcake</h4>
        <ul>
          <li><a href="index.php" type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#"><i
                class="fa fa-home" aria-hidden="true"></i> Home</a>
          </li>
          <li><a href="cake.php" class="text-dark"><i class="fa fa-birthday-cake" aria-hidden="true"></i> Cakes</a></li>
          <li><a href="categories.php" class="text-dark"><i class="fa fa-list" aria-hidden="true"></i> Categories</a>
          </li>
          <li><a href="cart.php" class="text-dark"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Basket</a>
          </li>
          <li><a href="my-orders.php" class="text-dark"><i class="fa fa-shopping-bag" aria-hidden="true"></i> My
              Order</a></li>
        </ul>
      </div>
      <div class="col-sm-2 mt-5 lh-lg">
        <h4>Help</h4>
        <ul>
          <li><a href="" type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#FAQModal">
            <i class="fa fa-question-circle-o" aria-hidden="true"></i> FAQ</a></li>
          <li><a href="" type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#tc">
            <i class="fa fa-list-alt" aria-hidden="true"></i> Terms and Conditions</a>
          </li>
          <li><a href="" type="button" class="text-dark" data-bs-toggle="modal" data-bs-target="#PrivacyModal"><i
                class="fa fa-lock" aria-hidden="true"></i> Privacy Policy</a>
          </li>
        </ul>
      </div>
      <div class="col-md-5 mt-5 lh-lg">
        <h4>Address</h4>
        <p><i class="fa fa-address-book-o" aria-hidden="true"></i> PUP Main -A. Mabini Campus, Sta. Mesa, Manila</p>
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

<!-- TERMS AND CONDITONS -->
<!-- Modal trigger button -->


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="tc" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">Terms and Conditions</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
<iframe src="includes/Terms and Conditions.pdf"  class="w-100" height="800" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
  <p>Your browser does not support iframes.</p>
</iframe>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button> -->
        <!-- <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked" required>
    I have read and Understand
  </label>
</div> -->
      </div>
    </div>
  </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
  const myModal = new bootstrap.Modal(document.getElementById('tc'), options)

</script>

<!-- END TERMS AND CONDITONS -->










<!-- END FOOTER -->

<!-- Modal for PRIVACY -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="PrivacyModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
  aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="modalTitleId" style="color: red">Privacy Policy</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
        <div class="container ">
          <div class="my-4 mb-5" style="font-size: 15px ">
            <p class="whitespace-pre-line">CUPCAKE, also referred to as "We," "Our," or the "Business," is dedicated to
              safeguarding the privacy of your personal information. We recognize our obligations as a "personal
              information
              controller" under the <mark>Data Privacy Act 2012 (Republic Act No. 10173)</mark>.<br>
            </p>
            <p class="whitespace-pre-line">
              This website does not collect any personal information from you; you can browse it without providing any
              personal details.
              However, in the future, we may passively collect non-personally identifiable information to enhance your
              browsing experience. We will discuss the details of the information we collect and our policies regarding
              its
              collection and storage below. You need to understand how we handle and protect your non-personally
              identifiable information.</p>
            <p class="whitespace-pre-line">
              These privacy policy terms apply to all website users and the Business's relevant activities. If the
              Business
              introduces other online initiatives that involve processing personal information or require a different
              approach to handling your data, a more specific privacy policy may be formulated for those initiatives.
            </p>
            <p class="whitespace-pre-line">
              If you disagree with the terms of this Privacy Policy, we recommend that you discontinue using this
              website.
              By continuing to use this website, you acknowledge and accept the terms outlined in this Privacy Policy.
            </p>
          </div>

          <div class="rounded bg-light shadow p-4 mb-5">
            <h4 class="mb-2 font-semibold">What We Collect</h4>
            <p class="whitespace-pre-line" style="font-size: 14px">Currently, we do not gather any non-personally
              identifiable information.
              However, there may be occasions in the future when we collect such information to enhance your browsing
              experience. If we decide to collect non-personally identifiable information, we will explicitly state it
              on
              this website.</p>
          </div>
          <div class="rounded bg-light shadow p-4 mb-5">
            <h4 class="mb-2 font-semibold">Cookies</h4>
            <p class="whitespace-pre-line" style="font-size: 14px">Currently, we do not gather any cookies. However, in
              the future, our website
              might utilize or install cookies to enhance your personalized experience during each visit. If we decide
              to
              use cookies, we will clearly state this on our website.</p>
          </div>
          <div class="rounded bg-light shadow p-4 mb-5">
            <h4 class="mb-2 font-semibold">Security, Storage, and Disposal</h4>
            <p class="whitespace-pre-line" style="font-size: 14px">We are dedicated to ensuring the security of your
              non-personally identifiable
              information.
              If we collect such information in the future, we employ various secure physical, electronic,
              and managerial measures to prevent unauthorized access, use, or disclosure of your data. Your information
              will be stored and processed in a secure internal database exclusively maintained and controlled by the
              Company. Access to the database is limited to the Company's affiliates, subsidiaries, and authorized
              agents.
              <br><br>
              If we collect non-personally identifiable information, we only retain it for as long as necessary to
              fulfill
              the purposes outlined in this Privacy Policy. Generally, we do not store this information for more than
              ten
              years after the stated objectives have been fulfilled. After this period, in compliance with relevant data
              privacy laws, regulations, and company guidelines, the non-personally identifiable information will be
              disposed of appropriately.
            </p>
          </div>
          <div class="rounded bg-light shadow p-4 mb-5">
            <h4 class="mb-2 font-semibold">Links to Other Websites</h4>
            <p class="whitespace-pre-line" style="font-size: 14px">
              Please be aware that our website may include links to other websites that interest you. It is important to
              note that we do not have control over the content of these external websites. Once you click on these
              links
              and leave our website, you acknowledge that the Business cannot be held accountable for the protection and
              privacy of any information you provide on those external websites. We strongly advise you to exercise
              caution and review the privacy notices and policies of the other websites you visit.</p>
          </div>
          <div class="rounded bg-light shadow p-4 mb-5">
            <h4 class="mb-2 font-semibold">Updating of the Privacy Policy</h4>
            <p class="whitespace-pre-line" style="font-size: 14px">Occasionally, we may make updates or revisions to
              this Privacy Policy. The
              most
              recent version of the policy can be identified by checking the date specified in the "Last Updated"
              section
              of this Privacy Policy. </p>
          </div>
          <div class="rounded bg-light shadow p-4 mb-5">
            <h4 class="mb-2 font-semibold">Inquiries</h4>
            <p class="whitespace-pre-line" style="font-size: 14px">If you have any questions regarding this Privacy
              Policy, or our use of your information, please contact us through:<br><br>

              Customer Service - CUPCAKE<br>
              cupcakesysinfo@gmail.com<br>
              Caloocan, Metro Manila, Philippines</p>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">AGREE</button>

      </div>
    </div>
  </div>
</div>

<script>
  const myModal = new bootstrap.Modal(document.getElementById('PrivacyModal'), options)

</script>
<!--END of Modal for PRIVACY -->


<!-- FAQ -->
<div class="modal fade" id="FAQModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
  aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-1" id="modalTitleId" style="font-family: fantasy;  letter-spacing: 3px; color: red">FREQUENTLY ASK QUESTIONS ( FAQ )</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-5">
        <div class="container dropdownFAQ">

          <!-- 1ST -->
          <div class="dropdown FAQ">
            <div class="select">
              <span>1. How can I place an order online for a personalized cake?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <!-- <input type="hidden" name="gender"> -->
            <ul class="dropdown-menu">
             Online ordering for personalized cakes is not available at the moment. We apologize for the
                inconvenience.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- end 1ST -->

        <!-- 2nd -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>2. What customization options are available for cakes?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
             Customization options are currently not available. We apologize for the inconvenience.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- end 2nd -->
        <!-- 3RD -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>3. Can I choose the flavor and size of the cake?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
            Yes, you can choose your desired flavor and size of the cake.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 3RD -->
        <!-- 4TH -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>4. Is there a minimum order quantity for personalized cakes?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
            There is no minimum order quantity for personalized cakes.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 4TH -->
        <!-- 5TH -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>5. How far in advance should I place my order?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
             You should place your order three (3) days before your desired schedule of delivery or order
                pick-up. Rush orders will be charged an additional 10% fee.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 5TH -->
        <!--6TH -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>6. Can I add a personalized message or image to the cake?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
             Adding personalized messages or images to the cake depends on the current features
                available. Please check with our customer support for more information.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 6TH -->
        <!--7 -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>7. Is there a limit on the number of characters for the message on the cake?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
             The character limit for the message on the cake depends on the current features available.
                Please check with our customer support for more information.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 7TH -->
        <!--8TH -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>8. Can I choose the color scheme or theme for the cake design?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
         Yes, you can choose your desired color scheme or theme for the cake design.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 8TH -->
        <!--9TH -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>9. What are the payment options available for online orders?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
          The only payment option available for online orders is Gcash. To process your order, a down payment of
                50% of the total amount must be made.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 9TH -->
        <!--10TH -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>10. Is it possible to include specific dietary requirements, such as gluten-free or vegan
                options?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
           Yes, you can include or request specific dietary requirements, such as gluten-free, vegan options, and
                other requests. Please mention your requirements during the order placement.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 10TH -->
        <!--11TH -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>11. Can I request specific decorations or cake toppers?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
            The availability of requesting specific decorations or cake toppers depends on the current features.
                Please check with our customer support for more information.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 11TH -->
        <!--12TH -->
        <div class="container dropdownFAQ">


          <div class="dropdown FAQ">
            <div class="select">
              <span>12. What is the estimated delivery or pickup time for personalized cakes?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
          The estimated delivery time for North Caloocan is approximately one (1) hour, while outside North
                Caloocan is around two (2) to three (3) hours. For pick-up, cakes can be collected between 10:00 AM and
                03:00 PM ONLY.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!-- END 12TH -->





        <!--13TH -->
        <div class="container dropdownFAQ">
          <div class="dropdown FAQ">
            <div class="select">
              <span>13. Is there a delivery fee, and what are the delivery areas covered?</span>
              <i class="fa fa-chevron-left"></i>
            </div>
            <input type="hidden" name="gender">
            <ul class="dropdown-menu">
             Yes, the delivery fee may vary depending on the courier. We recommend using Grab Car as the courier
                for
                Tier Cakes. For small and other sweets, motorcycle delivery can be arranged. The delivery areas covered
                depend on the courier's service coverage.

            </ul>
          </div>

          <span class="msg"></span>
        </div>
        <!--END 13TH -->
        <!--14TH -->
        <div class="container dropdownFAQ">
        <div class="dropdown FAQ">
          <div class="select">
            <span>14. How do I make changes or cancel my order after it has been placed?</span>
            <i class="fa fa-chevron-left"></i>
          </div>
          <input type="hidden" name="gender">
          <ul class="dropdown-menu">
         Cancellation of orders is prohibited once a down payment has been made. However, you can cancel or drop
              your orders before checking out or before paying your down payment.

          </ul>
        </div>

        <span class="msg"></span>
      </div>
      <!--END 14TH -->

      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div> -->
    </div>
  </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
  const myModal = new bootstrap.Modal(document.getElementById('FAQModal'), options)

</script>


<script>
  /*Dropdown Menu*/
  $('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').slideToggle(300);
  });
  $('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu').slideUp(300);
  });
  $('.dropdown .dropdown-menu li').click(function () {
    $(this).parents('.dropdown').find('span').text($(this).text());
    $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
  });
  /*End Dropdown Menu*/


  $('.dropdown-menu li').click(function () {
    var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
      msg = '<span class="msg">Hidden input value: ';
    $('.msg').html(msg + input + '</span>');
  }); 
</script>
<!-- END FAQ -->












































<?php include('includes/footer.php'); ?>

<script>
  $(document).ready(function () {
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 1500,
      autoplayHoverPause: true,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })
  });
  </script>

