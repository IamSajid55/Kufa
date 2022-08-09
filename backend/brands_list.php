<!-- header part start -->
<?php require_once 'inc/header.php';?>

<!-- Content Part start -->

<?php

//  selete brands from database
$brands_from_db = "SELECT * FROM `brands` WHERE $id";
$brands_post = mysqli_query($db_connect, $brands_from_db);

?>

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Brands List</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <a href="brands_add.php" class="btn btn-primary m-b-sm">Add New Brand</a>
                    <div class="example-container">
                        <div class="example-content">
                            <div class="example-content">

                                <!-- Brand Added Info Success! Start -->
                                <?php if(isset($_SESSION['brand_edit_success'])) : ?>
                                <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                    <div class="alert-content">
                                        <span class="alert-title">Congratulation!</span>
                                        <span class="alert-text"><?= $_SESSION['brand_edit_success']?></span>
                                    </div>
                                </div>
                                <?php endif; unset($_SESSION['brand_edit_success']);?>
                                <!-- Brand Added Info Success! End -->

                                <!-- Brand Edit Info Success! Start -->
                                <?php if(isset($_SESSION['brand_added_success'])) : ?>
                                <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                    <div class="alert-content">
                                        <span class="alert-title">Congratulation!</span>
                                        <span class="alert-text"><?= $_SESSION['brand_added_success']?></span>
                                    </div>
                                </div>
                                <?php endif; unset($_SESSION['brand_added_success']);?>
                                <!-- Brand Edit Info Success! End -->


                                <table class="table table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Brands Name</th>
                                            <th scope="col">Brands Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $SL = 1;?>
                                        <?php foreach($brands_post as $brand) :?>
                                        <tr>
                                            <td scope="row"><?= $SL++?></td>
                                            <td><?= $brand['brand_name'] ?></td>
                                            <td><img src="uploads/brands/<?= $brand['brands_image']?>" alt=""></td>
                                            <td><a href="brands_delete_post.php?id=<?= $brand['id'] ?>" class="btn btn-danger">Delete</a> <a href="brands_edit.php?id=<?= $brand['id'] ?>" class="btn btn-warning">Edit</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tr>
                                        <td colspan="50" class="text-center">
                                            <?php if($brands_post->num_rows==0):?>
                                                <small class="text-danger">No Data Here</small>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                </table>
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