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
    <link href="https://fonts.googleapis.com/css2?family=Goldman&family=Righteous&display=swap" rel="stylesheet">
    <!-- font-family: 'Goldman', cursive; font-family: 'Righteous', cursive; -->
  </head>
  <body>
    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light mb-3">
  <div class="container">
    <a class="navbar-brand font-nav" href="index.php"><img src="image/icon.png" width="" alt="">Top Up Games</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="index.php" class="nav-link font-nav active" aria-current="page">HOME</i></a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link font-nav">About</i></a>
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
        <button class="btn font-nav" type="submit">Sign Up</button>
        <button class="btn btn-outline-dark font-nav" type="submit">Sign In</button>
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
						echo '404 <br> pages no found <br> : (';
					}
				} else {
					include($pages_dir.'/home.php');
				}
		?>
</div>

  </body>
</html>