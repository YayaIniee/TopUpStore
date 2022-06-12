
<?php
if (!isset($_SESSION)) {
  session_start();
}
  if(isset($_GET['id'])){	
		require_once('./class/class.Game.php');
		$objGame = new Game(); 
		$objGame->id = $_GET['id'];	
		$objGame->SelectOneGame();  
    require_once('./class/class.Voucher.php');
    $objVoucher = new Voucher();
    $objVoucher->id = $_GET['id'];
    $objVoucher->SelectAllVoucher();
	}
?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-12 col-lg-4 fnt">
        <h4><?php echo $objGame->nama; ?></h4>
        <div class="col-lg-6 col-md-8 col-8">
            <?php echo '<img class="img-fluid shadow-lg" src="./assets/upload/game/'.$objGame->foto.'" alt="foto" width="100%">' ?>
            <hr class="d-sm">
        </div>
        <div class="col-12">
        <b><?php echo $objGame->nama; ?></b><br>
        <?php echo $objGame->deskripsi; ?>
        </div>
        <hr class="d-sm">
    </div>
    <div class="col-md-12 col-sm-12 col-lg-8 mt-3">
      <form class="contact form" id="orderform" method="POST" autocomplete="off">
        <div class="row">
          <div class="col-12 mb-3"> <!-- Lengkapi Data -->
            <div class="card">
              <div class="card-body">
                <div class="">1</div>
                <h5 class="ml-5 mt-1">Lengkapi Data</h5>
                <div class="form-row mt-4">
                  <div class="col">
                    <input type="number" class="form-control dataid" name="data" placeholder="Masukan ID" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 mb-3"> <!-- Pilih Nominal -->
            <div class="card">
              <div class="card-body">
                <div class="">2</div>
                <h5 class="">Nominal</h5>
                <div class="mt-4">
                  <div class="panel-topup">
                    <button type="button" class="btn btn-outline-dark mt-2" style="width:100px" value=""><?php echo $objVoucher->nominal; ?></button>
                  </div>
                </div>
              </div> <!-- card-body -->
            </div> <!-- card -->
          </div>
          <div class="col-12 mb-3"> <!-- Nomer Telp -->
            <div class="card">
              <div class="card-body">
                <div class="">3</div>
                <h5 class="">No Whatsapp</h5>
                <div class="mt-4">
                  <input type="number" class="form-control" name="notelp" placeholder="08xx xxxx xxxx" id="notelp">
                </div>
              </div> <!-- card-body -->
            </div> <!-- card -->
          </div>
          <div class="col-12 mb-3"> <!-- Button beli -->
                <?php
                    if(isset($_SESSION["role"])){
                      if($_SESSION["role"] == "admin"){
                  ?>
                        <button type="button" id="beli" class="btn btn-warning disabled">Beli Sekarang</button>
                  <?php
                      } else{
                  ?>    
                        <button type="button" id="beli" class="btn btn-warning">Beli Sekarang</button>
                  <?php    
                      } 
                  
                    } else {
                  ?>
                      <button type="button" id="beli" class="btn btn-warning disabled">Beli Sekarang</button>
                  <?php
                    }
                  ?>        
          </div>
            </div>            
          </div> <!-- col-12 mb-3 -->
        </div> <!-- row -->
      </form>
    </div> <!-- col-md-12 col-sm-12 col-lg-8 -->
  </div> <!-- row mt-2 -->
</div>