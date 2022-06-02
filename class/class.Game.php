<?php 
		
	class Game extends Connection
	{
		private $id =0;
		private $nama = '';
		private $foto ='';
		private $idgenre =0;
		private $namagenre = '';
		private $hasil = false;
		private $message ='';

		public function __get($atribute) {
			if (property_exists($this, $atribute)) {
				return $this->$atribute;
				}
		}
	
		public function __set($atribut, $value){
			if (property_exists($this, $atribut)) {
					$this->$atribut = $value;
			}
		}
					
		public function AddGame(){
			$sql = "INSERT INTO tblGame(nama, idgenre) 
		            values ('$this->nama', '$this->idgenre')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateGame(){
			$sql = "UPDATE tblGame SET nama ='$this->nama',
					idgenre = '$this->idgenre'
					WHERE id = $this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}

		public function UpdateFotoGame(){
			$sql = "UPDATE tblGame SET foto ='$this->foto'
					WHERE id = $this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Foto berhasil diubah!';					
		    else
			   $this->message ='Foto gagal diubah!';	
		}
		
		public function DeleteGame(){
			$sql = "DELETE FROM tblGame WHERE id=$this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}
		
		public function SelectAllGame($cari_idgenre){
			$sql = "SELECT a.*, b.nama as namagenre FROM tblGame a, tblgenre b where a.idgenre= b.id";
			if($cari_idgenre != '')
			{
				$sql .= " AND a.idgenre = $cari_idgenre";
			}
			
			$sql .= " ORDER BY id ASC";
						
			$result = mysqli_query($this->connection, $sql);
			$arrResult = Array();
			$cnt=0;
			while ($data = mysqli_fetch_array($result))
			{
				$objGame = new Game(); 
				$objGame->id=$data['id'];
				$objGame->nama=$data['nama'];
				$objGame->idgenre=$data['idgenre'];
				$objGame->namagenre=$data['namagenre'];
				$objGame->foto=$data['foto'];
				$arrResult[$cnt] = $objGame;
				$cnt++;
			}
			return $arrResult;			
		}
/*
		public function SelectAllGameInCart($arrayincart){
			$sql = 'SELECT * FROM tblGame WHERE id IN (' . $arrayincart . ')';						
			$result = mysqli_query($this->connection, $sql);
			$arrResult = Array();
			$cnt=0;
			while ($data = mysqli_fetch_array($result))
			{
				$objGame = new Game(); 
				$objGame->id=$data['id'];
				$objGame->nama=$data['nama'];
				$objGame->idgenre=$data['idgenre'];
				$objGame->foto=$data['foto'];
				$arrResult[$cnt] = $objGame;
				$cnt++;
			}
			return $arrResult;			
		}
		*/
		public function SelectLatestGame(){
			$sql = "SELECT * FROM tblGame ORDER BY id DESC limit 8";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			while ($data = mysqli_fetch_array($result))
			{
				$objGame = new Game(); 
				$objGame->id=$data['id'];
				$objGame->nama=$data['nama'];
				$arrResult[$cnt] = $objGame;
				$cnt++;
			}
			return $arrResult;			
		}
		
		public function SelectOneGame(){
			$sql = "SELECT a.*, b.nama as namagenre FROM tblGame a, tblgenre b where a.idgenre= b.id AND a.id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nama = $data['nama'];				
				$this->namagenre=$data['namagenre'];
				$this->foto = $data['foto'];	
				$this->idgenre = $data['idgenre'];	
			}							
		}
 	}	 
?>
