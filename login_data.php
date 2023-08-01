<?php

session_start();

include('dbconf.php');

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "select id,fname,email,password,is_admin from customer where email = '$email' LIMIT 1";
    $result = $con->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $isMatch = password_verify($password, $row['password']);
        if ($isMatch) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["fname"] = $row["fname"];
            $_SESSION["email"] = $row["email"];
            $_SESSION['is_admin'] = $row["is_admin"];
            header("Location: index.php");
            exit;
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $con->close();
}
