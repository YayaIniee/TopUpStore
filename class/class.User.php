<?php
	include 'class.Member.php';

	class User extends Connection{
		public $userid = 0;
		public $email = '';
		public $password = '';
		public $nama = '';
		public $role = '';
		public $mbr;

		public $hasil = false;
		public $message = '';


		function __construct()
		{
			$this->mbr = new Member();
		}

		public function AddUser(){
			$this->connect();

			$sql = "INSERT INTO user (email, password, nama, role)
					VALUES ('$this->email', '$this->password', '$this->nama', '$this->role')";
			$this->hasil = mysqli_query($this->connection, $sql);

			$userid = $this->connection->insert_id;
			$sql = "UPDATE member SET userid = $userid WHERE idmember = '".$this->mbr->idmember."'";
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