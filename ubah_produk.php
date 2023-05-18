<!DOCTYPE html>
<?php session_start();
  include 'koneksi.php';
?>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Ubah Produk</title>
    </head>
    <body>
    <nav>
        <ul>
          <li><a href="logout.php">Log-Out</a></li>
          <li><a href="tambah.php">Tambah Produk</a></li>
          <li><a href="index_produk_admin.php">Kembali</a></li>
        </ul>
      </nav>
    <div class="loginborder">
            <h1>Ubah Rincian Produk</h1>
           <?php 
           $idproduk=$_SESSION['id_produk_ubah'];
           $editdata = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk =$idproduk");
            $array_edit = mysqli_fetch_array($editdata);?>
        <form action="" method="POST">
            <label for="nama">Nama Produk<input name="namaProduk" class="masukan" id="nama" value="<?php echo $array_edit['nama_produk'];?>" type="text" required></label><br>
            <label for="harga">Harga Produk<input name="hargaProduk" class="masukan" id="harga" value="<?php echo $array_edit['harga_produk'];?>" type="text" required></label><br>
            <label for="berat">Berat Produk<input name="beratProduk" class="masukan" id="berat" value="<?php echo $array_edit['berat'];?>" type="text" required></label><br>
            <label for="foto">Foto Produk <br>
                <img class="gbr" style="width:30%;"src="pict/<?php echo  $array_edit['foto_produk']?>">
                <input name="fotoProduk" class="masukan" id="foto" value="<?php echo $array_edit['foto_produk'];?>" type="file" required></label><br>
            <label for="deskripsi">Deskripsi Produk<br>
            <textarea name="desProduk" id="deskripsi" cols="57" rows="8" ><?php echo $array_edit['deskripsi_produk'];?></textarea>
            </label>
            <label for="stok">Stok Produk<input name="stokProduk" class="masukan" id="stok" value="<?php echo $array_edit['stok_produk'];?>" type="number" required></label><br>

            <input  name="ubah" type="submit" value="Ubah">
        </form>
</div>
        <?php     

        if(isset($_POST['ubah'])){
            
            $ubah_produk= mysqli_query($koneksi, "UPDATE produk  SET
            nama_produk ='".$_POST['namaProduk']."', 
            harga_produk ='".$_POST['hargaProduk']."',
            berat ='".$_POST['beratProduk']."',
            foto_produk ='".$_POST['fotoProduk']."',
            deskripsi_produk ='".$_POST['desProduk']."',
            stok_produk='".$_POST['stokProduk']."'WHERE id_produk =$idproduk");
            if($ubah_produk){
                echo "<p style='color:white; text-align:center;'>"."Berhasil Edit"."</p>";
                 }else{
                    echo "Gagal";
                 }

        }
        ?>
        
       
    </body>
</html>