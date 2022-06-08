<div class="container">
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Voucher List</strong></span></h4>
  <a class="btn btn-success" href="index.php?p=voucher">Add</a>
  <br>
  <table class="table">
	<tr>
	<th>#</th>
	<th>nominal</th>	
	<th style="">Nama</th>
	<th>Harga</th>
	<th>Action</th>
	</tr>	
	<?php
	require_once('./class/class.Voucher.php'); 
		$cari_idgame =0;
		//$cari_deskripsi = '';
		$objVoucher = new Voucher(); 		

		if(isset($_POST['btnCari'])){				
			$cari_idgame = $_POST['cari_idgame'];				
			//$cari_deskripsi = $_POST['cari_deskripsi'];	
		}
		if(isset($_POST['btnReset'])){				
			$cari_idgame = '';			
			//$cari_deskripsi = '';				
		}
		$arrayResult = $objVoucher->SelectAllVoucher($cari_idgame);

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataVoucher) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataVoucher->namagame.'</td>';
					echo '<td>'.$dataVoucher->nama.'</td>';
					echo '<td>'.$dataVoucher->nominal.'</td>';
					echo '<td>Rp '.number_format($dataVoucher->harga,2,',','.').'</td>';
					//echo "<td><img src='upload/menu/".$dataVoucher->foto."' width='100px' height='100px'/></td>";
					echo '<td><a class="btn btn-warning"  href="index.php?p=voucher&id='.$dataVoucher->id.'">Edit</a> |
   					          <a class="btn btn-danger"  href="index.php?p=deletevoucher&id='.$dataVoucher->id.'" 
							  onclick="return confirm(\'Apakah anata yakin ingin menghapus?\')">Delete</a> ';	
				echo '</tr>';
				
				$no++;	
			}
		}
		
		?>
</table>
</div>
</div>