

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
                			<a href="index.php?p=productdetail&id='.$dataGame->id.'"><img src="./assets/upload/game/'.$dataGame->foto.'" alt="" class="img-fluid rounded-3" id="ml"></a>
                			<a href="index.php?p=productdetail&id='.$dataGame->id.'" class="title">'.$dataGame->nama.'</a>
            			</div>
							  
							  ';
					}
					?>
    </div>
