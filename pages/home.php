<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
  .mySlides {display:none;}
</style>

  <?php
      require_once('./class/class.Banner.php');
      $objBanner = new Banner();
      $arrayResult = $objBanner->SelectAllBanner();

      foreach($arrayResult as $dataBanner){
        echo 
          '<div class="w3-section">
            <img class="mySlides" src="./assets/upload/banner/'.$dataBanner->foto.'" style="width:100%">
          </div>';
      }
  ?>
<script>
  var myIndex = 0;
  carousel();

  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
  }
</script>

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
      ?>      
    </div>
  </div>
</section>


