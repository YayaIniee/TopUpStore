<?php
	class User extends Connection{
		public $userid = 0;
		public $email = '';
		public $password = '';
		public $nama = '';
		public $role = '';

		public $hasil = false;
		public $message = '';

		public function AddUser(){
			$sql = "INSERT INTO user (email, password, nama, role)
					VALUES ('$this->email', '$this->password', '$this->nama', '$this->role')";
			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil)
				$this->message = 'Data berhasil ditambahkan!';
			else
				$this->message = 'Data gagal ditambahkan!';
		}

		public function ValidateEmail($inputemail){
			$this->connect();
			$sql = "SELECT * FROM user
					WHERE email = '$inputemail'";
			$result = mysqli_query($this->connection, $sql);
			if(mysqli_num_rows($result) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($result);
				$this->userid = $data['userid'];
				$this->password = $data['password'];
				$this->nama = $data['nama'];
				$this->email = $data['email'];
				$this->role = $data['role'];
			}
		}
		}
?>