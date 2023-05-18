<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Halaman Sign-up</title>
    </head>
    <body>
    <div class="loginborder">
            <h1>Sign-Up</h1>
        <form action="" method="POST">
            <label for="nama">Nama User<input class="masukan" id="nama" name="nama_user" type="text" placeholder="Masukkan Nama" required></label><br>
            <label for="username">Username<input class="masukan" id="username" name="user" type="text" placeholder="Masukkan Username" required></label><br>
            <label for="password">Password<input class="masukan" id="password" name="pass" type="password" placeholder="Masukkan Password" required></label><br>
            <label for="level">Level</label><br>
            <select class="masukan" name="level" required>
                            <option value="">Level</option>
                            <option name="level" value="user">User</option>
                        </select>
            <input name="simpan" type="submit" value="Simpan">
            <a href="login.php"><div class="signup">Kembali</div></a>
        </form>
</div>
        <?php
        include 'koneksi.php';

        if(isset($_POST['simpan'])){
            $tambah= mysqli_query($koneksi, "INSERT INTO user VALUES
            ('',
        '".$_POST['nama_user']."',
        '".$_POST['user']."',
        '".$_POST['pass']."',
        '".$_POST['level']."')");
        if($tambah){
            echo "<p style='color:white'>"."Berhasil Disimpan!"."</p>";
        }else{ 
            echo "<p style='color:white'>"."Gagal Disimpan!"."</p>";
        }
        }
        
        ?>
    </body>
</html>