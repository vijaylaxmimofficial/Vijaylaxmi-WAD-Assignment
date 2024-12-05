<?php
include("database.php");
session_start();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $college = mysqli_real_escape_string($con, $_POST['college']);

    $check_query = "SELECT email FROM user WHERE email='$email'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Sorry.. This email is already registered !!');</script>";
        header("refresh:0;url=login.php");
    } else {
        $insert_query = "INSERT INTO user (name, email, password, college) VALUES ('$name', '$email', '$password', '$college')";
        if (mysqli_query($con, $insert_query)) {
            echo "<script>alert('Congrats.. You have successfully registered !!');</script>";
            header('location: login.php');
        } else {
            echo "<script>alert('Error in registration. Please try again.');</script>";
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
        <h2>Register</h2>
        <form method="post" action="register.php">
            
            <input type="text" name="name" placeholder="Enter your name" required><br><br>
           
            <input type="email" name="email" placeholder="Enter your email" required><br><br>
           
            <input type="password" name="password" placeholder="Enter your password" required><br><br>
           
            <input type="text" name="college" placeholder="Enter your college name" required><br><br>
            <button type="submit" name="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
