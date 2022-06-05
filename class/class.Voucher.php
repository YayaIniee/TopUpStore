<?php
    class Voucher extends Connection{

        public $id ='';
        public $nominal ='';
        public $harga ='';
        public $idgame = '';
        public $namagame = '';

        public $hasil = false;
        public $message = '';

        public function AddVoucher(){
			$sql = "INSERT INTO voucher (id, nominal, harga, idgame)
                    VALUES ('$this->id', '$this->nominal', '$this->harga', '$this->idgame')";
            $this->hasil = mysqli_query($this->connection, $sql);

            if($this->hasil)
                $this->message='Data berhasil ditambahkan';
            else
                $this->message='Data gagal ditambahkan';
        }
        public function UpdateVoucher(){
            $sql = "UPDATE voucher SET nominal = '$this->nominal',
                    harga = '$this->harga',
                    idgame = '$this->idgame'
                    WHERE id = $this->id";
            $this->hasil = mysqli_query($this->connection, $sql);
            
            if($this->hasil)
                $this->message='Data berhasil diudpate';
            else
                $this->message='Data gagal diupdate';
        }
        public function DeleteVoucher(){
            $sql = "DELETE FROM voucher WHERE id ='$this->id'";
            $this->hasil = mysqli_query($this->connection, $sql);

            if($this->hasil)
                $this->message='Data berhasil dihapus';
            else
                $this->message='Data gagal dihapus';
        }
        public function SelectAllVoucher($cari_idgame, $cari_deskripsi){
			$sql = "SELECT a.*, b.nama as namagame FROM voucher a, game b where a.idgame= b.id";
			if($cari_idgame != '')
			{
				$sql .= " AND a.idgame = $cari_idgame";
			}
			if($cari_deskripsi != '')
			{
				$sql .= " AND a.deskripsi like '%$cari_deskripsi%'";
			}
			
			$sql .= " ORDER BY id ASC";
						
			$result = mysqli_query($this->connection, $sql);
			$arrResult = Array();
			$count=0;
			while ($data = mysqli_fetch_array($result))
			{
				$objVoucher = new Voucher(); 
				$objVoucher->id=$data['id'];
				$objVoucher->nominal=$data['nominal'];
				$objVoucher->idgame=$data['idgame'];
				$objVoucher->namagame=$data['namagame'];
				$objVoucher->deskripsi=$data['deskripsi'];
				$objVoucher->harga=$data['harga'];
				$arrResult[$count] = $objVoucher;
				$count++;
			}
			return $arrResult;	
		}





            // menu = voucher // category = game
        public function SelectOneVoucher(){
			$sql = "SELECT a.*, b.nama as namagame FROM voucher a, game b where a.idgame= b.id AND a.id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nominal = $data['nominal'];				
				$this->deskripsi = $data['deskripsi'];	
				$this->namagame=$data['namagame'];			
				$this->harga = $data['harga'];
				$this->idgame = $data['idgame'];	
			}							
		}

    } // end class Voucher()
?>