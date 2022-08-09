<!-- header part start -->
<?php require_once 'inc/header.php';?>

            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                                    <h1>Dashboard</h1>
                                    <h2>Welcome, <b><?= (isset($_SESSION['s_name'])) ? $_SESSION['s_name'] : '' ?> (<?= (isset($_SESSION['s_email'])) ? $_SESSION['s_email'] : '' ?>)</b></h2>
                                    <h3>Your ID is <b><?= (isset($_SESSION['s_id'])) ? $_SESSION['s_id'] : '' ?></b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card widget widget-stats">
                                    <div class="card-body">
                                        <div class="widget-stats-container d-flex">
                                            <div class="widget-stats-icon widget-stats-icon-primary">
                                                <i class="material-icons-outlined">paid</i>
                                            </div>
                                            <div class="widget-stats-content flex-fill">
                                                <span class="widget-stats-title">Today's Sales</span>
                                                <span class="widget-stats-amount">$38,211</span>
                                                <span class="widget-stats-info">471 Orders Total</span>
                                            </div>
                                            <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                                                <i class="material-icons">keyboard_arrow_down</i> 4%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card widget widget-stats">
                                    <div class="card-body">
                                        <div class="widget-stats-container d-flex">
                                            <div class="widget-stats-icon widget-stats-icon-warning">
                                                <i class="material-icons-outlined">person</i>
                                            </div>
                                            <div class="widget-stats-content flex-fill">
                                                <span class="widget-stats-title">Total Users</span>
                                                <span class="widget-stats-amount"><?= $users_total_number['Total_Number'] ?></span>
                                                <span class="widget-stats-info">790 unique this month</span>
                                            </div>
                                            <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                                <i class="material-icons">keyboard_arrow_up</i> 12%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card widget widget-stats">
                                    <div class="card-body">
                                        <div class="widget-stats-container d-flex">
                                            <div class="widget-stats-icon widget-stats-icon-danger">
                                                <i class="material-icons-outlined">file_download</i>
                                            </div>
                                            <div class="widget-stats-content flex-fill">
                                                <span class="widget-stats-title">Downloads</span>
                                                <span class="widget-stats-amount">140,390</span>
                                                <span class="widget-stats-info">87 items downloaded</span>
                                            </div>
                                            <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                                                <i class="material-icons">keyboard_arrow_up</i> 7%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Start Foreach loop, this loop selete all info in database and return info in website front-end-->
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">New Users<span class="badge badge-success badge-style-light"><?= $users_total_number['Total_Number'] ?>  total</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <span class="text-muted m-b-xs d-block">showing 5 out of <?= $users_total_number['Total_Number'] ?> new users.</span>
                                        <ul class="widget-list-content list-unstyled" style="overflow-y:scroll; height:350px;">
                                            <?php foreach($return_info_from_db as $users) :?>
                                                <li class="widget-list-item widget-list-item-green">
                                                    <span class="widget-list-item-avatar">
                                                        <div class="avatar avatar-rounded">
                                                            <img src="../assets/images/avatars/avatar.png" alt="">
                                                        </div>
                                                    </span>
                                                    <span class="widget-list-item-description">
                                                        <a href="#" class="widget-list-item-description-title">
                                                        <?= $users['name']?>
                                                        </a>
                                                        <span class="widget-list-item-description-subtitle">
                                                        <?= $users['email_address'] ?>
                                                        </span>
                                                    </span>
                                                </li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Foreach loop, this loop selete all info in database and return info in website front-end-->


                            <div class="col-xl-4">
                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Transactions<span class="badge badge-info badge-style-light">72 Last Week</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <span class="text-muted m-b-xs d-block">showing 5 out of 72 transactoins.</span>
                                        <ul class="widget-list-content list-unstyled">
                                            <li class="widget-list-item widget-list-item-blue">
                                                <span class="widget-list-item-icon">
                                                    <i class="material-icons-outlined">import_export</i>
                                                </span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        Transfer between own accounts
                                                    </a>
                                                    <span class="widget-list-item-description-date">
                                                        Today
                                                    </span>
                                                </span>
                                                <span class="widget-list-item-transaction-amount-positive">$50</span>
                                            </li>
                                            <li class="widget-list-item widget-list-item-blue">
                                                <span class="widget-list-item-icon">
                                                    <i class="material-icons-outlined">savings</i>
                                                </span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        Monthly transfer to savings
                                                    </a>
                                                    <span class="widget-list-item-description-date">
                                                        3 June
                                                    </span>
                                                </span>
                                                <span class="widget-list-item-transaction-amount-positive">$800</span>
                                            </li>
                                            <li class="widget-list-item widget-list-item-blue">
                                                <span class="widget-list-item-icon">
                                                    <i class="material-icons-outlined">paid</i>
                                                </span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        Transfer to Cayson Felix
                                                    </a>
                                                    <span class="widget-list-item-description-date">
                                                        1 June
                                                    </span>
                                                </span>
                                                <span class="widget-list-item-transaction-amount-negative">$128.22</span>
                                            </li>
                                            <li class="widget-list-item widget-list-item-blue">
                                                <span class="widget-list-item-icon">
                                                    <i class="material-icons-outlined">import_export</i>
                                                </span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        Transfer between own accounts
                                                    </a>
                                                    <span class="widget-list-item-description-date">
                                                        24 May
                                                    </span>
                                                </span>
                                                <span class="widget-list-item-transaction-amount-positive">$70.81</span>
                                            </li>
                                            <li class="widget-list-item widget-list-item-blue">
                                                <span class="widget-list-item-icon">
                                                    <i class="material-icons-outlined">receipt</i>
                                                </span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        Police Fine Payment
                                                    </a>
                                                    <span class="widget-list-item-description-date">
                                                        22 May
                                                    </span>
                                                </span>
                                                <span class="widget-list-item-transaction-amount-negative">$170</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card widget widget-list">
                                    <div class="card-header">
                                        <h5 class="card-title">Downloads<span class="badge badge-info badge-style-light">45 in queue</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <span class="text-muted m-b-xs d-block">showing 5 out of 45 downloads.</span>
                                        <ul class="widget-list-content list-unstyled">
                                            <li class="widget-list-item widget-list-item-blue">
                                                <span class="widget-list-item-icon"><i class="material-icons-outlined">description</i></span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        transfers_data.json
                                                    </a>
                                                    <span class="widget-list-item-description-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </span>
                                                </span>
                                            </li>
                                            <li class="widget-list-item widget-list-item-blue">
                                                <span class="widget-list-item-icon"><i class="material-icons-outlined">lock</i></span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        DashboardAsssets.zip
                                                    </a>
                                                    <span class="widget-list-item-description-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 57%;" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </span>
                                                </span>
                                            </li>
                                            <li class="widget-list-item widget-list-item-purple">
                                                <span class="widget-list-item-icon"><i class="material-icons-outlined">image</i></span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        profile_image.png
                                                    </a>
                                                    <span class="widget-list-item-description-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 14%;" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </span>
                                                </span>
                                            </li>
                                            <li class="widget-list-item widget-list-item-yellow">
                                                <span class="widget-list-item-icon"><i class="material-icons-outlined">code</i></span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        bootstrap.min.js
                                                    </a>
                                                    <span class="widget-list-item-description-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 79%;" aria-valuenow="79" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </span>
                                                </span>
                                            </li>
                                            <li class="widget-list-item widget-list-item-yellow">
                                                <span class="widget-list-item-icon"><i class="material-icons-outlined">code</i></span>
                                                <span class="widget-list-item-description">
                                                    <a href="#" class="widget-list-item-description-title">
                                                        bootstrap.min.css
                                                    </a>
                                                    <span class="widget-list-item-description-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </span>
                                                </span>
                                            </li>
                                        </ul>
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