<?php 
include 'Header.php';
include 'includes/skck.inc.php';
$eks = new skck($db);
include 'includes/Masyarakat.inc.php'; 
$eks1 = new Masyarakat($db);
$tahun = getdate();

$eks->readKode();
        $nk1 = (int) substr($eks->nSKCK,12,3);
        $no = $nk1+1;
        if($no<=9){
            $adm = 'SKCK/YANMAS/00'.$no.'/'.$rom.'/'.$tahun['year'].'/UNIT INTELKAM';
        }else if($no<=99){
            $adm = 'SKCK/YANMAS/0'.$no.'/'.$rom.'/'.$tahun['year'].'/UNIT INTELKAM';
        }else if($no<=999){
            $adm = 'SKCK/YANMAS/'.$no.'/'.$rom.'/'.$tahun['year'].'/UNIT INTELKAM';
        }else{
            $adm = 'SKCK/YANMAS/001/'.$rom.'/'.$tahun['year'].'/UNIT INTELKAM';
        }

if($_POST){
    $ktp = $_POST['ktp'];
    $passport = $_POST['passport'];
    $rsj = $_POST['rsj'];
    $nama = $_POST['Nama'];
    $Tempat = $_POST['Tempat'];
    $Tanggal = $_POST['Tanggal'];
    $Bulan = $_POST['Bulan'];
    $Tahun = $_POST['Tahun'];
    $alamat = $_POST['alamat'];
    $Pekerjaan = $_POST['Pekerjaan'];
    $JenisKelamin = $_POST['JenisKelamin'];
    $keperluan = $_POST['keperluan'];
    $agama = $_POST['agama'];
    $Kebangsaan = $_POST['Kebangsaan'];

    $TahunSampai = $_POST['TahunSampai'];
    $BulanSampai = $_POST['BulanSampai'];
    $TanggalSampai = $_POST['TanggalSampai'];
  
    $TanggalSejak = $_POST['TanggalSejak'];
    $TahunSejak = $_POST['TahunSejak'];
    $BulanSejak = $_POST['BulanSejak'];
  
    $TanggalHingga = $_POST['TanggalHingga'];
    $TahunHingga = $_POST['TahunHingga'];
    $BulanHingga = $_POST['BulanHingga'];
    
    $NRP = $_POST['NRP'];


    if($ktp ==""  || $Kebangsaan=="" || $nama =="" ||$JenisKelamin =="Jenis Kelamin" || $alamat =="" || $Tanggal=="Tanggal" || 
        $Bulan=="Bulan" || $Tahun=="Tahun" || $keperluan=="" || $TanggalSampai=="Tanggal" || 
        $BulanSampai=="Bulan" || $TahunSampai=="Tahun" || $TanggalSejak=="Tanggal" || 
        $BulanSejak=="Bulan" || $TahunSejak=="Tahun"|| $TanggalHingga=="Tanggal" || 
        $BulanHingga=="Bulan" || $TahunHingga=="Tahun"|| $NRP ==""){
    ?>
        <script>alert('Data Kosong')
        location.href='SKCK_Tambah.php'</script>
    <?php
    }else{


        $eks1->ktp = $ktp;
        if($eks1->countOne()>0){
            $eks->nSKCK = $adm;
            $eks->KTP = $ktp;
            $eks->Berlaku = $hariini;
            $eks->keperluan = $keperluan;
            $eks->indonesiaSejak = $TahunSejak.'-'.$BulanSejak.'-'.$TanggalSejak;
            $eks->indonesiaHingga = $TahunHingga.'-'.$BulanHingga.'-'.$TanggalHingga;
            $eks->Hingga = $TahunSampai.'-'.$BulanSampai.'-'.$TanggalSampai;
            $eks->nrp = $NRP;
            if($eks->insert()){
            ?>
                <script>alert('Data Berhasil ditambahkan')
                location.href='SKCK.php'</script>
            <?php
            }else{
            ?>
                <script>alert('Data Gagal ditambahkan')
                location.href='SKCK_Tambah.php'</script>

            <?php
            }
        }else{
            $eks1->ktp = $ktp;
            $eks1->pasport = $passport;
            $eks1->rtj = $rsj ;
            $eks1->Nama = $nama ;
            $eks1->tempat = $Tempat;
            $eks1->tanggal = $Tahun."-".$Bulan."-".$Tanggal;
            $eks1->JK = $JenisKelamin;
            $eks1->alamat = $alamat;
            $eks1->Pekerjaan = $Pekerjaan;
            $eks->agama = $agama;
            $eks->Kebangsaan = $Kebangsaan;
            $eks1->insert();
            $eks->nSKCK = $adm;
            $eks->KTP = $ktp;
            $eks->Berlaku = $hariini;
            $eks->keperluan = $keperluan;
            $eks->indonesiaSejak = $TahunSejak.'-'.$BulanSejak.'-'.$TanggalSejak;
            $eks->indonesiaHingga = $TahunHingga.'-'.$BulanHingga.'-'.$TanggalHingga;
            $eks->Hingga = $TahunSampai.'-'.$BulanSampai.'-'.$TanggalSampai;
            $eks->nrp = $NRP;
            if($eks->insert()){
            ?>
                <script>alert('Data Berhasil ditambahkan')
                location.href='SKCK.php'</script>
            <?php
            }else{
            ?>
                <script>alert('Data Gagal ditambahkan')
                location.href='SKCK_Tambah.php'</script>

            <?php
            }
        }
        
    }
}





?>
<ul class="breadcrumb">
        <li>
            <a href="#">Form / SKCK / Tambah</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Form SKCK</h2>
                <div class ="text-right">
                    <a href="SKCK.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                
                <form method="post">
                 <div class="form-group has-success col-md-6">
                    <label class="control-label" >No SKCK</label>
                    <input disabled type="text" class="form-control" name="skck" placeholder="No SKCK" value="<?php echo $adm; ?>">

                    <label class="control-label" >NO KTP</label>
                    <input id="KTP" type="text" class="form-control" name="ktp" placeholder="No KTP">

                    <label class="control-label" >Nama</label>
                    <input id="nama" type="text" class="form-control" name="Nama" placeholder="Nama">

                    <label class="control-label">Jenis Kelamin</label>
                    <select id="jk" name="JenisKelamin" class="form-control"  tabindex="2" >
                        <option value="">Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label class="control-label" >Tempat Lahir</label>
                    <input id ="tempatM" type="text" class="form-control" name="Tempat" placeholder="Tempat">

                    <label class="control-label" >Tanggal Lahir</label>
                    <div class="form-control has-success">
                    <select id="tanggalM" name="Tanggal" tabindex="2" >
                        <option value="">Tanggal</option>
                        <?php for($i=1; $i<=31; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select id="bulanM" name="Bulan"  tabindex="2" >
                        <option value="">Bulan</option>
                        <?php for($i=1; $i<=12; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select id="tahunM" name="Tahun" tabindex="2" >
                        <option value="">Tahun</option>
                        <?php for($i=1980; $i<=2016; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    </div>

                    <label class="control-label" >Alamat</label>
                    <textarea class="form-control" rows="3" id="alamatM" name="alamat" placeholder="Alamat"></textarea>

                    <label class="control-label" >Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaanM" name="Pekerjaan" placeholder="Pekerjaan">

                    <label class="control-label" >Kebangsaan</label>
                    <input type="text" class="form-control" id="Kebangsaan" name="Kebangsaan" placeholder="Kebangsaan">

                    

                    </br>
                    <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary ">Simpan Data</button>
                    <button type="reset" class="btn">Hapus Data</button>
                    </div>
                    </div>

                </div>
                <div class="form-group has-success col-md-6">
                    <label class="control-label">Agama</label>
                    <select id="agama" name="agama" class="form-control"  tabindex="2" >
                        <option value="">Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristiani">Kristiani</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Other">Other</option>
                    </select>

                    <label class="control-label" >No Passport</label>
                    <input type="text" class="form-control" id="paspor" name="passport" placeholder="No Passport">

                    <label class="control-label" >Rumus Sidik Jari</label>
                    <input type="text" class="form-control" id="rsj" name="rsj" placeholder="Rumus Sidik Jari">

                    <label class="control-label" >Keperluan</label>
                    <textarea class="form-control" rows="3" id="inputSuccess1" name="keperluan" placeholder="Keperluan"></textarea>

                    <label class="control-label" >Diindonesia Sejak</label>
                    <div class="form-control has-success">
                    <select name="TanggalSejak" tabindex="2" > 
                        <option value="">Tanggal</option>
                        <?php for($i=1; $i<=31; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="BulanSejak"  tabindex="2" >
                        <option value="">Bulan</option>
                        <?php for($i=1; $i<=12; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="TahunSejak" tabindex="2" >
                        <option value="">Tahun</option>
                        <?php for($i=1980; $i<=2020; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    </div>

                    <label class="control-label" >Diindonesia Hingga</label>
                    <div class="form-control has-success">
                    <select name="TanggalHingga" tabindex="2" > 
                        <option value="">Tanggal</option> 
                        <?php for($i=1; $i<=31; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="BulanHingga"  tabindex="2" > 
                        <option value="">Bulan</option>
                        <?php for($i=1; $i<=12; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="TahunHingga" tabindex="2" >
                        <option value="">Tahun</option>
                        <?php for($i=2010; $i<=2040; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    </div>

                    <label class="control-label" >Berlaku Mulai</label>
                    <input disabled value="<?php echo $hariini; ?>" type="text" class="form-control" id="TanggalBerlaku" name="TanggalBerlaku" placeholder="TanggalBerlaku">



                    <label class="control-label" >Berlaku Sampai</label>
                    <div class="form-control has-success">
                    <select name="TanggalSampai" tabindex="2" >
                        <option value="">Tanggal</option>
                        <?php for($i=1; $i<=31; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="BulanSampai"  tabindex="2" >
                        <option value="">Bulan</option>
                        <?php for($i=1; $i<=12; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="TahunSampai" tabindex="2" >
                        <option value="">Tahun</option> 
                        <?php for($i=2010; $i<=2040; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    </div>

                    <label class="control-label" >Ditangani Oleh</label>
                    <input type="text" class="form-control" id="NamaPolisi" name="NamaPolisi" placeholder="Nama Petugas">
                    <input type="Hidden" class="form-control" id="nrp" name="NRP" placeholder="Nama Petugas">


                    
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