
<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Banner List</strong></span></h4>
  <a class="btn btn-success" href="index.php?p=banner">Add</a>
  <br>
  <br>  
<table class="table">
	<tr>
	<th>#</th>
	<th>Nama</th>	
	<th>Deskripsi 1</th>
    <th>Deskripsi 2</th>
	<th>Foto</th>
	<th>Action</th>
	</tr>	
	<?php
		require_once('./class/class.Banner.php'); 		
		$objBanner = new Banner(); 
		$arrayResult = $objBanner->SelectAllBanner();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataBanner) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td class="col-1">'.$dataBanner->nama.'</td>';
					echo '<td class="col-2">'.$dataBanner->deskripsi1.'</td>';
                    echo '<td class="col-4">'.$dataBanner->deskripsi2.'</td>';
					echo "<td><img src='./assets/upload/banner/".$dataBanner->foto."' width='100px' height='50px'/></td>";
					echo '<td><a class="btn btn-warning"  href="index.php?p=banner&id='.$dataBanner->id.'"><i class="fas fa-edit"></i></a> |
   					          <a class="btn btn-danger"  href="index.php?p=deletebanner&id='.$dataBanner->id.'" 
							  onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')"><i class="fas fa-eraser"></i></a></td>';	
				echo '</tr>';
				
				$no++;	
			}
		}
		?>
</table>
</div>
</div>

