<?php
require_once('./class/class.Member.php'); 		
	
$objMember = new Member();
if(isset($_POST['btnUpdate'])){
		$objMember->idmember = $_POST['idmember'];	 
		$objMember->foto = $_POST['foto'];	 
		$isSuccessUpload = false;		
		
		if(file_exists($_FILES['foto']['tmp_name']) || is_uploaded_file($_FILES['foto']['tmp_name'])){			
			$lokasifile = $_FILES['foto']['tmp_name'];
			$nama_file =  $_FILES['foto']['name'];
			$extension  = pathinfo( $_FILES["foto"]["name"], PATHINFO_EXTENSION ); 
			$objMember->foto   = $objMember->idmember . '.' . $extension; 
			$folder = './assets/upload/member/';
			$isSuccessUpload = move_uploaded_file($lokasifile, $folder.$objMember->foto);
		}
		else
			$isSuccessUpload = true;
		
		
		if($isSuccessUpload){	
			$objMember->iduser=$_SESSION["iduser"];			
			$objMember->fname = $_POST['fname'];	
			$objMember->lname = $_POST['lname'];	
			$objMember->bdate = $_POST['bdate'];	
			$objMember->address = $_POST['address'];
			$objMember->sex = $_POST['sex'];	
			
			$objMember->UpdateMember();		
	
			echo "<script> alert('$objMember->message'); </script>";	
			echo '<script> window.location = "'.$_SERVER['REQUEST_URI'].'";</script>';
		}
}
else if(isset($_SESSION['idmember'])){	
	$objMember->idmember = $_SESSION['idmember'];	
	$objMember->SelectOneMember();
}	
?>
<div class="container">  
<h4 class="title"><span class="text"><strong>Profile</strong></span></h4>  
    <form action="" method="post" enctype="multipart/form-data">
	<div class="row">
	<div class="col-md-2">		
	<?php
		if($objMember->foto != null)
			echo '<img class="img-rounded img-responsive" src="./assets/upload/member/'.$objMember->foto.'">';	
		else
			echo '<img class="img-rounded img-responsive" src="upload/default.png">';	
		?>
		<input type="hidden" name="foto" value="<?php echo $objMember->foto; ?>">
	<br>
	<span>Browse Picture</span>
	<input type="file" name="foto"></input>
	</div>
	<div class="col-md-5">		
	<table class="table" border="0">
	<tr>
	<td>idmember</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="idmember" readonly value="<?php echo $objMember->idmember; ?>"></td>
	</tr>
    <tr>
	<td>Email</td>
	<td>:</td>
	<td><input type="email" class="form-control" name="email" readonly value="<?php echo $objMember->email; ?>"></td>
	</tr>
	<tr>
	<td>First Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="fname" value="<?php echo $objMember->fname; ?>"></td>
	</tr>	
	<tr>	
	<tr>
	<td>Last Name</td>
	<td>:</td>
	<td><input type="text" class="form-control" name="lname" value="<?php echo $objMember->lname; ?>"></td>
	</tr>
	<tr>
	<td>Birth Date</td>
	<td>:</td>
	<td><input type="date" class="form-control" name="bdate" value="<?php echo $objMember->bdate; ?>"></td>
	</tr>	
	</table>
	</div>
	<div class="col-md-5">			
	<table class="table" border="0">
	<tr>
	<tr>
	<td>Address</td>
	<td>:</td>
	<td>
	<textarea class="form-control" name="address" rows="2" cols="12"><?php echo $objMember->address; ?></textarea></td>
	</tr>	
	<tr>
	<td>Sex</td>
	<td>:</td>
	<td>
	<?php
	$gender = array("F"=>"Female", "M"=>"Male");
	foreach($gender as $key => $value) {	
		if($objMember->sex == $key)					
			echo '<label class="radio-inline"><input type="radio" name="sex" checked value="'.$key.'"> '.$value.'</label>';
		else
			echo '<label class="radio-inline"><input type="radio" name="sex" value="'.$key.'"> '.$value.'</label>';
	}	
	?>
	   
	</td>
	</tr>	
	</table>    
	</div>
	
	</div>
	<input type="submit" class="btn btn-success" value="Update Profile" name="btnUpdate">	
</form>	  
</div>
<br>




