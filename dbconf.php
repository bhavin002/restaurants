<?php
    
    $server = 'localhost';
    $username = 'root';
    $password = 'sky@132';
    $db = 'restaurant';
    $con = mysqli_connect($server,$username,$password,$db);
    if(! $con){
        die('Connection failed due to '.mysqli_connect_error());
    }
?>