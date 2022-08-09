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
                        <h1>About Page</h1>
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
                            
                                $settings_select_query = "SELECT * FROM settings WHERE settings_name= 'Introduction' OR settings_name='About_Text' OR settings_name='About' OR settings_name='Skills'";
                                $settings_post = mysqli_query($db_connect,$settings_select_query);

                            ?>
                            
                            <form action="about_post.php" method="POST" enctype="multipart/form-data">
                                <?php foreach($settings_post as $setting):?>
                                    <label for="name"><?= str_replace("_"," ",$setting['settings_name'])?></label>
                                    <textarea name="<?= $setting['settings_name']?>" id="name" placeholder="Name" type="text" class="form-control form-control-solid-bordered m-b-sm" cols="30" rows="3"><?= $setting['settings_value']?></textarea>
                                <?php endforeach;?>
                                <button type="submit" class="btn btn-info m-t-sm">Update</button>
                            </form>

                            <?php
                                $select_about_image_from_db = "SELECT * FROM general_images WHERE about_images='about_image'";
                                $about_image = mysqli_fetch_assoc(mysqli_query($db_connect,$select_about_image_from_db));
                            ?>

                            <form action="about_post.php" method="POST" enctype="multipart/form-data">
                                <label class="m-t-sm" for="id"><?= ucwords(str_replace("_"," ",$about_image['about_images']))?></label>
                                <input id="id" class="form-control" name="<?= $about_image['about_images'] ?>" type="file">
                                <button type="submit" name="about_image" class="btn btn-info m-t-sm m-b-sm">Set About Picture</button>
                            </form>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
    <div class="row" id="addskills">
        <div class="col-12">
            <div class="card">
                <div class="card-header" id="service_add">
                    <h5 class="card-title">Add Skills</h5>
                </div>
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <?php if(isset($_SESSION['service_status'])) : ?>
                            <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                                <div class="alert-content">
                                    <span class="alert-title text-danger">Error!</span>
                                    <span class="alert-text text-danger"><?= $_SESSION['service_status']?></span>
                                </div>
                            </div>
                            <?php endif; unset($_SESSION['service_status']);?>
                            <form action="skill_post.php" method="POST" >


                            
                                <label for="skilltitle">Skill Title</label>
                                <input name="skilltitle" id="skilltitle" placeholder="Skill Title" type="text" class="form-control form-control-solid-bordered m-b-sm">
                                
                                <label for="skillbio">Skill Bio</label>
                                <input name="skillbio" id="skillbio" placeholder="Skill Bio" type="text" class="form-control form-control-solid-bordered m-b-sm">
                                
                                <label for="skillprogress">Skill Progress (%)</label>
                                <input name="skillprogress" id="skillprogress" placeholder="Skill Progress (%)" type="number" class="form-control form-control-solid-bordered m-b-sm">
                                <button type="submit" class="btn btn-success">Add Skill</button>
                            </form>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
    <div class="app-content" id="skilllists">
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>Skill List</h1>
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
                                <a href="about.php#addskills" class="btn btn-primary m-b-sm">Add New Skill</a>
                            </div>
                        </div>


                        <div class="example-container">
                            <div class="example-content">
                                <div class="example-content">
                                    <table class="table table table-bordered">
                                        <thead class="table-dark">
                                            <?php
                                                //  selete services from database
                                                $skills_from_db = "SELECT * FROM `skills`";
                                                $skills_post = mysqli_query($db_connect, $skills_from_db);
                                            ?>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Skills Title</th>
                                                <th scope="col">Skills Bio</th>
                                                <th scope="col">Skills Progress</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $SL = 1;?>
                                            <?php foreach($skills_post as $skill) :?>
                                            <tr>
                                                <th scope="row"><?= $SL++?></th>
                                                <td><?= $skill['skill_title'] ?></td>
                                                <td><?= $skill['skill_bio'] ?></td>
                                                <td><?= $skill['skill_progress'] ?></td>
                                                <td>
                                                <button class="btn btn-danger delete_btn" type="submit" value="skill_delete.php?id=<?= $skill['id'] ?>">Delete</button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="50" class="text-center">
                                                    <?php if($skills_post->num_rows==0):?>
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