<?php
	include 'class.Member.php';
	class User extends Connection{
		public $id = 0;
		public $nama = '';
		public $email = '';
		public $password = '';
		public $role = '';
		public $mmbr;

		public $hasil = false;
		public $message = '';

		function __construct(){
			$this->mmbr = new Member();
		}

		public function AddUser(){
			$this->connect();

			$sql = "INSERT INTO user(email, password, role)
					VALUES ('$this->email', '$this->password', '$this->role')";
			$this->hasil = mysqli_query($this->connection, $sql);

			$id = $this->connection->insert_id;
			$sql ="UPDATE member set id = $id where idmember = '".$this->mmbr->idmember."'";	
			$this->id = $this->connection->insert_id;

			if($this->hasil)
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function UpdateUser(){
			$this->connect();
			$sql = "UPDATE user 
					SET email = '$this->email',
					password = '$this->password',
					role = '$this->role'
					WHERE id = $this->id";
			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';
		}

		public function DeleteUser(){
			$this->connect();
			$sql = "DELETE FROM user WHERE id = $this->id";

			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';
		}

		public function SelectOneUser(){
			$sql = "SELECT * FROM v_user WHERE id='$this->id'";
			$resultOne = mysqli_query($this->connection, $sql);	
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->id = $data['id'];	
				$this->mmber->fname = $data['fname'];
				$this->mmber->lname = $data['lname'];
				$this->password = $data['password'];
				$this->email=$data['email'];
				$this->role=$data['role'];
				$this->mmber->idmember = $data['idmember'];
			}	
		}

		public function SelectAllUser(){
			$sql = "SELECT * FROM v_user ORDER BY id ASC";
			$result = mysqli_query($this->connection, $sql);	
			$arrResult = Array();
			$cnt=0;
			if(mysqli_num_rows($result) > 0){				
				while ($data = mysqli_fetch_array($result))
				{
					$objUser = new User(); 
					$objUser->id=$data['id'];
					$objUser->mmbr->fname=$data['fname'];
					$objUser->mmbr->lname=$data['lname'];
					$objUser->email=$data['email'];
					$objUser->password=$data['password'];
					$objUser->role=$data['role'];
					$arrResult[$cnt] = $objUser;
					$cnt++;
				}
			}
			return $arrResult;			
		}

		public function ValidateEmail($inputemail){
			$this->connect();
			$sql = "SELECT * FROM user
					WHERE email = '$inputemail'";
			$result = mysqli_query($this->connection, $sql);
			if(mysqli_num_rows($result) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->id = $data['id'];				
				$this->password = $data['password'];				
			//	$this->mmbr->fname = $data['fname'];				
			//	$this->mmbr->lname = $data['lname'];				
				$this->email=$data['email'];
				$this->role=$data['role'];
			//	$this->mmbr->idmember = $data['idmember'];
			}
		}
		}
?>