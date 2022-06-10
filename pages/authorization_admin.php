<?php
if(!isset($_SESSION)){
 session_start();
}

if(!isset($_SESSION["role"])){
	echo "<script> alert('Login dulu lah untuk akses'); </script>";
	echo '<script> window.location="index.php"; </script>';
}
else
{
	if($_SESSION["role"]!='admin'){
		echo "<script> alert('Lu bukan admin, jadi gak bisa akses ke sini'); </script>";
		echo '<script> window.location="index.php"; </script>';
	}
}
?>