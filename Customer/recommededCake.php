
<div class="container" style="margin-top: 200px">
    <h1 class="text-center fw-bold">Recommended Cakes</h1>
    



        <div class="card-body mt-5">
            <div class="row">
                <?php
                $allPRoducts = getActiveProduct();

                if (mysqli_num_rows($allPRoducts) > 0) {
                    foreach ($allPRoducts as $item) {
                        ?>
                        <div class="col-md-3 col-sm-6 ">
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
