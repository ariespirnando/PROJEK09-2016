<?php 

include 'HeaderAdmin.php'; 
include 'includes/user.inc.php';
$pro = new User($db);
$stmt = $pro->readAll();
?>
<ul class="breadcrumb">
        <li>
            <a href="#"> Pengaturan User</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Pengaturan User</h2>
                <div class ="text-right">
                    <a href="Setting_Tambah.php" data-toggle="tooltip" class="btn btn-primary btn-sm">Tambah User</a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12"> 
                <table width="100%" class="table table-striped table-bordered responsive" id="tabeldata1">
            <thead BGCOLOR="#3186E1" align="center">
            <tr>
                <th>Nama Anggota</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th width="100px">Aksi</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $no=1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
                        <tr>
                            <td style="vertical-align:middle;"><?php echo $row['Nama_Anggota'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['username'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['password'] ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['level'] ?></td>
                            <td class="text-center" style="vertical-align:middle;">
                                <a href="Setting_Ubah.php?id=<?php echo $row['id_Pengguna'] ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <a href="Setting_Hapus.php?id=<?php echo $row['id_Pengguna'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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