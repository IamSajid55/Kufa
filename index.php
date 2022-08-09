<?php

session_start();
// database connect
$db_connect = mysqli_connect('localhost', 'root', '', 'php');

// selete user info and reture info in the website front-end query
$return_info_query = "SELECT id,name,email_address FROM users";

// connecting database to above query
$return_info_from_db = mysqli_fetch_assoc(mysqli_query($db_connect, $return_info_query));
$id = $return_info_from_db['id'];

//  selete services from database
$services_from_db = "SELECT * FROM `services` WHERE id=$id OR delete_status='no'";
$services_post = mysqli_query($db_connect, $services_from_db);

//  selete fact from database
$facts_from_db = "SELECT * FROM `facts_area` WHERE $id";
$facts_post = mysqli_query($db_connect, $facts_from_db);

//  selete brands image and datas from database
$brands_from_db = "SELECT * FROM `brands` WHERE $id";
$brands_post = mysqli_query($db_connect, $brands_from_db);

//  selete brands image and datas from database
$portfolio_from_db = "SELECT * FROM `portfolios` WHERE status='Active'";
$portfolio_post = mysqli_query($db_connect, $portfolio_from_db);

//  selete testimonial image and datas from database
$testimonial_from_db = "SELECT * FROM `textimonials`";
$testimonial_post = mysqli_query($db_connect, $testimonial_from_db);



// select settings all info by separate from database start here 
$settings_name_from_db = "SELECT * FROM `settings` WHERE settings_name = 'Name'";
$name = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_name_from_db))['settings_value'];

$settings_bio_from_db = "SELECT * FROM `settings` WHERE settings_name = 'Bio'";
$bio = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_bio_from_db))['settings_value'];

$settings_hello_from_db = "SELECT * FROM `settings` WHERE settings_name = 'Hello'";
$hello = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_hello_from_db))['settings_value'];

$settings_introduction_from_db = "SELECT * FROM `settings` WHERE settings_name = 'Introduction'";
$introduction = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_introduction_from_db))['settings_value'];

$settings_about_text_from_db = "SELECT * FROM `settings` WHERE settings_name = 'About_Text'";
$about_text = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_about_text_from_db))['settings_value'];

$settings_about_from_db = "SELECT * FROM `settings` WHERE settings_name = 'About'";
$about = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_about_from_db))['settings_value'];

$settings_skills_from_db = "SELECT * FROM `settings` WHERE settings_name = 'Skills'";
$skills = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_skills_from_db))['settings_value'];

$settings_service_W_from_db = "SELECT * FROM settings WHERE settings_name= 'What_We_Do'";
$service_title = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_service_W_from_db))['settings_value'];

$settings_service_S_from_db = "SELECT * FROM settings WHERE settings_name='Service'";
$service_heading = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_service_S_from_db))['settings_value'];

$settings_portfolio_T_from_db = "SELECT * FROM settings WHERE settings_name='Portfolio_Text'";
$portfolio_title = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_portfolio_T_from_db))['settings_value'];

$settings_portfolio_H_from_db = "SELECT * FROM settings WHERE settings_name='Portfolio_Heading'";
$portfolio_heading = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_portfolio_H_from_db))['settings_value'];

$settings_testimonial_T_from_db = "SELECT * FROM settings WHERE settings_name='Testimonial_Title'";
$testimonial_title = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_testimonial_T_from_db))['settings_value'];

$settings_testimonial_H_from_db = "SELECT * FROM settings WHERE settings_name='Testimonial_Heading'";
$testimonial_heading = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_testimonial_H_from_db))['settings_value'];

$settings_information_from_db = "SELECT * FROM settings WHERE settings_name='Information'";
$information = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_information_from_db))['settings_value'];

$settings_contact_information_from_db = "SELECT * FROM settings WHERE settings_name='Contact_Information'";
$contact_information = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_contact_information_from_db))['settings_value'];

$settings_information_paragraph_from_db = "SELECT * FROM settings WHERE settings_name='Information_Paragraph'";
$information_paragraph = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_information_paragraph_from_db))['settings_value'];

$settings_contacts_header_from_db = "SELECT * FROM settings WHERE settings_name='Contacts_Header'";
$contacts_header = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_contacts_header_from_db))['settings_value'];

$settings_address_from_db = "SELECT * FROM settings WHERE settings_name='Address'";
$address = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_address_from_db))['settings_value'];

$settings_Phone_from_db = "SELECT * FROM settings WHERE settings_name='Phone'";
$phone = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_Phone_from_db))['settings_value'];

$settings_email_from_db = "SELECT * FROM settings WHERE settings_name='Email'";
$email = mysqli_fetch_assoc(mysqli_query($db_connect, $settings_email_from_db))['settings_value'];

$select_copyright_from_db = "SELECT * FROM settings WHERE settings_name='Copyright'";
$copyright = mysqli_fetch_assoc(mysqli_query($db_connect,$select_copyright_from_db))['settings_value'];


// select settings all info by separate from database start end 

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="frontend/css/animate.min.css">
        <link rel="stylesheet" href="frontend/css/magnific-popup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="frontend/css/flaticon.css">
        <link rel="stylesheet" href="frontend/css/slick.css">
        <link rel="stylesheet" href="frontend/css/aos.css">
        <link rel="stylesheet" href="frontend/css/default.css">
        <link rel="stylesheet" href="frontend/css/style.css">
        <link rel="stylesheet" href="frontend/css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                <?php
                                    $select_logo_from_db = "SELECT images_name FROM general_images WHERE about_images='logo'";
                                    $logo = mysqli_fetch_assoc(mysqli_query($db_connect,$select_logo_from_db))['images_name'];

                                    $select_sticky_logo_from_db = "SELECT images_name FROM general_images WHERE about_images='sticky_logo'";
                                    $sticky_logo = mysqli_fetch_assoc(mysqli_query($db_connect,$select_sticky_logo_from_db))['images_name'];
                                ?>
                                    <a href="index.php" class="navbar-brand logo-sticky-none"><img src="backend/uploads/images/logo/<?= $logo?>" alt="Logo"></a>
                                    <a href="index.php" class="navbar-brand s-logo-none"><img src="backend/uploads/images/sticky_logo/<?= $sticky_logo?>" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="fa fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="frontend/img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p><?= $address?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p><?= $phone?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?= $email?></p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <a href="#"><i class="fa fa-facebook-f"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?= $hello?></h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?= $name?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?= $bio?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                                <a href="#portfolio" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <?php
                            $select_main_picture_from_db = "SELECT images_name FROM general_images WHERE about_images='main_picture'";
                            $main_picture = mysqli_fetch_assoc(mysqli_query($db_connect,$select_main_picture_from_db))['images_name'];
                        ?>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="backend/uploads/images/main_image/<?= $main_picture?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="frontend/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <?php
                            $select_about_image_from_db = "SELECT images_name FROM general_images WHERE about_images='about_image'";
                            $about_image = mysqli_fetch_assoc(mysqli_query($db_connect,$select_about_image_from_db))['images_name'];
                        ?>
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="backend/uploads/images/about_image/<?= $about_image?>" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span><?= $introduction?></span>
                                <h2><?= $about_text?></h2>
                            </div>
                            <div class="about-content">
                                <p><?= $about?></p>
                                <h3><?= $skills?>:</h3>
                            </div>
                            <?php
                                $select_skill_query = "SELECT * FROM skills";
                                $skills_post = mysqli_query($db_connect,$select_skill_query);
                            ?>
                            <!-- Education Item -->
                            <?php foreach($skills_post as $skills):?>
                            <div class="education">
                                <div class="year"><?= $skills['skill_title']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $skills['skill_bio']?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $skills['skill_progress']?>%;" aria-valuenow="<?= $skills['skill_progress']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <!-- Services-area have dynamic now start -->

            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span><?= $service_title?></span>
                                <h2><?= $service_heading?></h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <?php foreach($services_post as $services):?>
                            <?php if($services['status'] == 'Active'):?>
                            <div class="col-lg-4 col-md-6">
                                <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                    <i class="<?= $services['service_icon'] ?>"></i>
                                    <h3><?= $services['service_title'] ?></h3>
                                    <p>
                                        <?= $services['service_description'] ?>
                                    </p>
                                </div>
                            </div>
                            <?php endif;?>
                        <?php endforeach;?>
					</div>
				</div>
			</section>

            <!-- Services-area have dynamic now end -->
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span><?= $portfolio_title?></span>
                                <h2><?= $testimonial_heading?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($portfolio_post as $portfolio):?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="backend/uploads/portfolios/<?= $portfolio['portfolio_image']?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?= $portfolio['portfolio_category']?></span>
									<h4><a href=""><?= $portfolio['portfolio_name']?></a></h4>
									<a href="portfolio-single.php?id=<?= $portfolio['id']?>" class="arrow-btn">More information</a>
								</div>
							</div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <!-- fact area have dynamic now start -->

            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <?php foreach($facts_post as $fact) :?>
                                <?php if($fact['status'] == 'Active') :?>
                                <div class="col-xl-2 col-lg-3 col-sm-6">
                                    <div class="fact-box text-center mb-50">
                                        <div class="fact-icon">
                                            <i class="<?= $fact['fact_icon']?>"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h2><span class="count"><?= $fact['fact_percentage']?></span></h2>
                                            <span><?= $fact['fact_title']?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endif;?>
                            <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- fact area have dynamic now end -->
            <!-- fact-area-end -->


            <!-- testimonial area have testimonial now start -->
            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span><?= $testimonial_title?></span>
                                <h2><?= $testimonial_heading?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">

                                <?php foreach ($testimonial_post as $testimonial) :?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="backend/uploads/client_picture/<?= $testimonial['client_picture']?>" alt="img" style="width: 86px; height: 86px; border-radius: 50%;">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?= $testimonial['client_opinion']?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $testimonial['client_name']?></h5>
                                            <span><?= $testimonial['client_post']?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->
            <!-- testimonial area have testimonial now end -->


            <!-- brand area have dynamic now start -->
            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <?php foreach($brands_post as $brand):?>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="backend/uploads/brands/<?= $brand['brands_image']?>" alt="img">
                            </div>
                        </div>
                        <?php endforeach;?>
                        <!-- <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="backend/uploads/brand/brand_img02.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="backend/uploads/brand/brand_img03.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="backend/uploads/brand/brand_img04.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="backend/uploads/brand/brand_img05.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="backend/uploads/brand/brand_img03.png" alt="img">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->
            <!-- brand area have dynamic now end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span><?=$information?></span>
                                <h2><?=$contact_information?></h2>
                            </div>
                            <div class="contact-content">
                                <p><?= $information_paragraph?></p>
                                <h5><?= $contacts_header?></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i><span>ADDRESS :</span><?= $address?></li>
                                        <li><i class="fa fa-headphones"></i><span>Phone :</span><?= $phone?></li>
                                        <li><i class="fa fa-envelope-o"></i><span>E-mail :</span><?= $email?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="backend/contact_form_post.php" method="POST">

                                    <!-- Thank You Message Start -->

                                        <?php if(isset($_SESSION['submit_successful_status'])) : ?>
                                        <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                                            <div class="alert-content">
                                                <span class="alert-title text-light"><?= $_SESSION['submit_successful_status'] ?></span>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <?php unset($_SESSION['submit_successful_status']);?>
                                        
                                    <!-- Thank You Message End -->

                                    <input name="customer_name" type="text" placeholder="your name *">
                                    <input name="customer_email_address" type="email" placeholder="your email *">
                                    <textarea name="message" id="message" placeholder="your message *"></textarea>
                                    <button type="submit" class="btn">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p><?= $copyright?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="frontend/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="frontend/js/popper.min.js"></script>
        <script src="frontend/js/bootstrap.min.js"></script>
        <script src="frontend/js/isotope.pkgd.min.js"></script>
        <script src="frontend/js/one-page-nav-min.js"></script>
        <script src="frontend/js/slick.min.js"></script>
        <script src="frontend/js/ajax-form.js"></script>
        <script src="frontend/js/wow.min.js"></script>
        <script src="frontend/js/aos.js"></script>
        <script src="frontend/js/jquery.waypoints.min.js"></script>
        <script src="frontend/js/jquery.counterup.min.js"></script>
        <script src="frontend/js/jquery.scrollUp.min.js"></script>
        <script src="frontend/js/imagesloaded.pkgd.min.js"></script>
        <script src="frontend/js/jquery.magnific-popup.min.js"></script>
        <script src="frontend/js/plugins.js"></script>
        <script src="frontend/js/main.js"></script>
    </body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->
</html>
