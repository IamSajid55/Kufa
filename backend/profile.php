<!-- header part start -->
<?php require_once 'inc/header.php';?>

<!-- Content Part start -->

            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                                    <h1>Profile</h1>
                                    <h2>Welcome, <b><?= (isset($_SESSION['s_name'])) ? $_SESSION['s_name'] : '' ?> (<?= (isset($_SESSION['s_email'])) ? $_SESSION['s_email'] : '' ?>)</b></h2>
                                    <h3>Your ID is <b><?= (isset($_SESSION['s_id'])) ? $_SESSION['s_id'] : '' ?></b></h3> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Change Name</h5>
                        </div>
                            <div class="card-body">
                                <div class="example-container">
                                    <div class="example-content">
                                    <form action="profile_post.php" method="POST" >

                                        <!-- After name change Congratulation Alert Start -->

                                        <?php if(isset($_SESSION['name_change__alart'])) : ?>
                                        <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                            <div class="alert-content">
                                                <span class="alert-title">Congratulation!</span>
                                                <span class="alert-text"><?= $_SESSION['name_change__alart'] ?></span>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php unset($_SESSION['name_change__alart']);?>
                                        
                                        <!-- After name change Congratulation Alert End -->

                                        <input name="chnage_name" type="text" class="form-control form-control-solid-bordered m-b-sm" value="<?= (isset($_SESSION['s_name'])) ? $_SESSION['s_name'] : '' ?>">
                                        <button type="submit" class="btn btn-primary">Change</button>
                                    </form>
                                    </div>
                                </div>
                            </div>     
                    </div>
                    </div>

                    <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Profile Picture Upload</h5>
                        </div>
                            <div class="card-body">
                                <div class="example-container">
                                    <div class="example-content">
                                    <form action="profile_post.php" method="POST" enctype="multipart/form-data">
                                        
                                        <!-- After name change Congratulation Alert Start -->

                                        <?php if(isset($_SESSION['profile_image_status'])) : ?>
                                        <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                            <div class="alert-content">
                                                <span class="alert-title">Congratulation!</span>
                                                <span class="alert-text"><?= $_SESSION['profile_image_status'] ?></span>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php unset($_SESSION['profile_image_status']);?>
                                        
                                        <!-- After name change Congratulation Alert End -->

                                        <input name="filename" type="file" class="form-control form-control-solid-bordered m-b-sm">
                                        <button name="profile_picture" type="submit" class="btn btn-primary">Profile Picture Upload</button>
                                    </form>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Change Number</h5>
                            </div>
                            <div class="card-body">
                                <div class="example-container">
                                    <div class="example-content">
                                    <form action="profile_post.php" method="POST" >

                                        <!-- After phone number change Alert Start -->

                                        <?php if(isset($_SESSION['phone_number_alart'])) : ?>
                                        <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                            <div class="alert-content">
                                                <span class="alert-title">Congratulation!</span>
                                                <span class="alert-text"><?= $_SESSION['phone_number_alart'] ?></span>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php unset($_SESSION['phone_number_alart']);?>
                                        
                                        <!-- After phone number change Alert End -->

                                        <input name="phone_number" type="tel" class="form-control form-control-solid-bordered m-b-sm" value="<?= (isset($_SESSION['s_phone_number'])) ? $_SESSION['s_phone_number'] : '' ?>">
                                        <button type="submit" class="btn btn-primary">Change</button>
                                    </form>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Change Email</h5>
                            </div>
                            <div class="card-body">
                                <div class="example-container">
                                    <div class="example-content">
                                    <form action="profile_post.php" method="POST" >

                                        <!-- After email change successful Alert Start -->

                                        <?php if(isset($_SESSION['email_change_alart'])) : ?>
                                        <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                            <div class="alert-content">
                                                <span class="alert-title">Congratulation!</span>
                                                <span class="alert-text"><?= $_SESSION['email_change_alart'] ?></span>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php unset($_SESSION['email_change_alart']);?>
                                        
                                        <!-- After email change successful Alert End -->

                                        <input name="email_change" type="email" class="form-control form-control-solid-bordered m-b-sm" placeholder="example@example.com" value="<?= (isset($_SESSION['s_email'])) ? $_SESSION['s_email'] : '' ?>">
                                        <button type="submit" class="btn btn-primary">Change</button>
                                    </form>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Change Password</h5>
                            </div>
                            <div class="card-body">
                                <div class="example-container">
                                    <div class="example-content">
                                    <form action="profile_post.php" method="POST" >
                                        <!-- After update password successfully Alert Start -->

                                        <?php if(isset($_SESSION['password_update'])) : ?>
                                        <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                            <div class="alert-content">
                                                <span class="alert-title">Congratulation!</span>
                                                <span class="alert-text"><?= $_SESSION['password_update'] ?></span>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php unset($_SESSION['password_update']);?>
                                        
                                        <!-- After update password successfully Alert End -->
                
                                        <!-- User Password Matching Error! Start -->
                                        <?php if(isset($_SESSION['previous_password_error'])) : ?>
                                        <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                                            <div class="alert-content">
                                                <span class="alert-title text-danger">Error!</span>
                                                <span class="alert-text text-danger"><?= $_SESSION['previous_password_error']?></span>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php unset($_SESSION['previous_password_error']);?>
                                        <!-- User Password Matching Error! End -->

                                        <!-- User Password Matching Error! Start -->
                                        <?php if(isset($_SESSION['new_password_error'])) : ?>
                                        <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                                            <div class="alert-content">
                                                <span class="alert-title text-danger">Error!</span>
                                                <span class="alert-text text-danger"><?= $_SESSION['new_password_error']?></span>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php unset($_SESSION['new_password_error']);?>
                                        <!-- User Password Matching Error! End -->




                                        <input name="previous_password" id="previousPassword" placeholder="Previous Password" type="password" class="form-control form-control-solid-bordered m-b-sm">
                                        <input name="new_password" id="newpassword" placeholder="New Password" type="password" class="form-control form-control-solid-bordered">
                                        <label class="m-b-sm" for="show_pass"><input id="show_pass" type="checkbox" onclick="myFunction()"> Show Password </label> <br>
                                        <!-- Javascript show password code start -->
                                        <script>
                                            function myFunction(){
                                                var x = document.getElementById("newpassword");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }
                                        </script>
                                        <!-- Javascript show password code end -->
                                        <input name="confirm_password" placeholder="Confirm Password" type="password" class="form-control form-control-solid-bordered m-b-sm">
                                        <button type="submit" class="btn btn-primary">Change</button>
                                    </form>
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- footer part start -->
<?php require_once 'inc/footer.php';?>