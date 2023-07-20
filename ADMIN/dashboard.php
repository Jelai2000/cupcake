<?php
include('includes/header.php');
include('functions/myfunctions.php');
// include('functions/code.php');
// include('../middleware/adminMiddleware.php');
$page_title = "Dashboard";


?>
<style>
    body {
        font-family: "Oxygen", sans-serif;
        color: #050505;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    .main {
        max-width: 1200px;
        margin: 0 auto;
    }

    .cards {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .cards_item {
        display: flex;
        padding: 1rem;
    }

    .card_image {
        position: relative;
        max-height: 250px;
    }

    .card_image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card_price {
        position: absolute;
        bottom: 8px;
        right: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 45px;
        height: 45px;
        border-radius: 0.25rem;
        background-color: #c89b3f;
        font-size: 18px;
        font-weight: 700;
    }

    .card_price span {
        font-size: 12px;
        margin-top: -2px;
    }

    .note {
        position: absolute;
        top: 8px;
        left: 8px;
        padding: 4px 8px;
        border-radius: 0.25rem;
        background-color: #c89b3f;
        font-size: 14px;
        font-weight: 700;
    }

    @media (min-width: 40rem) {
        .cards_item {
            width: 50%;
        }
    }

    @media (min-width: 56rem) {
        .cards_item {
            width: 33.3333%;
        }
    }

    .card {
        background-color: white;
        border-radius: 0.25rem;
        box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .card_content {
        position: relative;
        padding: 16px 12px 32px 24px;
        margin: 16px 8px 8px 0;
        max-height: 290px;
        overflow-y: scroll;
    }

    .card_content::-webkit-scrollbar {
        width: 8px;
    }

    .card_content::-webkit-scrollbar-track {
        box-shadow: 0;
        border-radius: 0;
    }

    .card_content::-webkit-scrollbar-thumb {
        background: #c89b3f;
        border-radius: 15px;
    }

    .card_title {
        position: relative;
        margin: 0 0 24px;
        padding-bottom: 10px;
        text-align: center;
        font-size: 20px;
        font-weight: 700;
    }

    .card_title::after {
        position: absolute;
        display: block;
        width: 50px;
        height: 2px;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #c89b3f;
        content: "";
    }

    hr {
        margin: 24px auto;
        width: 50px;
        border-top: 2px solid #c89b3f;
    }

    .card_text p {
        margin: 0 0 24px;
        font-size: 14px;
        line-height: 1.5;
    }

    .card_text p:last-child {
        margin: 0;
    }
</style>
<div class="main mt-5">
    <h1>SELLER REQUESTS</h1>
    <ul class="cards">
        <?php
        $allRequest = getRequest();

        if (mysqli_num_rows($allRequest) > 0) {
            foreach ($allRequest as $item) {
                ?>
                <li class="cards_item">

                    <div class="card">
                        <div class="card_image">
                            <input type="hidden" value="<?= $item['id']; ?>" disable>
                            <img src="../Customer/assets/images/cupcakelogo.png" alt="mixed vegetable salad in a mason jar." />
                            <!-- <span class="card_price"><span>$</span>9</span> -->
                        </div>
                        <div class="card_content">
                            <h2 class="card_title">
                                <?= $item['request']; ?>
                            </h2>
                            <div class="card_text">
                                <p>
                                    <?= $item['message']; ?>
                                </p>
                                <hr />
                                <p>
                                    -
                                    <?= $item['requester']; ?><br>
                                    <span class="text-muted">-
                                        <?= $item['date']; ?>
                                    </span>
                                </p>
                                <p> </p>
                            </div>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="id" value="<?= $item['id']; ?>">

                                <select name="status" id="" class="form-select">
                                    <option value="0" <?= $item['status'] == 0 ? "selected" : "" ?>>
                                        Checking</option>
                                    <option value="1" <?= $item['status'] == 1 ? "selected" : "" ?>>
                                        Preparing</option>
                                    <option value="2" <?= $item['status'] == 2 ? "selected" : "" ?>>
                                        Done</option>

                                </select>




                                <button type="submit" class="btn btn-primary mt-2" name="btn_updateRequest">Update
                                    Status</button>
                            </form>
                        </div>

                    </div>

                </li>


                <?php
            }
        } else {
            echo "No Product Request";
        }
        ?>

    </ul>

</div>

<?php include('includes/footer.php') ?>