<!-- header part start -->
<?php require_once 'inc/header.php';?>

<?php
// database connect
require_once 'inc/db.php';
$ID = $_GET['id'];
print_r($ID);
$_SESSION['brands_ID'] = $_GET['id'];
$brands_from_db = "SELECT * FROM `brands` WHERE id=$ID";
$brand_post = mysqli_fetch_assoc(mysqli_query($db_connect, $brands_from_db));

?>

<!-- Content Part start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Edit Brand - <?= $brand_post['brand_name']?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Service</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <form action="brands_edit_post.php" method="POST" enctype="multipart/form-data">

                                <!-- Brand Info Error! Start -->
                                <?php if(isset($_SESSION['brand_edit_error'])) : ?>
                                <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                                    <div class="alert-content">
                                        <span class="alert-title text-danger">Error!</span>
                                        <span class="alert-text text-danger"><?= $_SESSION['brand_edit_error']?></span>
                                    </div>
                                </div>
                                <?php endif; unset($_SESSION['brand_edit_error']);?>
                                <!-- Brand Info Error! End -->

                                <label for="brandname">Brand Name</label>
                                <input name="brandname" id="brandname" placeholder="Brand Name" type="text" class="form-control form-control-solid-bordered m-b-sm" value="<?= $brand_post['brand_name']?>">
                                <label for="brandimage">Brand Image</label>
                                <input name="brand_image" type="file" id="brandimage" class="form-control form-control-solid-bordered m-b-sm" value="<?= $brand_post['brands_image']?>">
                                <button type="submit" class="btn btn-info">Edit Brand</button>
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