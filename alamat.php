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
        <title>Alamat</title>
    </head>
    <body>
    <div class="loginborder">
            <h1>Alamat</h1>
        <form action="" method="POST">
            <label for="nama">Nama User<input class="masukan" id="nama" value="<?php echo $_SESSION['user']['nama_user'];?>" type="text" readonly></label><br>
            <label >Provinsi</label><br>
            <label for="provinsi">
            <select class="masukan" name="prov" required>
            <option value="">Pilih Provinsi</option>
                <?php $ongkir= mysqli_query($koneksi,"SELECT * FROM ongkir");

                while($array_ongkir=mysqli_fetch_array($ongkir)){   ?>                            
                            <option name="prov" value="<?php echo $array_ongkir['provinsi'];?>">
                                <?php echo $array_ongkir['provinsi'];?>
                                <?php echo "Rp. ".number_format($array_ongkir['tarif']);?>
                            </option>
                <?php } ?>
                        </select>
            </label><br>
            
            <label for="kota">Kota/Kabupaten<input class="masukan" id="kota" name="kot" type="text" placeholder="Masukkan Kota" required></label><br>
            <label for="kelurahan">Kelurahan<input class="masukan" id="kelurahan" name="kel" type="text" placeholder="Masukkan Kelurahan" required></label><br>
            <label for="kecamatan">Kecamatan<input class="masukan" id="kecamatan" name="kec" type="text" placeholder="Masukkan Kecamatan" required></label><br>
            <label for="alamatleng">Alamat Lengkap<input class="masukan" id="alamatleng" name="almt" type="text" placeholder="Masukkan Alamat" required></label><br>
            <label for="kodepos">Kode Pos<input class="masukan" id="kodepos" name="kode" type="text" placeholder="Masukkan Kode Pos" required></label><br>
            <input  name="simpan_alamat" type="submit" value="Lanjutkan">
        </form>
</div>
        <?php     

        if(isset($_POST['simpan_alamat'])){
            
            $tambah_alamat= mysqli_query($koneksi, "INSERT INTO alamat VALUES
            ('', '".$_SESSION['user']['id_user']."',
            '".$_POST['prov']."',
            '".$_POST['kot']."',
            '".$_POST['kel']."',
            '".$_POST['kec']."',
            '".$_POST['almt']."',
            '".$_POST['kode']."')");
        if($tambah_alamat){
            $id_alamat_barusan =$koneksi-> insert_id;
            echo "<p style='color:white'>"."Berhasil Disimpan!"."</p>";
            echo "<script>location='pesanan.php?id=$id_alamat_barusan';</script>";
        }else{ 
            echo "<p style='color:white'>"."Gagal Disimpan!"."</p>";
        }

        $ambil_ongkir=mysqli_query($koneksi,"SELECT *FROM ongkir WHERE provinsi='".$_POST['prov']."'");
        $array_ambil= mysqli_fetch_array($ambil_ongkir);
        $_SESSION['tarif']=$array_ambil['tarif'];

        }
        ?>
        
       
    </body>
</html>