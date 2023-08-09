<?php

include('header.php');

?>

<body>
    <?php
    include('navbar.php');
    include('dbconf.php');
    ?>

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
        <div class="container">

            <div class="section-header" style="margin-top: 25px;">
                <h2>Our Menu</h2>
                <p>Check Our <span>Yummy Menu</span></p>
            </div>

            <!-- Adding Category Menu -->
            <ul class="nav nav-tabs d-flex justify-content-center">

                <?php
                $res = $con->query('select * from `category`;');
                $index = 1;
                foreach ($res as $cat) {
                    if ($index == 1) {
                ?>
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-<?=$cat['name']?>">
                                <h4><?= $cat['name']; ?></h4>
                            </a>
                        </li><!-- End tab nav item -->
                    <?php } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link show" data-bs-toggle="tab" data-bs-target="#menu-<?=$cat['name']?>">
                                <h4><?= $cat['name']; ?></h4>
                            </a>
                        </li><!-- End tab nav item -->
                <?php
                    }
                    $index = $index + 1;
                }
                ?>


            </ul>


            <!-- Adding Product by category-wise -->
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

                <?php

                $res = $con->query('select * from `category`;');
                $index = 1;
                foreach ($res as $cat) {
                if($index==1){
                    ?>
                        <div class="tab-pane fade active show" id="menu-<?= $cat['name'] ?>">
                    <?php
                }
                else{
                    ?>
                        <div class="tab-pane fade" id="menu-<?= $cat['name'] ?>">
                    <?php
                }
                ?>


                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3><?= $cat['name'] ?></h3>
                </div>

                <div class="row gy-5">

                    <?php
                    $products = $con->query("select * from `menu_item` where category_id = {$cat['id']};");
                    // Looping over products
                    foreach ($products as $product) {
                    ?>
                        <div class="col-lg-4 menu-item">
                            <a href="<?=$product['image']?>" class="glightbox"><img src="<?=$product['image']?>" class="menu-img img-fluid" alt=""></a>
                            <h4><?=$product['item_name']?></h4>
                            <p class="ingredients">
                            <?=$product['detail']?>
                            </p>
                            <form action="cart.php" method="post">
                                <input type="text" value="<?=$_SESSION['id']?>" hidden name="user_id">
                                <input type="text" value="<?=$product['id']?>" hidden name="product_id">
                                <input type="submit" name="add_to_cart" value="Add To Cart">
                            </form>
                            <p class="price">
                                Rs. <?=$product['price']?>
                            </p>
                        </div><!-- Menu Item -->
                    <?php
                    }
                    ?>
                </div>
            </div><!-- End <?= $cat['name'] ?> Menu Content -->

            <?php
            $index = $index + 1;
                }
            ?>




            </div>

        </div>
    </section><!-- End Menu Section -->
</body>

<?php
include('footer_javascript.php')
?>