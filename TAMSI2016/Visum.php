<?php 

include 'Header.php'; 
include 'includes/Visum.inc.php';
$pro = new Visum($db);
$stmt = $pro->readAll();
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Form / Permohonan Visum</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Form Permohonan Visum</h2>
                <div class ="text-right">
                    <a href="Visum_Tambah.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                <table width="100%" class="table table-striped table-bordered responsive" id="tabeldata1">
            <thead BGCOLOR="#3186E1" align="center">
            <tr>
                <th>No Visum</th>
                <th>No Laporan</th>
                <th>KTP</th>
                <th>Nama</th>
                <th>Rumah Sakit</th>
                <th>Peristiwa</th>
                <th width="100px">Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $no=1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td style="vertical-align:middle;"><?php echo $row['no_visum'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['no_laporan'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Nktp'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Nama'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['rumahsakit'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['tindakpidanana'] ?></td>
                            <td class="text-center" style="vertical-align:middle;">
                                <a href="Visum_Ubah.php?id=<?php echo $row['no_visum'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="Visum_Hapus.php?id=<?php echo $row['no_visum'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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