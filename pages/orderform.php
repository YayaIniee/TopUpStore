<?php
    require_once('./class/class.Voucher.php');
    $objVoucher = new Voucher();
    
    if(isset($_POST['checkout']) && isset($_SESSION['orderform']) && !empty($_SESSION['orderform'])){
        header('Location: dashboardmember.php?p=checkout');
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="dashboardmember.php?p=orderform" method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Game</th>
                            <th>Nominal</th>
                            <th>Harga</th>
                            <th> ~ </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $voucher_in_order = isset($_SESSION['orderform']) ? $_SESSION['orderform'] : array();
                        if($voucher_in_order){
                            $arrayvoucherinorder = implode(',', array_keys($voucher_in_order));
                            $arrayvoucher = $objVoucher->SelectAllVoucherInOrder($arrayvoucherinorder);
                        }
                        if(empty($arrayvoucher)){
                            echo '<tr>
                                    <td colspan="5">Ngga ada pesanan yg mau kau beli</td>
                                  </tr>';
                        } 
                        else{
                            foreach($arrayvoucher as $voucher){
                                echo'<tr>';
                                echo'   <td><a href="dashboardmember.php?p=voucherdetail&id='.$voucher->id.'"></a></td>';
                                echo'   <td><a href="dashboardmember.php?p=voucherdetail&id='.$voucher->id.'">'.$voucher->nama.'</a></td>';
                                echo'   <td><a href="dashboardmember.php?p=voucherdetail&id='.$voucher->id.'">'.$voucher->nominal.'</a></td>';
                                echo'   <td>Rp '.number_format($voucher->harga,2,',','.').'</td>';
                                echo'   <td></td>';
                                echo'</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <hr>
                <p class="buttons center">
                    <input type="submit" class="btn btn-warning" value="checkout">
                </p>
            </form>
        </div>
    </div>
</div>