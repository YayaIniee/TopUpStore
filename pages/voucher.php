<?php 
    require_once('./class/class.Voucher.php');
    require_once('./class/class.Game.php');
    $objVoucher = new Voucher();

    if(isset($_POST['btnSubmit'])){
        $objVoucher->id = $_POST['id'];
        $objVoucher->nominal = $_POST['nominal'];
        $objVoucher->harga = $_POST['harga'];
        $objVoucher->idgame = $_POST['idgame'];

            if (isset($_GET['id'])) {
                $objVoucher->id = $_GET['id'];
                $objVoucher->UpdateVoucher();
            } else {
                $objVoucher->AddVoucher();
            } 
            echo "<script> alert('$objVoucher->message'); </script>";
            if ($objVoucher->hasil) {
                echo '<script> window.location = "index.php?p=voucherlist"; </script>';
            }
    } else if(isset($_GET['id'])) {
        $objVoucher->id = $_GET['id'];
        $objVoucher->SelectOneVoucher();
    }
?>



<h4 class="title">
    <span class="text">
        <strong>Voucher</strong>
    </span>
</h4>
<form action="" method="POST">
    <table class="table">
        <tr>
            <td>Game</td>
            <td>:</td>
            <td>
                <select name="idgame">
                    <option></option>
                    <?php

                        
                    $objGame = new Game(); 
                    $arrayResult = $objGame->SelectAllGame();

                    foreach ($arrayResult as $dataGame) {

                        if($dataGame->id == $objVoucher->idGame)					
                            echo "<option selected='true' value='" . $dataGame->id . "'>" . $dataGame->nama . "</option>";
                        else		
                            echo "<option value='" .$dataGame->id . "'>" . $dataGame->nama. "</option>";
                    }		
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Nominal</td>
            <td>:</td>
            <td><input type="text" class="form-control" id="nominal" name="nominal" value="<?php echo $objVoucher->nominal; ?>"></td></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td><input type="text" class="form-control" id="harga" name="harga" value="<?php echo $objVoucher->harga; ?>"></td></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
                 <a href="index.php?p=gamelist" class="btn btn-warning text-white">Cancel</a></td>
            <td></td>
        </tr>
    </table>
</form>