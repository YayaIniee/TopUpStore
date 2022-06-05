<div class="container mt-3">
    <h4 class="title">
        <span class="text">
            <strong>Voucher List</strong>
        </span>
    </h4>
    <a href="index.php?p=voucher" class="btn btn-success my-3">Add</a>
    <table class="table" border="0">
        <tr>
            <th>#</th>
            <th>Game</th>
            <th>Nominal</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    <?php
        require_once('./class/class.Voucher.php');
        $cari_idgame = 0;
        $cari_deskripsi = '';
        $objVoucher =  new Voucher();

        if (isset($_POST['btnCari'])) {
            $cari_idgame = $_POST['cari_idgame'];
            $cari_deskripsi = $_POST['cari_deskripsi'];
        }
        if(isset($_POST['btnReset'])){
            $cari_idgame = '';
            $cari_deskripsi = '';
        }
        $arrayResult = $objVoucher->SelectAllVoucher($cari_idgame, $cari_deskripsi);

        if(count($arrResult) == 0){
            echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
        }else{
            $no = 1;
            foreach($arrResult as $dataVoucher){
                echo'<tr>';
                echo    '<td>'.$no.'</td>';
                echo    '<td>'.$dataVoucher->namagame.'</td>';
                echo    '<td>'.$dataVoucher->nominal.'</td>';
                echo    '<td>Rp '.number_format($dataVoucher->harga,2,',','.').'</td>';
                echo    '<td><a href="index.php?p=voucher&id='.$dataVoucher->id.'" class="btn btn-warning">Edit</a> | 
                        <a href="index.php?p=deletevoucher&id='.$dataVoucher->id.'" class="btn btn-danger" onclick="return confirm(\'Apakah anata yakin ingin menghapus?\')">Delete</a></td>';
                echo'</tr>';
                $no++;
                
            }   
        }
    ?>
    </table>
</div>