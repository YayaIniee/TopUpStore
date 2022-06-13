
<?php
    require_once "authorization_admin.php";
	if(isset($_GET['id'])){	
		require_once('./class/class.Voucher.php'); 
		$objVoucher = new Voucher(); 
		$objVoucher->id = $_GET['id'];	
		$objVoucher->SelectOneVoucher();
	}
?>

<section class="main-content">				
	<div class="row">
		<div class="col-lg-12">
            <table>
                <tr>
                    <th>id voucher</th>
                    <th>:</th>
                    <th><?php echo $objVoucher->id; ?></th>
                </tr>
                <tr>
                    <th>Game</th>
                    <th>:</th>
                    <th><?php echo $objVoucher->namagame; ?></th>
                </tr>
                <tr>
                    <th>Voucher</th>
                    <th>:</th>
                    <th><?php echo $objVoucher->nominal.' '.$objVoucher->matauang; ?></th>
                </tr>
                <tr>
                    <th>Harga</th>
                    <th>:</th>
                    <th><?php echo number_format($objVoucher->harga,2,',','.'); ?></th>
                </tr>

            </table>	
		</div>																			
	</div>						
</section>	