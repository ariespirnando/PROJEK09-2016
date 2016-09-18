<?php
include_once "includes/config.php";
$database = new Config();
$db = $database->getConnection();

include 'includes/user.inc.php';
$pro = new User($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id_Pengguna = $id;
	
if($pro->delete()){
	echo "<script>location.href='Setting.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='Setting.php';</script>";
}
?>
