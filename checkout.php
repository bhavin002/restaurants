<?php
include('dbconf.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['process_to_checkout'])) {
    $userId = $_POST['userId'];
    $totalAmt = $_POST['totalAmt'];
    echo $userId;
    echo $totalAmt;
} else {
    echo "Invalod Request";
}
