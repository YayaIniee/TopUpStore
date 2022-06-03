

<div class="container">
  <div class="row">
    <div class="col-md-8 col-sm-12 col-lg-4">
        <h4>Nama Game</h4>
        <div class="col-lg-6 col-md-8 col-8 ">
            <img class="img-fluid" src="" alt="foto" width="100%">
            <hr class="d-sm">
        </div>
        <div class="col-12">
        <b>Nama Game</b> <br>
        Detail atau deskripsi game
        </div>
        <hr class="d-sm">
        <b>TOP UP GAME LAINNYA</b><br>
        <div class="col-12 mt-3">
          <div class="d-grid  mb-3">
            <a href="" class="btn btn-outline-dark"><img src="" alt="" class="game-lain me-2">Nama game</a>
          </div>
        </div>
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
                    <button type="button" class="btn btn-outline-dark mt-2" style="width:100px" value=""></button>
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
            <button type="button" id="beli" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal">Beli Sekarang</button>
          <!-- The Modal -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Pembelian</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
          
                <!-- Modal body -->
                <div class="modal-body">
                </div>
          
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  <a href="chekout.html" class="btn btn-success">Beli Sekarang</a>
                </div>
          
              </div>
            </div>
          </div>

            
          </div> <!-- col-12 mb-3 -->

        </div> <!-- row -->
      </form>
    </div> <!-- col-md-12 col-sm-12 col-lg-8 -->
  </div> <!-- row mt-2 -->
</div>