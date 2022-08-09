<!-- header part start -->
<?php require_once 'inc/header.php';?>

<?php
// database connect
require_once 'inc/db.php';
$ID = $_GET['id'];
$_SESSION['fact_ID'] = $_GET['id'];
$fact_from_db = "SELECT * FROM `facts_area` WHERE id=$ID";
$fact_post = mysqli_fetch_assoc(mysqli_query($db_connect, $fact_from_db));

?>

<!-- Content Part start -->
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Edit Service - <?= $fact_post['fact_title']?> </h1>
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
                            <form action="fact_edit_post.php" method="POST" >

                            <!-- Fact Edit Info Error! Start -->
                            <?php if(isset($_SESSION['fact_edit_error'])) : ?>
                            <div class="alert alert-custom alert-indicator-top indicator-danger" role="alert">
                                <div class="alert-content">
                                    <span class="alert-title text-danger">Error!</span>
                                    <span class="alert-text text-danger"><?= $_SESSION['fact_edit_error']?></span>
                                </div>
                            </div>
                            <?php endif; unset($_SESSION['fact_edit_error']);?>

                            <!-- Fact Edit Info Error! Start -->

                            <label for="factpercentage">Fact Percentage (%)</label>
                                <input name="factpercentage" id="factpercentage" placeholder="Fact Percentage" type="number" class="form-control form-control-solid-bordered m-b-sm" value="<?= $fact_post['fact_percentage']?>">
                                
                                <label for="facttitle">Fact Title</label>
                                <input name="facttitle" id="facttitle" placeholder="Fact Title" type="text" class="form-control form-control-solid-bordered m-b-sm" value="<?= $fact_post['fact_title']?>">

                                <label for="facticon">Fact Icon</label>
                                <input readonly id="fact_input" name="facticon" placeholder="Fact Icon" type="text" class="form-control form-control-solid-bordered m-b-sm" value="<?= $fact_post['fact_icon']?>">
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
                                    <option <?= ($fact_post['status'] == 'Active') ? 'selected' : ''?> value="Active">Active</option>
                                    <option <?= ($fact_post['status'] == 'Deactive') ? 'selected' : ''?> value="Deactive">Deactive</option>
                                </select>
                                <button type="submit" class="btn btn-info">Edit Fact</button>
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