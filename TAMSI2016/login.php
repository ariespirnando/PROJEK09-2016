<?php
include_once 'includes/config.php';

$config = new Config();
$db = $config->getConnection();
    
if($_POST){
    
    include_once 'includes/login.inc.php';
    $login = new Login($db);

    $login->userid = $_POST['username'];
    $login->passid = md5($_POST['password']);
    
    if($login->login()){
        if($login->cekUser()>0){
            echo "<script>alert('Selamat Datang')
            location.href='Home.php'</script>";
        }else{
            echo "<script>alert('Selamat Datang Admin')
            location.href='Anggota_PolsekAdmin.php'</script>";
        }  
    }
    
    else{
        echo "<script>alert('Gagal Login')</script>";
    }
}
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
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="Thema/img/favicon.ico">

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Selamat Datang</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Masukan Username dan Password anda.
            </div>
            <form class="form-horizontal" method="post">
                <fieldset>
                    <div class="form-group has-success col-md-4" align="Left">
                    
                    <img src="Thema/img/logo.png" class="hidden-xs" width ="70%"/>
                    <br><br>
                    <a href="index.php"><<--Kembali</a>
                    </div>
                    <div class="form-group has-success col-md-8" align="Center">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>
                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                    </div>
                    
                </fieldset>
            </form>

        </div>

        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="Thema/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="Thema/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='Thema/bower_components/moment/min/moment.min.js'></script>
<script src='Thema/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='Thema/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="Thema/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="Thema/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="Thema/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="Thema/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="Thema/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="Thema/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="Thema/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="Thema/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="Thema/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="Thema/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="Thema/js/charisma.js"></script>


</body>
</html>
