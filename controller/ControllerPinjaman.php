<?php
require 'koneksi.php';
require 'ControllerUser.php';
require 'SessionOff.php'; 
// Created
if (isset($_POST['simpan'])){
    $nohandphone = $_POST['nohandphone'];
    $alamat = $_POST['alamat'];
    $kembalikan_at = $_POST['kembalikan_at'];
    $insert = mysqli_query($koneksi,"INSERT INTO tpinjaman (nohandphone,alamat,kembalikan_at)
    VALUES ('$nohandphone','$alamat','$kembalikan_at')");
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
    $nohandphone = $_POST['nohandphone'];
    $alamat = $_POST['alamat'];
    $kembalikan_at = $_POST['kembalikan_at'];
    $update = mysqli_query($koneksi, "UPDATE tpinjaman SET 
    nohandphone='$nohandphone',statuspinjam='$status',kembalikan_at='$kembalikan_at' WHERE id='$id'");
}

//Delete Permanentn
if (isset($_POST['hapuspermanent'])){
    $id = $_POST['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM tpinjamanWHERE
    id='$id'");
}

?>