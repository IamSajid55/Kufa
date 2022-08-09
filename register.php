<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Design Styles -->
    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/neptune.png" />

</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="register.php">Neptune</a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="Login.php">Login</a></p>
            <form action="register_post.php" method="POST">
                <?php if(isset($_SESSION['email_taken'])) : ?>
                    <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                        <div class="alert-content">
                            <span class="alert-title text-danger">Error!</span>
                            <span class="alert-text text-danger"><?= $_SESSION['email_taken']?></span>
                        </div>
                    </div>
                <?php endif;?>
                <div class="auth-credentials m-b-xxl">

                    <label for="signUpUsername" class="form-label">Name</label>
                    <input type="text" class="form-control <?= (isset($_SESSION['name_error'])) ? "is-invalid" : ''?>" id="signUpUsername" placeholder="Enter Name" name="name" value="<?= (isset($_SESSION['old_name'])) ? $_SESSION['old_name'] : '' ?>">
                    <?php if(isset($_SESSION['name_error'])):
                    ?>
                        <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['name_error']?></div>
                    <?php
                    endif;
                    ?>

                    <label for="signUpEmail" class="form-label m-t-md">Email address</label>
                    <input type="email" class="form-control <?= (isset($_SESSION['email_error'])) ? "is-invalid" : ''?>" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" name="email_address" value="<?= (isset($_SESSION['old_email'])) ? $_SESSION['old_email'] : '' ?>">
                    <?php if(isset($_SESSION['email_error'])):
                    ?>
                        <div id="emailHelp" class="form-text text-danger"><?=$_SESSION['email_error']?></div>
                    <?php
                    endif;
                    ?>
                    <label for="signUpnumber" class="form-label m-t-md">Phone Number</label>
                    <input type="tel" class="form-control" id="signUpnumber" placeholder="123-45-678" name="phone_number" value="<?= (isset($_SESSION['old_number'])) ? $_SESSION['old_number'] : '' ?>">
                    <label for="signUpPassword" class="form-label m-t-md">Password</label>
                    <input type="password" class="form-control <?= (isset($_SESSION['password_error'])) ? "is-invalid" : ''?>" id="signUpPassword" placeholder="Password" name="password" value="<?= (isset($_SESSION['old_password'])) ? $_SESSION['old_password'] : '' ?>">
                    <label for="show_pass"><input id="show_pass" type="checkbox" onclick="myFunction()"> Show Password </label> <br>
                    <!-- Javascript show password code start -->
                    <script>
                        function myFunction(){
                            var x = document.getElementById("signUpPassword");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    <!-- Javascript show password code end -->
                    
                    <?php if(isset($_SESSION['password_error'])):
                    ?>
                        <div id="emailHelp" class="form-text text-danger"><?=$_SESSION['password_error']?></div>
                    <?php
                    endif;
                    ?>

                    <label for="signUpPassword" class="form-label m-t-md">Confirm Password</label>
                    <input type="password" class="form-control <?= (isset($_SESSION['confirm_password_error'])) ? "is-invalid" : ''?>" id="signUpPassword" aria-describedby="signUpPassword" placeholder="Confirm Password" name="confirm_password">
                    <?php if(isset($_SESSION['confirm_password_error'])):
                    ?>
                        <div id="emailHelp" class="form-text text-danger"><?=$_SESSION['confirm_password_error']?></div>
                    <?php
                    endif;
                    session_unset();
                    ?>
                </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
            </form>
            <div class="divider"></div>            
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="assets/plugins/pace/pace.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
