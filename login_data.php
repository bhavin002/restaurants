<?php

session_start();

include('dbconf.php');

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "select id,fname,email,password from customer where email = '$email' LIMIT 1";
    $result = $con->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $isMatch = password_verify($password, $row['password']);
        // Verify the password (in a real-world scenario, use password_hash() for storing hashed passwords)
        if ($isMatch) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["fname"] = $row["fname"];
            $_SESSION["email"] = $row["email"];

            header("Location: index.php");
            exit;

            // echo "password matched";
        } else {
            // Incorrect password
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $con->close();
}
