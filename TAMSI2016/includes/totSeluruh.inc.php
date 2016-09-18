<?php 
class seluruh
{
	private $conn;
	
    public $tAwal;
    public $tAkhir;

    public function __construct($db){
		$this->conn = $db;
	}

	function countPengaduan(){
		$query = "SELECT * FROM pengaduan WHERE 
				DATE_FORMAT(tanggal,'%m-%Y') BETWEEN ? AND ?";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->tAwal);
		$stmt->bindParam(2, $this->tAkhir);
		$stmt->execute();
		return $stmt->rowCount();
	}
	function countSKCK(){
		$query = "SELECT * FROM skck WHERE 
				DATE_FORMAT(TanggalDikeluarkan,'%m-%Y') BETWEEN ? AND ?";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->tAwal);
		$stmt->bindParam(2, $this->tAkhir);
		$stmt->execute();
		return $stmt->rowCount();
	}
	function countSjalan(){
		$query = "SELECT * FROM suratjalan WHERE 
				DATE_FORMAT(Tanggal,'%m-%Y') BETWEEN ? AND ?";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->tAwal);
		$stmt->bindParam(2, $this->tAkhir);
		$stmt->execute();
		return $stmt->rowCount();
	}
	function countVisum(){
		$query = "SELECT * FROM visum WHERE 
				DATE_FORMAT(tanggal,'%m-%Y') BETWEEN ? AND ?";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->tAwal);
		$stmt->bindParam(2, $this->tAkhir);
		$stmt->execute();
		return $stmt->rowCount();
	}


}