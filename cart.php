<?php

    include('dbconf.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    if(isset($_POST['add_to_cart'])){
        echo $_POST['user_id'];
        echo $_POST['product_id'];
    }

?>