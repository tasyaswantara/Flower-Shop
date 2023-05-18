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
        <title>Riwayat Pembelian</title>
    </head>
    <body>
    <nav>
        <ul>
          <li><a href="logout.php">Log-Out</a></li>
          <li><a href="index.php">Lihat Produk</a></li>
          <?php if(isset($_SESSION['user'])){ ?>
          <li><a href="keranjang.php">Keranjang</a></li>
          <?php }else{ ?>
            <li><a href="login.php">Login</a></li>
            <?php } ?>
        </ul>
      </nav>
      <h1 class="yuhu" >Riwayat Pembelian</h1>
      <section class="detail">
         <?php $nomor=1;
                $ambil_detail= mysqli_query($koneksi,"SELECT * FROM pesanan JOIN user ON pesanan.id_user=user.id_user WHERE pesanan.id_user='$_GET[id]'");
                if(mysqli_num_rows($ambil_detail)>0){ ?>
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
                while($array_detail=mysqli_fetch_array($ambil_detail)){
                ?>
                    <tr>
                        <td><?php echo $nomor++;?></td>
                        <td><?php echo $array_detail['nama_user'];?></td>
                        <td><?php echo $array_detail['tanggal_pesanan'];?></td>
                        <td>Rp. <?php echo number_format($array_detail['total_harga']);?></td>
                        <td>
                            <a href="detail_user.php?idPesanan=<?php echo $array_detail['id'];?>">Detail</a>
                        </td>
                    </tr>

               <?php } ?>
            </tbody>
        </table>
        <?php }else{
             echo "<p style='text-align:center; font-size:20px;'>"."Belum Ada Pembelian"."</p>";}?>
      </section>
      
     
    </body>
</html>