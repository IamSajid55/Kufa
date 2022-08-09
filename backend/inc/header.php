<?php session_start();
    if(!isset($_SESSION['s_email'])){
        header('location: 404.php');
    }
    // database connect
    require_once 'inc/db.php';

    // selete user info and reture info in the website front-end query
    $return_info_query = "SELECT id,name,email_address FROM users";

    // connecting database to above query
    $return_info_from_db = mysqli_query($db_connect, $return_info_query);

    // return database total users number query
    $return_users_num_query = "SELECT COUNT(*) AS 'Total_Number' FROM users";

    // connecting database to above query
    $return_users_num_from_db = mysqli_query($db_connect, $return_users_num_query);

    // above object info recovering array
    $users_total_number = mysqli_fetch_assoc($return_users_num_from_db);

    // Take the Page name
    $link = explode('/', $_SERVER['PHP_SELF']);
    $end = end($link);

    // Get profile image from database
    $id = $_SESSION['s_id'];
    $get_profile_picture_query = "SELECT profile_picture FROM `users` WHERE id=$id";
    $get_profile_picture = mysqli_fetch_assoc(mysqli_query($db_connect, $get_profile_picture_query));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="../assets/css/main.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/neptune.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="dashboard.php" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        <!-- Insert profile image in profile code start -->

                        <img style="border-radius: 50%; max-width: 50px; max-height: 50px;" src="uploads/profile_picture/<?= $get_profile_picture['profile_picture']?>">

                        <!-- Insert profile image in profile code end -->
                        
                        <span class="activity-indicator"></span>
                        <span class="user-info-text"><?= (isset($_SESSION['s_name'])) ? $_SESSION['s_name'] : '' ?><br><span class="user-state-info"><?= (isset($_SESSION['s_email'])) ? $_SESSION['s_email'] : '' ?></span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">

                <!-- Main Manu Start -->

                <ul class="accordion-menu">

                    <!-- Main Manu Active Class dynamic Code Start -->

                    <li class="sidebar-title">
                        Menu
                    </li>
                    <li>
                        <a href="../index.php" class="active" target="_blank"><i class="material-icons-two-tone">home</i>Visit Site</a>
                    </li>
                    <li class="<?= ($end == 'dashboard.php') ? "active-page" : ''?>">
                        <a href="dashboard.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li class="<?= ($end == 'banner.php') ? "active-page" : ''?>">
                        <a href="banner.php" class="active"><i class="material-icons-two-tone">featured_play_list</i>Banner</a>
                    </li>
                    <li class="<?= ($end == 'about.php') ? "active-page" : ''?>">
                        <a href="about.php" class="active"><i class="material-icons-two-tone">folder_shared</i>About</a>
                    </li>
                    <li class="<?= ($end == 'profile.php') ? "active-page" : ''?>">
                        <a href="profile.php" class="active"><i class="material-icons-two-tone">person</i>Profile</a>
                    </li>
                    <li class="<?= ($end == 'settings.php') ? "active-page" : ''?>" >
                        <a href="settings.php"><i class="material-icons-two-tone">settings</i>Settings</a>
                    </li>
                    <li class="<?= ($end == 'service_add.php') ? "active-page" : ''?>">
                        <a href=""><i class="material-icons-two-tone">star</i>Services<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($end == 'service_add.php') ? "active" : ''?>" href="service_add.php">Add Service</a>
                            </li>
                            <li>
                                <a class="<?= ($end == 'services_list.php') ? "active" : ''?>" href="services_list.php">List Services</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($end == 'portfolio.php') ? "active-page" : ''?>" >
                        <a href="portfolio.php"><i class="material-icons-two-tone">library_books</i>Portfolio</a>
                    </li>
                    <li class="<?= ($end == 'fact_add.php') ? "active-page" : ''?>">
                        <a href=""><i class="material-icons-two-tone">fact_check</i>Fact Area<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($end == 'fact_add.php') ? "active" : ''?>" href="fact_add.php">Add Fact</a>
                            </li>
                            <li>
                                <a class="<?= ($end == 'fact_list.php') ? "active" : ''?>" href="fact_list.php">List Fact</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($end == 'brands_add.php') ? "active-page" : ''?>">
                        <a href=""><i class="material-icons-two-tone">image</i>Brands<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($end == 'brands_add.php') ? "active" : ''?>" href="brands_add.php">Add Brands</a>
                            </li>
                            <li>
                                <a class="<?= ($end == 'brands_list.php') ? "active" : ''?>" href="brands_list.php">List Brands</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($end == 'contact_page.php') ? "active-page" : ''?>">
                        <a href="contact_page.php" class="active"><i class="material-icons-two-tone">contact_phone</i>Contact</a>
                    </li>
                    <li class="<?= ($end == 'testimonial.php') ? "active-page" : ''?>">
                        <a href="testimonial.php" class="active"><i class="material-icons-two-tone">how_to_reg</i>Testimonial</a>
                    </li>
                    <!-- Main Manu Active Class dynamic Code End -->


                </ul>

                <!-- Main Manu End -->

            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                        <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                        <li><a class="dropdown-item" href="#">New Board</a></li>
                                        <li><a class="dropdown-item" href="#">Create Project</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons-outlined">explore</i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                        <li>
                                            <h6 class="dropdown-header">Repositories</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune iOS
                                                    <span class="badge badge-warning">1.0.2</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune Android
                                                    <span class="badge badge-info">dev</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-btn-item d-grid">
                                            <button class="btn btn-primary">Create new repository</button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
            
                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"><img src="../assets/images/flags/us.png" alt=""></a>
                                        <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                            <li><a class="dropdown-item" href="#"><img src="../assets/images/flags/germany.png" alt="">German</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../assets/images/flags/italy.png" alt="">Italian</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="../assets/images/flags/china.png" alt="">Chinese</a></li>
                                        </ul>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" href="#" data-bs-toggle="dropdown">4</a>
                                    <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                                        <h6 class="dropdown-header">Notifications</h6>
                                        <div class="notifications-dropdown-list">
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-info text-white">
                                                            <i class="material-icons-outlined">campaign</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Donec tempus nisi sed erat vestibulum, eu suscipit ex laoreet</p>
                                                        <small>19:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-danger text-white">
                                                            <i class="material-icons-outlined">bolt</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Quisque ligula dui, tincidunt nec pharetra eu, fringilla quis mauris</p>
                                                        <small>18:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-success text-white">
                                                            <i class="material-icons-outlined">alternate_email</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Nulla id libero mattis justo euismod congue in et metus</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent sodales lobortis velit ac pellentesque</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="../assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent lacinia ante eget tristique mattis. Nam sollicitudin velit sit amet auctor porta</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php"><button class="btn btn-danger">Log Out</button></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>