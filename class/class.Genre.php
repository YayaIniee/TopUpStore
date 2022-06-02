<?php 
	
	class Genre extends Connection
	{
		private $id =0;
		private $nama = '';
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
				
		public function AddGenre(){
			$sql = "INSERT INTO tblgenre(nama) 
		            values ('$this->nama')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateGenre(){
			$sql = "UPDATE tblgenre SET nama ='$this->nama'
					WHERE id = $this->id";

			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}
		
		public function DeleteGenre(){
			$sql = "DELETE FROM tblgenre WHERE id=$this->id";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}
		
		public function SelectAllGenre(){
			$sql = "SELECT * FROM tblgenre";
				
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objGenre = new Genre(); 
					$objGenre->id=$data['id'];
					$objGenre->nama=$data['nama'];
					$arrResult[$cnt] = $objGenre;
					$cnt++;
				}
			}
			return $arrResult;			
		}
		
		public function SelectOneGenre(){
			$sql = "SELECT * FROM tblgenre WHERE id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->nama = $data['nama'];			
			}							
		}
 	}	 
?>
