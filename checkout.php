<?php
include('dbconf.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['process__to_checkout'])) {
    $customer_id = $_POST['customer_id'];
    $updateStatus = "UPDATE customer_order set process_status = 'Process' where customer_id = '$customer_id'";
    if ($con->query($updateStatus)) {
        header("Location: order.php");
    }
} else {
    echo "Invalod Request";
}
