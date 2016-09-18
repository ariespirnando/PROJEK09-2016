<?php 
include 'Header.php';
include 'includes/Visum.inc.php';
$eks = new Visum($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$eks->noVisum = $id;
include 'includes/Pelaporan.inc.php'; 
$eks1 = new Pelaporan($db);
$tahun = getdate();
$eks->readOne();

if($_POST){
    
    $NoLaporan = $_POST['nLporanPol'];
    $RumahSakit = $_POST['RumSakit'];
    $Alamat = $_POST['AlamatRS'];


    if( $NoLaporan =="" || $RumahSakit =="" || $Alamat ==""){
    ?>
        <script>alert('Data Kosong')
        location.href='Visum_Tambah.php'</script>
    <?php
    }else{

        $eks1->nolaporan = $NoLaporan;
        if($eks1->countOne()>0){
            $eks->noVisum = $eks->noVisum;;
            $eks->noLaporan = $NoLaporan;
            $eks->rumahsakit = $RumahSakit;
            $eks->alamatrs = $Alamat;
            if($eks->update()){
            ?>
                <script>alert('Data Berhasil diubah')
                location.href='Visum.php'</script>
            <?php
            }else{
            ?>
                <script>alert('Data Gagal diubah')
                location.href='Visum_Ubah.php'</script>

            <?php
            }
        }else{
            ?>
                <script>alert('Anda Belum Melakukan Pengaduan')
                location.href='Pengaduan_Tambah.php'</script>

            <?php
            }
        }
    }
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Form / Permohonan Visum / Ubah</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Form Permohonan Visum</h2>
                <div class ="text-right">
                    <a href="Visum.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                
                <form method="post">
                 <div class="form-group has-success col-md-6">
                    <label class="control-label" >No Surat Permohonan Visum</label>
                    <input disabled type="text" class="form-control" name="nVisum" value="<?php echo $eks->noVisum; ?>">

                    <label class="control-label" >NO Laporan Polisi</label>
                    <input value="<?php echo $eks->noLaporan; ?>" id="Pelaporan" type="text" class="form-control" name="nLporanPol" placeholder="No Laporan">

                    <label class="control-label" >Tindak Pidana</label>
                    <input value="<?php echo $eks->pidana; ?>" disabled type="text" class="form-control" id="tindakpidananaPelapor" name="Pekerjaan" placeholder="Tindak Pidana">

                    <label class="control-label" >KTP</label>
                    <input value="<?php echo $eks->ktp; ?>" disabled id="nKTPPelapor" type="text" class="form-control" name="Nama" placeholder="KTP">

                    <label class="control-label" >Nama</label>
                    <input value="<?php echo $eks->Nama; ?>" disabled id="namaPelapor" type="text" class="form-control" name="Nama" placeholder="Nama">

                    <label class="control-label">Jenis Kelamin</label>
                    <input value="<?php echo $eks->JK; ?>" disabled id ="jkPelapor" type="text" class="form-control" name="Tempat" placeholder="jenis Kelamin">
                    
                    <label class="control-label" >Tempat Lahir</label>
                    <input value="<?php echo $eks->tempat; ?>" disabled id ="tempatMPelapor" type="text" class="form-control" name="Tempat" placeholder="Tempat Lahir">
                    </br>
                    <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary ">Ubah Data</button>
                    </div>
                    </div>

                </div>
                <div class="form-group has-success col-md-6">


                    <label class="control-label" >Agama</label>
                    <input value="<?php echo $eks->agama; ?>" disabled id ="agamaPelapor" type="text" class="form-control" name="Tempat" placeholder="Agama">

                    <label class="control-label" >Tanggal Lahir</label>
                    <input value="<?php echo $eks->lahir; ?>" disabled id ="tanggalMPelapor" type="text" class="form-control" name="Tempat" placeholder="Tanggal Lahir">

                    <label class="control-label" >Alamat</label>
                    <textarea disabled class="form-control" rows="3" id="alamatMPelapor" name="alamat" placeholder="Alamat"><?php echo $eks->alamat; ?></textarea>

                    <label class="control-label" >Pekerjaan</label>
                    <input value="<?php echo $eks->Pekerjaan; ?>" disabled type="text" class="form-control" id="pekerjaanMPelapor" name="Pekerjaan" placeholder="Pekerjaan">

                    
                    <label class="control-label" >Rumah Sakit</label>
                    <input value="<?php echo $eks->rumahsakit; ?>" type="text" class="form-control" name="RumSakit" placeholder="Rumah Sakit">


                    <label class="control-label" >Alamat Rumah Sakit</label>
                    <textarea class="form-control" rows="3" id="inputSuccess1" name="AlamatRS" placeholder="Alamat Rumah Sakit"><?php echo $eks->alamatrs; ?></textarea>

                </div>
                  
            </div>
            <div class="form-group has-success col-md-4">
            <div class="control-group">
                    
            </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'Footer.php'; ?>