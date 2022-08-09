<!-- header part start -->
<?php require_once 'inc/header.php';?>

<!-- Content Part start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Services List</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <a href="service_add.php" class="btn btn-primary m-b-sm">Add New Service</a>
                        </div>


                        <!-- Recycle Bin services start -->
                            <div class="col-6 text-end">
                                <button type="button" class="btn btn-danger m-b-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Recycle Bin</button>
                            </div>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Delete Services</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <table class="table table table-bordered">
                                            <thead class="table-dark">
                                                <?php
                                                    //  Recycle Bin selete services from database start
                                                    $delete_services_from_db = "SELECT * FROM `services` WHERE delete_status='yes'";
                                                    $delete_services_post = mysqli_query($db_connect, $delete_services_from_db);
                                                ?>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Service Name</th>
                                                    <th scope="col">Service Description</th>
                                                    <th scope="col">Service icon</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $SL = 1;?>
                                                <?php foreach($delete_services_post as $delete_services) :?>
                                                <tr>
                                                    <th scope="row"><?= $SL++?></th>
                                                    <td><?= $delete_services['service_title'] ?></td>
                                                    <td><?= $delete_services['service_description'] ?></td>
                                                    <td><i class="<?= $delete_services['service_icon'] ?>"></i></td>
                                                    <td><a href="service_recycle_bin.php?id=<?= $delete_services['id'] ?>" class="btn btn-info">Restore</a></td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td colspan="50" class="text-center">
                                                        <?php if($delete_services_post->num_rows==0):?>
                                                            <small class="text-danger">No Delete Data Here</small>
                                                        <?php endif;?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <!-- Recycle Bin services end -->
                    </div>


                    <div class="example-container">
                        <div class="example-content">
                            <div class="example-content">
                                
                                <!-- Service Added Info Success! Start -->
                                <?php if(isset($_SESSION['service_status_added'])) : ?>
                                <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                    <div class="alert-content">
                                        <span class="alert-title">Congratulation!</span>
                                        <span class="alert-text"><?= $_SESSION['service_status_added']?></span>
                                    </div>
                                </div>
                                <?php endif; unset($_SESSION['service_status_added']);?>
                                <!-- Service Added Info Success! End -->

                                <!-- Service Edit Info Success! Start -->
                                <?php if(isset($_SESSION['service_status_edit'])) : ?>
                                <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                    <div class="alert-content">
                                        <span class="alert-title">Congratulation!</span>
                                        <span class="alert-text"><?= $_SESSION['service_status_edit']?></span>
                                    </div>
                                </div>
                                <?php endif; unset($_SESSION['service_status_edit']);?>
                                <!-- Service Edit Info Success! End -->

                                <table class="table table table-bordered">
                                    <thead class="table-dark">
                                        <?php
                                            //  selete services from database
                                            $services_from_db = "SELECT * FROM `services` WHERE delete_status='no'";
                                            $services_post = mysqli_query($db_connect, $services_from_db);
                                        ?>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Service Name</th>
                                            <th scope="col">Service Description</th>
                                            <th scope="col">Service icon</th>
                                            <th scope="col">Service status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $SL = 1;?>
                                        <?php foreach($services_post as $services) :?>
                                        <tr>
                                            <th scope="row"><?= $SL++?></th>
                                            <td><?= $services['service_title'] ?></td>
                                            <td><?= $services['service_description'] ?></td>
                                            <td><i class="<?= $services['service_icon'] ?>"></i></td>
                                            <td>
                                                <?php if($services['status'] == 'Active'):?>   
                                                <span class="badge bg-success"><?= $services['status'] ?> </span>
                                                <?php else:?>
                                                    <span class="badge bg-danger"><?= $services['status'] ?> </span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <!-- <a href="service_delete.php?id=<?= $services['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                <button class="btn btn-danger delete_btn" type="submit" value="service_delete.php?id=<?= $services['id'] ?>">Delete</button>
                                                <a href="service_edit.php?id=<?= $services['id'] ?>" class="btn btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="50" class="text-center">
                                                <?php if($services_post->num_rows==0):?>
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

<script>
    $(document).ready(function(){
        $('.delete_btn').click(function(){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $(this).val();
            }
            })
        })
    })

</script>