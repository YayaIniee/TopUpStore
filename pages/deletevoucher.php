<?php
    require_once('./class/class.Voucher.php');
    
    if(isset($_GET['id'])){
        $objVoucher = new Voucher();
        $objVoucher->id = $_GET['id'];
        $objVoucher->DeleteVoucher();

        echo "<script> alert('$objVoucher->message'); </script>";
        echo "<script>window.location = 'index.php?p=voucherlist'</script>";

    } else{
        echo '<script>window.history.back()</script>';
    }
?>


