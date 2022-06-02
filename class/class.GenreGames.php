<?php
    class GenreGames extends Connection{
        public $idgame ='';
        public $idgenre ='';

        public $hasil = false;
        public $message = '';

        public function AddGenreGames(){
            $sql = "INSERT INTO genregames (idgame, idgenre)
                    VALUES ('$this->idgame', '$this->idgenre')";
            $this->hasil = mysqli_query($this->connection, $sql);

            if($this->hasil)
                $this->message='Data genre berhasil ditambahkan';
            else
                $this->message='Data genre gagal ditambahkan';
        }
        public function UpdateGenreGames(){
            $sql = "UPDATE genregames SET idgenre = '$this->idgenre'
                    WHERE idgame = $this->idgame";
            $this->hasil = mysqli_query($this->connection, $sql);
            
            if($this->hasil)
                $this->message='Data genre berhasil diudpate';
            else
                $this->message='Data genre gagal diupdate';
        }
        public function DeleteGenreGames(){
            $sql = "DELETE FROM genregames WHERE idgame ='$this->idgame'";
            $this->hasil = mysqli_query($this->connection, $sql);

            if($this->hasil)
                $this->message='Data genre berhasil dihapus';
            else
                $this->message='Data genre gagal dihapus';
        }		
        public function SelectAllGenreGames(){
                $sql = "SELECT * FROM genregames";
                $result = mysqli_query($this->connection, $sql);
                $arrResult = Array();
                $count=0;
                if(mysqli_num_rows($result) > 0){
                    while($data = mysqli_fetch_array($result)){
                        $objGenreGames = new GenreGames();
                        $objGenreGames->idgame=$data['idgame'];
                        $objGenreGames->idgenre=$data['idgenre'];
                        $arrResult[$count] = $objGenreGames;
                        $count++;
                    }
                }
                return $arrResult;
            }
        public function SelectOneGenreGames(){
                $sql = "SELECT * FROM genregames WHERE idgame = '$this->idgame'";
                $resultOne = mysqli_query($this->connection, $sql);

                if(mysqli_num_rows($resultOne) == 1){
                    $this->hasil = true;
                    $data = mysqli_fetch_assoc($resultOne);
                    $this->idgenre = $data['idgenre'];
                }
            }

    }