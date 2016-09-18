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
$query = $db->query("SELECT
  `pengaduan`.`Nktp`            AS `Nktp`,
  `pengaduan`.`tempat_kejadian` AS `tempat_kejadian`,
  `pengaduan`.`apaterjadi`      AS `apaterjadi`,
  `pengaduan`.`terlapor`        AS `terlapor`,
  `pengaduan`.`saksi`           AS `saksi`,
  `pengaduan`.`tindakpidanana`  AS `tindakpidanana`,
  `pelaporan`.`no_laporan`      AS `no_laporan`,
  `masyarakat`.`Nama`           AS `Nama`,
  `masyarakat`.`tempat`         AS `tempat`,
  `masyarakat`.`tanggallahir` AS `tanggal`,
  `masyarakat`.`jenisKelamin`   AS `jenisKelamin`,
  `masyarakat`.`alamat`         AS `alamat`,
  `masyarakat`.`pekerjaan`      AS `pekerjaan`,
  `masyarakat`.`no_hp`          AS `no_hp`,
  `masyarakat`.`agama`          AS `agama`
FROM ((`masyarakat`
    JOIN `pengaduan`
      ON ((`pengaduan`.`Nktp` = `masyarakat`.`Nktp`)))
   JOIN `pelaporan`
     ON ((`pelaporan`.`no_pengaduan` = `pengaduan`.`no_pengaduan`))) 
WHERE `pelaporan`.`no_laporan` LIKE '%".$searchTerm."%'");

while ($row = $query->fetch_assoc()) {
  $row['value']=htmlentities(stripslashes($row['no_laporan']));
  
  $row['tempat_kejadian']=htmlentities($row['tempat_kejadian']);
  $row['apaterjadi']=htmlentities($row['apaterjadi']);
  $row['terlapor']=htmlentities($row['terlapor']);
  $row['saksi']=htmlentities($row['saksi']);
  $row['tindakpidanana']=htmlentities($row['tindakpidanana']);

  $row['Nama']=htmlentities($row['Nama']);
  $row['Nktp']=htmlentities($row['Nktp']);
  $row['tempat']=htmlentities($row['tempat']);

  $row['tanggal']=htmlentities($row['tanggal']);
  $row['jenisKelamin']=htmlentities($row['jenisKelamin']);
  $row['alamat']=htmlentities($row['alamat']);
  $row['pekerjaan']=htmlentities($row['pekerjaan']);
  $row['no_hp']=htmlentities($row['no_hp']);

  $row['agama']=htmlentities($row['agama']);

  $data[] = $row;
}
//return json data
echo json_encode($data);
?>
