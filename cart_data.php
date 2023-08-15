<?php
include('dbconf.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['add_to_cart'])) {
    
    $menu_item_id = $_POST['product_id'];
    $customer_id = $_POST['user_id'];
    $price = $_POST['product_price'];
    $fetchQty = "select * from cart where customer_id = $customer_id && menu_item_id = $menu_item_id and status = 'draft'";
    $result = $con->query($fetchQty);
    
    if ($result->num_rows == 0) {
        
        $Insertquery = "INSERT into cart(customer_id,menu_item_id,qty,price,subtotal,status) VALUES
            ($customer_id,$menu_item_id,1,$price,$price,'draft')";
        
        if ($con->query($Insertquery)) {
            header("Location: menu.php");
            $_SESSION['message'] = 'Cart Added Successfully';
        }

    } else {
        
        $updateQuery = "UPDATE cart
            set qty = qty + 1,
            subtotal = subtotal + $price
        where customer_id = $customer_id && menu_item_id = $menu_item_id";
        
        if ($con->query($updateQuery)) {
            header("Location: menu.php");
            $_SESSION['message'] = 'Cart Updated Successfully';
        }
        
    }
} else {
    echo "Invalid Request";
}
