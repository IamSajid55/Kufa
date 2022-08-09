<!-- header part start -->
<?php require_once 'inc/header.php';?>

<!-- Content Part start -->
<div class="app-content" id="add_portfolio">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Add Portfolio</h1>
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
                            
                                $settings_select_query = "SELECT * FROM settings WHERE settings_name= 'Portfolio_Text' OR settings_name='Portfolio_Heading'";
                                $settings_post = mysqli_query($db_connect,$settings_select_query);

                            ?>
                            <form action="portfolio_general_post.php" method="POST" enctype="multipart/form-data">
                                <?php foreach($settings_post as $setting):?>
                                    <label for="name"><?= str_replace("_"," ",$setting['settings_name'])?></label>
                                    <textarea name="<?= $setting['settings_name']?>" id="name" placeholder="Name" type="text" class="form-control form-control-solid-bordered m-b-sm" cols="30" rows="3"><?= $setting['settings_value']?></textarea>
                                <?php endforeach;?>
                                <button type="submit" class="btn btn-info m-t-sm">Update</button>
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
                    <h5 class="card-title">Add Portfolio</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">

                            <!-- Portfolio Info Error! Start -->
                            <?php if(isset($_SESSION['portfolio_status'])) : ?>
                            <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                                <div class="alert-content">
                                    <span class="alert-title text-danger">Error!</span>
                                    <span class="alert-text text-danger"><?= $_SESSION['portfolio_status']?></span>
                                </div>
                            </div>
                            <?php endif;?>
                            <!-- Portfolio Info Error! End -->
                                <label for="portfolioname">Portfolio Name</label>
                                <input name="portfolioname" id="portfolioname" placeholder="Portfolio Name" type="text" class="form-control form-control-solid-bordered m-b-sm">

                                <label for="portfoliocategory">Portfolio Category</label>
                                <input name="portfoliocategory" id="portfoliocategory" placeholder="Portfolio Category" type="text" class="form-control form-control-solid-bordered m-b-sm">
                                
                                <label for="portfoliodescription">Portfolio Description</label>
                                <textarea name="portfoliodescription" class="form-control form-control-solid-bordered m-b-sm" id="portfoliodescription" cols="30" rows="5"></textarea>

                                <label for="portfoliofile">Portfolio Image</label>
                                <input name="portfoliofile" id="portfoliofile" type="file" class="form-control form-control-solid-bordered">
                                <?php 
                                    if(isset($_SESSION['portfolio_status'])):?>
                                        <small class="text-danger"><?= $_SESSION['portfolio_status']?></small>
                                    <?php else:?>
                                        <small class="text-danger">Image 415*585 size require</small> 
                                    <?php endif; unset($_SESSION['portfolio_status'])?><br>
                                <button type="submit" class="btn btn-success m-t-sm">Add portfolio</button>
                            </form>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
</div>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Portfolio List</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="portfolio">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <a href="#add_portfolio" class="btn btn-primary m-b-sm">Add New portfolio</a>
                        </div>


                        <!-- Recycle Bin services start -->
                            <div class="col-6 text-end">
                                <button type="button" class="btn btn-danger m-b-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Recycle Bin</button>
                            </div>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Delete Portoflios</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <table class="table table table-bordered">
                                            <thead class="table-dark">
                                                <?php
                                                    //  Recycle Bin selete services from database start
                                                    $delete_portfolio_from_db = "SELECT * FROM `portfolios` WHERE status='Deactive'";
                                                    $delete_portfolios_post = mysqli_query($db_connect, $delete_portfolio_from_db);
                                                ?>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Portfolio Name</th>
                                                    <th scope="col">Portfolio Category</th>
                                                    <th scope="col">Portfolio Name</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $SL = 1;?>
                                                <?php foreach($delete_portfolios_post as $delete_portfolio) :?>
                                                <tr>
                                                    <th scope="row"><?= $SL++?></th>
                                                    <td><?= $delete_portfolio['portfolio_name'] ?></td>
                                                    <td><?= $delete_portfolio['portfolio_category'] ?></td>
                                                    <td><?= $delete_portfolio['portfolio_image']?></td>
                                                    <td><a href="portfolio_recycle_bin.php?id=<?= $delete_portfolio['id'] ?>" class="btn btn-info">Restore</a></td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td colspan="50" class="text-center">
                                                        <?php if($delete_portfolios_post->num_rows==0):?>
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
                                
                                <!-- Portfolio Info Congratulation! Start -->
                                <?php if(isset($_SESSION['portfolio_status_added'])) : ?>
                                <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                    <div class="alert-content">
                                        <span class="alert-title">Congratulation!</span>
                                        <span class="alert-text"><?= $_SESSION['portfolio_status_added']?></span>
                                    </div>
                                </div>
                                <?php endif;?>
                                <!-- Portfolio Info Congratulation! End -->

                                <table class="table table table-bordered">
                                    <thead class="table-dark">
                                        <?php
                                            //  selete services from database
                                            $portfolio_from_db = "SELECT * FROM `portfolios` WHERE status='Active'";
                                            $portfolio_post = mysqli_query($db_connect, $portfolio_from_db);
                                        ?>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Portfolio Name</th>
                                            <th scope="col">Portfolio Category</th>
                                            <th scope="col">Portfolio Description</th>
                                            <th scope="col">Portfolio Image</th>
                                            <th scope="col">Portfolio status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $SL = 1;?>
                                        <?php foreach($portfolio_post as $portfolio) :?>
                                        <tr>
                                            <th scope="row"><?= $SL++?></th>
                                            <td><?= $portfolio['portfolio_name'] ?></td>
                                            <td><?= $portfolio['portfolio_category'] ?></td>
                                            <td><textarea rows="5"><?= $portfolio['portfolio_description']?></textarea></td>
                                            <td><img src="uploads/portfolios/<?= $portfolio['portfolio_image']?>" alt="" height="150px" width="150px"></td>
                                            <td>
                                                <?php if($portfolio['status'] == 'Active'):?>   
                                                <span class="badge bg-success"><?= $portfolio['status'] ?> </span>
                                                <?php else:?>
                                                    <span class="badge bg-danger"><?= $portfolio['status'] ?> </span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <!-- <a href="service_delete.php?id=<?= $portfolio['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                <button class="btn btn-danger delete_btn" type="submit" value="portfolio_delete.php?id=<?= $portfolio['id'] ?>">Delete</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="50" class="text-center">
                                                <?php if($portfolio_post->num_rows==0):?>
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