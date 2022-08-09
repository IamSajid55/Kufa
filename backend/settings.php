<?php
    // database connect
    $db_connect = mysqli_connect('localhost', 'root', '', 'php');
?>
<!-- header part start -->
<?php require_once 'inc/header.php';?>

<!-- Content Part start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Settings</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6" id=copyright>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Copyright Settings</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <?php
                                $select_copyright_from_db = "SELECT * FROM settings WHERE settings_name='Copyright'";
                                $copyright_post = mysqli_query($db_connect,$select_copyright_from_db);
                            ?>
                            <form action="settings_post.php" method="POST" enctype="multipart/form-data">
                                <?php foreach($copyright_post as $copyright):?>
                                    <label for="name"><?= str_replace("_"," ",$copyright['settings_name'])?></label>
                                    <textarea name="<?= $copyright['settings_name']?>" id="name" placeholder="Name" type="text" class="form-control form-control-solid-bordered m-b-sm" cols="30" rows="3"><?= $copyright['settings_value']?></textarea>
                                <?php endforeach;?>
                                <button type="submit" class="btn btn-info m-t-sm">Update</button>
                            </form>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">General Image Settings</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <?php
                                $select_logo_from_db = "SELECT * FROM general_images WHERE about_images='logo'";
                                $logo = mysqli_fetch_assoc(mysqli_query($db_connect,$select_logo_from_db));
                            ?>

                            <!-- Notified logo by session start -->
                            <?php if(isset($_SESSION['logo_Change_status'])) : ?>
                            <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                <div class="alert-content">
                                    <span class="alert-title">Congratulation!</span>
                                    <span class="alert-text"><?= $_SESSION['logo_Change_status']?></span>
                                </div>
                            </div>
                            <?php endif; unset($_SESSION['logo_Change_status']);?>
                            <!-- Notified logo by session end -->
                            
                            <!-- Notified sticky logo by session start -->
                            <?php if(isset($_SESSION['sticky_logo_Change_status'])) : ?>
                            <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                <div class="alert-content">
                                    <span class="alert-title">Congratulation!</span>
                                    <span class="alert-text"><?= $_SESSION['sticky_logo_Change_status']?></span>
                                </div>
                            </div>
                            <?php endif; unset($_SESSION['sticky_logo_Change_status']);?>
                            <!-- Notified sticky logo by session end -->
                            
                            <!-- Notified logo change error by session start
                            <?php if(isset($_SESSION['logo_change_error'])) : ?>
                            <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                                <div class="alert-content">
                                    <span class="alert-title text-danger">Error!</span>
                                    <span class="alert-text text-danger"><?= $_SESSION['logo_change_error']?></span>
                                </div>
                            </div>
                            <?php endif; unset($_SESSION['logo_change_error']);?>
                            Notified logo change error by session end
                            
                            Notified logo change error by session start
                            <?php if(isset($_SESSION['sticky_logo_change_error'])) : ?>
                            <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                                <div class="alert-content">
                                    <span class="alert-title text-danger">Error!</span>
                                    <span class="alert-text text-danger"><?= $_SESSION['sticky_logo_change_error']?></span>
                                </div>
                            </div>
                            <?php endif; unset($_SESSION['sticky_logo_change_error']);?>
                            Notified logo change error by session end -->


                            <form action="settings_images_post.php" method="POST" enctype="multipart/form-data">
                                <label for="id"><?= ucwords(str_replace("_"," ",$logo['about_images']))?></label>
                                <input id="id" class="form-control" name="<?= $logo['about_images'] ?>" type="file">
                                <button type="submit" name="logo" class="btn btn-info m-t-sm m-b-sm">Set Logo</button>
                            </form>
                        </div>

                        <div class="example-content">
                            <?php
                                $select_sticky_logo_from_db = "SELECT * FROM general_images WHERE about_images='sticky_logo'";
                                $sticky_logo = mysqli_fetch_assoc(mysqli_query($db_connect,$select_sticky_logo_from_db));
                            ?>
                            <form action="settings_images_post.php" method="POST" enctype="multipart/form-data">
                                <label for="id"><?= ucwords(str_replace("_"," ",$sticky_logo['about_images']))?></label>
                                <input id="id" class="form-control" name="<?= $sticky_logo['about_images'] ?>" type="file">
                                <button type="submit" name="sticky_logo" class="btn btn-info m-t-sm m-b-sm">Set Sticky Logo</button>
                            </form> 
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
</div>

<!-- footer part start -->
<?php require_once 'inc/footer.php';?>