<?php
require 'koneksi.php';
require 'ControllerUser.php';
require 'SessionOff.php';
//Created
if (isset($_POST['simpanpelanggan'])){
    $nocustomer = $_POST['nocustomer'];
    $namapelanggan = $_POST['namapelanggan'];
    $email = $_POST['email'];
    $nohandphone = $_POST['nohandphone'];
    $perkerjaan = $_POST['pekerjaan'];
    $password ="admin";
    $md5 = md5($password);
    $role = "User";
    $insert = mysqli_query($koneksi,"INSERT INTO tpelanggan (nocustomer,namapelanggan,email,nohandphone,perkerjaan)
    VALUES ('$nocustomer','$namapelanggan','$email','$nohandphone','$perkerjaan')");
    $insertuser=mysqli_query($koneksi,"INSERT INTO tuser (nouser,namalengkap,username,password,role)
    VALUES ('$nocustomer','$namapelanggan','$email','$md5','$role')");
    
}

//Read
function tampildata($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows=[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
// Update
 if (isset($_POST['ubah'])){
    $id = $_POST['id'];
    $namapelanggan = $_POST['namapelanggan'];
    $nouser =$_POST['nouser'];
    $email = $_POST['email'];
    $nohandphone = $_POST['nohandphone'];
    $perkerjaan = $_POST['pekerjaan'];
    $update = mysqli_query($koneksi, "UPDATE tpinjamanpelanggan SET 
    namapelanggan='$namapelanggan',email='$email',nohandphone='$nohandphone',
    perkerjaan='$perkerjaan' WHERE id='$id'");
    $updateuser =mysqli_query($koneksi,"UPDATE tuser SET namalengkap='$namapelanggan',username='$email' WHERE nouser='$nouser'");
    
}

//suspend
if (isset($_POST['suspend'])){
    $id = $_POST['id'];
    $status = '0';
    $delete = mysqli_query($koneksi, "UPDATE tpinjamanpelanggan SET statuspelanggan='$status',
    WHERE id='$id'");
 }

//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $id= $_POST['nouser'];
    $delete = mysqli_query($koneksi, "DELETE FROM tpinjamanpelanggan WHERE
    id='$id'");
    $deleteuser = mysqli_query($koneksi, "DELETE FROM tuser WHERE
    nouser='$id'");
}
?>