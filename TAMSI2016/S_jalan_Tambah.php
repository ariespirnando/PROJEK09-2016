<?php 
include 'Header.php';
include 'includes/SuratJalan.inc.php';
$eks = new sJalan($db);
include 'includes/Masyarakat.inc.php'; 
$eks1 = new Masyarakat($db);
$tahun = getdate();
$eks->readKode();
        $nk1 = (int) substr($eks->Nsjalan,4,3);
        $no = $nk1+1;
        if($no<=9){
            $adm = 'SKJ/00'.$no.'/'.$rom.'/'.$tahun['year'].'/LPG/SEKTA TKB';
        }else if($no<=99){
            $adm = 'SKJ/0'.$no.'/'.$rom.'/'.$tahun['year'].'/LPG/SEKTA TKB';
        }else if($no<=999){
            $adm = 'SKJ/'.$no.'/'.$rom.'/'.$tahun['year'].'/LPG/SEKTA TKB';
        }else{
            $adm = 'SKJ/001/'.$rom.'/'.$tahun['year'].'/LPG/SEKTA TKB';
        }

if($_POST){
    $ktp = $_POST['ktp'];
   
    $nama = $_POST['Nama'];
    $Tempat = $_POST['Tempat'];
    $Tanggal = $_POST['Tanggal'];
    $Bulan = $_POST['Bulan'];
    $Tahun = $_POST['Tahun'];
    $alamat = $_POST['alamat'];
    $Pekerjaan = $_POST['Pekerjaan'];
    $JenisKelamin = $_POST['JenisKelamin'];
    $agama = $_POST['agama'];
    

    $TanggalBerlaku = $_POST['Tanggalhinggga'];
    $BulanBerlaku = $_POST['Bulanhingga'];
    $TahunBerlaku = $_POST['Tahunhingga'];

    $indentitas = $_POST['indentitsa'];
    $tanggalmulai = $hariini;
    $hari = $hr;
    $pukul = $jam;


    if($ktp =="" || $nama =="" ||$JenisKelamin =="Jenis Kelamin" || $alamat =="" || $Tanggal=="Tanggal" || 
        $Bulan=="Bulan" || $Tahun=="Tahun" || $TanggalBerlaku=="Tanggal" || 
        $BulanBerlaku=="Bulan" || $TahunBerlaku=="Tahun" || $indentitas==""){
    ?>
        <script>alert('Data Kosong')
        location.href='S_jalan_Tambah.php'</script>
    <?php
    }else{


        if($eks1->countOne()>0){
            $eks->Nsjalan = $adm;
            $eks->ktp = $ktp;
            $eks->berlaku = $TahunBerlaku.'-'.$BulanBerlaku.'-'.$TanggalBerlaku ;
            $eks->tanggal =$hariini;
            $eks->indentitas = $indentitas;
            $eks->hari = $hari;
            $eks->pukul = $pukul;
            if($eks->insert()){
            ?>
                <script>alert('Data Berhasil ditambahkan')
                location.href='S_jalan.php'</script>
            <?php
            }else{
            ?>
                <script>alert('Data Gagal ditambahkan')
                location.href='S_jalan_Tambah.php'</script>

            <?php
            }
        }else{
            $eks1->ktp = $ktp;
            $eks1->Nama = $nama ;
            $eks1->tempat = $Tempat;
            $eks1->tanggal = $Tahun."-".$Bulan."-".$Tanggal;
            $eks1->JK = $JenisKelamin;
            $eks1->alamat = $alamat;
            $eks1->Pekerjaan = $Pekerjaan;
            $eks1->insert();
            $eks->Nsjalan = $adm;
            $eks->ktp = $ktp;
            $eks->berlaku = $TahunBerlaku.'-'.$BulanBerlaku.'-'.$TanggalBerlaku ;
            $eks->tanggal =$tanggalmulai;
            $eks->indentitas = $indentitas;
            $eks->hari = $hari;
            $eks->pukul = $pukul;
            if($eks->insert()){
            ?>
                <script>alert('Data Berhasil ditambahkan')
                location.href='S_jalan.php'</script>
            <?php
            }else{
            ?>
                <script>alert('Data Gagal ditambahkan')
                location.href='S_jalan_Tambah.php'</script>

            <?php
            }
        }
        
    }

}





?>
<ul class="breadcrumb">
        <li>
            <a href="#">Form / Surat Jalan / Tambah</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Form Surat Jalan</h2>
                <div class ="text-right">
                    <a href="S_jalan.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                
                <form method="post">
                 <div class="form-group has-success col-md-6">
                    <label class="control-label" >No Surat Jalan</label>
                    <input disabled type="text" class="form-control" name="skck" placeholder="No SKCK" value="<?php echo $adm; ?>">

                    <label class="control-label" >NO KTP</label>
                    <input id="KTP" type="text" class="form-control" name="ktp" placeholder="No KTP">

                    <label class="control-label" >Nama</label>
                    <input id="nama" type="text" class="form-control" name="Nama" placeholder="Nama">

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

                    <label class="control-label">Jenis Kelamin</label>
                    <select id="jk" name="JenisKelamin" class="form-control"  tabindex="2" >
                        <option value="">Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

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

                    
                    <label class="control-label" >Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaanM" name="Pekerjaan" placeholder="Pekerjaan">


                    </br>
                    <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary ">Simpan Data</button>
                    <button type="reset" class="btn">Hapus Data</button>
                    </div>
                    </div>

                </div>
                <div class="form-group has-success col-md-6">
                    <label class="control-label" >Alamat</label>
                    <textarea class="form-control" rows="2" id="alamatM" name="alamat" placeholder="Alamat"></textarea>

                    <label class="control-label" >Indentitas Kendaraan</label>
                    <textarea class="form-control" rows="3" id="inputSuccess1" name="indentitsa" placeholder="Indentitas Kendaraan"></textarea>

                    <label class="control-label" >Diberlakukan Tanggal</label>
                    <input value="<?php echo $hariini; ?>" disabled type="text" class="form-control" id="pekerjaanM" name="tanggaldiberlakukan" >

                    <label class="control-label" >Hari</label>
                    <input value="<?php echo $hr; ?>" disabled type="text" class="form-control" id="pekerjaanM" name="hari" >

                    <label class="control-label" >Pukul</label>
                    <input value="<?php echo $jam; ?>" disabled type="text" class="form-control" id="pekerjaanM" name="pukul" >

                    <label class="control-label" >Berlaku Hingga</label>
                    <div class="form-control has-success">
                    <select name="Tanggalhinggga" tabindex="2" > 
                        <option value="">Tanggal</option>
                        <?php for($i=1; $i<=31; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="Bulanhingga"  tabindex="2" >
                        <option value="">Bulan</option>
                        <?php for($i=1; $i<=12; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="Tahunhingga" tabindex="2" >
                        <option value="">Tahun</option>
                        <?php for($i=2010; $i<=2040; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    </div>

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