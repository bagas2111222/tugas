<?php
include 'koneksi.php';
$db = new Koneksi();
$conn = $db->getConnection();
$user = new User($conn);

if(isset($_GET['aksi']) && $_GET['aksi'] == 'hapus'){
    $id = $_GET['id'];
    if($user->hapus_data_user($id)){
        header("location:index.php");
    } else {
        echo "Gagal Hapus Data";
    }
}
