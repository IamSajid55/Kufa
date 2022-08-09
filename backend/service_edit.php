<!-- header part start -->
<?php require_once 'inc/header.php';?>

<?php
// database connect
require_once 'inc/db.php';
$ID = $_GET['id'];
$_SESSION['service_ID'] = $_GET['id'];
$services_from_db = "SELECT * FROM `services` WHERE id=$ID";
$services_post = mysqli_fetch_assoc(mysqli_query($db_connect, $services_from_db));

?>

<!-- Content Part start --> 

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Edit Service - <?= $services_post['service_title']?> </h1>
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
                            <form action="service_edit_post.php" method="POST" >

                            
                                <!-- Service Status Info Error! Start -->
                                    <?php if(isset($_SESSION['service_status_error'])) : ?>
                                    <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                                        <div class="alert-content">
                                            <span class="alert-title text-danger">Error!</span>
                                            <span class="alert-text text-danger"><?= $_SESSION['service_status_error']?></span>
                                        </div>
                                    </div>
                                    <?php endif; unset($_SESSION['service_status_error']);?>
                                <!-- Service Status Info Error! Start --> 


                                <label for="servicetitle">Service Title</label>
                                <input name="servicetitle" id="servicetitle" placeholder="Service Title" type="text" class="form-control form-control-solid-bordered m-b-sm" value="<?= $services_post['service_title']?>">

                                <label for="servicedescription">Service Description</label>
                                <textarea class="form-control m-b-sm" name="servicedescription" id="servicedescription" cols="30" rows="5" placeholder="Service Description"><?= $services_post['service_description']?></textarea>
                                <label for="serviceicon">Service Icon</label>
                                <input readonly id="service_input" name="serviceicon" placeholder="Service Icon" type="text" class="form-control form-control-solid-bordered m-b-sm" value="<?= $services_post['service_icon']?>">
                                <?php require_once 'fonts.php'?>
                                <div class="card">
                                    <div class="card-header">
                                        Choose the Fonts below <span id="icon_viwer"><i></i></span>
                                    </div>
                                    <div class="card-body" style="overflow-y:scroll; height:200px;">
                                        <?php foreach($fonts as $font):?>
                                            <span class="badge badge-primary m-1 font_span" id="<?= $font?>">
                                                <i class="fa-2x <?= $font?>"></i>
                                            </span>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <label for="status">Status</label>
                                <select class="form-select m-b-sm" name="status" id="status">
                                    <option <?= ($services_post['status'] == 'Active') ? 'selected' : ''?> value="Active">Active</option>
                                    <option <?= ($services_post['status'] == 'Deactive') ? 'selected' : ''?> value="Deactive">Deactive</option>
                                </select>
                                <button type="submit" class="btn btn-info">Edit Service</button>
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

<script>
    $(document).ready(function(){
        $('.font_span').click(function(){
            $('#service_input').val($(this).attr('id'));
            $('#icon_viwer').removeClass();
            $('#icon_viwer').addClass($(this).attr('id'));
        })
    })
</script>