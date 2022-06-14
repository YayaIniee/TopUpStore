<?php
    require_once "authorization_admin.php";
    require_once('./class/class.Game.php'); 
    $objGame = new Game(); 
    
    if(isset($_POST['btnSubmit'])){
        $message ='';
        $isErrorFile = false;
        $folder		= './assets/upload/game/';
        $file_type	= array('jpg','jpeg','png','gif','bmp');
        $max_size	= 1000000; // 1MB	
        $file_name	= $_FILES['foto']['name'];
        $file_size	= $_FILES['foto']['size'];
        //cari extensi file dengan menggunakan fungsi explode
        $explode	= explode('.',$file_name);
        $extensi	= $explode[count($explode)-1];
        //check apakah type file sudah sesuai

        if(!in_array($extensi,$file_type)){
            $isErrorFile   = true;
		    $message .= 'Type file yang anda upload tidak sesuai';
        }
        if($file_size > $max_size){
            $isErrorFile   = true;
		    $message .= 'Ukuran file melebihi batas maximum';
        }
        if($isErrorFile){
            echo "<script> alert('$message'); </script>";
        } else{
            $objGame->id =  $_GET['id'];		
		    $isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder . $objGame->id.'.'.$extensi);				
            
            if($isSuccessUpload){
                	
                $objGame->foto = $objGame->id.'.'.$extensi;

                $objGame->UpdateFotoGame();
                if($objGame->hasil){			
                    echo "<script> alert('".$objGame->message."'); </script>";
                    echo '<script> window.location = "dashboardadmin.php?p=gamelist"; </script>';				
                }
                else
                    echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";
            }
            else
			echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";
        }  
    } else if(isset($_GET['id'])){	
        $objGame->id = $_GET['id'];	
        $objGame->SelectOneGame();
    }

?>


<div class="container">
    <h4 class="title">
        <span class="text">
            <strong>Game</strong>
        </span>
    </h4>
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $objGame->nama; ?></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td><?php 
                     if($objGame->foto != '')
                     echo '<img src="./assets/upload/game/'.$objGame->foto.'" class="img-fluid" width="100px" heigth="100px"/>';
                        else
					    echo '<img src="./assets/upload/game/default.PNG" width="150"/>'; 
                    ?>
                    </td>
            </tr>
            <tr>
                <td>Upload foto</td>
                <td>:</td>
                <td><input type="file" class="form-control" id="foto" name="foto" required></td>
            </tr>
            <tr> 
                <td colspan="2"></td>
                <td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
                    <a href="dahsboardadmin.php?p=gamelist" class="btn btn-warning text-white">Cancel</a></td>
                <td></td>
            </tr>
        </table>
    </form>
</div>