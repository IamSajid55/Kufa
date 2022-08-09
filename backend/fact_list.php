<!-- header part start -->
<?php require_once 'inc/header.php';?>

<!-- Content Part start -->

<?php

//  selete services from database
$fact_from_db = "SELECT * FROM `facts_area` WHERE $id";
$fact_post = mysqli_query($db_connect, $fact_from_db);

?>

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>fact List</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <a href="fact_add.php" class="btn btn-primary m-b-sm">Add New Fact</a>
                    <div class="example-container">
                        <div class="example-content">
                            <div class="example-content">
                                
                            <!-- Fact Added Info Success! Start -->
                                <?php if(isset($_SESSION['fact_status_added'])) : ?>
                                <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                    <div class="alert-content">
                                        <span class="alert-title">Congratulation!</span>
                                        <span class="alert-text"><?= $_SESSION['fact_status_added']?></span>
                                    </div>
                                </div>
                                <?php endif; unset($_SESSION['fact_status_added']);?>
                            <!-- Fact Added Info Success! End -->

                            <!-- Fact Edit Info Success! Start -->
                            <?php if(isset($_SESSION['fact_edit_success'])) : ?>
                            <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                <div class="alert-content">
                                    <span class="alert-title">Congratulation!</span>
                                    <span class="alert-text"><?= $_SESSION['fact_edit_success']?></span>
                                </div>
                            </div>
                            <?php endif; unset($_SESSION['fact_edit_success']);?>
                            <!-- Fact Edit Info Success! End -->

                                <table class="table table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Fact Percentage</th>
                                            <th scope="col">Fact Title</th>
                                            <th scope="col">Fact icon</th>
                                            <th scope="col">Fact status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $SL = 1;?>
                                        <?php foreach($fact_post as $facts) :?>
                                        <tr>
                                            <th scope="row"><?= $SL++?></th>
                                            <td><?= $facts['fact_percentage'] ?></td>
                                            <td><?= $facts['fact_title'] ?></td>
                                            <td><i class="<?= $facts['fact_icon'] ?>"></i></td>
                                            <td>
                                                <?php if($facts['status'] == 'Active'):?>   
                                                <span class="badge bg-success"><?= $facts['status'] ?> </span>
                                                <?php else:?>
                                                    <span class="badge bg-danger"><?= $facts['status'] ?> </span>
                                                <?php endif;?>
                                            </td>
                                            <td><a href="fact_delete_post.php?id=<?= $facts['id'] ?>" class="btn btn-danger">Delete</a> <a href="fact_edit.php?id=<?= $facts['id'] ?>" class="btn btn-warning">Edit</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                        <td colspan="50" class="text-center">
                                            <?php if($fact_post->num_rows==0):?>
                                                <small class="text-danger">No Data Here</small>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                    </tbody>
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