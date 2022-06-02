<?php
    require_once('./class/class.Genre.php');
    $objGenre = new Genre();
    if(isset($_POST['btnSubmit'])){
        $objGenre->id = $_POST['id'];
        $objGenre->genre = $_POST['genre'];


            if (isset($_GET['id'])) {
                $objGenre->id = $_GET['id'];
                $objGenre->UpdateGenre();
            } else {
                $objGenre->AddGenre();
            } 
            echo "<script> alert('$objGenre->message'); </script>";
            if ($objGenre->hasil) {
                echo '<script> window.location = "index.php?p=genrelist"; </script>';
            }
    } else if(isset($_GET['id'])) {
        $objGenre->id = $_GET['id'];
        $objGenre->SelectOneGenre();
    }
?>

<h4 class="title">
    <span class="text">
        <strong>Genre</strong>
    </span>
</h4>
<form action="" method="POST">
    <table class="table">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" class="form-control" id="genre" name="genre" value="<?php echo $objGenre->genre; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
                 <a href="index.php?p=genrelist" class="btn btn-warning text-white">Cancel</a></td>
            <td></td>
        </tr>
    </table>
</form>