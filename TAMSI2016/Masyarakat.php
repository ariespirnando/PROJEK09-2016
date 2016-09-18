<?php 
include 'Header.php'; 
include 'includes/Masyarakat.inc.php';
$pro = new Masyarakat($db);
$stmt = $pro->readAll();
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Master</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Data Masyarakat</h2>
            <div class ="text-right">
                    <a href="Masyarakat_Tambah.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                <table width="100%" class="table table-striped table-bordered responsive" id="tabeldata1">
            <thead align="center" BGCOLOR="#3186E1">
            <tr>
                <th>No KTP</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Kebangsaan</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>No Handphone</th>
                <th width="100px">Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $no=1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td style="vertical-align:middle;"><?php echo $row['Nktp'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Nama'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['tempat'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['tanggallahir'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['agama'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Kebangsaan'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['jenisKelamin'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['alamat'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['pekerjaan'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['no_hp'] ?></td>
                            <td class="text-center" style="vertical-align:middle;">
                                <a href="Masyarakat_Ubah.php?id=<?php echo $row['Nktp'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="Masyarakat_Hapus.php?id=<?php echo $row['Nktp'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
                        </tr>
            <?php
            }
            ?>
            </tbody>


            </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'Footer.php'; ?>