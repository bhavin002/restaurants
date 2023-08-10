<?php
include('dbconf.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['add_to_cart'])) {
    $menu_item_id = $_POST['product_id'];
    $customer_id = $_POST['user_id'];
    $price = $_POST['product_price'];
    $fetchQty = "select * from customer_order where customer_id = '$customer_id' && menu_item_id = '$menu_item_id'";
    $result = $con->query($fetchQty);
    if ($result->num_rows == 0) {
        $Insertquery = "INSERT into customer_order(menu_item_id,customer_id,price,sub_total) VALUES ('$menu_item_id','$customer_id','$price','$price')";
        if ($con->query($Insertquery)) {
            header("Location: menu.php");
            $_SESSION['message'] = 'Cart Added Successfully';
        }
    } else {
        $updateQuery = "UPDATE customer_order set qty = qty + 1,sub_total = sub_total +'$price' where customer_id = '$customer_id' && menu_item_id = '$menu_item_id'";
        if ($con->query($updateQuery)) {
            header("Location: menu.php");
            $_SESSION['message'] = 'Cart Updated Successfully';
        }
    }
} else {
    echo "Invalod Request";
}
