<?php
class Pengaduan{ 
	
	private $conn;
	private $table_name = "pengaduan";
	private $table_nameView = "v_pengaduan";
	
	
	public $nopengaduan;
	public $ktp;
	public $tempatkejadian;
	public $apaterjadi;
	public $terlapor;
	public $saksi;
	public $tindakpidana;
	public $bukti;
	public $uraian;

	public $hari;
	public $kebangsaan;
	public $tanggal;
	public $jam;
	public $waktukejadian;


	public $Nama;
	public $tempat;
	public $JK;
	public $alamat;
	public $Pekerjaan;
	public $agama;
	public $hp;
	public $tgp;
	public $day;
	public $year;
	public $mont;

	public $no_laporan;

	public $tgpBulan;
	public $tgpTahun;

	public function __construct($xx){
		$this->conn = $xx;
	}

	function readKode(){
		$query = "SELECT no_pengaduan FROM ".$this->table_name." ORDER BY no_pengaduan DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->nopengaduan = $row['no_pengaduan'];
	}
	
	function insert(){
		$query = "insert into ".$this->table_name." values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nopengaduan);
		$stmt->bindParam(2, $this->ktp);
		$stmt->bindParam(3, $this->tempatkejadian);
		$stmt->bindParam(4, $this->apaterjadi);
		$stmt->bindParam(5, $this->terlapor);
		$stmt->bindParam(6, $this->saksi);
		$stmt->bindParam(7, $this->tindakpidana);
		$stmt->bindParam(8, $this->bukti);
		$stmt->bindParam(9, $this->uraian);
		$stmt->bindParam(10, $this->waktukejadian);
		$stmt->bindParam(11, $this->tanggal);
		$stmt->bindParam(12, $this->hari);
		$stmt->bindParam(13, $this->jam);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_nameView." ORDER BY no_pengaduan DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}
	function readBulan(){
		$query="SELECT
			  `pengaduan`.`no_pengaduan`    AS `no_pengaduan`,
			  `pengaduan`.`Nktp`            AS `Nktp`,
			  `pengaduan`.`tempat_kejadian` AS `tempat_kejadian`,
			  `pengaduan`.`apaterjadi`      AS `apaterjadi`,
			  `pengaduan`.`terlapor`        AS `terlapor`,
			  `pengaduan`.`saksi`           AS `saksi`,
			  `pengaduan`.`tindakpidanana`  AS `tindakpidanana`,
			  `pengaduan`.`bukti`           AS `bukti`,
			  `pengaduan`.`uraian`          AS `uraian`,
			  `pengaduan`.`waktukejadian`   AS `waktukejadian`,
			  `pengaduan`.`tanggal`         AS `tanggalpengaduan`,
			  `pengaduan`.`hari`            AS `hari`,
			  `pengaduan`.`pukul`           AS `jam`,
			  `pelaporan`.`no_laporan`      AS `no_laporan`,
			  `masyarakat`.`Npaspor`        AS `Npaspor`,
			  `masyarakat`.`rsj`            AS `rsj`,
			  `masyarakat`.`Nama`           AS `Nama`,
			  `masyarakat`.`tempat`         AS `tempat`,
			  DAYOFMONTH(`masyarakat`.`tanggallahir`) AS `tanggal`,
			  YEAR(`masyarakat`.`tanggallahir`) AS `tahun`,
			  MONTH(`masyarakat`.`tanggallahir`) AS `bulan`,
			  `masyarakat`.`jenisKelamin`   AS `jenisKelamin`,
			  `masyarakat`.`alamat`         AS `alamat`,
			  `masyarakat`.`pekerjaan`      AS `pekerjaan`,
			  `masyarakat`.`no_hp`          AS `no_hp`,
			  `masyarakat`.`Kebangsaan`     AS `Kebangsaan`,
			  `masyarakat`.`agama`          AS `agama`
			FROM ((`masyarakat`
			    JOIN `pengaduan`
			      ON ((`pengaduan`.`Nktp` = `masyarakat`.`Nktp`)))
			   JOIN `pelaporan`
			     ON ((`pelaporan`.`no_pengaduan` = `pengaduan`.`no_pengaduan`)))
			 WHERE YEAR(`pengaduan`.`tanggal`) = ? AND
			  MONTH(`pengaduan`.`tanggal`) = ?";

			$stmt = $this->conn->prepare( $query );
			$stmt->bindParam(1, $this->tgpTahun);
			$stmt->bindParam(2, $this->tgpBulan);
			
			$stmt->execute();
			return $stmt;
			
	}
	function Countbulan(){
		$query="SELECT
			  `pengaduan`.`no_pengaduan`    AS `no_pengaduan`,
			  `pengaduan`.`Nktp`            AS `Nktp`,
			  `pengaduan`.`tempat_kejadian` AS `tempat_kejadian`,
			  `pengaduan`.`apaterjadi`      AS `apaterjadi`,
			  `pengaduan`.`terlapor`        AS `terlapor`,
			  `pengaduan`.`saksi`           AS `saksi`,
			  `pengaduan`.`tindakpidanana`  AS `tindakpidanana`,
			  `pengaduan`.`bukti`           AS `bukti`,
			  `pengaduan`.`uraian`          AS `uraian`,
			  `pengaduan`.`waktukejadian`   AS `waktukejadian`,
			  `pengaduan`.`tanggal`         AS `tanggalpengaduan`,
			  `pengaduan`.`hari`            AS `hari`,
			  `pengaduan`.`pukul`           AS `jam`,
			  `pelaporan`.`no_laporan`      AS `no_laporan`,
			  `masyarakat`.`Npaspor`        AS `Npaspor`,
			  `masyarakat`.`rsj`            AS `rsj`,
			  `masyarakat`.`Nama`           AS `Nama`,
			  `masyarakat`.`tempat`         AS `tempat`,
			  DAYOFMONTH(`masyarakat`.`tanggallahir`) AS `tanggal`,
			  YEAR(`masyarakat`.`tanggallahir`) AS `tahun`,
			  MONTH(`masyarakat`.`tanggallahir`) AS `bulan`,
			  `masyarakat`.`jenisKelamin`   AS `jenisKelamin`,
			  `masyarakat`.`alamat`         AS `alamat`,
			  `masyarakat`.`pekerjaan`      AS `pekerjaan`,
			  `masyarakat`.`no_hp`          AS `no_hp`,
			  `masyarakat`.`Kebangsaan`     AS `Kebangsaan`,
			  `masyarakat`.`agama`          AS `agama`
			FROM ((`masyarakat`
			    JOIN `pengaduan`
			      ON ((`pengaduan`.`Nktp` = `masyarakat`.`Nktp`)))
			   JOIN `pelaporan`
			     ON ((`pelaporan`.`no_pengaduan` = `pengaduan`.`no_pengaduan`)))
			 WHERE YEAR(`pengaduan`.`tanggal`) = ? AND
			  MONTH(`pengaduan`.`tanggal`) = ?";

			$stmt = $this->conn->prepare( $query );

			$stmt->bindParam(1, $this->tgpTahun);
			$stmt->bindParam(2, $this->tgpBulan);
			
			$stmt->execute();
			return $stmt->rowCount();
	}
	function readOne(){
		
		$query = "SELECT* FROM ".$this->table_nameView." WHERE no_pengaduan =? ";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->nopengaduan);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->kebangsaan=$row['Kebangsaan'];
		$this->nopengaduan = $row['no_pengaduan'];
		$this->tempatkejadian = $row['tempat_kejadian'];
		$this->apaterjadi = $row['apaterjadi'];
		$this->terlapor = $row['terlapor'];
		$this->saksi = $row['saksi'];
		$this->tindakpidana = $row['tindakpidanana'];
		$this->bukti = $row['bukti'];
		$this->uraian = $row['uraian'];
		$this->waktukejadian = $row['waktukejadian'];

		$this->no_laporan = $row['no_laporan'];

		$this->ktp = $row['Nktp'];
		$this->Nama = $row['Nama'];
		$this->tempat = $row['tempat'];
		$this->JK = $row['jenisKelamin'];
		$this->alamat = $row['alamat'];
		$this->Pekerjaan = $row['pekerjaan'];

		$this->day = $row['tanggal'];
		$this->year = $row['tahun'];
		$this->mont = $row['bulan'];
		$this->hari = $row['hari'];
		$this->jam = $row['jam'];
		$this->tgp = $row['tanggalpengaduan'];
		
		
		$this->hp = $row['no_hp'];
		$this->agama = $row['agama'];

	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					Nktp =?,
					tempat_kejadian =?,
					apaterjadi =?,
					terlapor =?,
					saksi =?,
					tindakpidanana =?,
					bukti =?,
					uraian =?,
					waktukejadian =?
				WHERE
					no_pengaduan =?
					";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->ktp);
		$stmt->bindParam(2, $this->tempatkejadian);
		$stmt->bindParam(3, $this->apaterjadi);
		$stmt->bindParam(4, $this->terlapor);
		$stmt->bindParam(5, $this->saksi);
		$stmt->bindParam(6, $this->tindakpidana);
		$stmt->bindParam(7, $this->bukti);
		$stmt->bindParam(8, $this->uraian);
		$stmt->bindParam(9, $this->waktukejadian);
		$stmt->bindParam(10, $this->nopengaduan);
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE no_pengaduan =?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nopengaduan);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>