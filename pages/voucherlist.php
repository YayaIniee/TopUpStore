<?php
	require_once "authorization_admin.php";
?>
<div class="container">
	<div class="col-lg-12">			
		<h4 class="title"><span class="text"><strong>Voucher List</strong></span></h4>
		<a class="btn btn-success" href="dashboardadmin.php?p=voucher">Add</a>
		<br>
		<table class="table">
			<tr>
				<th>#</th>
				<th>Games</th>
				<th>Nominal</th>
				<th>Nama</th>
				<th>Harga</th>
				<th>Action</th>
			</tr>
			<?php
				require_once('./class/class.Voucher.php');
				$cari_idgame =0;
				$objVoucher = new Voucher();		

				if(isset($_POST['btnCari'])){	
					$cari_idgame = $_POST['cari_idgame'];	
				}

				if(isset($_POST['btnReset'])){
					$cari_idgame = '';
				}
				$arrayResult = $objVoucher->SelectAllVoucher($cari_idgame);

				if(count($arrayResult) == 0){
					echo '<tr><td colspan="4">Nggak ada data akhy!</td></tr>';
				}else{
					$no = 1;
					foreach ($arrayResult as $dataVoucher) {
						echo '<tr>';
							echo '<td>'.$no.'</td>';
							echo '<td>'.$dataVoucher->namagame.'</td>';
							echo '<td>'.$dataVoucher->nominal.'</td>';
							echo '<td>'.$dataVoucher->nama.'</td>';
							echo '<td>Rp '.number_format($dataVoucher->harga,2,',','.').'</td>';
							echo '<td><a class="btn btn-warning"  href="dashboardadmin.php?p=voucher&id='.$dataVoucher->id.'"><i class="fas fa-edit"></i></a> |
									<a class="btn btn-danger"  href="dashboardadmin.php?p=deletevoucher&id='.$dataVoucher->id.'" 
									onclick="return confirm(\'Apakah anata yakin ingin menghapus?\')"><i class="fas fa-eraser"></i></a>';
						echo '</tr>';
						$no++;
					}
				}
				
			?>
		</table>
	</div>
</div>