<?php
include('dbconf.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['add_To_Cart'])) {
    
    $cart_id = $_POST['cart_id'];
    $price = $_POST['price'];

    $product_query = "SELECT MI.QTY AS PRODUCT_QTY,CT.QTY AS CART_QTY FROM MENU_ITEM AS MI
        LEFT JOIN CART AS CT ON CT.MENU_ITEM_ID = MI.ID
        WHERE CT.ID = $cart_id LIMIT 1;
    ";
    
    $product = $con->query($product_query);
    $product_qty = $product->fetch_assoc();
    if($product_qty['CART_QTY']>=$product_qty['PRODUCT_QTY']){
        $_SESSION['message'] = 'Product qty is not available';
        header("Location: cart.php");
        exit();
    }
    $addToCart = "UPDATE cart set qty = qty + 1,subtotal = subtotal +$price where id = $cart_id";

    if ($con->query($addToCart)) {
        header("Location: cart.php");
        $_SESSION['message'] = 'Cart Added Successfully';
        exit();
    }
}

if (isset($_POST['remove_To_Cart'])) {

    $cart_id = $_POST['cart_id'];
    $price = $_POST['price'];
    $getQty = "select qty from cart where id = $cart_id";

    $res = $con->query($getQty);
    $qty = $res->fetch_assoc()['qty'];

    if ($qty == 1) {

        $deleteToCart = "DELETE from cart where id = $cart_id";
       
        if ($con->query($deleteToCart)) {
            header("Location: cart.php");
            $_SESSION['message'] = 'Cart Removed Successfully';
            exit();
        }

    } else {
       
        $removeToCart = "UPDATE cart set qty = qty - 1,
        subtotal = subtotal - $price
        where id = $cart_id";
       
        if ($con->query($removeToCart)) {
       
            header("Location: cart.php");
            $_SESSION['message'] = 'Cart Updated Successfully';
            exit();
        }
        exit();
    }
} 

else {
    echo "Invalid Request";
}
