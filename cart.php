<?php
include('header.php');
?>

<body>
    <?php
    include('navbar.php');
    include('dbconf.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>
    <section id="book-a-table" class="book-a-table">
        <div class="container">
            <div class="section-header">
                <p>Cart-Item</p>
            </div>
            <?php
            include('message.php');
            ?>
            <div class="row">
                <?php
                $customer_id = $_SESSION['id'];
                $query = "select * from menu_item,customer_order where menu_item.id = customer_order.menu_item_id and customer_order.customer_id = '$customer_id' and customer_order.process_status = 'Draft'";
                $res = $con->query($query);
                foreach ($res as $rec) {
                ?>
                    <div class="col-md-4 mt-3 d-flex justify-content-center">
                        <div class="card" style="width: 18rem; height:28rem">
                            <img class="card-img-top border p-2" style="width: 18rem;height:15rem" src="<?= $rec['image'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Item : <?= $rec['item_name']; ?></h5>
                                <p class="title my-2">Price : <?= $rec['price']; ?></p>
                                <p class="title">SubTotal : <?= $rec['sub_total']; ?></p>
                                <form action="handleCart.php" method="post">
                                    <input type="hidden" name='cart_id' value="<?= $rec["id"]; ?>">
                                    <input type="hidden" name='price' value="<?= $rec["price"]; ?>">
                                    <input class="btn btn-primary px-4" style="font-size: 20px;" type="submit" name="add_To_Cart" value="+">
                                    <span class="lead px-3"> <?= $rec['qty']; ?></span>
                                    <input class="btn btn-danger px-4" style="font-size: 20px;" type="submit" name="remove_To_Cart" value="-">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php
            $query = "SELECT * from customer_order where customer_id = '$customer_id' and process_status = 'Draft'";
            $result = $con->query($query);
            if ($result->num_rows > 0) {
            ?>
                <div class="row">
                    <div class="col-12 mt-4" style="border-radius: 9px;">
                        <?php
                        $query = "SELECT SUM(sub_total) AS TotalAmount FROM customer_order where customer_id = '$customer_id' and process_status = 'Draft'";
                        $res = $con->query($query);
                        foreach ($res as $rec) {
                        ?>
                            <p class="title mx-5 float-end" style="font-size: 30px;">Total : <?= $rec['TotalAmount'] ?></p>

                    </div>
                </div>
                <form action="checkout.php" method="post">
                    <input type="hidden" name='customer_id' value="<?= $customer_id ?>">
                    <input class="btn btn-danger mx-4  float-end" type="submit" name="process__to_checkout" value="Process To Checkout">
                </form>
        </div>
<?php }
                    } ?>
    </section>
</body>

<?php
include('footer_javascript.php');
?>