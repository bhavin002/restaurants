<?php

include('dbconf.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$pincode = $_POST['pincode'];
$phoneNumber = $_POST['phoneNumber'];

if(isset($fname) && isset($lname) && isset($phoneNumber) && isset($email) && isset($pincode) && isset($password)){
    
    $query = "INSERT INTO CUSTOMER(fname,lname,email,phone_number,pincode,password) 
    VALUES ('$fname','$lname','$email','$phoneNumber','$pincode','$password')";
    echo $query;
    
    if($con->query($query)){
        header("Location: login.php");
    }
    
}


?>