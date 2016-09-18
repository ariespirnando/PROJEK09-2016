<?php 

include 'Header.php'; 
include 'includes/skck.inc.php';
$pro = new skck($db);
$stmt = $pro->readAll();
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Form / SKCK</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Form SKCK</h2>
                <div class ="text-right">
                    <a href="SKCK_Tambah.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                <table width="100%" class="table table-striped table-bordered responsive" id="tabeldata1">
            <thead BGCOLOR="#3186E1" align="center">
            <tr>
                <th>No SKCK</th>
                <th>Nama Pemilik</th>
                <th>Keperluan</th>
                <th>Tanggal Berlaku</th>
                <th>Tanggal Berakhir</th>
                <th>Nama Pemroses</th>
                <th width="100px">Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $no=1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td style="vertical-align:middle;"><?php echo $row['nSKCK'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Nama'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['keperluan'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['BelakuMulai'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['BelakuSampai'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Nama_Anggota'] ?></td>
                            <td class="text-center" style="vertical-align:middle;">
                                <a href="SKCK_Ubah.php?id=<?php echo $row['nSKCK'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="SKCK_Hapus.php?id=<?php echo $row['nSKCK'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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