<?php
    require_once('./class/class.Genre.php');
    
    if(isset($_GET['id'])){
        $objGenre = new Genre();
        $objGenre->id = $_GET['id'];
        $objGenre->DeleteGenre();

        echo "<script> alert('$objGenre->message'); </script>";
        echo "<script>window.location = 'index.php?p=genrelist'</script>";

    } else{
        echo '<script>window.history.back()</script>';
    }
?>


