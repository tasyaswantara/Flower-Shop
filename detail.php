<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styleindex.css">
        <title>Detail</title>
    </head>
    <body>
    <nav>
        <ul>
          <li><a href="logout.php">Log-Out</a></li>
          <li><a href="daftar_beli.php">Pembelian</a></li>
        </ul>
      </nav>
      <section class="detail">
        <?php
        $ambil_detail= mysqli_query($koneksi,"SELECT * FROM pesanan JOIN user ON pesanan.id_user=user.id_user
        WHERE pesanan.id='$_GET[idPesanan]'");
        $array_detail=mysqli_fetch_array($ambil_detail);
        $ambil_alamat= mysqli_query($koneksi,"SELECT * FROM pesanan JOIN alamat ON pesanan.id_alamat=alamat.id WHERE pesanan.id='$_GET[idPesanan]'" );
        $arr_alamat=mysqli_fetch_array($ambil_alamat);
         ?>
         <div class="identity">
         <h1><strong><?php echo $array_detail['nama_user'];?></strong><br></h1>
        <p class="tanggaltotal">
        Tanggal: <?php echo $array_detail['tanggal_pesanan'];?><br>
        <br>
        Total Belanja: <?php echo "Rp. ".number_format($array_detail['total_harga']);?><br>
        </p>
        <div class="alamatmini">
        Alamat: <br>
        <?php echo $arr_alamat['alamat_lengkap']." ".$arr_alamat['kelurahan']." ".$arr_alamat['kecamatan']
                    ." ".$arr_alamat['kota_kabupaten']." ".$arr_alamat['provinsi']." ,".$arr_alamat['kodepos'];?>
        </div>
         </div>
         <div class="divider"></div>

        <table  width="45%" style="margin:auto; font-size:18px; text-align:center;" border="0">
            <thead style="font-size:20px; background-color:azure; color:black;">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody style=" background-color:#1b1b32; color:white; ">
                <?php 
                $nomor=1;
                $ambil_produk= mysqli_query($koneksi,"SELECT * FROM item_pesanan JOIN produk 
                ON item_pesanan.id_produk=produk.id_produk
                WHERE item_pesanan.id_pesanan='$_GET[idPesanan]'");
                ?>
                <?php while($array_produk=mysqli_fetch_array($ambil_produk)){ ?>
                    <tr>
                        <td><?php echo $nomor++;?></td>
                        <td><?php echo $array_produk['nama_produk'];?></td>
                        <td><?php echo $array_produk['harga'];?></td>
                        <td><?php echo $array_produk['jumlah'];?></td>
                        <td><?php echo $array_produk['jumlah']*$array_produk['harga'];?></td>
                    </tr>

               <?php } ?>
                
            </tbody>
        </table>
      </section>
      <div class="divider"></div>
     
    </body>
</html>