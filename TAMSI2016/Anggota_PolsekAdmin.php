<?php 

include 'HeaderAdmin.php'; 
include 'includes/Anggota.inc.php';
$pro = new Anggota($db);
$stmt = $pro->readAll();
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Data Anggota Polsek</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Data Anggota Polsek</h2>
                <div class ="text-right">
                    <a href="Anggota_Polsek_TambahAdmin.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                <table width="100%" class="table table-striped table-bordered responsive" id="tabeldata1">
            <thead BGCOLOR="#3186E1" align="center">
            <tr>
                <th>NRP</th>
                <th>Nama Anggota</th>
                <th>Alamat</th>
                <th>No Handphone</th>
                <th>Jabatan</th>
                <th width="100px">Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $no=1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td style="vertical-align:middle;"><?php echo $row['NRP'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Nama_Anggota'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Alamat'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['no_HP'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Jabatan'] ?></td>
                            <td class="text-center" style="vertical-align:middle;">
                                <a href="Anggota_Polsek_UbahAdmin.php?id=<?php echo $row['NRP'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="Anggota_Polsek_HapusAdmin.php?id=<?php echo $row['NRP'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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