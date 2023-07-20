<?php
session_start();
// include('functions/userfunctions.php');
// session_start();
// if (isset($_SESSION['authenticated'])) {
//   $_SESSION['message'] = "You are already logged in";
//   header('Location: index.php');
//   exit(0);
// }

// $page_title = "Login Form";
include('includes/header.php'); ?>
<!-- <style>
  body{
   background-color:#b9edfc; 
  }
</style> -->

<div class="container-fluid " >
  <div class="row ">
    <div class="col-md-12">
      
      <div class="container mb-5" >
        <div class="row">
          <div class="col-md-6">
            <img src="assets/images/formlogo.png" alt="">
          </div>
          <div class="col-md-6" >
            <div class="wrapper mt-0 ">
              <div class="logo">
                <img src="assets/images/logosirkol3.png"
                  alt="">
              </div>
              <div class="text-center mt-4 name">
                LOGIN
              </div>
              <form action="logincode.php" method="POST" class="p-3 mt-3">
                <div class="form-field d-flex align-items-center">
                  <span class="far fa-user"></span>
                  <input type="text" name="usernameemail" class="form-control" placeholder="Username or Email">
                </div>
                <div class="form-field d-flex align-items-center">
                  <span class="fas fa-key"></span>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class=" ">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div><br>
                <button type="submit" name="btn_login" class="btn" >Login</button>
                <!-- style="background-color: #b9edfc" -->
              </form>
              <div class="text-center fs-6">
                <a href="#">Forgot password?</a> or <a href="register.php">Sign up</a>
                
                <p style="font-size: 12px">
       Not Verified?
        <a href="resend_email_verification.php">Verify</a>
      </p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>