<?php 
require_once('./class/class.User.php');
$objUser = new User(); 

if(isset($_POST['btnSubmit'])){	
	$objUser->email = $_POST['email'];	
	$password = $_POST['password'];	
	$currentpassword = $_POST['currentpassword'];	
	$passworddefault = '12345678';
	
	if($password == ''){ //jika password dikosongkan
    	if(isset($_GET['id'])) //jika sedang diedit, passwordnya adalah current password
			$password = $currentpassword; 
		else //jika sedang ditambah, password adalah password default
			$password = $passworddefault;		
	}
	$objUser->password = password_hash($password, PASSWORD_DEFAULT);	
	$objUser->role = $_POST['role'];
	
	if(isset($_GET['id'])){		
		$objUser->id = $_GET['id'];
		$objUser->UpdateUser();
	}
	else{	
		$objUser->AddUser();
	}
    echo "<script> alert('$objUser->message'); </script>";
    if($objUser->hasil){
        echo '<script> window.location="dashboardadmin.php?p=userlist"; </script>';	
    }

}
    else if(isset($_GET['iduser'])){	
	$objUser->iduser = $_GET['iduser'];	
	$objUser->SelectOneUser();
	
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>User</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
    <tr>
	<td>Email</td>
	<td>:</td>
	<td>
	<input type="text" class="form-control" id="email" name="email" value="<?php echo $objUser->email; ?>" required></td>
	</tr>	
	<tr>
	<td>Password</td>
	<td>:</td>
	<td>
	<input type="password" class="form-control" id="password" name="password">
	<input type="hidden" name="currentpassword" value="<?php echo $objUser->password; ?>">
	<span><i>Enter a new password or leave blank to keep current password</i> </span>
	</td>
	</tr>	
	<tr>
	<td>Role</td>
	<td>:</td>
	<td>
	<select name="role" class="form-control" required>
	<?php
	$arrayRole = Array("member", "admin");
	foreach($arrayRole as $selectedRole)	{
		if($objUser->role == $selectedRole)
			echo '<option selected="true" value="'.$selectedRole.'">'.$selectedRole.'</option>';
		else
			echo '<option value="'.$selectedRole.'">'.$selectedRole.'</option>';
	}
	?>	
	</select>	
	</td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
	    <a href="dashboardadmin.php?p=userlist" class="btn btn-danger">Cancel</a></td>
	</tr>

	</table>    
</form>	
</div>  
</div>


