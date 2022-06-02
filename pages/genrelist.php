<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Genre List</strong></span></h4>
  <a class="btn btn-primary" href="index.php?p=genre">Add</a>
  <br>
  <br>  
<table class="table">
	<tr>
	<th>No.</th>
	<th>ID Genre</th>
	<th>Nama Genre</th>
	<th>Action</th>
	</tr>	
	<?php
		require_once('./class/class.Genre.php'); 		
		$objGenre = new Genre(); 
		$arrayResult = $objGenre->SelectAllGenre();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataGenre) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataGenre->id.'</td>';	
					echo '<td>'.$dataGenre->nama.'</td>';
					echo '<td><a class="btn btn-warning"  href="index.php?p=genre&id='.$dataGenre->id.'">Edit</a> |
   					          <a class="btn btn-danger"  href="index.php?p=deletegenre&id='.$dataGenre->id.'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete</a></td>';	
				echo '</tr>';
				
				$no++;	
			}
		}
		?>
</table>
</div>
</div>

