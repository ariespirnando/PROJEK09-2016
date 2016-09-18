<?php 
include 'Header.php';
include_once 'includes/Pengaduan.inc.php';
$eks = new Pengaduan($db);

include_once 'includes/Masyarakat.inc.php'; 
$eks1 = new Masyarakat($db);
$tahun = getdate();

include_once 'includes/Pelaporan.inc.php';
$eks2 = new Pelaporan($db);

$eks->readKode();
        $nk1 = (int) substr($eks->nopengaduan,8,3);
        $no = $nk1+1;
        if($no<=9){
            $adm = 'TBL/B-1/00'.$no.'/'.$rom.'/'.$tahun['year'].'/LPG/RESTA BALAM/SEKTOR TKB';
            $adm2= 'LP/00'.$no.'-BI/'.$rom.'/'.$tahun['year'].'/LPG/POLRESTA BALAM/SEKTOR TKB';
        }else if($no<=99){
            $adm = 'TBL/B-1/0'.$no.'/'.$rom.'/'.$tahun['year'].'/LPG/RESTA BALAM/SEKTOR TKB';
            $adm2= 'LP/0'.$no.'-BI/'.$rom.'/'.$tahun['year'].'/LPG/POLRESTA BALAM/SEKTOR TKB';
        }else if($no<=999){
            $adm = 'TBL/B-1/'.$no.'/'.$rom.'/'.$tahun['year'].'/LPG/RESTA BALAM/SEKTOR TKB';
            $adm2= 'LP/'.$no.'-BI/'.$rom.'/'.$tahun['year'].'/LPG/POLRESTA BALAM/SEKTOR TKB';
        }else{
            $adm = 'TBL/B-1/001/'.$rom.'/'.$tahun['year'].'/LPG/RESTA BALAM/SEKTOR TKB';
            $adm2= 'LP/001-BI/'.$rom.'/'.$tahun['year'].'/LPG/POLRESTA BALAM/SEKTOR TKB';
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

    $waktuKejadian = $_POST['waktuKejadian'];
    $tempatKejadian = $_POST['teKejadian'];
    $terjadi = $_POST['apaterjadi'];
    $uraian = $_POST['uraian'];
    $terlapor = $_POST['terlapor'];
    $saksi = $_POST['saksi'];
    $pidana = $_POST['pidana'];
    $bukti = $_POST['bukti'];

    $agama = $_POST['agama'];
    $hp = $_POST['hp'];


    if($ktp =="" || $nama =="" || $alamat =="" || $Tanggal=="Tanggal" || 
        $Bulan=="Bulan" || $Tahun=="Tahun" || $waktuKejadian =="" || $tempatKejadian =="" || $terjadi =="" || $uraian =="" || $terlapor =="" || $saksi =="" || $pidana=="" || $bukti ==""){
    ?>
        <script>alert('Data Kosong')
        location.href='Pengaduan_Tambah.php'</script>
    <?php
    }else{
        $eks1->ktp = $ktp;
        if($eks1->countOne()>0){
            $eks->nopengaduan = $adm;
            $eks->ktp = $ktp;
            $eks->tempatkejadian = $tempatKejadian;
            $eks->apaterjadi = $terjadi;
            $eks->terlapor = $terlapor;
            $eks->saksi = $saksi;
            $eks->tindakpidana = $pidana;
            $eks->bukti = $bukti;
            $eks->uraian = $uraian;
            $eks->waktukejadian = $waktuKejadian;
            $eks->tanggal = $hariini;
            $eks->hari = $hr;
            $eks->jam = $jam;
            if($eks->insert()){
                $eks2->nolaporan = $adm2;
                $eks2->nopengaduan = $adm;
                $eks2->insert()
            ?>
                <script>alert('Data Behasil ditambahkan')
                location.href='Pengaduan.php'</script>
                
            <?php
            }else{
            ?>
                <script>alert('Data Gagal ditambahkan')
                location.href='Pengaduan_Tambah.php'</script>

            <?php
            }
        }else{
            $eks1->ktp = $ktp;
            $eks1->Nama = $nama ;
            $eks1->tempat = $Tempat;
            $eks1->tanggal = $Tahun."-".$Bulan."-".$Tanggal;
            $eks1->alamat = $alamat;
            $eks1->agama = $agama;
            $eks1->no_HP = $hp;
            $eks1->Pekerjaan = $Pekerjaan;
            $eks1->insert();
            $eks->nopengaduan = $adm;
            $eks->ktp = $ktp;
            $eks->tempatkejadian = $tempatKejadian;
            $eks->apaterjadi = $terjadi;
            $eks->terlapor = $terlapor;
            $eks->saksi = $saksi;
            $eks->tindakpidana = $pidana;
            $eks->bukti = $bukti;
            $eks->uraian = $uraian;
            $eks->waktukejadian = $waktuKejadian;
            $eks->tanggal = $hariini;
            $eks->hari = $hr;
            $eks->jam = $jam;
            if($eks->insert()){
                $eks2->nolaporan = $adm2;
                $eks2->nopengaduan = $adm;
                $eks2->insert()
            ?>
                
                <script>alert('Data Berhasil ditambahkan')
                location.href='Pengaduan.php'</script>
            <?php
            }else{
            ?>
                <script>alert('Data Gagal ditambahkan')
                location.href='Pengaduan_Tambah.php'</script>


            <?php
            }
        }
        
    }
}


?>
<ul class="breadcrumb">
        <li>
            <a href="#">Form / Pengaduan Masyarakat / Tambah</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Form Pengaduan Masyarakat</h2>
                <div class ="text-right">
                    <a href="Pengaduan.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                
                <form method="post">
                 <div class="form-group has-success col-md-6">
                    <label class="control-label" >No Pengaduan</label>
                    <input disabled type="text" class="form-control" name="pengaduan" placeholder="No SKCK" value="<?php echo $adm; ?>">

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

                    <label class="control-label" >Alamat</label>
                    <textarea class="form-control" rows="2" id="alamatM" name="alamat" placeholder="Alamat"></textarea>

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


                    <label class="control-label" >No Handphone</label>
                    <input type="text" class="form-control" id="hpM" name="hp" placeholder="No Handphone">
                    </br>

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
                    <label class="control-label" >Waktu Kejadian</label>
                    <textarea class="form-control" rows="2" id="inputSuccess1" name="waktuKejadian" placeholder="Waktu Kejadian"></textarea>
                    
                    <label class="control-label" >Tempat Kejadian</label>
                    <textarea class="form-control" rows="2" id="inputSuccess1" name="teKejadian" placeholder="Tempat Kejadian"></textarea>

                    <label class="control-label" >Apa yang Terjadi</label>
                    <input type="text" class="form-control" id="pekerjaanM" name="apaterjadi" placeholder="Apa yang Terjadi">

                    <label class="control-label" >Uraian Kejadian</label>
                    <textarea class="form-control" rows="3" id="inputSuccess1" name="uraian" placeholder="Uraian Kejadian"></textarea>

                    <label class="control-label" >Terlapor</label>
                    <textarea class="form-control" rows="2" id="inputSuccess1" name="terlapor" placeholder="Terlapor"></textarea>

                    <label class="control-label" >Saksi</label>
                    <textarea class="form-control" rows="2" id="inputSuccess1" name="saksi" placeholder="Saksi"></textarea>

                    <label class="control-label" >Tindak Pidana</label>
                    <input type="text" class="form-control" id="pekerjaanM" name="pidana" placeholder="Tindak Pidana">

                    <label class="control-label" >Barang Bukti</label>
                    <input type="text" class="form-control" id="pekerjaanM" name="bukti" placeholder="Barang Bukti">
                    
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