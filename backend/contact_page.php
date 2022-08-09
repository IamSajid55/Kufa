<!-- header part start -->
<?php require_once 'inc/header.php';?>

<!-- database connect -->
<?php require_once 'inc/db.php';?>

<!-- Content Part start -->

<?php
session_start();
//  selete services from database
$contacts_from_db = "SELECT * FROM `contacts` WHERE $id";
$contacts_post = mysqli_query($db_connect, $contacts_from_db);

?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Contacts</h1>
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
                                $select_genaral_from_db = "SELECT * FROM Settings WHERE settings_name='Information' OR settings_name='Contact_Information' OR settings_name='Information_Paragraph' OR settings_name='Contacts_Header' OR settings_name='Address' OR settings_name='Phone' OR settings_name='Email'";
                                $genaral_post = mysqli_query($db_connect, $select_genaral_from_db);
                            ?>
                            <form action="contact_general_post.php" method="POST" enctype="multipart/form-data">
                                <?php foreach($genaral_post as $setting):?>
                                <label for="name"><?= str_replace('_', ' ', ucwords($setting['settings_name']))?></label>
                                <textarea name="<?=$setting['settings_name']?>" id="name" placeholder="Name" type="text" class="form-control form-control-solid-bordered m-b-sm" cols="30" rows="3"><?=$setting['settings_value']?></textarea>
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
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <div class="example-content">
                                <table class="table table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Customer Email</th>
                                            <th scope="col">Customer Message</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $SL = 1;?>
                                        <?php foreach($contacts_post as $contact) :?>
                                        <tr>
                                            <th scope="row"><?= $SL++?></th>
                                            <td><?= $contact['customer_name'] ?></td>
                                            <td><?= $contact['customer_email_address'] ?></td>
                                            <td><?= $contact['customer_message'] ?></td>
                                            <td><a href="contact_delete.php?id=<?= $contact['id'] ?>" class="btn btn-danger">Delete</a> <a href="contact_reply.php?id=<?= $contact['id'] ?>" class="btn btn-warning">Reply</a></td>
                                        </tr>
                                        <?php endforeach; ?>
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