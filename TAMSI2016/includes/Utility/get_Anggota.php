
<?php

include 'configdb.php';
/*
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'db_mithari2016';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
*/
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM anggotapolsek WHERE Nama_Anggota LIKE '%".$searchTerm."%'");

while ($row = $query->fetch_assoc()) {
	$row['value']=htmlentities($row['Nama_Anggota']);
    $row['nrp']=htmlentities(stripslashes($row['NRP']));
	$row['alamat']=htmlentities($row['Alamat']);
	$row['hp']=htmlentities($row['no_HP']);
	$row['jabatan']=htmlentities($row['Jabatan']);
	$data[] = $row;
}
//return json data
echo json_encode($data);
?>
