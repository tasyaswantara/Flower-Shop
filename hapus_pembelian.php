<?php
include 'koneksi.php';
session_start();
if(isset($_GET['id'])){
    $hpspembelian = mysqli_query($koneksi,"DELETE FROM pesanan WHERE id='".$_GET['id']."'");
        header('location:daftar_beli.php');
    
}
?>