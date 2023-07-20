<?php
include "config/setting.php";
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="HandheldFriendly" content="true" />
		<title><?php echo $base_name_site; ?></title>
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/fontfamilystyle.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="css/colpick.css" type="text/css" charset="utf-8" />
        <link rel="stylesheet" href="css/mystyle.css" type="text/css" charset="utf-8" />

        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.ui.touch-punch.js"></script>  <!-- drag and resize di device android -->
        <script src="js/hammer.js"></script>  <!-- double click di device android -->
        <script src="js/jquery.hammer.min.js"></script>    <!-- double click di device android -->
        <script src="js/html2canvas.js"></script>
        <script src="js/Blob.js"></script> 
        <script src="js/canvas-toBlob.js"></script> 
        <script src="js/FileSaver.js"></script> 
        <script src="js/colpick.js"></script> 
        <script src="js/jquery.arctext.js"></script>
        <script src="js/jqIsoText.js"></script>
        <script src="js/MyJavascript.js"></script>
        
	</head>
	<body>
    
    <div id="header">
    <div id="header2">
    <div id="left-header">
    <img src="../assets/images/cupcakelogo.png" alt="" width="150px">
    </div><!-- /left-header -->
    <div id="right-header">
    cupcake
    </div><!-- /right-header -->
    <div id="clearer"></div>
    </div><!-- /header2 -->
    </div><!-- /header -->
    
    <div id="panel" class="radius20">
    
        <div id="panel-container-item">
            <div id="changecategoryColor" style="margin:auto;display:block;">
                <div id="change_Category_Item" style="display:none;float:left;" class="buttonclickD radius" onclick="changeCategoryItem()">Category</div>
                <div id="change_Color_Item" style="display:none;float:left;margin-left:5px;" class="buttonclickB radius" onclick="changeColorItem()">Change Color</div>
            </div>
            <div id="clearer"></div>
            
            <div id="panel-container-item-category" style="width:100%;">
                <h2>Choose Category</h2>
                <?php
                $category = "select * from category order by name_category ASC";
                $cat = mysqli_query($con, $category);
                while($cat_ = mysqli_fetch_array($cat)){
                    echo "<span title_Category=\"".$cat_['name_category']."\">".$cat_['name_category']."</span>";
                }
                ?>
            </div>
        
            <div id="panel-container-item-pilih">
            <div id="br"></div>
                <?php
                $category2 = "select * from category order by name_category ASC";
                $cat2 = mysqli_query($con, $category2);
                while($cat2_ = mysqli_fetch_array($cat2)){
                echo "<div id=\"Items_".$cat2_['name_category']."\" style=\"display:none;text-align:center;\">";
                    $item_category = "select * from item_category where id_category=".$cat2_['id_category']." order by name_item_category DESC";
                    $item_cat = mysqli_query($con, $item_category);
                    while($item_cat_ = mysqli_fetch_array($item_cat)){
                    echo "<h2>".$item_cat_['name_item_category']."</h2>";
                        $product1 = "select * from product where id_item_category=".$item_cat_['id_item_category']."";
                        $product = mysqli_query($con, $product1);
                        while($product_ = mysqli_fetch_array($product)){
                            echo "<li item_model=\"".$item_cat_['name_item_category']."\" item_info_detail=\"".$product_['item_info']."\" 
                            item_model_detail=\"".$product_['item_model']."\" item_color=\"".$product_['item_color']."\" 
                            onClick=\"chooseItem('".$item_cat_['name_item_category']."','".$product_['item_model']."','".$product_['item_color']."')\" 
                            class=\"radius\">".$product_['item_model']."</li> "; // biarkan ada spasi setelah tutup tag li
                        }
                    echo "<div id=\"br\"></div>";
                    }
                echo "</div>";
                }
                ?>
            </div>
            
            <div id="panel-container-item-properties">
            <div id="backChooseItem" style="float:left;" class="buttonclickB radius" onclick="changeItem()">Change Item</div>
            <div id="clearItemRemove" style="float:left;margin-left:5px;" class="buttonclickC radius" onclick="clearItem()">Clear Item</div>
            <div id="clearer"></div><div id="br"></div>
                <h2>Choose Color</h2>
                <?php
                $item_category2 = "select * from item_category order by name_item_category DESC";
                $item_cat2 = mysqli_query($con, $item_category2);
                    while($item_cat2_ = mysqli_fetch_array($item_cat2)){
                        $productT2 = "select * from product where id_item_category=".$item_cat2_['id_item_category']."";
                        $product2 = mysqli_query($con, $productT2);
                        while($product2_ = mysqli_fetch_array($product2)){
                        echo "<div id=\"".$item_cat2_['name_item_category']."-".$product2_['item_model']."\" class=\"pilihanWarnaItem\" style=\"display:none;\">";
                            $productT3 = "select * from color_product where id_product=".$product2_['id_product']."";
                            $product3 = mysqli_query($con, $productT3);
                            while($product3_ = mysqli_fetch_array($product3)){
                            echo "<li onClick=\"chooseItem('".$item_cat2_['name_item_category']."','".$product2_['item_model']."','".$product3_['item_color']."')\" 
                            style=\"background:#".$product3_['color_hexa'].";\" title=\"".$product3_['title']."\"></li> "; // biarkan ada spasi setelah tutup tag li
                            }
                        echo "</div>";                        
                        }
                    }
                ?>
            </div>
            
        </div><!-- /panel-container-item -->
        
        <div id="panel-container-text">
        <div id="wrap-input-text"><input type="text" placeholder="Place Add Text" id="teks" class="radius"/></div>
        <div id="br2"></div>
        <a class="buttonclick radius" id="createTextId" onClick="createText()">Create Text</a>
        <div id="br"></div>
        <h2>Text Color</h2>
        <div id="colorpicker"></div>
        <div id="br"></div>
        <h2>Font Style</h2>
            <div id="fontstyleterpilih">
            <span style="font-family:Arial;" nama_font="Arial">Change Font</span>
            </div>
            
            <div id="fontstylepilihan" style="display:none;">
            <?php
            $font1 = "select * from font order by name_font ASC";
            $font = mysqli_query($con, $font1);
            while($font_ = mysqli_fetch_array($font)){
                echo "<span style=\"font-family:".$font_['name_style'].";\" nama_font=\"".$font_['name_font']."\">".$font_['name_font']."</span>";
            
            }
            ?>
            </div>
                
        <div id="clearer"></div>
        <div id="br"></div>
        <h2>Text Effect</h2>
        <div id="clearer"></div>
        </div><!-- /panel-container-text -->
        
        <div id="panel-container-image">
        <div id="titleimagecontainer">
        <h2>Upload Image</h2>
        <input id="imageUpload" type="file" value="Select Image" accept="image/*">
        <div class="radius" id="image_Upload"/>Select Image</div>
        <div id="br"></div>
        <h2>Choose Image</h2>
            <?php
            $image_category = "select * from image_category order by name_image_category ASC";
            $image_cat = mysqli_query($con, $image_category);
            while($image_cat_ = mysqli_fetch_array($image_cat)){
                echo "<span title_Image=\"".$image_cat_['name_image_category']."\">".$image_cat_['name_image_category']."</span>";
            }
            ?>
        </div>
            <?php
            $image_catT2 = "select * from image_category order by name_image_category ASC";
            $image_cat2 = mysqli_query($con, $image_catT2);
            while($image_cat2_ = mysqli_fetch_array($image_cat2)){
                echo "<div id=\"image_".$image_cat2_['name_image_category']."\" class=\"image-wraps\" style=\"display:none;text-align:center;\">";
                $gambar1 = "select * from gambar where id_image_category=".$image_cat2_['id_image_category']."";
                $gambar = mysqli_query($con, $gambar1);
                while($gambar_ = mysqli_fetch_array($gambar)){
                    echo "<img onclick='myFunction()' src=\"icons/".$gambar_['folder']."/".$gambar_['name_gambar']."\"/>";
                    echo "<h6 style='font-size:25px; color:white; margin-top:0px; margin-bottom:0px;'>₱".$gambar_['cost']."</h6>";
                }
                echo "</div>";
            }
            ?>
        <div id="backChooseImage" style="position:absolute;top:20px;display:none;" class="buttonclickB radius" onclick="changeImage()">Change Image</div>
        </div>
        <!-- /panel-container-image -->
        
        <div id="panel-item" class="radius5kanan panel-config" onClick="openPanelItem()">Item</div>
        <div id="panel-text" class="radius5kanan panel-config" onClick="openPanelText()">Text</div>
        <div id="panel-image" class="radius5kanan panel-config" onClick="openPanelImage()">Image</div>
        <div id="panel-close" class="radius5kanan panel-config-close" onClick="ClosePanel()">Close</div>
    </div><!-- /panel -->
    <!-- <button onclick="myFunction()">Click me</button> -->
    <div id="navbar">
    <div id="navbar-container">
        <button type="button" id="imageSave" onClick="saveDesain()"
        style="
        cursor:pointer;
        border: 1px solid blue;
        border-radius: 10px;
        background-color: blue;
        color: white;
        padding: 10px 30px;
        margin-bottom: 10px">Download Customized Cake</button>
    <!-- <?php @$test = $_GET[@$gambar_['cost']]?> -->
    <div><p id="demo"></p></div>
    </div><!-- /navbar-container -->
    </div><!-- /navbar -->
    
    <div id="konten"><div id="konten2">
    <div id="container"><span class="chooseItemInPanel">Select Cake in Item</span>
        <div id="item_product">
        <!-- <img src="1front.jpg"  height="490" id="view_front"> -->
        </div>
        <div id="making">
        </div><!-- /making -->
    </div><!-- /container -->
    
    <div id="clearer"></div>
   
    </div>
    
 
    <a name="" id="" href="../custom-checkout.php" type="button" style="border-radius: 20px; border: 1px solid red; background-color: pink; padding: 1rem 3rem; text-decoration: none; color: black; font-size:20px ">CHECKOUT</a>
    <!-- </div> -->
</div><!-- /konten -->

    
    <div id="ScreenPreviewOverlay"></div>
    <div id="ScreenPreviewItem">
    <div id="wrap-close-ScreenPreviewItem" onClick="closePreviewItem()" style="display:none;"><img src='images/clear.png' height='13px' alt='preview remove'></div>
    <div id="wrap-image-ScreenPreviewItem"></div>
    <div id="wrap-text-ScreenPreviewItem" class="radius"></div>
    </div><!-- /ScreenPreviewItem -->
   

	</body>

</html>

<script>
function myFunction() {
 
  document.getElementById("demo").innerHTML = "1500";
}
</script>