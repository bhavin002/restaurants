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

            echo $isMatch;
            // Login successful
            // Store user data in session (if using sessions)
            $_SESSION["id"] = $row["id"];
            $_SESSION["fname"] = $row["fname"];
            $_SESSION["email"] = $row["email"];
            // Redirect to a protected page or dashboard
            header("Location: index.php");
            exit;
        } else {
            // Incorrect password
            echo "Hello";
            echo $isMatch;
            echo "Invalid password";
        }
    } else {
        // User not found
        echo "User not found";
    }
    // echo $query;
    // print_r($isEmail);
    // while ($row = $isEmail->fetch_assoc()) {
    //     print_r($row['password']);
    // }


    // if ($con->query($query)) {
    //     header("Location: login.php");
    // }

    // if ($con->query($query)) {
    //     header("Location: login.php");
    // }
    $hash = '$2y$10$Maxgvs4Uc.bB3MdMLMeqhulijYWLPj/mk9wTRS97szJ';

    if (password_verify('123', $hash)) {
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    }


    $con->close();
}
