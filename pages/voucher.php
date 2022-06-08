<?php 
	require_once('./class/class.Game.php'); 
	require_once('./class/class.Voucher.php'); 
	$objVoucher = new Voucher(); 

	if(isset($_POST['btnSubmit'])){	

		$objVoucher->nama = $_POST['nama'];	
		$objVoucher->nominal = $_POST['nominal'];
		$objVoucher->idgame = $_POST['idgame'];	
		$objVoucher->harga = $_POST['harga'];		
		
		if(isset($_GET['id'])){
			$objVoucher->id = $_GET['id'];
			$objVoucher->UpdateVoucher();
		}
		else{	
			$objVoucher->AddVoucher();				
		}
				
		if($objVoucher->hasil){
			echo "<script> alert('".$objVoucher->message."'); </script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=voucherlist">'; 				
		}
		else{
			echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
		}		
	}
	else if(isset($_GET['id'])){	
		$objVoucher->id = $_GET['id'];	
		$objVoucher->SelectOneVoucher();
	}
?>
<div class="container">  
	<div class="col-lg-12">			
		<h4 class="title"><span class="text"><strong>Voucher</strong></span></h4>
		<form action="" method="post" enctype="multipart/form-data">
			<table class="table" border="0">
				<tr>
					<td>game</td>
					<td>:</td>
					<td>
						<select name="idgame"><option></option>
							<?php
							
								$objGame = new Game(); 
								$arrayResult = $objGame->SelectAllGame();

								foreach ($arrayResult as $dataGame) {

									if($dataGame->id == $objVoucher->idgame)					
										echo "<option selected='true' value='" . $dataGame->id . "'>" . $dataGame->nama . "</option>";
									else		
										echo "<option value='" .$dataGame->id . "'>" . $dataGame->nama. "</option>";
								}		
							?>
						</select>
					</td>
				</tr>	
				<tr>
					<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objVoucher->nama; ?>"></td>
				</tr>	
					<tr>
					<td>nominal</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="nominal" name="nominal" value="<?php echo $objVoucher->nominal; ?>"></td>
				</tr>	
				<tr>
					<td>Harga</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="harga" name="harga" value="<?php echo $objVoucher->harga; ?>"></td>
				</tr>	
					<tr>
					<td></td>
					<td></td>
					<td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
						<a href="index.php?p=voucherlist" class="btn btn-danger">Cancel</a></td>
				</tr>	
			</table>    
		</form>	
	</div>  
</div>


