<?php 
	
	class Banner extends Connection
	{
		public $id =0;
		public $nama = '';
		public $deskripsi1 = '';
        public $deskripsi2 = '';
        public $foto = '';
        public $currentfoto = '';
		public $hasil = false;
		public $message ='';
				
		public function AddBanner(){
			$sql = "INSERT INTO banner(nama, deskripsi1, deskripsi2, foto) 
		            values ('$this->nama', '$this->deskripsi1', '$this->deskripsi2', '$this->foto')";
			$this->hasil = mysqli_query($this->connection, $sql);

            $this->id = $this->connection->insert_id;
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateBanner(){
			$sql = "UPDATE banner SET nama ='$this->nama',
					deskripsi1 = '$this->deskripsi1',
                    deskripsi2 = '$this->deskripsi2',
                    foto = '$this->foto'
					WHERE id = $this->id";

			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}


        public function UpdateFotoBanner(){
			$sql = "UPDATE banner SET 
                    foto = '$this->foto'
					WHERE id = $this->id";

			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}
		
		public function DeleteBanner(){
			$sql = "DELETE FROM banner WHERE id=$this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}
		
		public function SelectAllBanner(){
			$sql = "SELECT * FROM banner";
				
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objBanner = new Banner(); 
					$objBanner->id=$data['id'];
					$objBanner->nama=$data['nama'];
					$objBanner->deskripsi1=$data['deskripsi1'];
                    $objBanner->deskripsi2=$data['deskripsi2'];
                    $objBanner->foto=$data['foto'];
					$arrResult[$cnt] = $objBanner;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOneBanner(){
			$sql = "SELECT * FROM banner WHERE id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nama = $data['nama'];				
				$this->deskripsi1 = $data['deskripsi1'];				
                $this->deskripsi2 = $data['deskripsi2'];	
                $this->foto = $data['foto'];	
			}							
		}
 	}	 
?>
