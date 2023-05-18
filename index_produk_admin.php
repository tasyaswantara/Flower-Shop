<!DOCTYPE html> 
<html lang="en">
    <?php
    include 'koneksi.php';
    session_start();
    ?>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styleindex.css">
        <title>Halaman Belanja</title>
</head>
<body>
    <?php $ambil= mysqli_query($koneksi,"SELECT * FROM produk");
        ?>
        <header>
      <nav>
        <ul>
          <li><a href="logout.php">Log-Out</a></li>
          <li><a href="tambah.php">Tambah Produk</a></li>
          <li><a href="daftar_beli.php">Pembelian</a></li>
          <li><a href="signup_admin.php">Tambah Admin</a></li>
        </ul>
      </nav>
    </header>
    <section class="konten">    
        <div class="container">   
            <h1 class="yuhu" >Produk Terbaru</h1>
            <table class="tabelproduk" border="0">                
                <?php
                while($perproduk= mysqli_fetch_array($ambil)){?>
                <tr>
                    <td><img class="gbrproduk" src="pict/<?php echo $perproduk['foto_produk']?>"></td>                
                    <td width="60%" style="font-size:25px; font: weight 100px;"><h2 class="nama"><?php echo $perproduk['nama_produk'];?></h2><br>
                    <p style="font-size:16px;" ><?php echo $perproduk['deskripsi_produk'];?></p><br>
                    <p class="harga" >Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
                    <a href="?ubah=<?php echo $perproduk['id_produk'];?>"><div class="beli">Ubah</div></a>
                    <a href="hapus_produk.php?hapus=<?php echo $perproduk['id_produk'];?>"><img class="gbrsampah" src="pict/bin.png" alt="trash" style="width:5%; margin:20px 0;"></a>

                </td>                                 
                </tr>                
                <?php }?>  
            </table>
            <?php
        if(isset($_GET['ubah']) && is_numeric($_GET['ubah'])){            
            $data_produk_ubah= mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk= '".$_GET['ubah']."'");
            $array_produk_ubah = mysqli_fetch_array($data_produk_ubah);   
            $_SESSION['id_produk_ubah']=$array_produk_ubah['id_produk'];
            header('location:ubah_produk.php');        
        }
        ?>
        </div>
    </section>
</body>
</html>