<?php
include_once "includes/config.php";
$database = new Config();
$db = $database->getConnection();
include 'includes/skck.inc.php';
$pro = new skck($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->nSKCK = $id;
	
if($pro->delete()){
	echo "<script>location.href='SKCK.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='SKCK.php';</script>";
}
?>
