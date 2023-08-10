<?php
include('dbconf.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['add_To_Cart'])) {
    $cart_id = $_POST['cart_id'];
    $price = $_POST['price'];
    $addToCart = "UPDATE customer_order set qty = qty + 1,sub_total = sub_total +'$price' where id = '$cart_id'";
    if ($con->query($addToCart)) {
        header("Location: cart.php");
        $_SESSION['message'] = 'Cart Added Successfully';
    }
} else if (isset($_POST['remove_To_Cart'])) {
    $cart_id = $_POST['cart_id'];
    $price = $_POST['price'];
    $getQty = "select qty from customer_order where id = '$cart_id'";
    $res = $con->query($getQty);
    $qty = $res->fetch_assoc()['qty'];
    if ($qty == 1) {
        $deleteToCart = "DELETE from customer_order where id = '$cart_id'";
        if ($con->query($deleteToCart)) {
            header("Location: cart.php");
            $_SESSION['message'] = 'Cart Removed Successfully';
        }
    } else {
        $removeToCart = "UPDATE customer_order set qty = qty - 1,sub_total = sub_total -'$price' where id = '$cart_id'";
        if ($con->query($removeToCart)) {
            header("Location: cart.php");
            $_SESSION['message'] = 'Cart Updated Successfully';
        }
    }
} else {
    echo "Invalid Request";
}
