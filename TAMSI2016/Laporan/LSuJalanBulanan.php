<?php
$nama_dokumen='Laporan Surat Jalan Bulanan';
include_once "../mpdf60/mpdf.php";
$mpdf = new mPDF('utf-8', 'A4'); 
ob_start();

include "../includes/config.php";
$config = new Config();
$db = $config->getConnection();

include_once'../includes/SuratJalan.inc.php';
$eks = new sJalan($db);
$eks->tgpBulan = $_POST["Bulan"];
$eks->tgpTahun = $_POST["TahunHingga"];

if($eks->Countbulan()>0)
{
$stmt = $eks->readBulan();
$no=1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){


		$eks->Nsjalan = $row['noSurat'];
		$eks->tanggal = $row['tanggal'];
		$eks->ktp = $row['Nktp'];
		$eks->indentitas = $row['KetIDentitsKendaraan'];		
		$eks->hari = $row['Hari'];
		$eks->pukul = $row['pukul'];

		$eks->pasport = $row['Npaspor'];
		$eks->rtj = $row['rsj'];
		$eks->Nama = $row['Nama'];
		$eks->tempat = $row['tempat'];
		$eks->JK = $row['jenisKelamin'];
		$eks->alamat = $row['alamat'];
		$eks->Pekerjaan = $row['pekerjaan'];
		$eks->noHp = $row['no_hp'];
		$eks->agama = $row['agama'];

		$eks->day = $row['tanggallahir'];
		$eks->year = $row['tahun'];
		$eks->mont = $row['bulan'];

		$eks->dayINDHING = $row['TanggalHingga'];
		$eks->yearINDHING = $row['TahunHingga'];
		$eks->montINDHING = $row['BulanHingga'];

?>
<html><head><meta content="text/html; charset=UTF-8" http-equiv="content-type"><style type="text/css">ol{margin:0;padding:0}table td,table th{padding:0}.c10{border-right-style:solid;padding:5pt 5pt 5pt 5pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:0pt;border-left-color:#000000;vertical-align:top;border-right-color:#000000;border-left-width:0pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:24.8pt;border-top-color:#000000;border-bottom-style:solid}.c0{border-right-style:solid;padding:5pt 5pt 5pt 5pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:0pt;border-left-color:#000000;vertical-align:top;border-right-color:#000000;border-left-width:0pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:297pt;border-top-color:#000000;border-bottom-style:solid}.c9{border-right-style:solid;padding:5pt 5pt 5pt 5pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:0pt;border-left-color:#000000;vertical-align:top;border-right-color:#000000;border-left-width:0pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:123pt;border-top-color:#000000;border-bottom-style:solid}.c2{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:12pt;font-family:"Arial";font-style:normal}.c14{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:center;margin-right:318.9pt}.c1{padding-top:0pt;padding-bottom:0pt;line-height:1.15;orphans:2;widows:2;text-align:justify}.c7{margin-left:216pt;orphans:2;widows:2;text-align:center}.c13{border-spacing:0;border-collapse:collapse;margin-right:auto}.c4{background-color:#ffffff;max-width:538.6pt;padding:28.3pt 28.3pt 28.3pt 28.3pt}.c11{orphans:2;widows:2;height:11pt}.c15{orphans:2;widows:2;text-align:center}.c8{orphans:2;widows:2;text-align:justify}.c6{font-weight:700;text-decoration:underline}.c17{text-align:justify}.c5{height:0pt}.c12{text-decoration:underline}.c16{margin-right:318.9pt}.c3{font-size:12pt}.title{padding-top:0pt;color:#000000;font-size:26pt;padding-bottom:3pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}.subtitle{padding-top:0pt;color:#666666;font-size:15pt;padding-bottom:16pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}li{color:#000000;font-size:11pt;font-family:"Arial"}p{margin:0;color:#000000;font-size:11pt;font-family:"Arial"}h1{padding-top:20pt;color:#000000;font-size:20pt;padding-bottom:6pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h2{padding-top:18pt;color:#000000;font-size:16pt;padding-bottom:6pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h3{padding-top:16pt;color:#434343;font-size:14pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h4{padding-top:14pt;color:#666666;font-size:12pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h5{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;orphans:2;widows:2;text-align:left}h6{padding-top:12pt;color:#666666;font-size:11pt;padding-bottom:4pt;font-family:"Arial";line-height:1.15;page-break-after:avoid;font-style:italic;orphans:2;widows:2;text-align:left}</style></head>
<body class="c4">
<p class="c14"><span class="c3"><img src="images/image00.png" width= "47.70" height=" 47.46"></span></p>
<p class="c14"><span class="c3">POLRI DAERAH LAMPUNG</span></p><p class="c14"><span class="c3">RESORT KOTA BANDAR LAMPUNG</span></p><p class="c15 c16"><span class="c12 c3">SEKTOR TANJUNG KARANG BARAT</span></p><p class="c11"><span class="c12 c3"></span></p><p class="c11"><span class="c3 c12"></span></p><p class="c11"><span class="c12 c3"></span></p><p class="c15"><span class="c3 c6">SURAT KETERANGAN JALAN</span></p><p class="c15"><span class="c3">Nomor : <?php echo $eks->Nsjalan; ?></span></p><p class="c15"><span class="c3">&nbsp;</span></p><p class="c8"><span class="c3">---- Hari <?php echo $eks->hari; ?> Tanggal <?php echo $eks->tanggal; ?> Sekira Pukul <?php echo $eks->pukul; ?> WIB, Telah datang Polsek Tanjung Karang Barat Seorang <?php echo $eks->JK; ?> dengan ini diterangkan bahwa : ------------------------------------------------</span></p><a id="t.97889b44b88f726d7554ba4535ec7c175cc98519"></a><a id="t.0"></a><table class="c13"><tbody><tr class="c5"><td class="c9" colspan="1" rowspan="1"><p class="c1"><span class="c2">Nama</span></p></td><td class="c10" colspan="1" rowspan="1"><p class="c1"><span class="c2">:</span></p></td><td class="c0" colspan="1" rowspan="1"><p class="c1"><span class="c2"><?php echo $eks->Nama; ?></span></p></td></tr><tr class="c5"><td class="c9" colspan="1" rowspan="1"><p class="c1"><span class="c2">Tempat/Tgl. Lahir</span></p></td><td class="c10" colspan="1" rowspan="1"><p class="c1"><span class="c2">:</span></p></td><td class="c0" colspan="1" rowspan="1"><p class="c1"><span class="c2"><?php echo $eks->tempat; ?> / <?php echo $eks->year; ?> - <?php echo $eks->mont; ?> - <?php echo $eks->day; ?></span></p></td></tr><tr class="c5"><td class="c9" colspan="1" rowspan="1"><p class="c1"><span class="c2">Jenis Kelamin</span></p></td><td class="c10" colspan="1" rowspan="1"><p class="c1"><span class="c2">:</span></p></td><td class="c0" colspan="1" rowspan="1"><p class="c1"><span class="c2"><?php echo $eks->JK; ?></span></p></td></tr><tr class="c5"><td class="c9" colspan="1" rowspan="1"><p class="c1"><span class="c2">Agama</span></p></td><td class="c10" colspan="1" rowspan="1"><p class="c1"><span class="c2">:</span></p></td><td class="c0" colspan="1" rowspan="1"><p class="c1"><span class="c2"><?php echo $eks->agama; ?></span></p></td></tr><tr class="c5"><td class="c9" colspan="1" rowspan="1"><p class="c1"><span class="c2">Pekerjaan</span></p></td><td class="c10" colspan="1" rowspan="1"><p class="c1"><span class="c2">:</span></p></td><td class="c0" colspan="1" rowspan="1"><p class="c1"><span class="c2"><?php echo $eks->Pekerjaan; ?></span></p></td></tr></tbody></table><p class="c8"><span class="c3">&nbsp;</span></p><p class="c8"><span class="c3">-------Sehubungan dengan Surat kendaraan masih dalam proses maka diterangkan indentitas kendaraan : <?php echo $eks->indentitas; ?>.----------------------</span></p><p class="c8"><span class="c3">Surat keterangan berlaku dari tanggal <?php echo $eks->tanggal; ?> s/d <?php echo $eks->yearINDHING; ?>-<?php echo $eks->montINDHING; ?>-<?php echo $eks->dayINDHING; ?>.-------------------------------</span></p><p class="c8"><span class="c3">&nbsp;</span></p><p class="c8"><span class="c3">Demikianlah surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.---------------</span></p><p class="c8"><span class="c3">&nbsp;</span></p><p class="c11 c17"><span class="c3"></span></p>
<p class="c7"><span class="c3">Bandar Lampung, <?php echo $eks->tanggal; ?></span></p><p class="c7"><span class="c3">An. KEPALA KEPOLISISAN SEKTOR </span></p><p class="c7"><span class="c3">KOTA TANJUNG KARANG BARAT</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">KA.SPK &ldquo;II&rdquo;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c12 c3">TOBI ADAM</span></p><p class="c7"><span class="c3">AIPTU NRP 66110400</span></p>
<p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p><p class="c7"><span class="c3">&nbsp;</span></p>

<?php
}
?>
</body></html>
<?php
}else{
echo "DATA TIDAK DITEMUKAN";
}
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>