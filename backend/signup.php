<?php
    include("config.php");

    // Function to generate unique IDs
    function generateID($prefix, $count) {
        return $prefix . $count;
    }

    if(isset($_POST["signupsubmit"])){
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];

        
        if($password !== $repassword) {
            echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
            exit();
        }

        $passwordHashed = password_hash($password, PASSWORD_BCRYPT); 
        $isDietician = isset($_POST["isDietician"]) ? true : false; 
        
        $sqlCount = "SELECT COUNT(*) AS total FROM healthydietsignup WHERE role = 'Dietician'";
        $result = $con->query($sqlCount);
        $row = $result->fetch_assoc();
        $dieticianCount = $row['total'] + 1;

        $sqlCount = "SELECT COUNT(*) AS total FROM healthydietsignup WHERE role = 'Patient'";
        $result = $con->query($sqlCount);
        $row = $result->fetch_assoc();
        $patientCount = $row['total'] + 1;

        
        if ($isDietician) {
            $role = 'Dietician';
            $id = generateID('D', $dieticianCount);
        } else {
            $role = 'Patient';
            $id = generateID('P', $patientCount);
        }

        $sql = "INSERT INTO healthydietsignup (user_id, Username, Password, role) VALUES ('$id', '$userName', '$passwordHashed', '$role')";

        if($con->query($sql) === true) {
            if ($isDietician) {
                echo "<script>alert('Sign up as Dietician successful.');</script>";
                echo "<script>window.location.href = 'DietDashboard.html';</script>";
            } else {
                echo "<script>alert('Sign up successful.');</script>";
                echo "<script>window.location.href = 'PatientDashboard.html';</script>";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
?>
