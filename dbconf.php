<?php
    
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'restaurant';
    $con = mysqli_connect($server,$username,$password,$db);
    if(! $con){
        echo "<script>alert('hello')</script>";
        die('Connection failed due to '.mysqli_connect_error());
    }
?>