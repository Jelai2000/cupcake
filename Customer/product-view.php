<?php

include('functions/userfunctions.php');
include('includes/header.php');

// $page_title = "Categories";
if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
        ?>

        <style>
            body {
                background-color: #fedce3 !important;
            }
        </style>

        <div class="py-4 m-5 me-auto ms-auto" style="">
            <div class="container product_data " style=" border-radius: 20px; background-color:#ffb5c4; box-shadow: 3px 3px 20px #b6455c,
         -3px -3px 3px white;">
                <div class="row ">
                    <div class="col-sm-5 ">
                        <div class="mt-5">
                            <img src="uploads/<?= $product['image']; ?>" class="w-100 " alt="Product Image">
                        </div>
                    </div>
                    <div class="col-sm-7 p-5" style="    ">
                        <h6 class="fw-bold">
                            <span class="float-end text-danger" style="background-color: rgb(118, 246, 255)">
                                <?php if ($product['trending']) {
                                    echo "Trending";
                                } ?>
                            </span>
                        </h6>

                        <h1
                            style="color: #b9edfc;  text-shadow: 5px 8px 3px #025066; font-size: 60px; font-family: fantasy; letter-spacing: 6px; text-transform: uppercase">
                            <?= $product['name']; ?>
                        </h1>

                        <p class="text-center" style="font-size: 14px; color: white; background-color: black">
                            <?= $product['small_description']; ?>
                        </p>
                        <hr>
                        <p>
                            <?= $product['description']; ?>
                        </p>
                        
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>
                                        <span class="text-danger fw-bold">
                                            <s class="text-muted fs-6">₱
                                                <?= $product['original_price']; ?>
                                            </s> ₱
                                            <?= $product['selling_price']; ?>
                                        </span>
                                    </h4>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width: 125px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted float-end" style="font-size: 13px">
                            <!-- QTY of sold -->
                        </p>
                    
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn px-4 addToCartBtn shadow float-end   "
                                    style=" border-radius: 20px; border: 2px solid #e6a2b0; background-color:white; "
                                    value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to
                                    Cart</button>
                            </div>
                            <div class="col-md-6">
                                <!-- <button class="btn px-4 shadow"
                                    style=" border-radius: 20px; border: 2px solid #e6a2b0; background-color:white; "><i
                                        class="fa fa-heart me-2"></i>BAGUHIN MO</button> -->
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>


        <?php

    } else {
        echo "Product Not Found";
    }
} else {
    echo "Something went wrong";
}


include('recommededCake.php');
include('includes/footer.php');
// 
?>