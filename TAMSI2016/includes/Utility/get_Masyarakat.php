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
$query = $db->query("SELECT Nktp,Npaspor,rsj,Nama,tempat, YEAR(tanggallahir) AS tahun, DAY(tanggallahir) AS tanggal, 
					MONTH(tanggallahir) AS bulan, jenisKelamin,alamat,pekerjaan,no_hp, agama, Kebangsaan
					FROM masyarakat WHERE Nktp LIKE '%".$searchTerm."%'");

while ($row = $query->fetch_assoc()) {
    $row['value']=htmlentities(stripslashes($row['Nktp']));
	$row['Npaspor']=htmlentities($row['Npaspor']);
	$row['rsj']=htmlentities($row['rsj']);
	$row['Nama']=htmlentities($row['Nama']);
	$row['tempat']=htmlentities($row['tempat']);
	$row['tanggal']=htmlentities($row['tanggal']);
	$row['tahun']=htmlentities($row['tahun']);
	$row['bulan']=htmlentities($row['bulan']);
	$row['jenisKelamin']=htmlentities($row['jenisKelamin']);
	$row['alamat']=htmlentities($row['alamat']);
	$row['pekerjaan']=htmlentities($row['pekerjaan']);
	$row['no_hp']=htmlentities($row['no_hp']);
	$row['agama']=htmlentities($row['agama']);
	$row['Kebangsaan']=htmlentities($row['Kebangsaan']);

	$data[] = $row;
}
//return json data
echo json_encode($data);
?>