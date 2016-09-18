<?php 
include 'HeaderAdmin.php';
include 'includes/user.inc.php';
$eks = new User($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$eks->id_Pengguna = $id;
$eks->readOne();
if($_POST){
    
    $nrp = $_POST['NRP'];
    $user = $_POST['username'];
    $password =md5($_POST['password']);
    $level = $_POST['level'];
    if($user =="" || $password =="" || $nrp==""){
    ?>
        <script>alert('Data Kosong')
        location.href='Setting_Tambah.php'</script>
    <?php
    }else{
        $eks->nrp = $nrp;
        $eks->username = $user;
        $eks->password = $password;
        $eks->level = $level;

        if($eks->update()){
        ?>
            <script>alert('Data Berhasil diUbah')
            location.href='Setting.php'</script>
        <?php
        }else{
        ?>
            <script>alert('Data Gagal diUbah !!')
            location.href='Setting_Tambah.php'</script>
        <?php
        }
    }
}
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Pengaturan User / Ubah</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Pengaturan User</h2>
                <div class ="text-right">
                    <a href="Setting.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                
                <form method="post">
                 <div class="form-group has-success col-md-8">
                   
                    <label class="control-label" >Nama Anggota</label>
                    <input value="<?php echo $eks->namaAnggota ?>" type="text" class="form-control" id="NamaPolisi"name="Nama" placeholder="Nama Anggota">

                    <label class="control-label" >NRP</label>
                    <input value="<?php echo $eks->nrp ?>" type="text" id="nrp" class="form-control" name="NRP" placeholder="NRP">

                    <label class="control-label" >Username</label>
                    <input value="<?php echo $eks->username ?>" type="text" class="form-control"  name="username" placeholder="Username">

                    <label class="control-label" >Password</label>
                    <input value="<?php echo $eks->password ?>" type="text" class="form-control"  name="password" placeholder="Password">

                    <label class="control-label">Level</label>
                    <select name="level" class="form-control"  tabindex="2" >
                        <option value="<?php echo $eks->level ?>"><?php echo $eks->level; ?></option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    </br>
                    <div class="control-group">
                    <div class="controls">
                    <button type="submit" class="btn btn-primary ">Ubah Data</button>
                    </div>
                    
                </div>
                  
            </div>
            </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'Footer.php'; ?>