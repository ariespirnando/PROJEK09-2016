<?php
include_once "includes/config.php";
$database = new Config();
$db = $database->getConnection();
include 'includes/Anggota.inc.php';
$pro = new Anggota($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->nrp = $id;
	
if($pro->delete()){
	echo "<script>location.href='Anggota_PolsekAdmin.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='Anggota_PolsekAdmin.php';</script>";
}
?>
