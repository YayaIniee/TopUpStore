<?php 
 	require "inc.koneksi.php";		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|[ Top Up Games Store ]|</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-black navbar-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      	<img src="#" alt="TopUpStore" style="width:150px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <li class="nav-item">
            <a href="index.php" class="nav-link text-white">HOME</i></a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white">ABOUT US</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=gamelist" class="nav-link text-white">GameList</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=game" class="nav-link text-white">Game</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=genrelist" class="nav-link text-white">GenreList</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=genre" class="nav-link text-white">Genre</i></a>
          </li>
          <li class="nav-item">
            <a href="index.php?p=sectiongame" class="nav-link text-white">SectionGame</i></a>
          </li>
        </li>   
        <li class="nav-item"><a class="nav-link" href="index.php?p=login">Login</a></li>      
      <li class="nav-item"><a class="nav-link" href="index.php?p=register">Register</a></li>
      </ul>
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

