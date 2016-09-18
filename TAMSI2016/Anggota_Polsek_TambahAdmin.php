<?php 
include 'HeaderAdmin.php';
include 'includes/Anggota.inc.php'; 
$eks = new Anggota($db);
if($_POST){
    $nrp = $_POST['nrp'];
    $nama = $_POST['Nama'];
    $alamat = $_POST['alamat'];
    $Jabatan = $_POST['Jabatan'];
    $hp = $_POST['hp'];
    if($nrp =="" || $nama =="" ||$alamat =="" || $hp =="" || $Jabatan =="Jabatan"){
    ?>
        <script>alert('Data Kosong')
        location.href='Anggota_Polsek_TambahAdmin.php'</script>
    <?php
    }else{
        $eks->nrp = $nrp;
        $eks->nama = $nama;
        $eks->alamat = $alamat;
        $eks->hp =  $hp;
        $eks->jabatan = $Jabatan;
        if($eks->insert()){
        ?>
            <script>alert('Data Berhasil ditambahkan')
            location.href='Anggota_PolsekAdmin.php'</script>
        <?php
        }else{
        ?>
            <script>alert('Data Sudah Ada atau Gagal ditambahkan !!')
            location.href='Anggota_Polsek_TambahAdmin.php'</script>
        <?php
        }
    }
}
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Data Anggota Polsek / Tambah</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Data Anggota Polsek</h2>
                <div class ="text-right">
                    <a href="Anggota_PolsekAdmin.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                
                <form method="post">
                 <div class="form-group has-success col-md-8">
                    <label class="control-label" >NRP</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="nrp" placeholder="NRP">

                    <label class="control-label" >Nama Anggota</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="Nama" placeholder="Nama Anggota">

                    <label class="control-label">Jabatan</label>
                    <select name="Jabatan" class="form-control"  tabindex="2" >
                        <option value="">Jabatan</option>
                        <option value="BRIPDA">BRIPDA</option>
                        <option value="BRPTU">BRPTU</option>
                        <option value="Brigadir Polisi">Brigadir Polisi</option>
                        <option value="BRIPKA">BRIPKA</option>
                        <option value="AIPDA">AIPDA</option>
                        <option value="IPDA">IPDA</option>
                        <option value="IPTU">IPTU</option>
                        <option value="AKP">AKP</option>
                        <option value="Komisaris Polisi">Komisaris Polisi</option>
                        <option value="KOMBES">KOMBES</option>
                        <option value="BRIGJEN">BRIGJEN</option>
                        <option value="IRJEN">IRJEN</option>
                        <option value="KOMJEN">KOMJEN</option>
                        <option value="Kapolri">Kapolri</option>
                    </select>

                    <label class="control-label" >Alamat</label>
                    <textarea class="form-control" rows="5" id="inputSuccess1" name="alamat" placeholder="Alamat"></textarea>

                    <label class="control-label" >No Handphone</label>
                    <input type="text" class="form-control" id="inputSuccess1" name="hp" placeholder="No Handphone">
                    </br>
                    <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary ">Simpan Data</button>
                    <button type="reset" class="btn">Hapus Data</button>
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