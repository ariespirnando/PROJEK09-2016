<?php
class sJalan{
	
	private $conn;
	private $table_name = "suratjalan";
	private $table_nameView = "v_suratjalan";

	public $Nsjalan;
	public $tanggal;
	
	public $indentitas;
	public $berlaku;
	public $hari;
	public $pukul;

	public $ktp;
	public $pasport;
	public $rtj;
	public $Nama;
	public $tempat;
	public $JK;
	public $alamat;
	public $Pekerjaan;
	public $noHp;
	public $agama;

	public $day;
	public $year;
	public $mont;

	public $dayINDHING;
	public $yearINDHING;
	public $montINDHING;

	public $tgpBulan;
	public $tgpTahun;

	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values(?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->Nsjalan);
		$stmt->bindParam(2, $this->tanggal);
		$stmt->bindParam(3, $this->ktp);
		$stmt->bindParam(4, $this->indentitas);
		$stmt->bindParam(5, $this->berlaku);
		$stmt->bindParam(6, $this->hari);
		$stmt->bindParam(7, $this->pukul);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_nameView." ORDER BY noSurat DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}

	function readBulan(){
		$query="SELECT
			  `suratjalan`.`noSurat`              AS `noSurat`,
			  `suratjalan`.`Tanggal`              AS `tanggal`,
			  `suratjalan`.`Hari`                 AS `Hari`,
			  `suratjalan`.`pukul`                AS `pukul`,
			  `suratjalan`.`KetIDentitsKendaraan` AS `KetIDentitsKendaraan`,

			   DAY(`suratjalan`.`Berlaku`)          AS `TanggalHingga`,
			   YEAR(`suratjalan`.`Berlaku`)          AS `TahunHingga`,
			   MONTH(`suratjalan`.`Berlaku`)          AS `BulanHingga`,

			  `masyarakat`.`Nktp`                 AS `Nktp`,
			  `masyarakat`.`alamat`               AS `alamat`,
			  `masyarakat`.`jenisKelamin`         AS `jenisKelamin`,
			  `masyarakat`.`Nama`                 AS `Nama`,
			  `masyarakat`.`no_hp`                AS `no_hp`,
			  `masyarakat`.`Npaspor`              AS `Npaspor`,
			  `masyarakat`.`pekerjaan`            AS `pekerjaan`,
			  `masyarakat`.`rsj`                  AS `rsj`,
			  `masyarakat`.`agama`                  AS `agama`,

			   DAY(`masyarakat`.`tanggallahir`)    AS `tanggallahir`,
			   YEAR(`masyarakat`.`tanggallahir`)    AS `tahun`,
			   MONTH(`masyarakat`.`tanggallahir`)    AS `bulan`,

			  `masyarakat`.`tempat`               AS `tempat`
			FROM (`suratjalan`
			   JOIN `masyarakat`
			     ON ((`suratjalan`.`Nktp` = `masyarakat`.`Nktp`))) WHERE 
			     YEAR(`suratjalan`.`Tanggal`)  =? AND
			     MONTH(`suratjalan`.`Tanggal`) =?";

			$stmt = $this->conn->prepare( $query );
			$stmt->bindParam(1, $this->tgpTahun);
			$stmt->bindParam(2, $this->tgpBulan);
			
			$stmt->execute();
			return $stmt;
			
	}
	function Countbulan(){
		$query="SELECT
			  `suratjalan`.`noSurat`              AS `noSurat`,
			  `suratjalan`.`Tanggal`              AS `tanggal`,
			  `suratjalan`.`Hari`                 AS `Hari`,
			  `suratjalan`.`pukul`                AS `pukul`,
			  `suratjalan`.`KetIDentitsKendaraan` AS `KetIDentitsKendaraan`,

			   DAY(`suratjalan`.`Berlaku`)          AS `TanggalHingga`,
			   YEAR(`suratjalan`.`Berlaku`)          AS `TahunHingga`,
			   MONTH(`suratjalan`.`Berlaku`)          AS `BulanHingga`,

			  `masyarakat`.`Nktp`                 AS `Nktp`,
			  `masyarakat`.`alamat`               AS `alamat`,
			  `masyarakat`.`jenisKelamin`         AS `jenisKelamin`,
			  `masyarakat`.`Nama`                 AS `Nama`,
			  `masyarakat`.`no_hp`                AS `no_hp`,
			  `masyarakat`.`Npaspor`              AS `Npaspor`,
			  `masyarakat`.`pekerjaan`            AS `pekerjaan`,
			  `masyarakat`.`rsj`                  AS `rsj`,
			  `masyarakat`.`agama`                  AS `agama`,

			   DAY(`masyarakat`.`tanggallahir`)    AS `tanggallahir`,
			   YEAR(`masyarakat`.`tanggallahir`)    AS `tahun`,
			   MONTH(`masyarakat`.`tanggallahir`)    AS `bulan`,

			  `masyarakat`.`tempat`               AS `tempat`
			FROM (`suratjalan`
			   JOIN `masyarakat`
			     ON ((`suratjalan`.`Nktp` = `masyarakat`.`Nktp`))) WHERE 
			     YEAR(`suratjalan`.`Tanggal`)  =? AND
			     MONTH(`suratjalan`.`Tanggal`) =?";

			$stmt = $this->conn->prepare( $query );

			$stmt->bindParam(1, $this->tgpTahun);
			$stmt->bindParam(2, $this->tgpBulan);
			
			$stmt->execute();
			return $stmt->rowCount();
	}
	
	function readOne(){
		
		$query = "SELECT
			  `suratjalan`.`noSurat`              AS `noSurat`,
			  `suratjalan`.`Tanggal`              AS `tanggal`,
			  `suratjalan`.`Hari`                 AS `Hari`,
			  `suratjalan`.`pukul`                AS `pukul`,
			  `suratjalan`.`KetIDentitsKendaraan` AS `KetIDentitsKendaraan`,

			   DAY(`suratjalan`.`Berlaku`)          AS `TanggalHingga`,
			   YEAR(`suratjalan`.`Berlaku`)          AS `TahunHingga`,
			   MONTH(`suratjalan`.`Berlaku`)          AS `BulanHingga`,

			  `masyarakat`.`Nktp`                 AS `Nktp`,
			  `masyarakat`.`alamat`               AS `alamat`,
			  `masyarakat`.`jenisKelamin`         AS `jenisKelamin`,
			  `masyarakat`.`Nama`                 AS `Nama`,
			  `masyarakat`.`no_hp`                AS `no_hp`,
			  `masyarakat`.`Npaspor`              AS `Npaspor`,
			  `masyarakat`.`pekerjaan`            AS `pekerjaan`,
			  `masyarakat`.`rsj`                  AS `rsj`,
			  `masyarakat`.`agama`                  AS `agama`,

			   DAY(`masyarakat`.`tanggallahir`)    AS `tanggallahir`,
			   YEAR(`masyarakat`.`tanggallahir`)    AS `tahun`,
			   MONTH(`masyarakat`.`tanggallahir`)    AS `bulan`,

			  `masyarakat`.`tempat`               AS `tempat`
			FROM (`suratjalan`
			   JOIN `masyarakat`
			     ON ((`suratjalan`.`Nktp` = `masyarakat`.`Nktp`))) where `suratjalan`.`noSurat` = ?";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->Nsjalan);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->Nsjalan = $row['noSurat'];
		$this->tanggal = $row['tanggal'];
		$this->ktp = $row['Nktp'];
		$this->indentitas = $row['KetIDentitsKendaraan'];		
		$this->hari = $row['Hari'];
		$this->pukul = $row['pukul'];

		$this->pasport = $row['Npaspor'];
		$this->rtj = $row['rsj'];
		$this->Nama = $row['Nama'];
		$this->tempat = $row['tempat'];
		$this->JK = $row['jenisKelamin'];
		$this->alamat = $row['alamat'];
		$this->Pekerjaan = $row['pekerjaan'];
		$this->noHp = $row['no_hp'];
		$this->agama = $row['agama'];

		$this->day = $row['tanggallahir'];
		$this->year = $row['tahun'];
		$this->mont = $row['bulan'];

		$this->dayINDHING = $row['TanggalHingga'];
		$this->yearINDHING = $row['TahunHingga'];
		$this->montINDHING = $row['BulanHingga'];
	}
	
	// update the product
	function update(){
		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					Tanggal =?,
					Nktp =?,
					KetIDentitsKendaraan =?,
					Berlaku =?,
					Hari =?,
					pukul =?
				WHERE
					noSurat =?
					";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->tanggal);
		$stmt->bindParam(2, $this->ktp);
		$stmt->bindParam(3, $this->indentitas);
		$stmt->bindParam(4, $this->berlaku);
		$stmt->bindParam(5, $this->hari);
		$stmt->bindParam(6, $this->pukul);
		$stmt->bindParam(7, $this->Nsjalan);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function readKode(){
		$query = "SELECT noSurat FROM ".$this->table_name." ORDER BY noSurat DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->Nsjalan = $row['noSurat'];
	}
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE noSurat = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->Nsjalan);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>