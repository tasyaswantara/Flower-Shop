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
          <?php if(isset($_SESSION['user'])){ ?>
          <li><a href="keranjang.php">Keranjang</a></li>
          <li><a href="daftar_beli_user.php?id=<?php echo $_SESSION['user']['id_user'];?>">Riwayat Pembelian</a></li>
          <?php }else{ ?>
            <li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>
      </nav>
    </header>
    <section class="konten">
    
        <div class="container">     
    

            <h1 class="yuhu" >Produk Terbaru</h1>
            
            <table class="tabelproduk" border="0">
                
                <?php
                while($perproduk= mysqli_fetch_array($ambil)){   ?>
                <tr>
                    <td><img class="gbrproduk" src="pict/<?php echo $perproduk['foto_produk']?>"></td>                
                    <td width="60%" style="font-size:25px; font: weight 100px;"><h2 class="nama"><?php echo $perproduk['nama_produk'];?></h2><br>
                    <p style="font-size:16px;" ><?php echo $perproduk['deskripsi_produk'];?></p><br>
                    <p class="harga" >Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
                    <a href="?beli=<?php echo $perproduk['id_produk'];?>"><div class="beli">Beli</div></a></td>                                 
                            
                </tr>
                
                <?php } ?>  
            </table>
            <?php
        if(isset($_GET['beli']) && is_numeric($_GET['beli'])){     
            if(isset($_SESSION['user'])){ 
            $data_produk_pilihan= mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk= '".$_GET['beli']."'");
            $array_produk_pilihan = mysqli_fetch_array($data_produk_pilihan);   
            
            $_SESSION['id_produk_pilihan']=$array_produk_pilihan['id_produk'];
            header('location: konfirm_produk.php');
            }else{
                header('location:login.php');
            }
        
        }
        ?>
        </div>
    </section>
</body>
</html>