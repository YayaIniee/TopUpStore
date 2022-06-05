<?php
    require_once('./class/class.Banner.php');
    $objBanner = new Banner();
    
    if(isset($_POST['btnSubmit'])){
        $objBanner->nama = $_POST['nama'];
        $objBanner->deskripsi1 = $_POST['deskripsi1'];
        $objBanner->deskripsi2 = $_POST['deskripsi2'];
        $objBanner->currentfoto =$_POST['currentfoto'];	
        $message = '';

        if(isset($_GET['id'])){		
            $objBanner->id = $_GET['id'];
            $objBanner->UpdateBanner();
        } else{
            $objBanner->AddBanner();
        }
        if(!$objBanner->hasil){
            echo "<script> alert('Proses gagal! Silakan ulangi!'); </script>";	
		    die();
        }

        $folder = './assets/upload/banner/';
            //types that can be added
            $file_type	= array('jpg','jpeg','png','gif','bmp');
            $max_size	= 1000000; // 1MB	
            $isErrorFile   = false;
            $isSuccessUpload = true;
        
        if(!empty($_FILES['foto']['name'])){
            $file_name = $_FILES['foto']['name'];
            $file_size = $_FILES['foto']['size'];
                //search for file extensions by using the explode function
                $explode = explode('.',$file_name);
                $extensi = $explode[count($explode)-1];
            //check if the file type is correct
            if(!in_array($extensi, $file_type)){
                $isErrorFile = true;
                $message .= 'ukuran file melebihi batas maksimum :p'; 
            }

            if($isErrorFile){
                echo "<script> alert('$message'); </script>";
            } else{
                $objBanner->foto = $objBanner->id.'.'.$extensi;			
                $isSuccessUpload = move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$objBanner->foto);	
                
                if(!$isSuccessUpload){
                    echo "<script> alert('Gagal uploud foto'); </script>";
                    die();
                }
            }
        }

        if($isSuccessUpload){
            $objBanner->UpdateFotoBanner();
            if($objBanner->hasil){
                echo "<script> alert('$objBanner->message'); </script>";
                echo '<script> window.location = "index.php?p=bannerlist"; </script>';
            } else
                echo "<script> alert('Proses update gagal. Silakan ulangi'); </script>";
        } else
            echo "<script> alert('Proses upload gagal. Silakan ulangi'); </script>";
    } else if(isset($_GET['id'])){
        $objBanner->id = $_GET['id'];
        $objBanner->SelectOneBanner();
    }
?>

<section class="main-content">
    <div class="row">
        <div class="col-lg-5">
            <?php 
				if($objBanner->foto !='')
                    echo '<img src="./assets/upload/banner/'.$objBanner->foto.'" class="img-fluid"/>';
				else
					echo '<img src="./assets/upload/banner/default.PNG" class="img-fluid"/>'; 
			?>
        </div>
        <div class="col lg-7">
            <h4 class="title">
                <span class="text">
                    <strong>Banner</strong>
                </span>
            </h4>
            <form action="" method="POST">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objBanner->nama; ?>"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi1</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" id="deskripsi1" name="deskripsi1" value="<?php echo $objBanner->deskripsi1; ?>"></td></td>
                    </tr>
                    <tr>
                        <td>Deskripsi2</td>
                        <td>:</td>
                        <td><input type="text" class="form-control" id="deskripsi2" name="deskripsi2" value="<?php echo $objBanner->deskripsi2; ?>"></td></td>
                    </tr>
                    <tr>
                        <td>Upload Foto</td>
                        <td>:</td>
                        <td><input type="file" class="form-control" id="foto" name="foto"><input type="hidden" name="currentfoto" value="<?php echo $objBanner->foto; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
                            <a href="index.php?p=bannerlist" class="btn btn-warning text-white">Cancel</a></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>