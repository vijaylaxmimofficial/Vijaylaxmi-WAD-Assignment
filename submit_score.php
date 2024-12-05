<?php
include("database.php");
session_start();

if (isset($_POST['email']) && isset($_POST['score'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $score = mysqli_real_escape_string($con, $_POST['score']);


    $insert_query = "INSERT INTO user_scores (email, score) VALUES ('$email', '$score')";
    
    if (mysqli_query($con, $insert_query)) {
        echo "<script>alert('Your score has been submitted!');</script>";
    } else {
        echo "<script>alert('Error submitting your score. Please try again.');</script>";
    }
}
?>
