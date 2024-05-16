<?php 

include("config.php");

if(isset($_POST["signupsubmit"])){
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    
    $sql = "INSERT INTO signup (Username, Password) VALUES('$userName', '$password')";

    if($con -> query($sql) === true) {
        echo "<script>alert('Sign up sucessfull.');</script>";
    } else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Plan</title>
    <link rel="stylesheet" href="../styles/syles.css">
</head>

<body class="signup-bg">

    <div class="wholeSignup-bg">

    </div>
    <div class="antiSignup-bg">
        <form action="" class="sign-up-form">
            <div class="theform">
                <div class="for-username">
                    <label for="username">Username: </label><br>
                    <input type="text" placeholder="healthydiet@gmail.com" name="userName">
                </div>
                <div class="for-password">
                    <label for="password">Password:</label><br>
                    <input type="text" name="password">
                </div>
                <div class="for-re-enter-password">
                    <label for="repassword">Re enter Password:</label><br>
                    <input type="text">
                </div>
                <div>
                    <button class="signup-bt" type="submit" name="signupsubmit">Sign Up</button>
                    <p class="uptoin">Already have an account?  <a href="SignIn.html">Sign in</a></p>
                </div>
            </div>
        </form>
    </div>

</body>

</html>