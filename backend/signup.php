<?php
include("config.php");

if(isset($_POST["signupsubmit"])){
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];

    // Check if passwords match
    if($password !== $repassword) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit();
    }

    $passwordHashed = password_hash($password, PASSWORD_BCRYPT); // Hash the password for security
    $isDietician = isset($_POST["isDietician"]) ? 1 : 0; // Check if the dietician checkbox is checked

    $sql = "INSERT INTO healthydietsignup (user_id, Username, Password) VALUES('D1', '$userName', '$passwordHashed')";

    if($con->query($sql) === true) {
        echo "<script>alert('Sign up successful.');</script>";
        // Redirect based on user type
        if ($isDietician) {
            echo "<script>window.location.href = 'DietDashboard.html';</script>";
        } else {
            echo "<script>window.location.href = 'PatientDashboard.html';</script>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
