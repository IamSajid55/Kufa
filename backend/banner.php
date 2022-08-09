<!-- header part start -->
<?php require_once 'inc/header.php';?>
<?php session_start()?>

<!-- Content Part start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Banner Section</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">General Settings</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <?php
                            
                                $settings_select_query = "SELECT * FROM settings WHERE settings_name= 'Hello' OR settings_name='Name' OR settings_name='Bio'";
                                $settings_post = mysqli_query($db_connect,$settings_select_query);

                            ?>
                            <form action="banner_post.php" method="POST" enctype="multipart/form-data">
                                <?php foreach($settings_post as $setting):?>
                                    <label for="name"><?= str_replace("_"," ",$setting['settings_name'])?></label>
                                    <textarea name="<?= $setting['settings_name']?>" id="name" placeholder="Name" type="text" class="form-control form-control-solid-bordered m-b-sm" cols="30" rows="3"><?= $setting['settings_value']?></textarea>
                                <?php endforeach;?>
                                <button type="submit" class="btn btn-info m-t-sm">Update</button>
                            </form>
                            <?php
                                $select_main_picture_from_db = "SELECT * FROM general_images WHERE about_images='main_picture'";
                                $main_picture = mysqli_fetch_assoc(mysqli_query($db_connect,$select_main_picture_from_db));
                            ?>
                            <form action="banner_post.php" method="POST" enctype="multipart/form-data">
                                <label class="m-t-sm"for="id"><?= ucwords(str_replace("_"," ",$main_picture['about_images']))?></label>
                                <input id="id" class="form-control" name="<?= $main_picture['about_images'] ?>" type="file">
                                <button type="submit" name="main_picture" class="btn btn-info m-t-sm m-b-sm">Set Main Picture</button>
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