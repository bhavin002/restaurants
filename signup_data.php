<?php

include('dbconf.php');
session_start();
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phoneNumber'])  && isset($_POST['pincode']) && isset($_POST['password'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $pincode = $_POST['pincode'];
    $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $emailChecking = $con->query("select * from customer where email='$email'");
    if($emailChecking->num_rows>0){
        $_SESSION['message'] = "Email already exists.";
        header("Location: signup.php");
        exit(0);

    }
    $query = "INSERT INTO CUSTOMER(fname,lname,email,phone_number,pincode,password) 
    VALUES ('$fname','$lname','$email','$phoneNumber','$pincode','$hashPassword')";

    if ($con->query($query)) {
        header("Location: login.php");
    }
    
} else {
    echo "Invalid Request";
}
