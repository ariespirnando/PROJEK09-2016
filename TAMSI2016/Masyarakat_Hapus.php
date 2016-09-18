<?php
include_once "includes/config.php";
$database = new Config();
$db = $database->getConnection();
include 'includes/Masyarakat.inc.php';

$pro = new Masyarakat($db);

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$pro->ktp = $id;

	
if($pro->delete()){
	echo "<script>location.href='Masyarakat.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='Masyarakat.php';</script>";
}
?>