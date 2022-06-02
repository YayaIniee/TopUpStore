<?php
	//require("authorization_admin.php");
	if (empty($_GET['p'])) {
		header("HTTP/1.0 400 Bad Request", true, 400);
		exit('400: Bad Request');
	} 
?>

<div class="container">  
<div class="span11">			
  <h4 class="title"><span class="text"><strong>Member List</strong></span></h4>
  <br>  
  
  
  <br><br>
<table class="table">
	<tr>
	<th>No.</th>
	<th>Email</th>
	<th>Nama</th>
	<th>Alamat</th>
	<th>NoTelp</th>
	<th>Jenis Kelamin</th>	
	<th>Foto</th>	
	<th>Action</th>
	</tr>	
	<?php
	
	require_once('./class/class.Member.php'); 		
		$objMember = new Member(); 		
		$arrayResult = $objMember->SelectAllMember();

		if(count($arrayResult) == 0){
			echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			$no = 1;	
			foreach ($arrayResult as $dataMember) {
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$dataMember->email.'</td>';	
					echo '<td>'.$dataMember->nama.'</td>';
					echo '<td>'.$dataMember->alamat.'</td>';
					echo '<td>'.$dataMember->notelp.'</td>';
					echo '<td>'.$dataMember->gender.'</td>';
					echo "<td><img src='./assets/upload/member/".$dataMember->foto."' width='50px' height='50px'/></td>";
					echo '<td><a class="btn btn-warning" href="index.php?p=member&id='.$dataMember->id.'">Edit</a>';  
							 
					echo '</tr>';				
				
				$no++;	
			}
		}
	
	?>
</table>

</div>
</div>