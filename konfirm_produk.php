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
        <title>Pesan Produk</title>
</head>
<body>
        <header>
      <nav>
        <ul>
          <li><a href="index.php">Kembali</a></li>
          <li><a href="keranjang.php">Keranjang</a></li>
        </ul>
      </nav>
    </header>
    <section class="konten">    
        <div class="container"> 
            <h1 class="yuhu" >Pesan Produk</h1> 
            <?php 
            $idproduk=$_SESSION['id_produk_pilihan'];
            $ambil_produk= mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk=$idproduk");
            $array_ambil_produk= mysqli_fetch_array($ambil_produk);
            ?>
            <div class="tambahpesanan">           
            <table class="tabelproduk" border="0">                
                <tr>
                    <td><img class="gbrproduk" src="pict/<?php echo  $array_ambil_produk['foto_produk']?>"></td>                
                    <td width="60%" style="font-size:30px; font: weight 100px;"><h2 class="nama_pesanan">Beli <?php echo  $array_ambil_produk['nama_produk'];?></h2><br>
                    <p class="harga" >Rp. <?php echo number_format( $array_ambil_produk['harga_produk']);?></p>
                    <p style="font-size:20px;margin-top:-30px;">Stok: <?php echo $array_ambil_produk['stok_produk'];?></p>
                    <form action="" method="POST">
                    <p style="font-size:30px;" class="gamarg">Jumlah: <input class="gamarg" name="jumlah_produk" type="number" min="1" max="<?php echo $array_ambil_produk['stok_produk'];?>" placeholder="0"></p><br>
                    <input style="width:40%;margin: 0;" name="keranjang" type="submit" value="Tambahkan ke keranjang">                        
                    </form>
                    <?php
        if(isset($_POST['keranjang'])){
            if($_POST['jumlah_produk']>0){
            $jml_produk=$_POST['jumlah_produk'];
            $id_produk=$array_ambil_produk['id_produk'];

            if(!isset($_SESSION['keranjang'][$id_produk])){
                $_SESSION['keranjang'][$id_produk]=$jml_produk;
            }else{
                $_SESSION['keranjang'][$id_produk]+=$jml_produk;
            }
            header('location:keranjang.php');
        }else{
                echo "<p style='font-size:18px;'>"."Anda belum menambahkan jumlah produk!"."</p>";
            }
        }
        ?>                                                    
                          
                </tr>  
            </table>
            </div>
        </div>
        
    </section>
    
</body>
</html>