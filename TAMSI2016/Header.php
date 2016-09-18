<?php
include "includes/config.php";

session_start();
if(!isset($_SESSION['Nama_Anggota'])){
    echo "<script>alert('Anda Belum Login !!!')
    location.href='login.php'</script>";
}

$timeout = 10; // Set timeout menit
$logout_redirect_url = "logout.php"; // Set logout URL
$timeout = $timeout * 60; // Ubah menit ke detik
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();



$config = new Config();
$db = $config->getConnection();
$tanggal = getdate();
if($tanggal['mon']==1){
    $rom ='I';
}
else if($tanggal['mon']==2){
    $rom ='II';
}
else if($tanggal['mon']==3){
    $rom ='III';
}
else if($tanggal['mon']==4){
    $rom ='IV';
}
else if($tanggal['mon']==5){
    $rom ='V';
}
else if($tanggal['mon']==6){
    $rom ='VI';
}
else if($tanggal['mon']==7){
    $rom ='VII';
}
else if($tanggal['mon']==8){
    $rom ='VII';
}
else if($tanggal['mon']==9){
    $rom ='IX';
}
else if($tanggal['mon']==10){
    $rom ='X';
}
else if($tanggal['mon']==11){
    $rom ='XI';
}
else {
    $rom ='XII';
}

$array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
$hr = $array_hr[date('N')]; 
$tgl= date('j');
$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bln = $array_bln[date('n')];
$thn = date('Y');
$jam = date('H:i');
$hariini = date('Y-m-d');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sistem Manajemen dan Pelayanan Masyarakat</title>

    <!-- The styles -->
    <link href="Thema/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="Thema/css/charisma-app.css" rel="stylesheet">
    <link href='Thema/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='Thema/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='Thema/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='Thema/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='Thema/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='Thema/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='Thema/css/jquery.noty.css' rel='stylesheet'>
    <link href='Thema/css/noty_theme_default.css' rel='stylesheet'>
    <link href='Thema/css/elfinder.min.css' rel='stylesheet'>
    <link href='Thema/css/elfinder.theme.css' rel='stylesheet'>
    <link href='Thema/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='Thema/css/uploadify.css' rel='stylesheet'>
    <link href='Thema/css/animate.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Thema/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" href="Thema/css/jquery-ui.css"/>

    <!-- jQuery -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
  $(function() {
    $( "#KTP" ).autocomplete({
      source: 'includes/Utility/get_Masyarakat.php',
      select:function(event, ui){
            $('#nama').val(ui.item.Nama);
      $('#jk').val(ui.item.jenisKelamin);
            $('#paspor').val(ui.item.Npaspor);
      $('#rsj').val(ui.item.rsj);
            $('#tempatM').val(ui.item.tempat);
      $('#tanggalM').val(ui.item.tanggal);
            $('#tahunM').val(ui.item.tahun);
      $('#bulanM').val(ui.item.bulan);
            $('#alamatM').val(ui.item.alamat);
      $('#pekerjaanM').val(ui.item.pekerjaan);
            $('#hpM').val(ui.item.no_hp);
      $('#agama').val(ui.item.agama);
      $('#Kebangsaan').val(ui.item.Kebangsaan);
      }
    });

    $( "#NamaPolisi" ).autocomplete({
      source: 'includes/Utility/get_Anggota.php',
      select:function(event, ui){
      $('#nrp').val(ui.item.nrp);
      }
    });

    $( "#Pelaporan" ).autocomplete({
      source: 'includes/Utility/get_Pelaporan.php',
      select:function(event, ui){
      $('#namaPelapor').val(ui.item.Nama);
      $('#nKTPPelapor').val(ui.item.Nktp);
      $('#jkPelapor').val(ui.item.jenisKelamin);
            $('#tempatMPelapor').val(ui.item.tempat);
      $('#tanggalMPelapor').val(ui.item.tanggal);
            $('#alamatMPelapor').val(ui.item.alamat);
      $('#pekerjaanMPelapor').val(ui.item.pekerjaan);
            $('#hpMPelapor').val(ui.item.no_hp);
      $('#agamaPelapor').val(ui.item.agama);

      $('#tempat_kejadianPelapor').val(ui.item.tempat_kejadian);
      $('#apaterjadiPelapor').val(ui.item.apaterjadi);
      $('#terlaporPelapor').val(ui.item.terlapor);
      $('#saksiPelapor').val(ui.item.saksi);
      $('#tindakpidananaPelapor').val(ui.item.tindakpidanana);

      }
    });



  });
  </script>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="Thema/img/favicon.ico">

    

</head>
<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default " role="navigation">
        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> <img alt="Charisma Logo" src="Thema/img/logo20.png" class="hidden-xs"/>
                <span>Sistem Manajemen untuk Pelayanan Masyarakat</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-sm hidden-xs"> <?php echo $_SESSION['Nama_Anggota'] ?>  </span><i class="glyphicon glyphicon-user"></i>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>  Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->
        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="home.php"><i class="glyphicon glyphicon-home"></i><span> Home</span></a>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>  Master</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="Anggota_Polsek.php">Data Anggota Polsek</a></li>
                                <li><a href="Masyarakat.php">Data Mayarakat</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>  Form</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="SKCK.php">SKCK</a></li>
                                <li><a href="Visum.php">Permohonan Visum</a></li>
                                <li><a href="S_jalan.php">Surat Jalan</a></li>
                                <li><a href="Pengaduan.php">Pengaduan Masyarakat</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span>  Manajemen Dokumen</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="LaporanSkck.php">Laporan SKCK</a></li>
                                <li><a href="Laporanvisum.php">Laporan Visum</a></li>
                                <li><a href="LaporanSjalan.php">Laporan Surat Jalan</a></li>
                                <li><a href="LaporanPMasyarakat.php">Laporan Pengaduan Masyarakat</a></li>
                                <li><a href="LaporankSeluruhan.php">Laporan Keseluruhan</a></li>
                            </ul>
                        </li>
                        <li><a class="ajax-link" href="Grafik.php"><i class="glyphicon glyphicon-list-alt"></i><span> Grafik</span></a></li>
                        
                        <li><a class="ajax-link" href="logout.php"><i class="glyphicon glyphicon-log-out"></i><span> Log Out</span></a></li>
                    
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts --> <div>