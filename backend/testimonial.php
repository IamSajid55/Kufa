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
                        <h1>Add Textimonial</h1>
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
                            
                                $settings_select_query = "SELECT * FROM settings WHERE settings_name= 'Testimonial_Title' OR settings_name='Testimonial_Heading'";
                                $settings_post = mysqli_query($db_connect,$settings_select_query);

                            ?>
                            <form action="testimonial_general_post.php" method="POST" enctype="multipart/form-data">
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
                    <h5 class="card-title">Add Textimonial</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <form action="textimonial_post.php" method="POST" enctype="multipart/form-data">

                                <label for="clientname">Client Name</label>
                                <input name="clientname" id="clientname" placeholder="Client Name" type="text" class="form-control form-control-solid-bordered m-b-sm">

                                <label for="clientpost">Client Post</label>
                                <input name="clientpost" id="clientpost" placeholder="Client Post" type="text" class="form-control form-control-solid-bordered m-b-sm">
                                
                                <label for="clientopinion">Client Opinion</label>
                                <textarea name="clientopinion" class="form-control form-control-solid-bordered m-b-sm" id="clientopinion" cols="30" rows="5" placeholder="Textimonial"></textarea>

                                <label for="clientpicture">Client Picture</label>
                                <input name="clientpicture" id="clientpicture" type="file" class="form-control form-control-solid-bordered">
                                <?php 
                                    if(isset($_SESSION['textimonial_status'])):?>
                                        <small class="text-danger"><?= $_SESSION['textimonial_status']?></small>
                                    <?php endif; unset($_SESSION['textimonial_status'])?><br>
                                <button type="submit" class="btn btn-success m-t-sm">Add Textimonial</button>
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
    <div class="row" id="textimonial_post">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <div class="example-content">
                                <table class="table table table-bordered">
                                    <thead class="table-dark">
                                        <?php
                                            //  selete services from database
                                            $textimonials_from_db = "SELECT * FROM `textimonials`";
                                            $textimonials_post = mysqli_query($db_connect, $textimonials_from_db);
                                        ?>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Client Name</th>
                                            <th scope="col">Client Post</th>
                                            <th scope="col">Client Opinion</th>
                                            <th scope="col">Client Picture</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $SL = 1;?>
                                        <?php foreach($textimonials_post as $textimonial) :?>
                                        <tr>
                                            <th scope="row"><?= $SL++?></th>
                                            <td><?= $textimonial['client_name'] ?></td>
                                            <td><?= $textimonial['client_post'] ?></td>
                                            <td><textarea rows="5"><?= $textimonial['client_opinion']?></textarea></td>
                                            <td><img src="uploads/client_picture/<?= $textimonial['client_picture']?>" alt="" height="150px" width="150px"></td>
                                            <td>
                                                <!-- <a href="service_delete.php?id=<?= $textimonial['id'] ?>" class="btn btn-danger">Delete</a> -->
                                                <button class="btn btn-danger delete_btn" type="submit" value="testimonial_delete_post.php?id=<?= $textimonial['id'] ?>">Delete</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="50" class="text-center">
                                                <?php if($textimonials_post->num_rows==0):?>
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