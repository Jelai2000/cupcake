
<div class="container-fluid p-5">
<h4 class="display-4 fw-bold" style="color:#4A4A4A">Category</h4>
        <div class="underline mb-3"></div>

    <ul class="nav nav-tabs mt-5">
        <?php

        $tab_result = getAllCategory();

        $tab_menu = '';
        $tab_content = '';
        $i = 0;
        while ($row = mysqli_fetch_array($tab_result)) {
            if ($i == 0) {
                $tab_menu .=  
                '<div class="nav-link text-center shadow" style="border-radius: 20px; background-color: #fff874;" >
                    <a class="text-dark" href="#'  . $row["id"] . '" data-toggle="tab">' . $row["name"] . '</a>
                </div>';
                $tab_content .= 
                '<div id="' . $row["id"] . '" class="tab-pane fade show active">
                <div class="row">';
            } else {
                $tab_menu .= 
                '<div class="nav-link shadow"style="border-radius: 20px; background-color: #fff874;" >
                    <a class="text-dark" href="#' . $row["id"] . '" data-toggle="tab">' . $row["name"] . '</a>
                </div>';
                $tab_content .= 
                '<div id="' . $row["id"] . '" class="tab-pane fade show">
                <div class="row">';
            }
            $id = $row["id"];
            $product_result = getAllProducts($id);
            while ($sub_row = mysqli_fetch_array($product_result)) {
                $name = $sub_row["slug"];
                $url = str_replace(' ', '-', $name);
                $tab_content .= 
                '<div class="col-md-3" style="margin-bottom:36px;">
                    <div class="card rounded " style="background-color: #e0d94d;">
                        <a href="product-view.php?product=' . $name . '" > <img style="border:none; "src="uploads/' . $sub_row["image"] . '" class="img-responsive img-thumbnail  mx-auto d-block mt-3" />
                                            <h4 class="p-3 text-center fw-bold shadow-lg" style="background-color: #fff874; border: 4px solid white ">' . $sub_row["name"] . '</h4>
                        </a>
                    </div>
                </div>';
            }
            $tab_content .= 
            '<div style="clear:both">
            </div>
            </div>
            </div>';
            $i++;
        }
        echo $tab_menu;
        ?>
    </ul>

    <div class="tab-content ">
        <br />
        <?php

        echo $tab_content;
        ?>
    </div>
</div>


<!-- CATEGORY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>