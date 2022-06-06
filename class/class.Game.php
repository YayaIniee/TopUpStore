<?php

    class Game extends Connection{
        public $id ='';
        public $nama ='';
        public $deskripsi;
        public $foto ='';

        public $hasil = false;
        public $message = '';
    
    public function AddGame(){
			$sql = "INSERT INTO game (id, nama, deskripsi)
                    VALUES ('$this->id', '$this->nama', '$this->deskripsi)";
            $this->hasil = mysqli_query($this->connection, $sql);

            if($this->hasil)
                $this->message='Data berhasil ditambahkan';
            else
                $this->message='Data gagal ditambahkan';
        }		
    public function UpdateGame(){
            $sql = "UPDATE game SET nama = '$this->nama',
                    deskripsi = '$this->deskripsi'
                    WHERE id = $this->id";
            $this->hasil = mysqli_query($this->connection, $sql);
            
            if($this->hasil)
                $this->message='Data berhasil diudpate';
            else
                $this->message='Data gagal diupdate';
        }
    public function UpdateFotoGame(){
            $sql = "UPDATE game SET foto ='$this->foto'
                    WHERE id = $this->id";
            $this->hasil = mysqli_query($this->connection, $sql);
                
            if($this->hasil)
                $this->message ='Foto berhasil diubah!';					
            else
                $this->message ='Foto gagal diubah!';	
		}

    public function DeleteGame(){
            $sql = "DELETE FROM game WHERE id ='$this->id'";
            $this->hasil = mysqli_query($this->connection, $sql);

            if($this->hasil)
                $this->message='Data berhasil dihapus';
            else
                $this->message='Data gagal dihapus';
        }		
    public function SelectAllGame(){
            $sql = "SELECT * FROM game";
            $result = mysqli_query($this->connection, $sql);
            $arrResult = Array();
            $count=0;
            if(mysqli_num_rows($result) > 0){
                while($data = mysqli_fetch_array($result)){
                    $objGame = new Game();
                    $objGame->id=$data['id'];
                    $objGame->nama=$data['nama'];
                    $objGame->deskripsi=$data['deskripsi'];
                    $objGame->foto=$data['foto'];
                    $arrResult[$count] = $objGame;
                    $count++;
                }
            }
            return $arrResult;
        }
    public function SelectOneGame(){
            $sql = "SELECT * FROM game WHERE id = '$this->id'";
            $resultOne = mysqli_query($this->connection, $sql);

            if(mysqli_num_rows($resultOne) == 1){
                $this->hasil = true;
                $data = mysqli_fetch_assoc($resultOne);
                $this->nama = $data['nama'];
                $this->deskripsi = $data['deskripsi'];
                $this->foto = $data['foto'];
            }
        }

    }

?>
        