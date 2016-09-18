<?php
include_once "includes/config.php";
$database = new Config();
$db = $database->getConnection();
include 'includes/SuratJalan.inc.php';
$pro = new sJalan($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->Nsjalan = $id;
	
if($pro->delete()){
	echo "<script>location.href='S_jalan.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='S_jalan.php';</script>";
}
?>
