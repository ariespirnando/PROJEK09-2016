<?php 
include 'Header.php';
include 'includes/Masyarakat.inc.php'; 
$eks = new Masyarakat($db);
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
    $hp = $_POST['hp'];
    $JenisKelamin = $_POST['JenisKelamin'];
    $agama = $_POST['agama'];
    $Kebangsaan = $_POST['Kebangsaan'];
    

    if($ktp =="" || $Kebangsaan=="" || $nama =="" ||$JenisKelamin =="Jenis Kelamin" || $hp =="" || $alamat =="" || $Tanggal=="Tanggal" || $Bulan=="Bulan" || $Tahun=="Tahun"){
    ?>
        <script>alert('Data Kosong')
        location.href='Masyarakat_Tambah.php'</script>
    <?php
    }else{


        $eks->ktp = $ktp;
        $eks->pasport = $passport;
        $eks->rtj = $rsj ;
        $eks->Nama = $nama ;
        $eks->tempat = $Tempat;
        $eks->tanggal = $Tahun."-".$Bulan."-".$Tanggal;
        $eks->JK = $JenisKelamin;
        $eks->alamat = $alamat;
        $eks->Pekerjaan = $Pekerjaan;
        $eks->no_HP = $hp;
        $eks->agama = $agama;
        $eks->Kebangsaan = $Kebangsaan;

        if($eks->insert()){
        ?>
            <script>alert('Data Berhasil ditambahkan')
            location.href='Masyarakat.php'</script>
        <?php
        }else{
        ?>
            <script>alert('Data Gagal ditambahkan')
            location.href='Masyarakat_Tambah.php'</script>

        <?php
        }
    }
}
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Master / Data Masyarakat / Tambah</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Data Masyarakat</h2>
                <div class ="text-right">
                    <a href="Masyarakat.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                
                <form method="post">
                 <div class="form-group has-success col-md-6">
                    <label class="control-label" >NO KTP</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="ktp" placeholder="No KTP">

                    <label class="control-label" >No Passport</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="passport" placeholder="No Passport">

                    <label class="control-label" >Rumus Sidik Jari</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="rsj" placeholder="Rumus Sidik Jari">

                    <label class="control-label" >Nama</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="Nama" placeholder="Nama">

                    <label class="control-label" >Tempat Lahir</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="Tempat" placeholder="Tempat">

                    <label class="control-label" >Tanggal Lahir</label>
                    <div class="form-control has-success">
                    <select name="Tanggal" tabindex="2" >
                        <option value="">Tanggal</option>
                        <?php for($i=1; $i<=31; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="Bulan"  tabindex="2" >
                        <option value="">Bulan</option>
                        <?php for($i=1; $i<=12; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    <select name="Tahun" tabindex="2" >
                        <option value="">Tahun</option>
                        <?php for($i=1980; $i<=2016; $i++) {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                     <label class="control-label">Agama</label>
                    <select name="agama" class="form-control"  tabindex="2" >
                        <option value="">Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristiani">Kristiani</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghucu">Konghucu</option>
                        <option value="Other">Other</option>
                    </select>
                    </br>
                    <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary ">Simpan Data</button>
                    <button type="reset" class="btn">Hapus Data</button>
                    </div>
                    </div>
                </div>
                <div class="form-group has-success col-md-6">
                    
                    <label class="control-label" >Kebangsaan</label>
                    <input type="text" class="form-control" id="Kebangsaan" name="Kebangsaan" placeholder="Kebangsaan">

                    <label class="control-label">Jenis Kelamin</label>
                    <select name="JenisKelamin" class="form-control"  tabindex="2" >
                        <option value="">Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label class="control-label" >Alamat</label>
                    <textarea class="form-control" rows="5" id="inputSuccess1" name="alamat" placeholder="Alamat"></textarea>

                    <label class="control-label" >Pekerjaan</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="Pekerjaan" placeholder="Pekerjaan">

                    <label class="control-label" >No Handphone</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="hp" placeholder="No Handphone">
                    </br>

                    
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