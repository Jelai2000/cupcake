<?php

include('functions/userfunctions.php');
include('includes/header.php');
?>
<div class="container mt-5" style="    background-color: white;">
<div class="row">
    <span class="fw-bold p-3 fs-1" style="background-color: #b9edfc;" >CHOOSE CAKE YOU WANT TO CUSTOMIZE<span>
    <!-- <button class="btn btn-primary float-end lh-lg mt-1">CUSTOMIZE NOW!</button>  -->
    <a name="" id="" class="btn btn-primary float-end lh-lg mt-1" href="cake.php" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
</span></span> 
    
  
</div>
    

    



        <div class="card-body mt-5">
            <div class="row">
                <?php
                $customize = getCustomizeProduct();

                if (mysqli_num_rows($customize) > 0) {
                    foreach ($customize as $item) {
                        ?>
                        <div class="col-md-4 col-sm-6 ">
                            <div class="product-grid shadow  bg-light">
                                <div class="product-image">
                                    <a href="product-view.php?product=<?= $item['slug']; ?>">
                                        <img class="pic-1" src="uploads/<?= $item['image']; ?>" alt="Category Image"
                                            class="w-100">
                                    </a>
                                    <!-- <span class="product-discount-label">-33%</span> -->
                                    <ul class="product-links">
                                        <li><a href="#" data-tip="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                        <li><a href="#" data-tip="Customize"><i class="fa fa-edit"></i></a></li>
                                        <!-- <li><a href="product-view.php" data-tip="Quick View"><i class="fa fa-expand"></i></a></li> -->
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <ul class="rating">
                                        <li class="fas fa-star"></li>
                                        <li class="fas fa-star"></li>
                                        <li class="fas fa-star"></li>
                                        <li class="far fa-star"></li>
                                        <li class="far fa-star"></li>
                                    </ul>
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
<?php
include('includes/footer.php');

?>