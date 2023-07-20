

<nav class="navbar navbar-expand-lg navbar-light" >
  <div class="container-fluid">
  <img src="assets/images/cupcakelogo.png" alt="" width="100px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
        <li class="nav-item" >
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cake.php">Cakes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-orders.php">My Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="customizedOrder.php">Customized Order</a>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" href="surveyform.php"><i class="fa fa-shopping-cart fs-5"></i></a>
        </li> -->
        
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <ul class="navbar-nav  ms-auto mb-2 mb-lg-0" >
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart fs-5"></i></a>
        </li>
        
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user" aria-hidden="true"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="my-orders.php">My orders</a></li>
            <li><a class="dropdown-item" href="customizedOrder.php">Customized Orders</a></li>
            <li><hr class="dropdown-divider"></li>
            <?php if (isset($_SESSION['authenticated'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        <?php endif ?>

            <li>
            <?php if (!isset($_SESSION['authenticated'])): ?>
            <a class="dropdown-item" href="login.php">Login</a></li>
            
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" href="register.php">Register</a>
          </li>
          <?php endif ?>
      </ul>
  
    </div>
  </div>
</nav>


