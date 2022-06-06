<?php
    require_once('./class/class.Game.php');
    $objGame = new Game();
    if(isset($_POST['btnSubmit'])){
        $objGame->id = $_POST['id'];
        $objGame->nama = $_POST['nama'];
        $objGame->deskripsi = $_POST['deskripsi'];


            if (isset($_GET['id'])) {
                $objGame->id = $_GET['id'];
                $objGame->UpdateGame();
            } else {
                $objGame->AddGame();
            } 
            echo "<script> alert('$objGame->message'); </script>";
            if ($objGame->hasil) {
                echo '<script> window.location = "index.php?p=gamelist"; </script>';
            }
    } else if(isset($_GET['id'])) {
        $objGame->id = $_GET['id'];
        $objGame->SelectOneGame();
    }
?>

<h4 class="title">
    <span class="text">
        <strong>Game</strong>
    </span>
</h4>
<form action="" method="POST">
    <table class="table">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" class="form-control" id="nama" name="nama" value="<?php echo $objGame->nama; ?>"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td>:</td>
            <td><textarea name="deskripsi" class="form-control" rows="3" cols="19">
	            <?php echo $objGame->deskripsi; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
                 <a href="index.php?p=gamelist" class="btn btn-warning text-white">Cancel</a></td>
            <td></td>
        </tr>
    </table>
</form>