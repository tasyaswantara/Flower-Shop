<!DOCTYPE html>

<html>
<?php
session_start();
include 'koneksi.php';
?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Halaman Login</title>
    </head>
    <body>
        <div class="loginborder">
            <h1>Log-In</h1>
        <form action="" method="POST">
            <label for="username"><input class="masukan" id="username" name="user" type="text" placeholder="Masukkan Username" required></label><br>
            <label for="password"><input class="masukan" id="password" name="pass" type="password" placeholder="Masukkan Password" required></label><br>
            <input name="submit" type="submit" value="Login">
            <a href="signup.php"><div class="signup">Sign-Up</div></a>
        </form>
</div>
        <?php
        if(isset($_POST['submit'])){
            $a=$_POST['user'];
            $b=$_POST['pass'];
            $data_user= mysqli_query($koneksi, "SELECT * FROM user WHERE username= '".$_POST['user']."' AND password='".$_POST['pass']."'");
            $data = mysqli_fetch_array($data_user);            

            if(isset($data)){
                if($data['level']=='user'){
                    $_SESSION['user'] = $data;
                    header('location:index.php');
                }else{
                    $_SESSION['user'] = $data;
                    header('location:index_produk_admin.php');
                }
                
            }else{
                echo "<p style='color:white'>"."Maaf username dan password anda salah!"."</p>";
            }
        }
        ?>
    </body>
</html>