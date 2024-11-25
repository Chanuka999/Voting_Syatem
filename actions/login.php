<?php

include "connect.php";

session_start();

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $std = $_POST["std"];

    // Fetch the user record for the given username and mobile
    $sql = "SELECT * FROM `user` WHERE username = ? AND mobile = ?  AND standard = ?";
    
    $stmt= mysqli_stmt_init($conn);
  

    if (mysqli_stmt_prepare($stmt,$sql)) {
        // Bind parameters to the query
        mysqli_stmt_bind_param($stmt, "sss", $username, $mobile, $std);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Fetch groups
                $sql = "SELECT username, photo, votes, id FROM `user` WHERE standard = 'group'";
                $resultGroup = mysqli_query($conn, $sql);

                if (mysqli_num_rows($resultGroup) > 0) {
                    $groups = mysqli_fetch_all($resultGroup, MYSQLI_ASSOC);
                    $_SESSION['groups'] = $groups;
                }

                // Set session variables
                $_SESSION['id'] = $user['id'];
                $_SESSION['status'] = $user['status'];
                $_SESSION['data'] = $user;

                header("location: ../partials/dashboard.php?login=success");
                exit();
            } else {
                echo "Invalid credentials: incorrect password.";
            }
        } else {
            echo "Invalid credentials: user not found.";
        }
    } else {
        echo "Database error: unable to prepare statement.";
    }
}

?>
