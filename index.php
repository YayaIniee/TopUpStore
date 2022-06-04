<?php 
if (!isset($_SESSION)) {
  session_start();
}
  require "inc.koneksi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tip Ip Gimis Stire</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.js"></script>
    <script src="js/popper.min.js"></script>
    <!-- My CSSStyle -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Goldman&family=Righteous&display=swap" rel="stylesheet">
    <!-- font-family: 'Goldman', cursive; font-family: 'Righteous', cursive; -->
  </head>
  <body>
    <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light sticky-top mb-2">
    <div class="container">
      <a class="navbar-brand font-nav" href="index.php"><img src="image/icon.png" width="50px" alt="">Top Up Games</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="index.php" class="nav-link font-nav active" aria-current="page">HOME</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=about" class="nav-link font-nav">About</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=contact" class="nav-link font-nav">Contact</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=gamelist" class="nav-link font-nav">GameList</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=game" class="nav-link font-nav">Game</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=genrelist" class="nav-link font-nav">GenreList</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=genre" class="nav-link font-nav">Genre</i></a>
          </li>

        </ul>
        <form class="">
          <a href="index.php?p=register" class="btn font-nav btn-sm" type="submit">Sing Up</a>
          <a href="index.php?p=login" class="btn btn-outline-dark font-nav btn-sm" type="submit">Sing In</a>
        </form>
      </div>
    </div>
  </nav> 

  <div class="container">		
		<?php
				$pages_dir = 'pages';
				if(!empty($_GET['p'])){
					$pages = scandir($pages_dir, 0);
					unset($pages[0], $pages[1]);
					
					$p = $_GET['p'];
					if(in_array($p.'.php', $pages)){
						include($pages_dir.'/'.$p.'.php');
					} else {
						echo '<div class="text-center my-5 fnt">
                    <img src="image/404.png" class="mx-auto d-block">
                    <h1>404 <small> page not found!</small></h1>
                  </div>
                  ';
					}
				} else {
					include($pages_dir.'/home.php');
				}
		?>
  </div>

  <footer id="footer" class="footer mt-5">
        <div class="footer-widget pt-80 pb-130">
            <div class="container">
              <hr class="mb-3">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-8">
                        <div class="footer-logo mt-50">
                            <div class="f-title">
                            <h4 class="title">NicePlay</h4>
                            </div>
                            <ul class="fa-ul">
                              <li class="mt-2"><span class="fa-li"><i class="fas fas fa-phone-alt"></i></span>+62 812-3456-7890</li>
                              <li class="mt-2"><span class="fa-li"><i class="fas fa-mail-bulk"></i></span>admin@gmail.com</li>
                              <li class="mt-2"><span class="fa-li"><i class="fas fa-map-marked-alt"></i></span>Westeren Atlantic Ocean</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">Navigation</h4>
                            </div>
                            <ul class="fa-ul">
                              <li class="mt-2"><span class="fa-li"><i class="fas fa-home"></i></span><a style="text-decoration:none;" href="index.php">Homepage</a></li>
                              <li class="mt-2"><span class="fa-li"><i class="fas fa-address-book"></i></span><a style="text-decoration:none;" href="index.php?p=about">About Us</a></li>
                              <li class="mt-2"><span class="fa-li"><i class="fas fa-atlas"></i></span><a style="text-decoration:none;" href="index.php?p=contact">Contac Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link mt-45">
                            <div class="f-title">
                                <h4 class="title">My Account</h4>
                            </div>
                            <ul class="fa-ul">
                              <li class="mt-2"><span class="fa-li"><i class="fas fa-address-card"></i></span><a style="text-decoration:none;" href="index.php?p=profile">My Account</a></li>
                              <li class="mt-2"><span class="fa-li"><i class="fas fa-history"></i></span><a style="text-decoration:none;" href="index.php?p=history">Order History</a></li>
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
                            <p>Copyrigth 2022 | CS Perdjuangan </p>
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- copyright-area -->
    </footer>
  </body>
</html>