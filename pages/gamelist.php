<div class="container mt-3">
    <h4 class="title">
        <span class="text">
            <strong>Game List</strong>
        </span>
    </h4>
    <a href="index.php?p=game" class="btn btn-success my-3">Add</a>
    <table class="table" border="0">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama Game</th>
            <th>Genre</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
    <?php
        require_once('./class/class.Game.php');
        $objGame = new Game();
        $arrResult = $objGame->SelectAllGame();

        if(count($arrResult) == 0){
            echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
        }else{
            $no = 1;
            foreach($arrResult as $dataGame){
                echo'<tr>';
                echo    '<td>'.$no.'</td>';
                echo    '<td>'.$dataGame->id.'</td>';
                echo    '<td>'.$dataGame->nama.'</td>';
                echo    '<td></td>';
                echo    "<td><img src='./assets/upload/game/".$dataGame->foto."' width='50px' height='50px'/></td>";
                echo    '<td><a href="index.php?p=game&id='.$dataGame->id.'" class="btn btn-warning">Edit</a> | 
                        <a href="index.php?p=deletegame&id='.$dataGame->id.'" class="btn btn-danger" onclick="return confirm(\'Apakah anata yakin ingin menghapus?\')">Delete</a> |
                        <a class="btn btn-warning"  href="index.php?p=gamefoto&id='.$dataGame->id.'">Upload Foto</a></td>';
                echo'</tr>';
                $no++;
            }   
        }
    ?>
    </table>
</div>