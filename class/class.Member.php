<?php 
	
	class Member extends Connection
	{
		public $idmember='';
		public $fname = '';
		public $lname = '';
		public $address = '';
		public $bdate = '';
		public $sex = '';
		public $iduser=0;
		public $foto='';
		
		public $hasil = false;
		public $message ='';

		
		
		public function AddMember(){
			$sql = "INSERT INTO member(idmember,  fname, lname, address, bdate, sex)
				   VALUES ('$this->idmember', '$this->fname', '$this->lname', '$this->address', '$this->bdate', '$this->sex')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateMember(){
			$sql = "UPDATE member 
			        SET	fname ='$this->fname',
					lname = '$this->lname',					
					address = '$this->address',
					bdate = '$this->bdate',
					sex = '$this->sex',
					foto = '$this->foto'
					WHERE idmember = '$this->idmember'";
			$this->hasil = mysqli_query($this->connection, $sql);			
			
			if($this->hasil)
				$this->message ='Data berhasil diubah!';								
			else
				$this->message ='Data gagal diubah!';								
		}
		
		public function DeleteMember(){
			$sql = "DELETE FROM member WHERE idmember = '$this->idmember'";
			$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil dihapus!';								
			else
				$this->message ='Data gagal dihapus!';
		}
		
		public function SelectAllMember(){					
			$sql = "SELECT a.*, b.email FROM member a, user b WHERE a.iduser = b.id ORDER BY id ASC";			
			$result = mysqli_query($this->connection, $sql);
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objMember = new Member(); 
					$objMember->idmember=$data['idmember'];
					$objMember->email=$data['email'];
					$objMember->fname=$data['fname'];
					$objMember->lname=$data['lname'];
					$objMember->bdate=$data['bdate'];
					$objMember->address=$data['address'];
					$objMember->sex=$data['sex'];
					$objMember->foto=$data['foto'];
					$arrResult[$cnt] = $objMember;
					$cnt++;
				}
			}
			return $arrResult;			
		}
			
		public function SelectOneMember(){
			$sql = "SELECT a.*, b.email FROM member a, user b WHERE a.iduser = b.id AND a.idmember = '$this->idmember'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->idmember = $data['idmember'];
				$this->iduser = $data['iduser'];				
				$this->email = $data['email'];
				$this->fname = $data['fname'];				
				$this->lname = $data['lname'];				
				$this->bdate = $data['bdate'];				
				$this->address=$data['address'];
				$this->sex=$data['sex'];
				$this->foto=$data['foto'];
			}							
		}
		
 	}	 
?>
