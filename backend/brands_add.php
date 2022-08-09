<!-- header part start -->
<?php require_once 'inc/header.php';?>

<!-- Content Part start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Add Brand</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add Brand</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <form action="brands_add_post.php" method="POST" enctype="multipart/form-data">
                                <label for="brandname">Brand Name</label>
                                <input name="brandname" id="brandname" placeholder="Brand Name" type="text" class="form-control form-control-solid-bordered m-b-sm">
                                <label for="brandimage">Brand Image</label>
                                <input name="brand_image" type="file" id="brandimage" class="form-control form-control-solid-bordered">
                                <?php 
                                    if(isset($_SESSION['brand_status'])):?>
                                        <small class="text-danger"><?= $_SESSION['brand_status']?></small> <br>
                                    <?php else:?>
                                        <small class="text-danger">Image 150*70 size require</small> <br>
                                    <?php endif; unset($_SESSION['brand_status'])?> 

                                <button type="submit" name="add_brand" class="btn btn-success m-t-sm">Add Brands</button>
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