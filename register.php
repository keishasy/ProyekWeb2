<?php

include 'config.php';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed;');

    if(mysqli_num_rows($select_users) > 0) {
        $message[] = 'User Already Exist';
    } else {
        if($password != $cpassword) {
            $message[] = 'Confirm Password Not Matched!';
        } else {
            mysqli_query($conn, "INSERT INTO `users` (name, email, password, user_type) VALUES ('$name', '$email', '$cpassword', '$user_type')") or die ('query failed');
            $message[] = 'Registered Successfully';
            header('location:login.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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
            <h3>REGISTER NOW</h3>
            <input type="text" name="name" placeholder="Enter Your Name" required class="box">
            <input type="email" name="email" placeholder="Enter Your Email" required class="box">
            <input type="password" name="password" placeholder="Enter Your Password" required class="box">
            <input type="password" name="cpassword" placeholder="Confirm Your Password" required class="box">
            <select name="user_type" class="box">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="btn">
            <p>Already have an account?  <a href="login.php">Login now</a></p>
        </form>
    </div>
    
</body>
</html>