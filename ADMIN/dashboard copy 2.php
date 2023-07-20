<?php
include('includes/header.php');
include('functions/myfunctions.php');
// include('../middleware/adminMiddleware.php');
$page_title = "Admin Form";


?>

<div class="container requestContainer " >

<div class="row">
<h1 class="mt-5 mb-0">REQUEST</h1>
<?php
    $allRequest = getRequest();

    if (mysqli_num_rows($allRequest) > 0) {
        foreach ($allRequest as $item) {
            ?>
            <div class="col-md-4 requestCard">
                <div class="face face1">
                    <div class="content">
                        <img
                            src="https://github.com/Jhonierpc/WebDevelopment/blob/master/CSS%20Card%20Hover%20Effects/img/design_128.png?raw=true">
                        <input type="hidden" value="<?= $item['id']; ?>" disable>
                        <h3>
                            <?= $item['request']; ?>
                        </h3>
                    </div>
                </div>
                <div class="face face2">
                    <div class="content">
                        <p style="font-size: 10px"><?= $item['message']; ?></p>
                        <!-- <h6 class="fw-bold">Requested by:<?= $item['requester']; ?></h6> -->
                        <h6 class="fw-bold">date</h6>
                        <a href="#" >Read More</a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "No Product Request";
    }
    ?>
</div>
</div>


<!-- Modal trigger button -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#requestDetails">
  Launch
</button> -->

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->


<?php include('includes/footer.php') ?>