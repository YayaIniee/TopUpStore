<?php 
	
	class Member extends Connection
	{
		private $idmember='';
		private $fname = '';
		private $minit = '';
		private $lname = '';
		private $address = '';
		private $bdate = '';
		private $sex = '';
		private $userid=0;
		private $foto='';
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
		
		
		public function AddMember(){
			$sql = "INSERT INTO member (idmember,  fname, minit, lname, address, bdate, sex)
				   VALUES ('$this->idmember', '$this->fname', '$this->minit', '$this->lname', '$this->address', '$this->bdate', '$this->sex')";
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
		
		public function SelectAllMemberInDepartment($dnumber){					
			$sql = "SELECT * FROM v_member where dno = $dnumber order by fname";			
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
