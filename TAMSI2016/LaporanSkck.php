<?php 

include 'Header.php'; 
include 'includes/skck.inc.php';
$pro = new skck($db);
$stmt = $pro->readAll();
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Laporan SKCK / SKCK</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Laporan SKCK</h2>
                <div class ="text-right">
                <form method="post" id="form" target="_blank" action="Laporan/LSKCKBulanan.php">
                <i class="glyphicon glyphicon-print"></i> Pilih Bulan
                
                    <select id="bulanM" name="Bulan"  tabindex="2" >
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <select name="TahunHingga" tabindex="2" >
                        <?php for($i=2010; $i<=2040; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-danger btn-sm" name="cetak" type="submit">Cetak</button>
                 </form>
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
                <th width="50px">Aksi</th>
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
                                <a target="_BLANK" href="Laporan/LSKCK.php?id=<?php echo $row['nSKCK'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
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