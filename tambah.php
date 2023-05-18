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
        <title>Tambah Produk</title>
    </head>
    <body>
    <nav>
        <ul>
          <li><a href="logout.php">Log-Out</a></li>
          <li><a href="index_produk_admin.php">Lihat Produk</a></li>
          <li><a href="daftar_beli.php">Pembelian</a></li>
        </ul>
      </nav>
    <div class="loginborder">
            <h1>Tambahkan Produk</h1>
        
        <form action="" method="POST">
            <label for="nama">Nama Produk<input name="namaProduk" class="masukan" id="nama"  type="text" required></label><br>
            <label for="harga">Harga Produk<input name="hargaProduk" class="masukan" id="harga" type="text" required></label><br>
            <label for="berat">Berat Produk<input name="beratProduk" class="masukan" id="berat"  type="text" required></label><br>
            <label for="foto">Foto Produk <br>
                <input name="fotoProduk" class="masukan" id="foto"  type="file" required></label><br>
            <label for="deskripsi">Deskripsi Produk<br>
            <textarea name="desProduk" id="deskripsi" cols="57" rows="8" placeholder="Masukkan deskripsi produk"></textarea>
            </label>
            <label for="stok">Stok Produk<input name="stokProduk" class="masukan" id="stok"  type="number" required></label><br>
            <input  name="tambah" type="submit" value="Tambah">
        </form>
</div>
        <?php     

        if(isset($_POST['tambah'])){
            
            $tambahkan_produk= mysqli_query($koneksi, "INSERT INTO produk  VALUES
            ('','".$_POST['namaProduk']."',
            '".$_POST['hargaProduk']."',
            '".$_POST['beratProduk']."',
            '".$_POST['fotoProduk']."',
            '".$_POST['desProduk']."',
            '".$_POST['stokProduk']."')");
            
            if($tambahkan_produk){
                echo "<p style='color:white; text-align:center;'>"."Berhasil Menambahkan Produk"."</p>";
                 }else{
                    echo "Gagal ";
                 }

        }
        ?>
        
       
    </body>
</html>