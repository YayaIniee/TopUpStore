<?php 
   if (!isset($_SESSION)) {
		session_start();
	}	

	require "inc.koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">

		<title>NicePlay 165</title>

		<!--====== Favicon Icon ======-->
		<link rel="shortcut icon" href="assets/images/title icon.png" type="image/png">

		<!--====== Bootstrap css ======-->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">

		<!--====== Fontawesome css ======-->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!--====== Line Icons css ======-->
		<link rel="stylesheet" href="assets/css/LineIcons.css">

		<!--====== Animate css ======-->
		<link rel="stylesheet" href="assets/css/animate.css">

		<!--====== Aos css ======-->
		<link rel="stylesheet" href="assets/css/aos.css">

		<!--====== Slick css ======-->
		<link rel="stylesheet" href="assets/css/slick.css">

		<!--====== Default css ======-->
		<link rel="stylesheet" href="assets/css/default.css">

		<!--====== Style css ======-->
		<link rel="stylesheet" href="assets/css/style.css">



	</head>
    <body>		
	
	<!--====== HEADER PART START ======-->
	<header id="home" class="header-area pt-100">

	<div class="navigation-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php">
                                <img src="assets/images/logo-brand.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="page-scroll" href="index.php">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="index.php?p=about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="index.php?p=contact">Contact</a>
                                    </li>
									<?php 
							    							    
										if(isset($_SESSION["role"]))
										{ 							
											if($_SESSION["role"] == "admin")
											{						
									?>
									
										<li class="nav-item"><a class="page-scroll" href="index.php?p=accountlist">User</a></li>
										<li class="nav-item"><a class="page-scroll" href="index.php?p=rolelist">Role</a></li>	
										<li class="nav-item"><a class="page-scroll" href="index.php?p=memberlist">Member</a></li>	
										<li class="nav-item"><a class="page-scroll" href="index.php?p=genrelist">Genre</a></li>
										<li class="nav-item"><a class="page-scroll" href="index.php?p=gamelist">Game</a></li>	
										<li class="nav-item"><a class="page-scroll" href="index.php?p=menulist">Voucher</a></li>	
										<li class="nav-item"><a class="page-scroll" href="index.php?p=bannerlist">Banner</a></li>	
										<li class="nav-item"><a class="page-scroll" href="index.php?p=pesananlist">Pesanan</a></li>

										<?php 
										}
											else //member
										{
										?>							
											<li class="nav-item"><a class="page-scroll" href="index.php?p=historypesanan">History Pesanan</a></li>
										<?php 
												}							    
										?>			
											<li class="nav-item"><a class="page-scroll" href="index.php?p=logout">Logout</a></li>							 
										<?php 
										}
											else
										{
										?>									
											<li class="nav-item"><a class="page-scroll" href="index.php?p=register">Register</a></li>		
											<li class="nav-item"><a class="page-scroll" href="index.php?p=login">Login</a></li>									
										<?php
											}
										?>

                                </ul> <!-- navbar nav -->
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navigation bar -->

	</header>





		<div id="wrapper" class="container mt-3">

		<div class="navbar-inner main-menu">	
				<?php
				if(isset($_SESSION["nama"])){
					echo "Welcome,  <a href='index.php?p=editprofile'>" . $_SESSION["nama"]. "</a> as " . $_SESSION["role"];
				}
				?>		
					
				</div>
			
			
			<section id="content">
			<div id="konten">
				<?php
				$pages_dir = 'pages';
				if(!empty($_GET['p'])){
					$pages = scandir($pages_dir, 0);
					unset($pages[0], $pages[1]);
					
					$p = $_GET['p'];
					if(in_array($p.'.php', $pages)){
						include($pages_dir.'/'.$p.'.php');
					} else {
						echo 'Halaman tidak ditemukan! :(';
					}
				} else {
					include($pages_dir.'/home.php');
				}
				?>
			</div>
			</section>



			   <!--====== FOOTER PART START ======-->

		<footer id="footer" class="footer-area">
        <div class="footer-widget pt-80 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-8">
                        <div class="footer-logo mt-50">
                            <div class="f-title">
								<h4 class="title">NicePlay</h4>
							</div>
                            <ul class="footer-info">
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>+62 8135 2468 7901</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>admin@admin.com</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info">
                                        <div class="info-icon">
                                            <i class="lni-map"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>33 America Triangle Bermuda</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                            </ul>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Navigation</h4>
                            </div>
                            <ul class="mt-15">
								<li><a href="index.php">Homepage</a></li>  
								<li><a href="index.php?p=about">About Us</a></li>
								<li><a href="./contact.html">Contac Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">My Account</h4>
                            </div>
                            <ul class="mt-15">
								<li><a href="index.php?p=profiledit">My Account</a></li>
								<li><a href="index.php?p=history">Order History</a></li>
                            </ul>
                        </div>
                    </div>
					<div class="col-lg-3 col-md-4 col-sm-8">
                        <div class="footer-logo mt-50">
							<div class="f-title">
                                <h4 class="title">Social Media</h4>
                            </div>
                            <ul class="footer-social mt-20">
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                            </ul>
							<ul class="footer-social mt-20">
                                <li><a href="#"><i class="lni-google"></i></a></li>
                                <li><a href="#"><i class="lni-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer logo -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p>Template by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- copyright-area -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

		</div>
		
		<script src="js/common.js"></script>
		<script src="js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>
