<?php
include_once "includes/config.php";
$database = new Config();
$db = $database->getConnection();
include 'includes/Pengaduan.inc.php';
$pro = new Pengaduan($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->nopengaduan = $id;
	
if($pro->delete()){
	echo "<script>location.href='Pengaduan.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='Pengaduan.php';</script>";
}
?>