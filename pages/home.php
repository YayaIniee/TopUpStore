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
                                <h5><a href="index.php?p=sectiongame&id='.$dataGame->id.'" class="title">'.$dataGame->nama.'</a></h5>
                            </div>
                        </div>
                    </div>
                    ';
                }
                ?>      
    </div>
  </div>
</section>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-3 mt-3">
                <h2>GAME PILIHAN KAMI</h2>
            </div>
        </div>
        <div class="row">
        <?php
        	require_once('./class/class.Game.php'); 
					$objGame = new Game(); 		
					$arrayResult = $objGame->SelectAllGame(0, '');

					foreach ($arrayResult as $dataGame) {
						echo '<div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-3" >
                			  <a href="index.php?p=sectiongame&id='.$dataGame->id.'"><img src="./assets/upload/game/'.$dataGame->foto.'" alt="" class="img-fluid rounded-3" id=""></a>
                			  <a href="index.php?p=sectiongame&id='.$dataGame->id.'" class="title">'.$dataGame->nama.'</a>
            			      </div>
							  ';
					}
					?>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12 mt-3" >
                <a href=""><img src="#" alt="" class="img-fluid rounded-3" id=""></a>
            </div>
        </div>
    </div>
</div>


