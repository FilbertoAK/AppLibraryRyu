<?php
require '../controller/koneksi.php';
//GET DATA KATEGORI BUKU
if(function_exists($_GET['function'])){
    $_GET['function']();
}

function get_kategoribuku(){
    global $koneksi;
    if(!empty($_GET["id"])){
        $id = $_GET["id"];
    }
    $query = $koneksi->query("SELECT*FROM tkategoribuku");
    //$query = mysqli_query($koneksi,SELECT*FROM tkategoribuku);PHP<5 
    while($row=mysqli_fetch_object($query)){
        $data[]=$row;
    }
    $respon = array(
        'status'=>1,
        'massage'=>'Success',
        'data'=>$data
    );
    header('Content-Type:application/json');
    echo json_encode($respon);
}

function add_kategoribuku(){
    global $koneksi;
    $check = array('kategoribuku'=>'', 'statuskategori'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "INSERT INTO tkategoribuku SET 
        kategoribuku='$_POST[kategoribuku]',
        statuskategori='$_POST[statuskategori]'");
        if($result){
            $respons=array(
                'status'=>1,
                'message'=>'Insert Success'
            );
        header('location: view_kategoribuku.php');
        }else{
            $respons=array(
                'status'=>0,
                'message'=>'Insert Failed'
            );
        }
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Wrong Parameter'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}

function delete_kategoribuku(){
    global $koneksi;
    $id = $_GET['id'];
    $query = "DELETE FROM tkategoribuku WHERE idkategoribuku=".$id;
    if(mysqli_query($koneksi,$query)){
        $respons=array(
            'status'=>1,
            'message'=>'Delete Success'
        );
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Delete Failed'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}

function update_kategoribuku(){
    global $koneksi;
    if(!empty($_GET["id"])){
        $id = $_GET["id"];
    }
    $query = $koneksi->query("SELECT*FROM tkategoribuku");
    $check = array('kategoribuku'=>'', 'statuskategori'=>'');
    $match = count(array_intersect_key($_POST, $check));
    if($match == count($check)){
        $result = mysqli_query($koneksi, "UPDATE  tkategoribuku SET 
        kategoribuku='$_POST[kategoribuku]',
        statuskategori='$_POST[statuskategori]'WHERE idkategoribuku=$id");
        if($result){
            $respons=array(
                'status'=>1,
                'message'=>'Update Success',
            );
        }else{
            $respons=array(
                'status'=>0,
                'message'=>'Update Failed'
            );
        }
    }else{
        $respons=array(
            'status'=>0,
            'message'=>'Wrong Parameter'
        );
    }
    header('Content-Type:application/json');
    echo json_encode($respons);
}
?>