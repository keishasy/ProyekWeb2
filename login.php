<?php

include 'config.php';
session_start();
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed;');

    if(mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);
        if($row ['user_type']== 'admin') {
            $_SESSION ['admin_name'] = $row ['name'];
            $_SESSION ['admin_email'] = $row ['email'];
            $_SESSION ['admin_id'] = $row ['id'];
            header('location:admin_page.php');
        } else if ($row ['user_type']== 'user') {
            $_SESSION ['user_name'] = $row ['name'];
            $_SESSION ['user_email'] = $row ['email'];
            $_SESSION ['user_id'] = $row ['id'];
            header('location:home.php');
        }
    } else {
        $message[] = 'Incorrect Email or Password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    if(isset($message)) {
        foreach($message as $message) {
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
    ?>
    <div class="form-container">
        <form action="" method="post">
            <h3>LOGIN NOW</h3>
            <input type="email" name="email" placeholder="Enter Your Email" required class="box">
            <input type="password" name="password" placeholder="Enter Your Password" required class="box">
            <input type="submit" name="submit" value="login now" class="btn">
            <p>Don't have an account?  <a href="register.php">Register now</a></p>
        </form>
    </div>
    
</body>
</html>