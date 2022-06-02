<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Game List</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=game">Add</a>
  <br>
  <br>  
<table class="table">
	<tr>
	<th>No.</th>
	<th>Genre Game</th>
	<th>Nama Game</th>
	<th>Foto</th>
	<th>Action</th>
	</tr>	
	<?php
	require_once('./class/class.Game.php'); 
		$cari_idgenre =0;
    	$objGame = new Game(); 		

		if(isset($_POST['btnCari'])){				
			$cari_idgenre = $_POST['cari_idgenre'];		}
		if(isset($_POST['btnReset'])){				
			$cari_idgenre = '';			
		}
		$arrayResult = $objGame->SelectAllGame($cari_idgenre);

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataGame) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataGame->namagenre.'</td>';
					echo '<td>'.$dataGame->nama.'</td>';
					echo "<td><img src='./assets/upload/game/".$dataGame->foto."' width='100px' height='100px'/></td>";
					echo '<td><a class="btn btn-warning"  href="index.php?p=game&id='.$dataGame->id.'">Edit</a> |
   					          <a class="btn btn-danger"  href="index.php?p=deletegame&id='.$dataGame->id.'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a> |
							  <a class="btn btn-warning"  href="index.php?p=gamefoto&id='.$dataGame->id.'">Upload Foto</a> </td>';	
				echo '</tr>';
				
				$no++;	
			}
		}
		
		?>
</table>
</div>
</div>