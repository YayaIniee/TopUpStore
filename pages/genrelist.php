<div class="container mt-3">
    <h4 class="title">
        <span class="text">
            <strong>Genre List</strong>
        </span>
    </h4>
    <a href="index.php?p=genre" class="btn btn-success my-3">Add</a>
    <table class="table" border="0">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama Genre</th>
            <th>Action</th>
        </tr>
    <?php
        require_once('./class/class.Genre.php');
        $objGenre = new Genre();
        $arrResult = $objGenre->SelectAllGenre();
        
        if(count($arrResult) == 0){
            echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
        }else{
            $no = 1;
            foreach($arrResult as $dataGenre){
                echo'<tr>';
                echo    '<td>'.$no.'</td>';
                echo    '<td>'.$dataGenre->id.'</td>';
                echo    '<td>'.$dataGenre->genre.'</td>';
                echo    '<td><a href="index.php?p=genre&id='.$dataGenre->id.'" class="btn btn-warning">Edit</a> | 
                        <a href="index.php?p=deletegenre&id='.$dataGenre->id.'" class="btn btn-danger" onclick="return confirm(\'Apakah anata yakin ingin menghapus?\')">Delete</a>';
                echo'</tr>';
                $no++;
            }   
        }
    ?>
    </table>
</div>