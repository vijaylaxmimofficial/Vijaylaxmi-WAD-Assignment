<?php
include("database.php");
session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        header('location: welcome.php');
    } else {
        echo "<script>alert('Incorrect email or password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            background-image: url('https://www.freepngimg.com/download/abstract/30846-4-abstract-transparent-background.png'); 
    background-size: cover; 
        }
    </style>
    
    
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="login.php">
            
            <input type="email" name="email" placeholder="Enter your email" required><br><br>
           
            <input type="password" name="password" placeholder="Enter your password" required><br><br>
            <button type="submit" name="submit">Login</button>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</body>
</html>
