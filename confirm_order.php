<?php
include('dbconf.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['process__to_confirm'])) {
    $id = $_POST['id'];
    $updateStatus = "UPDATE customer_order set process_status = 'Confirm' where id = '$id'";
    if ($con->query($updateStatus)) {
        header("Location: order_items.php");
    }
} else {
    echo "Invalod Request";
}
