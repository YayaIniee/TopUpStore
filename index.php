<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopUp Store</title>
	<link rel="shortcut icon" href="assets/images/title icon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/LineIcons.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header id="home" class="header-area">
        <div class="navigation-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="page-sroll" href="">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-sroll" href="">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-sroll" href="">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container" id="wrapper">
        <section id="content">
            <div id="content">
                <?php
                $pages_dir = 'pages';
                if(!empty($_GET['p'])){
                    $pages = scandir($pages_dir, 0);
                    unset($pages[0], $pages[1]);

                    $p = $_GET['p'];
                    if(in_array($p.'.php', $pages)){
                        include($pages_dir.'/'.$p.'.php');
                    } else{
                        echo 'Pages not found! TT__TT';
                    } 
                } else{
                    include($pages_dir.'/home.php');
                }
                ?>
            </div>
        </section>
    
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
    </div>
</body>
</html>