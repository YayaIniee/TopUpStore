<?php
require_once('./class/class.Member.php'); 		
	
$objMember = new Member();
if(isset($_POST['btnSubmit'])){
		$objMember->id = $_POST['id'];	 
		$objMember->nama = $_POST['nama'];
	  	$objMember->email = $_POST['email'];	
		$objMember->alamat = $_POST['alamat'];
		$objMember->notelp = $_POST['notelp'];
		$objMember->gender =$_POST['gender'];
		$objMember->foto = $_POST['foto'];	 
		$isSuccessUpload = false;

		
		if(file_exists($_FILES['foto']['tmp_name']) || is_uploaded_file($_FILES['foto']['tmp_name'])){			
			$lokasifile = $_FILES['foto']['tmp_name'];
			$nama_file =  $_FILES['foto']['name'];
			$extension  = pathinfo( $_FILES["foto"]["name"], PATHINFO_EXTENSION ); 
			$objMember->foto   = $objMember->id . '.' . $extension; 
			$folder = './assets/upload/member/';
			$isSuccessUpload = move_uploaded_file($lokasifile, $folder.$objMember->foto);
		}
		else
			$isSuccessUpload = true;
		
		if($isSuccessUpload){	
			$objMember->id=$_SESSION["id"];
			$objMember->nama = $_POST['nama'];
		  	$objMember->email = $_POST['email'];	
			$objMember->alamat = $_POST['alamat'];
			$objMember->notelp = $_POST['notelp'];
			$objMember->gender =$_POST['gender'];
				
			$objMember->UpdateMember();		
	
			echo "<script> alert('$objMember->message'); </script>";	
			echo '<script> window.location = "'.$_SERVER['REQUEST_URI'].'";</script>';
		}


else if(isset($_SESSION['id'])){	
	$objMember->id = $_SESSION['id'];	
	$objMember->SelectOneMember();
}	
}
?>

<div class="container">  
<h4 class="title"><span class="text"><strong>Profile</strong></span></h4>  
    <form action="" method="post" enctype="multipart/form-data">
	<div class="row">
	<div class="col-md-4">		
	<?php
		if($objMember->foto != null)
			echo '<img class="img-rounded img-responsive" src="./assets/upload/member/'.$objMember->foto.'">';	
		else
			echo '<img class="img-rounded img-responsive" src="./assets/upload/member/default.png">';	
		?>
		<input type="hidden" name="foto" value="<?php echo $objMember->foto; ?>">
	<br>
	<span>Browse Picture</span>
	<input type="file" name="foto"></input>
	</div>
	<div class="col-md-8">		
	<table class="table" border="0">
	<tr>
	<td>Email</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="id" readonly value="<?php echo $objMember->email; ?>"></td>
	</tr>	
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="name" readonly value="<?php echo $objMember->nama; ?>"></td>
	</tr>
	<tr>
	<td>Alamat</td>
	<td>:</td>
	<td>
	<textarea class="form-control" name="address" rows="2" cols="12"><?php echo $objMember->address; ?></textarea></td>
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
	<td><input  type="radio" name="jeniskelamin" value="laki-laki" <?php if($objMember->gender == 'laki-laki') 
	echo 'checked'; ?>>Laki-Laki</input>
	<input type="radio" name="jeniskelamin" value="perempuan" <?php if($objMember->gender == 'perempuan') 
	echo 'checked'; ?>>Perempuan</input></td>
	</tr>
	</table>    
	</div>
	
	</div>
	<input type="submit" class="btn btn-success mt-3" value="Save" name="btnSubmit">
		
</form>	  
</div>
<br>