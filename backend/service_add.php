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
                        <h1>Add Services</h1>
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
                            
                                $settings_select_query = "SELECT * FROM settings WHERE settings_name= 'What_We_Do' OR settings_name='Service'";
                                $settings_post = mysqli_query($db_connect,$settings_select_query);

                            ?>
                            <form action="service_general_post.php" method="POST" enctype="multipart/form-data">
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
                <div class="card-header" id="service_add">
                    <h5 class="card-title">Add Service</h5>
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
                            <form action="service_add_post.php" method="POST" >


                            
                                <label for="servicetitle">Service Title</label>
                                <input name="servicetitle" id="servicetitle" placeholder="Service Title" type="text" class="form-control form-control-solid-bordered m-b-sm">

                                <label for="servicedescription">Service Description</label>
                                <textarea class="form-control m-b-sm" name="servicedescription" id="servicedescription" cols="30" rows="5" placeholder="Service Description"></textarea>
                                <label for="serviceicon">Service Icon</label>
                                <input readonly id="service_input" name="serviceicon" placeholder="Service Icon" type="text" class="form-control form-control-solid-bordered m-b-sm">
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
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Deactive</option>
                                </select>
                                <button type="submit" class="btn btn-success">Add Service</button>
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