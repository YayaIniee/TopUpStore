<?php 

require_once('./class/class.Member.php'); 		
$objMember = new Member(); 

if(isset($_POST['btnSubmit'])){	
	$objMember->id =  $_SESSION["idmember"];
    //$objMember->nama = $_POST['nama'];
    //$objMember->email = $_POST['email'];
	$objMember->alamat = $_POST['alamat'];
	$objMember->notelp = $_POST['notelp'];
	$objMember->gender =$_POST['jeniskelamin'];	
	$objMember->currentfoto =$_POST['currentfoto'];	
	$message = '';
	
	$folder		= './assets/upload/member/';
		//type file yang bisa diupload
	$file_type	= array('jpg','jpeg','png','gif','bmp');
	$max_size	= 1000000; // 1MB	
	$isErrorFile   = false;
	$isSuccessUpload = true;
	
	if (!empty($_FILES['foto']['name'])) {	
		$file_name	= $_FILES['foto']['name'];
		$file_size	= $_FILES['foto']['size'];
		//cari extensi file dengan menggunakan fungsi explode
		$explode	= explode('.',$file_name);
		$extensi	= $explode[count($explode)-1];
		//check apakah type file sudah sesuai
		if(!in_array($extensi,$file_type)){
			$isErrorFile   = true;
			$message .= 'Type file yang anda upload tidak sesuai';
		}
		if($file_size > $max_size){
			$isErrorFile   = true;
			$message .= 'Ukuran file melebihi batas maximum';
		}	
		
		if($isErrorFile){
			echo "<script> alert('$message'); </script>";
		}
		else{
			$objMember->foto = $objMember->id.'.'.$extensi;
			$isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$objMember->foto);							
		}
	}
		
	if($isSuccessUpload){			
		$objMember->UpdateMember();
			
		if($objMember->hasil){						
			echo "<script> alert('$objMember->message'); </script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=profiledit">'; 				
		}
		else
			echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";			
	}
	else
		echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";			
				
}
else if(isset($_SESSION["id"])){		
	$objMember->id = $_SESSION["id"];
	$objMember->SelectOneMember();	
}
?>

<section class="main-content">				
	<div class="row">						
		<div class="span12">
			<div class="row">
				<div class="col-lg-4">
				<br/>
					<?php 
						if($objMember->foto !='')
							echo "<img src='./assets/upload/member/".$objMember->foto."' width='300px' height='300px'/>"; 
						else
							echo "<img src='./assets/upload/member/default.png' width='260px' height='360px'/>"; 
					?>								
				</div>
				<div class="col-lg-8">
				<h4 class="title"><span class="text"><strong>EDIT PROFILE</strong></span></h4>
				<form action="" method="post" enctype="multipart/form-data">
					<table class="table" border="0">
					<tr>
					<td>Name</td>
					<td>:</td>
					<td><input type="text" class="form-control" readonly id="nama" name="nama" value="<?php echo $objMember->nama; ?>"></td>
					</tr>
					 <tr>
					<td>E-mail</td>
					<td>:</td>
					<td><input type="text" class="form-control" readonly id="email" readonly maxlength="50" name="email" value="<?php echo $objMember->email; ?>"></td>
					</tr>	
					<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea style="width:55%" name="alamat" class="form-control" rows="3" cols="30"><?php echo $objMember->alamat; ?></textarea></td>
					</tr>	
					<tr>
					<td>Handphone</td>
					<td>:</td>
					<td><input class="form-control" type="text" name="notelp" value="<?php echo $objMember->notelp; ?>">
					</td>
					</tr>	
					<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><input  type="radio" name="jeniskelamin" value="laki-laki" <?php if($objMember->gender == 'laki-laki') echo 'checked'; ?>>Laki-Laki</input>
						<input type="radio" name="jeniskelamin" value="perempuan" <?php if($objMember->gender == 'perempuan') echo 'checked'; ?>>Perempuan</input>
					</td>
					</tr>	
					<tr>
					<td>Upload Foto</td>
					<td>:</td>
					<td><input type="file" class="form-control" id="foto" name="foto">
						<input type="hidden" name="currentfoto" value="<?php echo $objMember->foto; ?>">	
					</td>
					</tr>		
					<tr>
					<td></td>
					<td></td>
					<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
						<a href="index.php" class="btn btn-primary">Cancel</a></td>
					</tr>	
					</table>    
				</form>		
				</div>							
			</div>						
		</div>		
	</div>
</section>			
	