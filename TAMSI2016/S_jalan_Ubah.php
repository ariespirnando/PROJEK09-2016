<?php 
include 'Header.php';
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
include 'includes/SuratJalan.inc.php';
$eks = new sJalan($db);
$eks->Nsjalan = $id;
$eks->readOne();
include_once 'includes/Masyarakat.inc.php'; 
$eks1 = new Masyarakat($db);
$tahun = getdate();
if($_POST){
    
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


    if( $nama =="" ||$JenisKelamin =="Jenis Kelamin" || $alamat =="" || $Tanggal=="Tanggal" || 
        $Bulan=="Bulan" || $Tahun=="Tahun" || $TanggalBerlaku=="Tanggal" || 
        $BulanBerlaku=="Bulan" || $TahunBerlaku=="Tahun" || $indentitas==""){
    ?>
        <script>alert('Data Kosong')
        location.href='S_jalan_Ubah.php?id=<?php echo $id; ?>'</script>
    <?php
    }else{

            $eks1->ktp = $eks->ktp;;
            $eks1->Nama = $nama ;
            $eks1->tempat = $Tempat;
            $eks1->tanggal = $Tahun."-".$Bulan."-".$Tanggal;
            $eks1->JK = $JenisKelamin;
            $eks1->alamat = $alamat;
            $eks1->Pekerjaan = $Pekerjaan;
            $eks1->update();
            $eks->Nsjalan = $eks->Nsjalan;;
            $eks->ktp = $eks->ktp;
            $eks->berlaku = $TahunBerlaku.'-'.$BulanBerlaku.'-'.$TanggalBerlaku ;
            $eks->tanggal = $eks->tanggal;
            $eks->indentitas = $indentitas;
            $eks->hari = $eks->hari;
            $eks->pukul = $eks->pukul;
            if($eks->update()){
            ?>
                <script>alert('Data Berhasil diubah')
                location.href='S_jalan.php'</script>
            <?php
            }else{
            ?>
                <script>alert('Data Gagal diubah')
                location.href='S_jalan_Ubah.php?id=<?php echo $id; ?>'</script>

            <?php
            }
        }
        
    }







?>
<ul class="breadcrumb">
        <li>
            <a href="#">Form / Surat Jalan / Ubah</a>
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
                    <input disabled type="text" class="form-control" name="skck" value="<?php echo $eks->Nsjalan; ?>">

                    <label class="control-label" >NO KTP</label>
                    <input value="<?php echo $eks->ktp; ?>" disabled id="KTP" type="text" class="form-control" name="ktp" placeholder="No KTP">

                    <label class="control-label" >Nama</label>
                    <input value="<?php echo $eks->Nama; ?>" id="nama" type="text" class="form-control" name="Nama" placeholder="Nama">

                    <label class="control-label" >Tempat Lahir</label>
                    <input value="<?php echo $eks->tempat; ?>" id ="tempatM" type="text" class="form-control" name="Tempat" placeholder="Tempat">

                    <label class="control-label" >Tanggal Lahir</label>
                    <div class="form-control has-success">
                    <select id="tanggalM" name="Tanggal" tabindex="2" >
                        <option value="<?php echo $eks->day; ?>"><?php echo $eks->day; ?></option>
                        <?php for($i=1; $i<=31; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select id="bulanM" name="Bulan"  tabindex="2" >
                        <option value="<?php echo $eks->mont; ?>"><?php echo $eks->mont; ?></option>
                        <?php for($i=1; $i<=12; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select id="tahunM" name="Tahun" tabindex="2" >
                        <option value="<?php echo $eks->year; ?>"><?php echo $eks->year; ?></option>
                        <?php for($i=1980; $i<=2016; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    </div>

                    <label class="control-label">Jenis Kelamin</label>
                    <select id="jk" name="JenisKelamin" class="form-control"  tabindex="2" >
                        <option value="<?php echo $eks->JK; ?>"><?php echo $eks->JK; ?></option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label class="control-label">Agama</label>
                    <select name="agama" class="form-control"  tabindex="2" >
                        <option value="<?php echo $eks->agama; ?>"><?php echo $eks->agama; ?></option>
                        <option value="Islam">Islam</option>
                        <option value="Kristiani">Kristiani</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Other">Other</option>
                    </select>

                    
                    <label class="control-label" >Pekerjaan</label>
                    <input value="<?php echo $eks->Pekerjaan; ?>" type="text" class="form-control" id="pekerjaanM" name="Pekerjaan" placeholder="Pekerjaan">

                    </br>
                    <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary ">Ubah Data</button>
                    </div>
                    </div>

                </div>
                <div class="form-group has-success col-md-6">
                    <label class="control-label" >Alamat</label>
                    <textarea class="form-control" rows="2" id="alamatM" name="alamat" placeholder="Alamat"><?php echo $eks->alamat; ?></textarea>

                    <label class="control-label" >Indentitas Kendaraan</label>
                    <textarea class="form-control" rows="3" id="inputSuccess1" name="indentitsa" placeholder="Indentitas Kendaraan"><?php echo $eks->indentitas; ?></textarea>

                    <label class="control-label" >Diberlakukan Tanggal</label>
                    <input value="<?php echo $eks->tanggal; ?>" disabled type="text" class="form-control" id="pekerjaanM" name="tanggaldiberlakukan" >

                    <label class="control-label" >Hari</label>
                    <input value="<?php echo $eks->hari; ?>" disabled type="text" class="form-control" id="pekerjaanM" name="hari" >

                    <label class="control-label" >Pukul</label>
                    <input value="<?php echo $eks->pukul; ?>" disabled type="text" class="form-control" id="pekerjaanM" name="pukul" >

                    <label class="control-label" >Berlaku Hingga</label>
                    <div class="form-control has-success">
                    <select name="Tanggalhinggga" tabindex="2" > 
                        <option value="<?php echo $eks->dayINDHING; ?>"><?php echo $eks->dayINDHING; ?></option>
                        <?php for($i=1; $i<=31; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="Bulanhingga"  tabindex="2" >
                        <option value="<?php echo $eks->montINDHING; ?>"><?php echo $eks->montINDHING; ?></option>
                        <?php for($i=1; $i<=12; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="Tahunhingga" tabindex="2" >
                        <option value="<?php echo $eks->yearINDHING; ?>"><?php echo $eks->yearINDHING; ?></option>
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