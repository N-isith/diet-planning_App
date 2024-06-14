<?php 
session_start();
include("config.php");

if(isset($_POST["signinsubmit"])) {
    $userName = $_POST["userName"];
    $password = $_POST["password"];

    // Fetch the user details from the database
    $sql = "SELECT password, role FROM healthydietsignup WHERE username = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $hashedPassword = $row['password'];
        $role = $row['role'];

        //PHP session verififcation
        if($_POST["userName"] == $username && $_POST["password"] == $hashedPassword){
            $_SESSION["userName"] = $_POST["userName"];            
        }

        if(isset($_SESSION["userName"])){
            
        // Verify the password
        if(password_verify($password, $hashedPassword)) {
            // Redirect to the relevant dashboard
            if($role == 'Dietician') {
                echo "<script>alert('Sign in successful. Redirecting to Dietician Dashboard. User: ".$_SESSION["userName"]."');</script>";
                echo "<script>window.location.href = 'DietDashboard.html';</script>";
            }
            elseif($role == 'Patient') {
                echo "<script>alert('Sign in successful. Redirecting to Patient Dashboard. User: ".$_SESSION["userName"]." ge session ek');</script>";
                echo "<script>window.location.href = 'PatientDashboard.html';</script>";
            }
        } else {
            echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
        }
        }

        
    } else {
        echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
    }
}
?>
