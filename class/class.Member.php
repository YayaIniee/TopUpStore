<?php 
	
	class Member extends Connection
	{
		public $idmember='';
		public $fname = '';
		public $minit = '';
		public $lname = '';
		public $alamat = '';
		public $tgllahir = '';
		public $jeniskelamin = '';
		public $userid=0;
		public $foto='';
		public $hasil = false;
		public $message ='';

		
		
		public function AddMember(){
			$sql = "INSERT INTO member (idmember,  fname, minit, lname, alamat, tgllahir, jeniskelamin)
				   VALUES ('$this->idmember', '$this->fname', '$this->minit', '$this->lname', '$this->alamat', '$this->tgllahir', '$this->jeniskelamin')";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}
		
		public function UpdateMember(){
			$sql = "UPDATE member 
			        SET fname ='$this->fname',
					minit = '$this->minit',
					lname = '$this->lname',					
					alamat = '$this->alamat',
					tgllahir = '$this->tgllahir',
					jeniskelamin = '$this->jeniskelamin',
					foto = '$this->foto'
					WHERE idmember = '$this->idmember'";
					
					
			$this->hasil = mysqli_query($this->connection, $sql);			
			
			if($this->hasil)
				$this->message ='Data berhasil diubah!';								
			else
				$this->message ='Data gagal diubah!';								
		}
		
		public function DeleteMember(){
			$sql = "DELETE FROM Member WHERE idmember='$this->idmember'";
			$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil dihapus!';								
			else
				$this->message ='Data gagal dihapus!';
		}
		
		public function SelectAllMember(){					
			$sql = "SELECT * FROM v_member";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objMember = new Member(); 
					$objMember->idmember=$data['idmember'];
					$objMember->fname=$data['fname'];
					$objMember->minit=$data['minit'];
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
		
		public function SelectAllMemberBySuperidmember($superidmember){					
			$sql = "SELECT * FROM v_member where super_ssn = $superidmember order by fname";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objMember = new Member(); 
					$objMember->idmember=$data['idmember'];
					$objMember->fname=$data['fname'];
					$objMember->minit=$data['minit'];
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
			$sql = "SELECT * FROM v_member WHERE idmember='$this->idmember'";
			
			$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->idmember = $data['idmember'];				
				$this->fname = $data['fname'];				
				$this->minit = $data['minit'];				
				$this->lname = $data['lname'];				
				$this->bdate = $data['bdate'];				
				$this->address=$data['address'];
				$this->sex=$data['sex'];
				$this->userid=$data['userid'];
				$this->foto=$data['foto'];
			}							
		}
		
 	}	 
?>
