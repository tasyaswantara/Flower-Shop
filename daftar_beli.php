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
        <title>Informasi Pembelian</title>
    </head>
    <body>
    <nav>
        <ul>
          <li><a href="logout.php">Log-Out</a></li>
          <li><a href="index_produk_admin.php">Produk</a></li>
          <li><a href="tambah.php">Tambah Produk</a></li>
        </ul>
      </nav>
      <h1 class="yuhu" >Detail Pembelian</h1>
      <section class="detail">
         
        <table  width="80%" style="margin:auto; font-size:18px; text-align:center;" border="0">
            <thead style="font-size:20px; background-color:azure; color:black;">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody style=" background-color:#1b1b32; color:white; ">
                <?php 
                
                $nomor=1;
                $ambil_detail= mysqli_query($koneksi,"SELECT * FROM pesanan JOIN user ON pesanan.id_user=user.id_user");
                while($array_detail=mysqli_fetch_array($ambil_detail)){
                    
                ?>
                    <tr>
                        <td><?php echo $nomor++;?></td>
                        <td><?php echo $array_detail['nama_user'];?></td>
                        <td><?php echo $array_detail['tanggal_pesanan'];?></td>
                        <td>Rp. <?php echo number_format($array_detail['total_harga']);?></td>
                        <td>
                            <a href="detail.php?idPesanan=<?php echo $array_detail['id'];?>">Detail</a>
                            | <a href="hapus_pembelian.php?idPesanan=<?php echo $array_detail['id'];?>">Hapus</a>
                        </td>
                    </tr>

               <?php } ?>
                
            </tbody>
        </table>
      </section>
      <div class="divider"></div>
      
     
    </body>
</html>