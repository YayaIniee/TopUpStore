<?php 
require_once('./class/class.Genre.php'); 
require_once('./class/class.Game.php'); 
$objGame = new Game(); 

if(isset($_POST['btnSubmit'])){	

	$objGame->nama = $_POST['nama'];	
    $objGame->foto = $_POST['foto'];
    $objGame->idGenre = $_POST['idGenre'];		
	
	if(isset($_GET['id'])){
		$objGame->id = $_GET['id'];
		$objGame->UpdateGame();
	}
	else{	
		$objGame->AddGame();				
	}
			
	if($objGame->hasil){
		echo "<script> alert('".$objGame->message."'); </script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=gamelist">'; 				
	}
	else{
		echo "<script> alert('Proses gagal. Silakan ulangi'); </script>";	
	}		
}
else if(isset($_GET['id'])){	
	$objGame->id = $_GET['id'];	
	$objGame->SelectOneGame();
}
?>
<div class="container">  
<div class="span7">			
  <h4 class="title"><span class="text"><strong>Game</strong></span></h4>
    <form action="" method="post" enctype="multipart/form-data">
	<table class="table" border="0">
	<tr>
	<td>Genre</td>
	<td>:</td>
	<td><select name="idGenre">
	<option></option>
	<?php

		
	$objGenre = new Genre(); 
	$arrayResult = $objGenre->SelectAllGenre();

	foreach ($arrayResult as $dataGenre) {

		if($dataGenre->id == $objGame->idGenre)					
			echo "<option selected='true' value='" . $dataGenre->id . "'>" . $dataGenre->nama . "</option>";
		else		
			echo "<option value='" .$dataGenre->id . "'>" . $dataGenre->nama. "</option>";
	}		
	?>
	</select>
	</td>
	</tr>	
	<tr>
	<tr>
	<td>Nama</td>
	<td>:</td>
	<td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objGame->nama; ?>"></td>
	</tr>	
	<tr>
	<td>Foto</td>
	<td>:</td>
	<td><textarea name="foto" class="form-control"><?php echo $objGame->foto; ?></textarea></td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-primary" value="Save" name="btnSubmit">
	    <a href="index.php?p=gamelist" class="btn btn-primary">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>


