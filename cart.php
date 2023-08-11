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
            <?php
            include('message.php');
            if(isset($_SESSION['id'])){
                ?>
    <section id="book-a-table" class="book-a-table">
        <div class="container">
            <div class="section-header">
                <p>Cart-Item</p>
            </div>
                <div class="row">
                    <?php
                    $customer_id = $_SESSION['id'];
                    $query = "select * from menu_item,customer_order where menu_item.id = customer_order.menu_item_id and customer_order.customer_id = '$customer_id'";
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
        </div>
    </section>
            <?php
            }
            else{
                include('error.php');
            }   
            ?>
</body>

<?php
include('footer_javascript.php');
?>