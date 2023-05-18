<?php
include 'koneksi.php';
session_start();
if(isset($_GET['hapus'])){
    $del = mysqli_query($koneksi,"DELETE FROM produk WHERE id_produk='".$_GET['hapus']."'");
        header('location:index_produk_admin.php');
    
}
?>