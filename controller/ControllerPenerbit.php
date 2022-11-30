<?php
require 'koneksi.php';
require 'ControllerUser.php';
require 'SessionOff.php';

//Create
if (isset($_POST['simpanstock'])){
    $tanggal = $_POST['tanggal'];
    $stock = $_POST['stock'];
    $stockawal = $_POST['stockawal'];
    $id = $_POST['id'];
    $stockakhir = $stock+$stockawal;
    $insert = mysqli_query($koneksi,"INSERT INTO tbukustock (idbuku,tanggal,masuk)
    VALUES ('$id','$tanggal','$stock')");
    $update = mysqli_query($koneksi, "UPDATE tbuku SET stockakhir='$stockakhir' WHERE idbuku='$id'");
}

//Ubah
if (isset($_POST['ubahstock'])){
    $idbuku = $_POST['idbuku'];
    $stockawal = $_POST['stockawal'];
    $idstock = $_POST['idstock'];
    $jumlahawal=$_POST['jumlahawal'];
    $masuk=$_POST['masuk'];
    $stockakhir = $masuk-$jumlahawal+$stockawal;
    $updatestockakhir=mysqli_query($koneksi,"UPDATE tbuku SET stockakhir='$stockakhir' WHERE idbuku='$idbuku'");
    $update=mysqli_query($koneksi,"UPDATE tbukustock SET masuk='$masuk' WHERE id='$idstock'");
}

//Delete 
if (isset($_POST['deletestock'])){
    $idbuku = $_POST['idbuku'];
    $stockawal = $_POST['stockawal'];
    $idstock = $_POST['idstock'];
    $jumlahawal=$_POST['jumlahawal'];
    $masuk=$_POST['masuk'];
    $stockakhir = $stockawal-$masuk;
    $deletestockakhir=mysqli_query($koneksi,"UPDATE tbuku SET stockakhir='$stockakhir' WHERE idbuku='$idbuku'");
    $delete=mysqli_query($koneksi,"DELETE FROM tbukustock WHERE id='$idstock'");
}
?>