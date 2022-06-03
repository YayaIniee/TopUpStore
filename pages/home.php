
<!-- carausel for banner -->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
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
          echo '
            <div class="col-md-3 mb-4">
              <div class="card p-2" width="22rem">
                <a href="index.php?p=sectiongame&id='.$dataGame->id.'">
                  <img src="./assets/upload/game/'.$dataGame->foto.'" alt="" class="img-fluid">
                    </a>
                <div class="card-body">
                  <a href="index.php?p=sectiongame&id='.$dataGame->id.'" class="title"><h5>'.$dataGame->nama.'</h5></a>
                </div>
                </div>
            </div>
          ';
        }
      ?>      
    </div>
  </div>
</section>


