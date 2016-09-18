<?php
class skck{ 
	
	private $conn;
	private $table_name = "skck";
	private $table_nameView = "v_skck";
	
	public $nSKCK;
	public $KTP;
	public $Berlaku;
	public $Hingga;
	public $indonesiaSejak;
	public $indonesiaHingga;
	public $keperluan;
	public $nrp;
	public $anggotapolsek;

	public $agama;
	public $Kebangsaan;

	public $pasport;
	public $rtj;
	public $Nama;
	public $tempat;
	public $JK;
	public $alamat;
	public $Pekerjaan;
	public $noHp;
	
	public $day;
	public $year;
	public $mont;

	public $dayINDSE;
	public $yearINDSE;
	public $montINDSE;

	public $dayINDHING;
	public $yearINDHING;
	public $montINDHING;

	public $dayBerlaku;
	public $yearBerlaku;
	public $montBerlaku;

	public $dayHingga;
	public $yearHingga;
	public $montHingga;

	public $tgpBulan;
	public $tgpTahun;

	public function __construct($xx){
		$this->conn = $xx;
	}

	function readBulan(){
		$query="SELECT
				  `skck`.`nSKCK`                 AS `nSKCK`,
				  `skck`.`Keperluan`             AS `keperluan`,

				  `skck`.`BelakuMulai`        AS `TanggalBelakuMulai`,
				  DAY(`skck`.`BelakuSampai`)          AS `TanggalBelakuSampai`,
				  YEAR(`skck`.`BelakuSampai`)          AS `TahunBelakuSampai`,
				  MONTH(`skck`.`BelakuSampai`)          AS `BulanBelakuSampai`,

				  DAY(`skck`.`DiindonesiaSejak`)          AS `TanggalSejak`,
				  YEAR(`skck`.`DiindonesiaSejak`)          AS `TahunSejak`,
				  MONTH(`skck`.`DiindonesiaSejak`)          AS `BulanSejak`,

				  DAY(`skck`.`DiindonesiaHingga`)          AS `TanggalHingga`,
				  YEAR(`skck`.`DiindonesiaHingga`)          AS `TahunHingga`,
				  MONTH(`skck`.`DiindonesiaHingga`)          AS `BulanHingga`,

				  `masyarakat`.`Nktp`            AS `Nktp`,
				  `masyarakat`.`Nama`            AS `Nama`,
				  `masyarakat`.`alamat`          AS `alamat`,
				  `masyarakat`.`jenisKelamin`    AS `jenisKelamin`,
				  `masyarakat`.`no_hp`           AS `no_hp`,
				  `masyarakat`.`Npaspor`         AS `Npaspor`,
				  `masyarakat`.`pekerjaan`       AS `pekerjaan`,
				  `masyarakat`.`rsj`             AS `rsj`,
				  `masyarakat`.`agama`           AS `agama`,
				  `masyarakat`.`Kebangsaan`             AS `Kebangsaan`,

				  DAY(`masyarakat`.`tanggallahir`)    AS `tanggal`,
				  YEAR(`masyarakat`.`tanggallahir`)    AS `tahun`,
				  MONTH(`masyarakat`.`tanggallahir`)    AS `bulan`,

				  `masyarakat`.`tempat`          AS `tempat`,
				  `anggotapolsek`.`NRP`          AS `NRP`,
				  `anggotapolsek`.`Nama_Anggota` AS `Nama_Anggota`
				FROM ((`skck`
				    JOIN `masyarakat`
				      ON ((`skck`.`Nktp` = `masyarakat`.`Nktp`)))
				   JOIN `anggotapolsek`
				     ON ((`skck`.`NRP` = `anggotapolsek`.`NRP`))) WHERE
					YEAR(`skck`.`BelakuMulai`) = ? AND 
				     MONTH(`skck`.`BelakuMulai`) = ?" 
				  ;

			$stmt = $this->conn->prepare( $query );
			$stmt->bindParam(1, $this->tgpTahun);
			$stmt->bindParam(2, $this->tgpBulan);
			
			$stmt->execute();
			return $stmt;
			
	}
	function Countbulan(){
		$query="SELECT
				  `skck`.`nSKCK`                 AS `nSKCK`,
				  `skck`.`Keperluan`             AS `keperluan`,

				  `skck`.`BelakuMulai`        AS `TanggalBelakuMulai`,
				  DAY(`skck`.`BelakuSampai`)          AS `TanggalBelakuSampai`,
				  YEAR(`skck`.`BelakuSampai`)          AS `TahunBelakuSampai`,
				  MONTH(`skck`.`BelakuSampai`)          AS `BulanBelakuSampai`,

				  DAY(`skck`.`DiindonesiaSejak`)          AS `TanggalSejak`,
				  YEAR(`skck`.`DiindonesiaSejak`)          AS `TahunSejak`,
				  MONTH(`skck`.`DiindonesiaSejak`)          AS `BulanSejak`,

				  DAY(`skck`.`DiindonesiaHingga`)          AS `TanggalHingga`,
				  YEAR(`skck`.`DiindonesiaHingga`)          AS `TahunHingga`,
				  MONTH(`skck`.`DiindonesiaHingga`)          AS `BulanHingga`,

				  `masyarakat`.`Nktp`            AS `Nktp`,
				  `masyarakat`.`Nama`            AS `Nama`,
				  `masyarakat`.`alamat`          AS `alamat`,
				  `masyarakat`.`jenisKelamin`    AS `jenisKelamin`,
				  `masyarakat`.`no_hp`           AS `no_hp`,
				  `masyarakat`.`Npaspor`         AS `Npaspor`,
				  `masyarakat`.`pekerjaan`       AS `pekerjaan`,
				  `masyarakat`.`rsj`             AS `rsj`,
				  `masyarakat`.`agama`           AS `agama`,
				  `masyarakat`.`Kebangsaan`             AS `Kebangsaan`,

				  DAY(`masyarakat`.`tanggallahir`)    AS `tanggal`,
				  YEAR(`masyarakat`.`tanggallahir`)    AS `tahun`,
				  MONTH(`masyarakat`.`tanggallahir`)    AS `bulan`,

				  `masyarakat`.`tempat`          AS `tempat`,
				  `anggotapolsek`.`NRP`          AS `NRP`,
				  `anggotapolsek`.`Nama_Anggota` AS `Nama_Anggota`
				FROM ((`skck`
				    JOIN `masyarakat`
				      ON ((`skck`.`Nktp` = `masyarakat`.`Nktp`)))
				   JOIN `anggotapolsek`
				     ON ((`skck`.`NRP` = `anggotapolsek`.`NRP`))) WHERE
					YEAR(`skck`.`BelakuMulai`) = ? AND 
				     MONTH(`skck`.`BelakuMulai`) = ?" 
				  ;

			$stmt = $this->conn->prepare( $query );

			$stmt->bindParam(1, $this->tgpTahun);
			$stmt->bindParam(2, $this->tgpBulan);
			
			$stmt->execute();
			return $stmt->rowCount();
	}
	
	function insert(){
		$query = "insert into ".$this->table_name." values(?,?,?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nSKCK);
		$stmt->bindParam(2, $this->KTP);
		$stmt->bindParam(3, $this->Berlaku);
		$stmt->bindParam(4, $this->keperluan);
		$stmt->bindParam(5, $this->indonesiaSejak);
		$stmt->bindParam(6, $this->indonesiaHingga);
		$stmt->bindParam(7, $this->Berlaku);
		$stmt->bindParam(8, $this->Hingga);
		$stmt->bindParam(9, $this->nrp);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function readAll(){
		$query = "SELECT * FROM ".$this->table_nameView." ORDER BY TanggalDikeluarkan DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}
	function readKode(){
		$query = "SELECT nSKCK FROM ".$this->table_name." ORDER BY nSKCK DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->nSKCK = $row['nSKCK'];
	}
	function readOne(){
		$query = "SELECT
				  `skck`.`nSKCK`                 AS `nSKCK`,
				  `skck`.`Keperluan`             AS `keperluan`,

				  `skck`.`BelakuMulai`        AS `TanggalBelakuMulai`,

				  DAY(`skck`.`BelakuSampai`)          AS `TanggalBelakuSampai`,
				  YEAR(`skck`.`BelakuSampai`)          AS `TahunBelakuSampai`,
				  MONTH(`skck`.`BelakuSampai`)          AS `BulanBelakuSampai`,

				  DAY(`skck`.`DiindonesiaSejak`)          AS `TanggalSejak`,
				  YEAR(`skck`.`DiindonesiaSejak`)          AS `TahunSejak`,
				  MONTH(`skck`.`DiindonesiaSejak`)          AS `BulanSejak`,

				  DAY(`skck`.`DiindonesiaHingga`)          AS `TanggalHingga`,
				  YEAR(`skck`.`DiindonesiaHingga`)          AS `TahunHingga`,
				  MONTH(`skck`.`DiindonesiaHingga`)          AS `BulanHingga`,

				  `masyarakat`.`Nktp`            AS `Nktp`,
				  `masyarakat`.`Nama`            AS `Nama`,
				  `masyarakat`.`alamat`          AS `alamat`,
				  `masyarakat`.`jenisKelamin`    AS `jenisKelamin`,
				  `masyarakat`.`no_hp`           AS `no_hp`,
				  `masyarakat`.`Npaspor`         AS `Npaspor`,
				  `masyarakat`.`pekerjaan`       AS `pekerjaan`,
				  `masyarakat`.`rsj`             AS `rsj`,
				  `masyarakat`.`agama`           AS `agama`,
				  `masyarakat`.`Kebangsaan`             AS `Kebangsaan`,

				  DAY(`masyarakat`.`tanggallahir`)    AS `tanggal`,
				  YEAR(`masyarakat`.`tanggallahir`)    AS `tahun`,
				  MONTH(`masyarakat`.`tanggallahir`)    AS `bulan`,

				  `masyarakat`.`tempat`          AS `tempat`,
				  `anggotapolsek`.`NRP`          AS `NRP`,
				  `anggotapolsek`.`Nama_Anggota` AS `Nama_Anggota`
				FROM ((`skck`
				    JOIN `masyarakat`
				      ON ((`skck`.`Nktp` = `masyarakat`.`Nktp`)))
				   JOIN `anggotapolsek`
				     ON ((`skck`.`NRP` = `anggotapolsek`.`NRP`))) where `skck`.`nSKCK` = ? ";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->nSKCK);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->nSKCK = $row['nSKCK'];
		$this->ktp = $row['Nktp'];
		$this->keperluan= $row['keperluan'];
		$this->nrp = $row['NRP'];

		$this->pasport = $row['Npaspor'];
		$this->rtj = $row['rsj'];
		$this->Nama = $row['Nama'];
		$this->tempat = $row['tempat'];
		$this->JK = $row['jenisKelamin'];
		$this->alamat = $row['alamat'];
		$this->Pekerjaan = $row['pekerjaan'];
		$this->noHp = $row['no_hp'];
		$this->anggotapolsek = $row['Nama_Anggota'];
		
		$this->agama = $row['agama'];
		$this->Kebangsaan = $row['Kebangsaan'];

		$this->dayINDSE = $row['TanggalSejak'];
		$this->yearINDSE = $row['TahunSejak'];
		$this->montINDSE = $row['BulanSejak'];

		$this->dayINDHING = $row['TanggalHingga'];
		$this->yearINDHING = $row['TahunHingga'];
		$this->montINDHING = $row['BulanHingga'];

		$this->dayBerlaku = $row['TanggalBelakuMulai'];

		$this->dayHingga = $row['TanggalBelakuSampai'];
		$this->yearHingga = $row['TahunBelakuSampai'];
		$this->montHingga = $row['BulanBelakuSampai'];

		$this->day = $row['tanggal'];
		$this->year = $row['tahun'];
		$this->mont = $row['bulan'];
		
		
	}
	
	// update the product
	function update(){
		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					Nktp =?,
					TanggalDikeluarkan =?,
					Keperluan =?,
					DiindonesiaSejak =?,
					DiindonesiaHingga =?,
					BelakuMulai =?,
					BelakuSampai =?,
					NRP =?
				WHERE
					nSKCK =?
					";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->KTP);
		$stmt->bindParam(2, $this->Berlaku);
		$stmt->bindParam(3, $this->keperluan);
		$stmt->bindParam(4, $this->indonesiaSejak);
		$stmt->bindParam(5, $this->indonesiaHingga);
		$stmt->bindParam(6, $this->Berlaku);
		$stmt->bindParam(7, $this->Hingga);
		$stmt->bindParam(8, $this->nrp);
		$stmt->bindParam(9, $this->nSKCK);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE nSKCK =?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nSKCK);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>