<?php 
require_once('./class/class.Genre.php'); 		

$objGenre = new Genre(); 

if(isset($_POST['btnSubmit'])){	
	$objGenre->nama = $_POST['nama'];
	
	if(isset($_GET['id'])){		
		$objGenre->id = $_GET['id'];
		$objGenre->UpdateGenre();
	}
	else{	
		$objGenre->AddGenre();
	}			
	
	if($objGenre->hasil){
		echo "<script> alert('".$objGenre->message."'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=genrelist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}			
}
else if(isset($_GET['id'])){	
	$objGenre->id = $_GET['id'];	
	$objGenre->SelectOneGenre();
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Genre</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objGenre->nama; ?>"></td>
		</tr>	
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
				<a href="index.php?p=genrelist" class="btn btn-primary">Cancel</a></td>
		</tr>	
	</table>    
</form>	
</div>  
</div>


