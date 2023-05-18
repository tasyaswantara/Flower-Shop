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
        <title>Rincian Pesanan</title>
    </head>
    <body>
    <header>
    <nav>
        <ul>
          <li><a href="logout.php">Log-Out</a></li>
          <li><a href="index.php">Produk</a></li>
        </ul>
      </nav>
    </header>
    <h1 class="yuhu" >Hai <?php echo $_SESSION['user']['nama_user'];?> Berikut Pesananmu!</h1>
    
        <?php if(isset($_SESSION['keranjang'])){?>
        <table width="80%" style="margin:auto; font-size:18px; text-align:center;" border="0">
        <thead  style="font-size:20px; background-color:azure; color:black; ">
                <tr>
                    <th>No</th>
                    <th width="40%">Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
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
                    </tr>
               
                <?php $total_harga+=$total_sementara;?>
                <?php }?>
                <?php endforeach ?>
            </tbody>
            <tfoot style="background-color:#1b1b32; color:white; ">
            <tr>
                <td><?php echo $nomor?></td>
                    <td colspan="1" style="font-size:20px; text-align:center;">Ongkir</td>
                    <td colspan="3" style="font-size:20px; text-align:center;">Rp. <?php echo number_format($_SESSION['tarif']);?></td>
                </tr>
                <tr>
                    <?php $total_belanja=$total_harga+$_SESSION['tarif']; ?>
                    <td colspan="2" style="font-size:20px; text-align:center;"><strong>TOTAL BELANJA</strong></td>
                    <td colspan="4" style="font-size:20px; text-align:center;"><strong>Rp. <?php echo number_format($total_belanja);?></strong></td>
                </tr>
                <?php } else{ echo "<p style='text-align:center; font-size:20px;'>"."Belum Ada Pesanan"."</p>";}?>

            </tfoot>
        </table> 
        <?php $alamat_fix=mysqli_query($koneksi,"SELECT*FROM alamat WHERE id='$_GET[id]'");
            $array_alamat_fix= mysqli_fetch_array($alamat_fix);
         ?>
        <h1 class="yuhu" style="margin-top:20px;">Detail Pemesan</h1>
        <table width="80%" style="margin:auto; font-size:18px; text-align:center;" border="0">
        <thead  style="font-size:20px; background-color:azure; color:black; ">
                <tr>
                    <th width="40%">Nama Pemesan</th>
                    <th colspan="3">Alamat</th>
                    
                </tr>
            </thead>
            <tbody style=" background-color:#1b1b32; color:white; ">
            <tr>
                    <td style="font-size:20px; "><?php echo $_SESSION['user']['nama_user'];?></td>
                    <td><?php echo $array_alamat_fix['alamat_lengkap']." ".$array_alamat_fix['kelurahan']." ".$array_alamat_fix['kecamatan']
                    ." ".$array_alamat_fix['kota_kabupaten']." ".$array_alamat_fix['provinsi']." ,".$array_alamat_fix['kodepos'];?></td>
            </tbody>
        </table>

                    <form action="" method="POST">
                    <input style=" margin:20px auto; display:block; justify-content:center; height:30px;" 
                    name="selesai" type="submit" value="Checkout">                        
                    </form> 

                    

                    <?php
                    if(isset($_POST['selesai'])){
                       
                    $alamat_user= mysqli_query($koneksi, "SELECT * FROM alamat WHERE id='$_GET[id]'");
                    $array_alamat= mysqli_fetch_array($alamat_user);?>

                    <?php
                    $tambah_pesanan= mysqli_query($koneksi,"INSERT INTO pesanan VALUES
                            ('',
                            '".$array_alamat['id_user']."',
                            '".$total_belanja."',
                            NOW(),
                            '".$array_alamat['id']."')
                    ");
                    
                        $id_pesanan_barusan =$koneksi-> insert_id;
                        foreach ($_SESSION['keranjang'] as $idProduk=>$jmlProduk){
                            $ambil_produkakhir= mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$idProduk'" );
                            $array_produkakhir= mysqli_fetch_array($ambil_produkakhir);
                            $tambah_produk=mysqli_query($koneksi,"INSERT INTO item_pesanan VALUES
                            ('',
                            '".$id_pesanan_barusan."',
                            '".$idProduk."',
                            '".$array_produkakhir['harga_produk']."',
                            '".$jmlProduk."')
                            ");
                           
                            //update stok
                            $update_stok=mysqli_query($koneksi,"UPDATE produk SET stok_produk=stok_produk-$jmlProduk WHERE 
                            id_produk='$idProduk'");
                        } 
                        

                        //mengosongkan keranjang belanja
                        unset($_SESSION['keranjang']);

                        echo "<script>alert('pembelian sukses');</script>";
                        echo "<script>location='berhasilpesan.php?id=$id_pesanan_barusan';</script>";
                       
                    }
                    ?>
    
    
                    
    </body>

</html>
