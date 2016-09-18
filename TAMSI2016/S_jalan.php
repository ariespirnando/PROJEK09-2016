<?php 

include 'Header.php'; 
include 'includes/SuratJalan.inc.php';
$pro = new sJalan($db);
$stmt = $pro->readAll();
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Form / Surat Jalan</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Form Surat Jalan</h2>
                <div class ="text-right">
                    <a href="S_jalan_Tambah.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Tambah Data</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                <table width="100%" class="table table-striped table-bordered responsive" id="tabeldata1">
            <thead BGCOLOR="#3186E1" align="center">
            <tr>
                <th>No Surat Jalan</th>
                <th>KTP</th>
                <th>Nama</th>
                <th>Keterangan Indentitas</th>
                <th>Mulai Berlaku</th>
                <th>Akhir Berlaku</th>
                <th width="100px">Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $no=1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td style="vertical-align:middle;"><?php echo $row['noSurat'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Nktp'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Nama'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['KetIDentitsKendaraan'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['tanggal'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['Berlaku'] ?></td>
                            <td class="text-center" style="vertical-align:middle;">
                                <a href="S_jalan_Ubah.php?id=<?php echo $row['noSurat'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="S_jalan_Hapus.php?id=<?php echo $row['noSurat'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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