<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
        <!-- Button trigger modal -->
        <h5>Category </h5>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#category">
            Add Category
        </button>

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#products">
            Add Product
        </button>

        <!-- Modal -->
        <div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="category" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="functions.php" method="POST">
                            <div class="screen-body-item">
                                <div class="app-form">
                                    <div class="app-form-group message">
                                        <input class="data-tables" name="nameCategory" value=""
                                            placeholder="Product Name">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"
                                            name="btn_addCategory">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="products" tabindex="-1" role="dialog" aria-labelledby="products" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="functions.php" method="POST">
                            <div class="screen-body-item">
                                <div class="app-form">
                                    <div class="app-form-group message">
                                        <input class="data-tables" name="productName" value=""
                                            placeholder="Category Name">
                                    </div>
                                    <div class="app-form-group message">
                                        <textarea class="data-tables" name="productInfo" value=""
                                            placeholder="Category Info"></textarea>
                                    </div>
                                    <div class="app-form-group message">
                                        <input class="data-tables" name="itemColor" value=""
                                            placeholder="Item Color">
                                    </div>
                                    
                                    <div class="app-form-group message">
                                        <input class="data-tables" name="cost" value=""
                                            placeholder="Cost">
                                    </div>
                                    <?php include "config/setting.php";
                                     $sql = "SELECT * FROM `category`";
                                     $all_categories = mysqli_query($con,$sql);
                                    ?>
                                    <label>Select a Category</label>
                                        <select name="category">
                                            <?php
                                            
                                            while (
                                                $category = mysqli_fetch_array(
                                                    $all_categories,
                                                    MYSQLI_ASSOC
                                                )
                                            ):
                                                ;
                                                ?>
                                                <option value="<?php echo $category["id_category"];
                                                ?>">
                                                    <?php echo $category["name_category"];
                                                    ?>
                                                </option>
                                                <?php
                                            endwhile;
                                            ?>
                                        </select>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"
                                            name="btn_addProduct">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>