<?php 
include 'Header.php'; 
include 'includes/grafik.inc.php';
$eks = new grafik($db);

$total = $eks->countall();
$S1 = $eks->countSPuas()/$total;
$S2 = $eks->countPuas()/$total;
$S3 = $eks->counttPuas()/$total;
$S4 = $eks->countStPuas()/$total;
?>
<ul class="breadcrumb">
        <li>
            <a href="#">Grafik</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Grafik Pelayanan Masyarakat</h2>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12">
        <script type="text/javascript">
        $(function () {

            $(document).ready(function () {

                // Build the chart
                $('#container').highcharts({
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'Grafik Kepuasan Pelayanan Masyarakat <br> Polsek Tanjung Karang Barat Bandarlampung'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Nilai',
                        colorByPoint: true,
                        data: [{
                            name: 'Sangat Puas',
                            y: <?php echo $S1; ?>
                        }, {
                            name: 'Puas',
                            y: <?php echo $S2; ?>
                        }, {
                            name: 'Kurang Puas',
                            y: <?php echo $S3; ?>,
                            sliced: true,
                            selected: true
                        }, {
                            name: 'Sangat Tidak Puas',
                            y: <?php echo $S4; ?>
                        }]
                    }]
                });
            });
        });
        </script>
    </head>
    <body>
    <script src="Thema/js/highcharts.js"></script>
    <script src="Thema/js/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'Footer.php'; ?>