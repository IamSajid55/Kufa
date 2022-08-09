<?php session_start();?>
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

    
    <!-- Theme Styles -->
    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">
        
        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="login.php">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="register.php">Register</a></p>
            <form action="login_post.php" method="POST">

                <!-- After Login Congratulation Alert Start -->

                <?php if(isset($_SESSION['congratulation'])) : ?>
                <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                    <div class="alert-content">
                        <span class="alert-title">Congratulation!</span>
                        <span class="alert-text"><?= $_SESSION['congratulation'] ?></span>
                    </div>
                </div>
                <?php endif;?>
                
                <!-- After Login Congratulation Alert End -->
                

        
                <!-- User Login Info Error! Start -->
                <?php if(isset($_SESSION['user_login_info_error'])) : ?>
                <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                    <div class="alert-content">
                        <span class="alert-title text-danger">Error!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['user_login_info_error']?></span>
                    </div>
                </div>
                <?php endif;?>

                <?php if(isset($_SESSION['email_error'])) : ?>
                <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                    <div class="alert-content">
                        <span class="alert-title text-danger">Error!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['email_error']?></span>
                    </div>
                </div>
                <?php endif;?>

                <?php if(isset($_SESSION['password_error'])) : ?>
                <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                    <div class="alert-content">
                        <span class="alert-title text-danger">Error!</span>
                        <span class="alert-text text-danger"><?= $_SESSION['password_error']?></span>
                    </div>
                </div>
                <?php endif;?>
                
                <!-- User Login Info Error! End -->

            <div class="auth-credentials m-b-xxl">
            
                <label for="signInEmail" class="form-label">Email address</label>
                <input name="email_address" type="email" class="form-control <?= ($_SESSION['email_error']) ? "is-invalid" : ''?>" id="signInEmail" placeholder="example@neptune.com" value="<?= (isset($_SESSION['email_pass'])) ? "$_SESSION[email_pass]" : ''?>">

                <label for="signInPassword" class="form-label mt-1">Password</label>
                <input name="password" type="password" class="form-control <?= ($_SESSION['password_error']) ? "is-invalid" : ''?>" id="signInPassword" placeholder="Password" value="<?= (isset($_SESSION['password_pass'])) ? "$_SESSION[password_pass]" : ''?>">
                <label for="show_pass"><input id="show_pass" type="checkbox" onclick="myFunction()"> Show Password </label> <br>
                <!-- Javascript show password code start -->
                <script>
                    function myFunction(){
                        var x = document.getElementById("signInPassword");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>
                <!-- Javascript show password code end -->
            </div>
            <div class="auth-submit">
                <button submit href="#" class="btn btn-primary">Login</button>
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

<?= session_unset();?>




