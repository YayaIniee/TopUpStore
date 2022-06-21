
<?php
  if (!isset($_SESSION)) {
    session_start();
  }
  if(isset($_GET['id'])){ 
    $idgame =  $_GET['id'];
    require_once('./class/class.Voucher.php'); 
    $objVoucher = new Voucher();    
    $arrayResult = $objVoucher->SelectAllVoucher($idgame, '');
    }  
  ?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-12 col-lg-4 fnt">
        <h4><?php echo $arrayResult[0]->namagame;  ?></h4>
        <div class="col-lg-6 col-md-8 col-8">
            <?php echo '<img class="img-fluid shadow-lg" src="./assets/upload/game/'.$arrayResult[0]->fotogame.'" alt="foto" width="100%">' ?>
            <hr class="d-sm">
        </div>
        <div class="col-12">
        <b><?php echo $arrayResult[0]->namagame;  ?></b><br>
        <?php echo $arrayResult[0]->deskripsigame; ?>
        </div>
        <hr class="d-sm">
    </div>
    <div class="col-md-12 col-sm-12 col-lg-8 mt-3">

      <form class="contact form" action="dashboardmember.php?p=orderform" method="POST">
        <div class="row">
          <div class="col-12 mb-3"> <!-- Lengkapi Data -->
            <div class="card">
              <div class="card-body">
                <div class="">1</div>
                <h5 class="ml-5 mt-1">Lengkapi Data</h5>
                <div class="form-row mt-4">
                  <div class="col">
                    <input type="number" class="form-control dataid" name="idgame" placeholder="Masukan ID" required>
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
                <?php
                  foreach($arrayResult as $dataVoucher){
                        echo ' <button type="button" class="btn btn-outline-dark mt-2" style="width:100px" value=""><a style="text-decoration:none;" '.$dataVoucher->id.'" class="title">'.$dataVoucher->nominal.' '.$dataVoucher->matauang.'</a></button>';

                }
                ?>
                  </div>
                </div>
              </div> <!-- card-body -->
            </div> <!-- card -->
          </div>
          <div class="col-12 mb-3"> <!-- Email -->
            <div class="card">
              <div class="card-body">
                <div class="">3</div>
                <h5 class="">Email</h5>
                <div class="mt-4">
                  <input type="email" class="form-control" name="email" placeholder="Email" id="email" required>
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
                        <input name="btnPesan" class="btn btn-warning" type="submit" value="Beli Sekarang">
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