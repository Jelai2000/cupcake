<?php 
session_start();
// $page_title = "Registration Form";
include('includes/header.php');?>

<!-- <style>
  body{
   background-color:#b9edfc; 
  }
</style> -->
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100 ">
      <div class="row d-flex justify-content-center align-items-center h-100">
      
<div class="container mb-5" >
        <div class="row">
          <div class="col-md-6">
            <img src="assets/images/formlogo.png" alt="">
          </div>
          <div class="col-md-6">
            <div class="wrapper mt-0" style="max-width: 900px ;">
              <div class="logo">
              <img src="assets/images/logosirkol3.png"
                  alt="">
              </div>
              <div class="text-center mt-4 name">
                SIGN UP
              </div>
              <form action="registerVerification.php" method="POST" class="p-3 mt-3">
                <div class="form-field d-flex align-items-center">
                  <span class="far fa-user-circle"></span>
                  <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-field d-flex align-items-center">
                  <span class="fa fa-phone"></span>
                  <input type="text" name="phone" class="form-control" placeholder="+63">
                </div>
                <div class="form-field d-flex align-items-center">
                  <span class="far fa-envelope"></span>
                  <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                </div>
                
                <div class="form-field d-flex align-items-center">
                  <span class="fas fa-key"></span>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-field d-flex align-items-center">
                  <span class="fas fa-check"></span>
                  <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
                </div>
                <br>
                <button type="submit" value="Submit" name="btn_register" class="btn">Sign Up</button>
              </form>
              <div class="text-center fs-6">
              <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>
  
<?php include('includes/footer.php');?>
