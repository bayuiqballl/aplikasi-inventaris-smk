<?php
$judul = 'Barang / Tambah Data';
require_once '../fungsi.php';
require_once 'view.php';


if(!isset($_SESSION['user'])){
	header('Location:../index.php');
}

headerku($judul);

$id = $_GET['id'];
$query = "DELETE FROM supplier WHERE id_supplier = $id";
$delete  = run($query);

if($delete){
	header('Location: supplier.php');
}


?>

