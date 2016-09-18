<?php 

include 'Header.php'; 
include 'includes/Pengaduan.inc.php';
$pro = new Pengaduan($db);
$stmt = $pro->readAll();
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Form / Pengaduan Masyarakat</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Form Pengaduan Masyarakat</h2>
                <div class ="text-right">
                    <a href="Pengaduan_Tambah.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                <table width="100%" class="table table-striped table-bordered responsive" id="tabeldata1">
            <thead BGCOLOR="#3186E1" align="center">
            <tr>
                <th>No Penggaduan</th>
                <th>No Laporan</th>
                <th>Nama Pelapor</th>
                <th>Terlapor</th>
                <th>Tindak Pidana</th>
                <th>Tempat Perkara</th>
                <th>Tanggal</th>
                <th width="100px">Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $no=1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td style="vertical-align:middle;"><?php echo $row['no_pengaduan'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['no_laporan'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Nama'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['terlapor'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['tindakpidanana'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['tempat_kejadian'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['tanggalpengaduan'] ?></td>
                            <td class="text-center" style="vertical-align:middle;">
                                <a href="Pengaduan_Ubah.php?id=<?php echo $row['no_pengaduan'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="Pengaduan_Hapus.php?id=<?php echo $row['no_pengaduan'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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