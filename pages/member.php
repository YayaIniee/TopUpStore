<?php 
require_once('./class/class.Member.php'); 		

$objMember = new Member(); 

if(isset($_POST['btnSubmit'])){	
	
  $objMember->nama = $_POST['nama'];
  $objMember->email = $_POST['email'];	
	$objMember->alamat = $_POST['alamat'];
	$objMember->notelp = $_POST['notelp'];
	$objMember->gender =$_POST['gender'];
	
	if(isset($_GET['id'])){
		$objMember->id = $_GET['id'];
		$objMember->UpdateMember();
	}
	else{	
		$objMember->AddMember();				
	}	
	
	if($objMember->hasil){
		echo "<script> alert('".$objMember->message."'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=memberlist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}		
				
}
else if(isset($_GET['id'])){	
	$objMember->id = $_GET['id'];	
	$objMember->SelectOneMember();
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Member</strong></span></h4>
    <form action="" method="post">
			<table class="table" border="0">
				<tr>
					<td>Name</td>
					<td>:</td>
					<td><input type="text" class="form-control" readonly id="nama" name="nama" value="<?php echo $objMember->nama; ?>"></td>
				</tr>
				 <tr>
					<td>E-mail</td>
					<td>:</td>
					<td><input type="text" class="form-control" readonly id="email" maxlength="50" name="email" value="<?php echo $objMember->email; ?>"></td>
				</tr>	
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea style="width:55%" name="alamat" class="form-control"><?php echo $objMember->alamat; ?></textarea></td>
				</tr>	
				<tr>
					<td>NoTelp</td>
					<td>:</td>
					<td><input type="text" class="form-control" name="notelp" value="<?php echo $objMember->notelp; ?>">
					</td>
				</tr>	
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><input type="radio" name="gender" value="laki-laki" <?php if($objMember->gender == 'laki-laki') echo 'checked'; ?>>Laki-Laki</input>
						<input type="radio" name="gender" value="perempuan" <?php if($objMember->gender == 'perempuan') echo 'checked'; ?>>Perempuan</input>
					</td>
				</tr>		
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
					    <a href="index.php?p=memberlist" class="btn btn-primary">Cancel</a></td>
				</tr>	
			</table>    
		</form>	
</div>  
</div>


