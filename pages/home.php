
<div id="demo" class="carousel slide shadow-lg" data-bs-ride="carousel">
  <div class="carousel-inner">
  <?php
      require_once('./class/class.Banner.php');
      $objBanner = new Banner();
      $arrayResult = $objBanner->SelectAllBanner();

      foreach($arrayResult as $dataBanner){
        echo 
          '
          <div class="carousel-item active">
            <img src="./assets/upload/banner/'.$dataBanner->foto.'" class="d-block mySlides" style="width:100%">
            <div class="carousel-caption text-end">
              <h1 style="width:px;">'.$dataBanner->nama.'</h1>
              <h4>'.$dataBanner->deskripsi1.'</h4>
              <h6>'.$dataBanner->deskripsi2.'</h6>
            </div>
          </div>';
      }
  ?>
  </div>
</div>
<section id="layanan">
  <div class="container">
    <div class="row my-4">
      <div class="col-12 text-center">
        <h2>Layanan Kami</h2>
        <span class="sub-title">pilih game kesukaan kamu dan top up segera!</span>
      </div>
    </div>
    <div class="row">
    <?php
      require_once('./class/class.Game.php'); 
			$objGame = new Game(); 				
      	$arrayResult = $objGame->SelectAllGame(0, '');
				foreach ($arrayResult as $dataGame) {
          if(isset($_SESSION["role"])){
            if($_SESSION["role"] == "admin"){ // sebagai admin
              echo '
                  <div class="col-md-3 mb-4">
                    <div class="card wrapper-game card-game p-2 shadow-lg" width="22rem">
                      <a href="dashboardadmin.php?p=sectiongame&id='.$dataGame->id.'">
                        <img src="./assets/upload/game/'.$dataGame->foto.'" alt="" class="img-fluid rounded-3 img-game">
                      </a>
                      <div class="card-body card-game-body rounded-3">
                        <a href="dashboardadmin.php?p=sectiongame&id='.$dataGame->id.'" class="title" style="text-decoration:none;"><h5>'.$dataGame->nama.'</h5></a>
                      </div>
                    </div>
                  </div>
                ';
            } else{ // member
              echo '
                  <div class="col-md-3 mb-4">
                    <div class="card wrapper-game card-game p-2 shadow-lg" width="22rem">
                      <a href="dashboardmember.php?p=sectiongame&id='.$dataGame->id.'">
                        <img src="./assets/upload/game/'.$dataGame->foto.'" alt="" class="img-fluid rounded-3 img-game">
                      </a>
                      <div class="card-body card-game-body rounded-3">
                        <a href="dashboardmember.php?p=sectiongame&id='.$dataGame->id.'" class="title" style="text-decoration:none;"><h5>'.$dataGame->nama.'</h5></a>
                      </div>
                    </div>
                  </div>
                ';
            }
          } else { //sebagai guest
              echo '
                  <div class="col-md-3 mb-4">
                    <div class="card wrapper-game card-game p-2 shadow-lg" width="22rem">
                      <a href="index.php?p=sectiongame&id='.$dataGame->id.'">
                        <img src="./assets/upload/game/'.$dataGame->foto.'" alt="" class="img-fluid rounded-3 img-game">
                      </a>
                      <div class="card-body card-game-body rounded-3">
                        <a href="index.php?p=sectiongame&id='.$dataGame->id.'" class="title" style="text-decoration:none;"><h5>'.$dataGame->nama.'</h5></a>
                      </div>
                    </div>
                  </div>
                ';
          }
        }
      ?>      
    </div>
  </div>
</section>

<script>
  var myIndex = 0;
  carousel();

  function carousel() {
    var i;
    var x = document.getElementsByClassName("carousel-item");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 4000); // Change image every 2 seconds
  }
</script>