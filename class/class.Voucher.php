<?php 
		
        class Voucher extends Connection
        {
            public $id =0;
            public $nama = '';
            public $nominal = '';
            public $harga ='';
            public $idgame =0;
            public $namagame ='';
            public $foto ='';
            public $namauang ='';
            public $deskripsi ='';
            public $hasil = false;
            public $message ='';
                        
            public function AddVoucher(){
                $sql = "INSERT INTO voucher(nama, nominal, idgame, harga) 
                        values ('$this->nama', '$this->nominal', '$this->idgame', '$this->harga')";
                $this->hasil = mysqli_query($this->connection, $sql);
                
                if($this->hasil)
                   $this->message ='Data berhasil ditambahkan!';					
                else
                   $this->message ='Data gagal ditambahkan!';	
            }
            
            public function UpdateVoucher(){
                $sql = "UPDATE voucher SET nama ='$this->nama',
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
            
            public function SelectAllVoucher(){
                $sql = "SELECT g.*, v.nominal, v.nama AS namauang,v.harga
                        FROM voucher v LEFT JOIN game g
                        ON g.id = v.idgame
                        WHERE g.id = '$this->id'";
                                    
                $result = mysqli_query($this->connection, $sql);
                $arrResult = Array();
                $cnt=0;
                while ($data = mysqli_fetch_array($result))
                {
                    $objVoucher = new Voucher(); 
                    $objVoucher->id=$data['id'];
                    $objVoucher->nama=$data['nama'];
                    $objVoucher->nominal=$data['nominal'];
                    $objVoucher->namauang=$data['namauang'];
                    $objVoucher->harga=$data['harga'];
                    $objVoucher->foto=$data['foto'];
                    $objVoucher->deskripsi=$data['deskripsi'];
                   
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
                    $this->nama = $data['nama'];				
                    $this->nominal = $data['nominal'];	
                    $this->namagame=$data['namagame'];			
                    $this->harga = $data['harga'];		
                    $this->idgame = $data['idgame'];	
                }							
            }
         }	 
    ?>
    