<?php
    class Genre extends Connection{
        public $id ='';
        public $genre ='';

        public $hasil = false;
        public $message = '';

        public function AddGenre(){
            $sql = "INSERT INTO genre (id, genre)
                    VALUES ('$this->id', '$this->genre')";
            $this->hasil = mysqli_query($this->connection, $sql);

            if($this->hasil)
                $this->message='Data genre berhasil ditambahkan';
            else
                $this->message='Data genre gagal ditambahkan';
        }
        public function UpdateGenre(){
            $sql = "UPDATE genre SET genre = '$this->genre'
                    WHERE id = $this->id";
            $this->hasil = mysqli_query($this->connection, $sql);
            
            if($this->hasil)
                $this->message='Data genre berhasil diudpate';
            else
                $this->message='Data genre gagal diupdate';
        }
        public function DeleteGenre(){
            $sql = "DELETE FROM genre WHERE id ='$this->id'";
            $this->hasil = mysqli_query($this->connection, $sql);

            if($this->hasil)
                $this->message='Data genre berhasil dihapus';
            else
                $this->message='Data genre gagal dihapus';
        }		
        public function SelectAllGenre(){
                $sql = "SELECT * FROM genre";
                $result = mysqli_query($this->connection, $sql);
                $arrResult = Array();
                $count=0;
                if(mysqli_num_rows($result) > 0){
                    while($data = mysqli_fetch_array($result)){
                        $objGenre = new Genre();
                        $objGenre->id=$data['id'];
                        $objGenre->genre=$data['genre'];
                        $arrResult[$count] = $objGenre;
                        $count++;
                    }
                }
                return $arrResult;
            }
        public function SelectOneGenre(){
                $sql = "SELECT * FROM genre WHERE id = '$this->id'";
                $resultOne = mysqli_query($this->connection, $sql);

                if(mysqli_num_rows($resultOne) == 1){
                    $this->hasil = true;
                    $data = mysqli_fetch_assoc($resultOne);
                    $this->genre = $data['genre'];
                }
            }

    }