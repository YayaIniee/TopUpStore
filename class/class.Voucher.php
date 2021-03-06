<?php 
		
        class Voucher extends Connection
        {
            public $id =0;
            public $nama = '';
            public $nominal = '';
            public $harga ='';
            public $idgame =0;
            public $namagame ='';
            public $fotogame ='';
            public $matauang ='';
            public $deskripsigame ='';
            public $hasil = false;
            public $message ='';
                        
            public function AddVoucher(){
                $sql = "INSERT INTO voucher(matauang, nominal, idgame, harga) 
                        values ('$this->matauang', '$this->nominal', '$this->idgame', '$this->harga')";
                $this->hasil = mysqli_query($this->connection, $sql);
                
                if($this->hasil)
                   $this->message ='Data berhasil ditambahkan!';					
                else
                   $this->message ='Data gagal ditambahkan!';	
            }
            
            public function UpdateVoucher(){
                $sql = "UPDATE voucher SET matauang ='$this->matauang',
                        nominal = '$this->nominal',
                        harga = '$this->harga',
                        idgame = '$this->idgame'
                        WHERE id = $this->id";
                $this->hasil = mysqli_query($this->connection, $sql);
                
                if($this->hasil)
                   $this->message ='Data berhasil diubah!';					
                else
                   $this->message ='Data gagal diubah!';	
            }
    
        
            
            public function DeleteVoucher(){
                $sql = "DELETE FROM voucher WHERE id=$this->id";
                $this->hasil = mysqli_query($this->connection, $sql);
                
                if($this->hasil)
                   $this->message ='Data berhasil dihapus!';					
                else
                   $this->message ='Data gagal dihapus!';	
            }
            
            public function SelectAllVoucher($cari_idgame){
                $sql = "SELECT a.*, b.nama as namagame, b.foto as fotogame, b.deskripsi as deskripsigame FROM voucher a, game b where a.idgame= b.id";
                if($cari_idgame != '')
                {
                    $sql .= " AND a.idgame = $cari_idgame";
                }
                
                $sql .= " ORDER BY id ASC";
                                    
                $result = mysqli_query($this->connection, $sql);
                $arrResult = Array();
                $cnt=0;
                while ($data = mysqli_fetch_array($result))
                {
                    $objVoucher = new Voucher(); 
                    $objVoucher->id=$data['id'];
                    $objVoucher->idgame=$data['idgame'];
                    $objVoucher->namagame=$data['namagame'];
                    $objVoucher->deskripsigame=$data['deskripsigame'];
                    $objVoucher->fotogame=$data['fotogame'];
                    $objVoucher->matauang=$data['matauang'];
                    $objVoucher->nominal=$data['nominal'];
                    $objVoucher->harga=$data['harga'];
                   
                    $arrResult[$cnt] = $objVoucher;
                    $cnt++;
                }
                return $arrResult;			
            }

            public function SelectOneVoucher(){
                $sql = "SELECT a.*, b.nama as namagame FROM voucher a, game b where a.idgame= b.id AND a.id='$this->id'";
                $resultOne = mysqli_query($this->connection, $sql);
                if(mysqli_num_rows($resultOne) == 1){
                    $this->hasil = true;
                    $data = mysqli_fetch_assoc($resultOne);
                    $this->matauang = $data['matauang'];
                    $this->nominal = $data['nominal'];
                    $this->namagame=$data['namagame'];			
                    $this->harga = $data['harga'];
                    $this->idgame = $data['idgame'];	
                }							
            }

            public function SelectAllVoucherInOrder($arrayinorder){
                $sql = 'SELECT * FROM voucher WHERE id IN ('.$arrayinorder.')';
                $result = mysqli_query($this->connection, $sql);
                $arrResult = Array();
                $count = 0;
                while($data = mysqli_fetch_array($result)){
                    $objVoucher = new Voucher();
                    $objVoucher->id=$data['id'];
                    $objVoucher->nominal=$data['nominal'];
                    $objVoucher->idgame=$data['idgame'];
                    $objVoucher->matauang=$data['matauang'];
                    $objVoucher->harga=$data['harga'];
                    $arrResult[$count] = $objVoucher;
                    $count++;
                }
                return $arrResult;
            }
         }	 
    ?>
    