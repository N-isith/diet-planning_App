<?php 
    include('../backend/signin.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Plan</title>
    <link rel="stylesheet" href="../styles/syles.css">
</head>

<body class="signin-bg">

    <div class="wholeSignin-bg">

    </div>
    <div class="antiSignin-bg">
        <form action="SignIn.php" method="POST" class="sign-in-form">
            <div class="theform">
                <div class="for-username">
                    <label for="username">Username: </label><br>
                    <input type="text" class="ipt" placeholder="healthydiet@gmail.com" name="userName">
                </div>
                <div class="for-password">
                    <label for="password">Password: </label><br>
                    <input type="password" name="password">
                </div>
                <div>
                    <button class="signin-bt" type="submit" name="signinsubmit">Sign In</button>
                </div>
            </div>
        </form>
        <?php if (isset($error)) { ?>
                    <p><?php echo $error; ?></p>
                <?php } ?>
    </div>

</body>

</html>