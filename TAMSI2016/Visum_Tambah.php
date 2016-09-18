<?php 
include 'Header.php';
include 'includes/Visum.inc.php';
$eks = new Visum($db);
include 'includes/Pelaporan.inc.php'; 
$eks1 = new Pelaporan($db);
$tahun = getdate();

$eks->readKode();
        $nk1 = (int) substr($eks->noVisum,2,3);
        $no = $nk1+1;
        if($no<=9){
            $adm = 'R/00'.$no.'/'.$rom.'/'.$tahun['year'].'/RESKRIM';
        }else if($no<=99){
            $adm = 'R/0'.$no.'/'.$rom.'/'.$tahun['year'].'/RESKRIM';
        }else if($no<=999){
            $adm = 'R/'.$no.'/'.$rom.'/'.$tahun['year'].'/RESKRIM';
        }else{
            $adm = 'R/001/'.$rom.'/'.$tahun['year'].'/RESKRIM';
        }

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
            $eks->noVisum = $adm;
            $eks->noLaporan = $NoLaporan;
            $eks->rumahsakit = $RumahSakit;
            $eks->alamatrs = $Alamat;
            $eks->tangalV = $hariini;
            if($eks->insert()){
            ?>
                <script>alert('Data Berhasil ditambahkan')
                location.href='Visum.php'</script>
            <?php
            }else{
            ?>
                <script>alert('Data Gagal ditambahkan')
                location.href='Visum_Tambah.php'</script>

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
            <a href="#">Form / Permohonan Visum / Tambah</a>
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
                    <input disabled type="text" class="form-control" name="nVisum" value="<?php echo $adm; ?>">

                    <label class="control-label" >NO Laporan Polisi</label>
                    <input id="Pelaporan" type="text" class="form-control" name="nLporanPol" placeholder="No Laporan">

                    <label class="control-label" >Tindak Pidana</label>
                    <input disabled type="text" class="form-control" id="tindakpidananaPelapor" name="Pekerjaan" placeholder="Tindak Pidana">

                    <label class="control-label" >KTP</label>
                    <input disabled id="nKTPPelapor" type="text" class="form-control" name="Nama" placeholder="KTP">

                    <label class="control-label" >Nama</label>
                    <input disabled id="namaPelapor" type="text" class="form-control" name="Nama" placeholder="Nama">

                    <label class="control-label">Jenis Kelamin</label>
                    <input disabled id ="jkPelapor" type="text" class="form-control" name="Tempat" placeholder="jenis Kelamin">
                    
                    <label class="control-label" >Tempat Lahir</label>
                    <input disabled id ="tempatMPelapor" type="text" class="form-control" name="Tempat" placeholder="Tempat Lahir">
                    </br>
                    <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary ">Simpan Data</button>
                    <button type="reset" class="btn">Hapus Data</button>
                    </div>
                    </div>

                </div>
                <div class="form-group has-success col-md-6">


                    <label class="control-label" >Agama</label>
                    <input disabled id ="agamaPelapor" type="text" class="form-control" name="Tempat" placeholder="Agama">
                    
                    <label class="control-label" >Tanggal Lahir</label>
                    <input disabled id ="tanggalMPelapor" type="text" class="form-control" name="Tempat" placeholder="Tanggal Lahir">

                    <label class="control-label" >Alamat</label>
                    <textarea disabled class="form-control" rows="3" id="alamatMPelapor" name="alamat" placeholder="Alamat"></textarea>

                    <label class="control-label" >Pekerjaan</label>
                    <input disabled type="text" class="form-control" id="pekerjaanMPelapor" name="Pekerjaan" placeholder="Pekerjaan">

                    
                    <label class="control-label" >Rumah Sakit</label>
                    <input type="text" class="form-control" name="RumSakit" placeholder="Rumah Sakit">


                    <label class="control-label" >Alamat Rumah Sakit</label>
                    <textarea class="form-control" rows="3" id="inputSuccess1" name="AlamatRS" placeholder="Alamat Rumah Sakit"></textarea>

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