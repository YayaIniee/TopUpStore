<?php
if(isset($_GET['id'])){	
	require_once('./class/class.Game.php'); 		
	$objGame = new Game(); 
	$objGame->id = $_GET['id'];
	
	$objGame->SelectOneGame();
	if($objGame->hasil == false){		
		echo '<script>window.history.back()</script>';	
	}else{
		$objGame->DeleteGame();
		echo "<script> alert('".$objGame->message."'); </script>";
		echo "<script>window.location = 'index.php?p=gamelist'</script>";			
	}	
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>