<?php
$server = "Localhost";
$username = "root";
$password = "";
$db = "db_bootcamp_login";
$koneksi = mysqli_connect($hostname, $username, $password, $db);

if (isset($_POST['register'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $md5 = md5($password);
    $insert = mysqli_query($koneksi, "INSERT INTO tuser (nama,email,password) 
    VALUES ('$nama','$email','$md5') ");
}

if(isset($_POST['login'])){
    $username = mysqli_escape_string($koneksi, $_POST['email']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $md5 = md5($password);
    $cek_user = mysqli_query($koneksi, "SELECT * FROM tuser WHERE email='$username' AND password='$md5'");
    $data_user = mysqli_fetch_array($cek_user);
    if ($cek_user===TRUE) {
        echo "<script type='text/javascript'>alert('Selamat Anda Berhasil Login');
             document.location='home.php'</script>";
    } else{
        echo "<script type='text/javascript'>alert(' Anda Salah Memasukan Email/Password');
     document.location='login.php'</script>";
    }
}
?>