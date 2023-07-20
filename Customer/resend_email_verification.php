<?php
session_start();
// $page_title = "Login Form";
// include('functions/userfunctions.php');
include('includes/header.php');


?>

<!-- style="background-image: url('assets/images/basta.png'); background-repeat: no-repeat" -->

<div class="container-fluid " >
  <div class="row ">
    <div class="col-md-12">

      <div class="container mb-5">
        <div class="row">
          <div class="col-md-6">
            <img src="assets/images/formlogo.png" alt="">
          </div>
          <div class="col-md-6">
            <div class="wrapper mt-0 ">
              <div class="logo">
                <img src="assets/images/logosirkol3.png"
                  alt="">
              </div>
              <div class="text-center mt-4 name">
                VERIFY EMAIL
              </div>
              <form action="resendcode.php" method="POST" class="p-3 mt-3">
                <div class="form-field d-flex align-items-center">
                  <span class="far fa-user"></span>
                  <input type="email" name="email" class="form-control" placeholder="Email Address">
                </div>

                <button type="submit" name="btn_resendEmail" class="btn mt-5">Resend Email</button>
              </form>

              <div class="text-center text-muted mt-5" style="font-size:13px">
                <p class="text-center text-muted mb-0" style="font-size:13px">Create an account? <a
                    href="register.php">Sign up</a></p>
                <p class="text-center text-muted mb-0" style="font-size:13px">Already have a verified account? <a
                    href="login.php" class="">Login here</a></p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>
<?php include('includes/footer.php')?>