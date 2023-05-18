<!DOCTYPE html> 
<?php
session_start();
include 'koneksi.php';
 ?>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styleindex.css">
        <title>Keranjang Belanja</title>
    </head>
    <body>
    <header>
      <nav>
        <ul>
          <li><a href="logout.php">Log-Out</a></li>
          <li><a href="index.php">Lihat Produk</a></li>
          <?php if(isset($_SESSION['user'])){ ?>
          <li><a href="daftar_beli_user.php?id=<?php echo $_SESSION['user']['id_user'];?>">Riwayat Pembelian</a></li>
          <?php }else{ ?>
            <li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>
      </nav>
    </header>
    <h1 class="yuhu" >Hai <?php echo $_SESSION['user']['nama_user'];?> Berikut Keranjangmu!</h1>
    <?php if(isset($_SESSION['keranjang'])){?>
        <table width="80%" style="margin:auto; font-size:18px; text-align:center;" border="0">
        <thead  style="font-size:20px; background-color:azure; color:black; ">
                <tr>
                    <th>No</th>
                    <th width="40%">Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody style=" background-color:#1b1b32; color:white; ">
                <?php $total_harga=0;?>
                <?php $nomor=1;?>
                <?php foreach ($_SESSION['keranjang'] as $idProduk=>$jmlProduk): ?>
                <?php
                $ambil_produk= mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$idProduk'" );
                    while($array_ambil_produk= mysqli_fetch_array($ambil_produk)){
                    $total_sementara=$array_ambil_produk['harga_produk']*$jmlProduk;
                 ?>                 
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td style="font-size:20px; "><?php echo $array_ambil_produk['nama_produk'];?></td>
                    <td><?php echo $array_ambil_produk['harga_produk'];?></td>
                    <td><?php echo $jmlProduk;?></td>
                    <td>Rp. <?php echo number_format($total_sementara);?></td>
                    <td><a href="hapus_keranjang.php?id=<?php echo $array_ambil_produk['id_produk'];?>" ><div><img class="gbrsampah" src="pict/bin.png" alt="trash" style="width:40%;"></div></a></td>
                    </tr>
               
                <?php $total_harga+=$total_sementara;?>
                <?php }?>
                <?php endforeach ?>
            </tbody>
            <tfoot style="background-color:#1b1b32; color:white; ">
                <tr>
                    <td colspan="2" style="font-size:20px; text-align:center;"><strong>TOTAL</strong></td>
                    <td colspan="4" style="font-size:20px; text-align:center;"><strong>Rp. <?php echo number_format($total_harga);?></strong></td>
                </tr>

            </tfoot>
        </table> 
        <form action="" method="POST">
                    <input style=" margin:20px auto; display:block; justify-content:center; height:30px;" 
                    name="pesan" type="submit" value="Buat Pesanan | Isi Alamat">                        
                    </form>
        <?php } else{ echo "<p style='text-align:center; font-size:20px;'>"."Belum Ada Pesanan"."</p>";}?>
                    

                    <?php
                    if(isset($_POST['pesan'])){
                        if($total_harga!=0){
                            $_SESSION['total_harga']=$total_harga;
                            $nama_user=$_SESSION['user']['nama_user'];
                            header('location:alamat.php');      
                        }else{
                            echo "<p style='color:white; text-align:center;'>"."Tambahkan produk pada keranjang!"."</p>";
                        }                                           
                        
                    }
                    ?>
    </body>

</html>