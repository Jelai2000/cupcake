<?php
include('includes/header.php');
include('functions/myfunctions.php');
// include('functions/code.php');
// include('../middleware/adminMiddleware.php');
$page_title = "Admin Form";


?>



        <!-- put here cake categories -->
        <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h4 class="text-white">REQUESTS</h4>
                    <a href="requests-history.php" class="btn btn-warning float-end" style="margin-left: 20px">
                       History Requests</a>
                        
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                
                                <th>Request</th>
                                <th>Status</th>
                                <th>Date</th>
								<th>View</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $requests = getAllRequest   ();

                            if (mysqli_num_rows($requests) > 0) {
                                foreach ($requests as $item) {
                                  
                                    ?>
                                    <tr>
										<input type="hidden" value=" <?= $item['id']; ?>">
                                        
                                        <td>
                                            <?= $item['request']; ?>
                                        </td>
                                        <td>
										<p class="mb-1">
                            <?php
                            if ($item['status'] == 0) {
                                echo "Checking";
                            } else if ($item['status'] == 1) {
                                echo '<p class="text-warning fw-bold ">Preparing</p>';
                            } else if ($item['status'] == 2) {
                                echo '<p class="text-success fw-bold text-center">Complete</p>';
                            }
                            ?>
                        </p>
                                        </td>
                                        
                                        <td>
                                            <?= $item['date']; ?>
                                        </td>
                                        <td>
                                            <a href="cake-view-order.php?t=<?= $item['id']; ?>" class="btn btn-primary">View
                                                Details</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">No request yet</td>
                                </tr>

                                <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>