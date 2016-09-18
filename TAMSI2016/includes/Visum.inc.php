<?php
class Visum{ 
	
	private $conn;
	private $table_name = "visum";
	private $table_nameView = "v_visum";

	public $noVisum;
	public $rumahsakit;
	public $tangalV;
	public $ktp;
	public $noLaporan;
	public $alamatrs;
	public $pidana;
		public $Nama;
		public $tempat;
		public $JK;
		public $alamat;
		public $Pekerjaan;
		public $lahir;
		public $agama;
	public $hari;
    public $tgp;
	public $jam;
	public function __construct($xx){
		$this->conn = $xx;
	}

		function readBulan(){
		$query="SELECT
			  `visum`.`no_visum`           AS `no_visum`,
			  `visum`.`rumahsakit`         AS `rumahsakit`,
			  `visum`.`alamat`             AS `alamat`,
			  `visum`.`tanggal`            AS `tanggal`,
			  `visum`.`no_laporan`         AS `no_laporan`,
			  `pengaduan`.`no_pengaduan`   AS `no_pengaduan`,
			  `pengaduan`.`Nktp`           AS `Nktp`,
			  `pengaduan`.`tindakpidanana` AS `tindakpidanana`,
			  `pengaduan`.`tanggal`        AS `tanggalpengaduan`,
			  `pengaduan`.`hari`           AS `hari`,
			  `pengaduan`.`pukul`          AS `jam`,
			  `masyarakat`.`Nama`          AS `Nama`,
			  `masyarakat`.`tempat`        AS `tempat`,
			  `masyarakat`.`tanggallahir`  AS `tanggallahir`,
			  `masyarakat`.`jenisKelamin`  AS `jenisKelamin`,
			  `masyarakat`.`alamat`        AS `alamat1`,
			  `masyarakat`.`pekerjaan`     AS `pekerjaan`,
			  `masyarakat`.`agama`         AS `agama`
			FROM (((`masyarakat`
			     JOIN `pengaduan`
			       ON ((`pengaduan`.`Nktp` = `masyarakat`.`Nktp`)))
			    JOIN `pelaporan`
			      ON ((`pelaporan`.`no_pengaduan` = `pengaduan`.`no_pengaduan`)))
			   JOIN `visum`
			     ON ((`visum`.`no_laporan` = `pelaporan`.`no_laporan`)))
			     WHERE
			YEAR(`visum`.`tanggal`) = ? AND
			MONTH(`visum`.`tanggal`) = ?
			";

			$stmt = $this->conn->prepare( $query );
			$stmt->bindParam(1, $this->tgpTahun);
			$stmt->bindParam(2, $this->tgpBulan);
			
			$stmt->execute();
			return $stmt;
			
	}
	function Countbulan(){
		$query="SELECT
				  `visum`.`no_visum`           AS `no_visum`,
				  `visum`.`rumahsakit`         AS `rumahsakit`,
				  `visum`.`alamat`             AS `alamat`,
				  `visum`.`tanggal`            AS `tanggal`,
				  `visum`.`no_laporan`         AS `no_laporan`,
				  `pengaduan`.`no_pengaduan`   AS `no_pengaduan`,
				  `pengaduan`.`Nktp`           AS `Nktp`,
				  `pengaduan`.`tindakpidanana` AS `tindakpidanana`,
				  `pengaduan`.`tanggal`        AS `tanggalpengaduan`,
				  `pengaduan`.`hari`           AS `hari`,
				  `pengaduan`.`pukul`          AS `jam`,
				  `masyarakat`.`Nama`          AS `Nama`,
				  `masyarakat`.`tempat`        AS `tempat`,
				  `masyarakat`.`tanggallahir`  AS `tanggallahir`,
				  `masyarakat`.`jenisKelamin`  AS `jenisKelamin`,
				  `masyarakat`.`alamat`        AS `alamat1`,
				  `masyarakat`.`pekerjaan`     AS `pekerjaan`,
				  `masyarakat`.`agama`         AS `agama`
				FROM (((`masyarakat`
				     JOIN `pengaduan`
				       ON ((`pengaduan`.`Nktp` = `masyarakat`.`Nktp`)))
				    JOIN `pelaporan`
				      ON ((`pelaporan`.`no_pengaduan` = `pengaduan`.`no_pengaduan`)))
				   JOIN `visum`
				     ON ((`visum`.`no_laporan` = `pelaporan`.`no_laporan`)))
				     WHERE
				YEAR(`visum`.`tanggal`) = ? AND
				MONTH(`visum`.`tanggal`) = ?
				";

			$stmt = $this->conn->prepare( $query );

			$stmt->bindParam(1, $this->tgpTahun);
			$stmt->bindParam(2, $this->tgpBulan);
			
			$stmt->execute();
			return $stmt->rowCount();
	}

	function readOne(){
		
		$query = "SELECT
				  `visum`.`no_visum`           AS `no_visum`,
				  `visum`.`rumahsakit`         AS `rumahsakit`,
				  `visum`.`alamat`             AS `alamat`,
				  `visum`.`tanggal`            AS `tanggal`,
				  `visum`.`no_laporan`         AS `no_laporan`,
				  `pengaduan`.`no_pengaduan`   AS `no_pengaduan`,
				  `pengaduan`.`Nktp`           AS `Nktp`,
				  `pengaduan`.`tindakpidanana` AS `tindakpidanana`,

				  `pengaduan`.`tanggal`         AS `tanggalpengaduan`,
				  `pengaduan`.`hari`            AS `hari`,
				  `pengaduan`.`pukul`           AS `jam`,
				  `masyarakat`.`Nama`          AS `Nama`,
				  `masyarakat`.`tempat`        AS `tempat`,
				  `masyarakat`.`tanggallahir`  AS `tanggallahir`,
				  `masyarakat`.`jenisKelamin`  AS `jenisKelamin`,
				  `masyarakat`.`alamat`        AS `alamat1`,
				  `masyarakat`.`pekerjaan`     AS `pekerjaan`,
				  `masyarakat`.`agama`         AS `agama`
				FROM (((`masyarakat`
				     JOIN `pengaduan`
				       ON ((`pengaduan`.`Nktp` = `masyarakat`.`Nktp`)))
				    JOIN `pelaporan`
				      ON ((`pelaporan`.`no_pengaduan` = `pengaduan`.`no_pengaduan`)))
				   JOIN `visum`
				     ON ((`visum`.`no_laporan` = `pelaporan`.`no_laporan`))) where no_visum = ?";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->noVisum);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->noVisum = $row['no_visum'];
		$this->rumahsakit = $row['rumahsakit'];
		$this->alamatrs = $row['alamat'];
		$this->noLaporan = $row['no_laporan'];	
		$this->pidana = $row['tindakpidanana'];		
		$this->agama = $row['agama'];
		$this->ktp = $row['Nktp'];
		$this->Nama = $row['Nama'];
		$this->tempat = $row['tempat'];
		$this->JK = $row['jenisKelamin'];
		$this->alamat = $row['alamat1'];
		$this->Pekerjaan = $row['pekerjaan'];
		$this->lahir = $row['tanggallahir'];
		$this->tangalV = $row['tanggal'];
		$this->tgp = $row['tanggalpengaduan'];
		$this->hari = $row['hari'];
		$this->jam = $row['jam'];
		
		
		}
	function insert(){
		$query = "insert into ".$this->table_name." values(?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->noVisum);
		$stmt->bindParam(2, $this->rumahsakit);
		$stmt->bindParam(3, $this->alamatrs);
		$stmt->bindParam(4, $this->tangalV);
		$stmt->bindParam(5, $this->noLaporan);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	function readKode(){
		$query = "SELECT no_visum FROM ".$this->table_name." ORDER BY no_visum DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->noVisum = $row['no_visum'];
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_nameView." ORDER BY no_visum DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					rumahsakit = ?,
					alamat = ?,
					tanggal = ?,
					no_laporan = ?
				WHERE
					no_visum = ?";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->rumahsakit);
		$stmt->bindParam(2, $this->alamatrs);
		$stmt->bindParam(3, $this->tangalV);
		$stmt->bindParam(4, $this->noLaporan);
		$stmt->bindParam(5, $this->noVisum);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE no_visum = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->noVisum);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>