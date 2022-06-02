<?php 

require_once('./class/class.Member.php'); 		
$objMember = new Member(); 

if(isset($_POST['btnSubmit'])){	
	$objMember->id =  $_SESSION["idmember"];
    //$objMember->nama = $_POST['nama'];
    //$objMember->email = $_POST['email'];
	$objMember->alamat = $_POST['alamat'];
	//$objMember->tempatlahir = $_POST['tempatlahir'];	
	//$objMember->tanggallahir = $_POST['tanggallahir'];
	$objMember->notelp = $_POST['notelp'];
	$objMember->gender =$_POST['jeniskelamin'];	
	$objMember->currentfoto =$_POST['currentfoto'];	
	$message = '';
	
	
	} else if(isset($_SESSION["id"])){		
	$objMember->id = $_SESSION["id"];
	$objMember->SelectOneMember();	
}
?>
<section class="main-content">				
	<div class="row">						
		<div class="span12">
			<div class="row">
				<div class="span3">
				<br/>
					<?php 
						if($objMember->foto !='')
							echo "<img src='./assets/upload/member/".$objMember->foto."' width='300px' height='350px'/>"; 
						else
							echo "<img src='./assets/upload/member/default.png' width='300px' height='350px'/>"; 
					?>								
				</div>
				<div class="span6">
				<h4 class="title"><span class="text"><strong>MY PROFILE</strong></span></h4>
				<form action="" method="post" enctype="multipart/form-data">
					<table class="table" border="0">
					<tr>
					<td>Name</td>
					<td>:</td>
					<td></td>
					<td><?php echo $objMember->nama; ?></td>
					</tr>
					 <tr>
					<td>E-mail</td>
					<td>:</td>
					<td><input type="text" class="form-control" readonly id="email" readonly maxlength="50" name="email" value="<?php echo $objMember->email; ?>"></td>
					</tr>	
					<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea style="width:55%" name="alamat" class="form-control" rows="3" cols="19"><?php echo $objMember->alamat; ?></textarea></td>
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
