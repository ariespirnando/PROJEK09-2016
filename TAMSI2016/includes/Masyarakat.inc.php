<?php
class Masyarakat{ 
	
	private $conn;
	private $table_name = "masyarakat";
	
	public $ktp;
	public $pasport;
	public $rtj;
	public $Nama;
	public $tempat;
	public $tanggal;
	public $JK;
	public $alamat;
	public $Pekerjaan;
	public $noHp;
	public $agama;
	public $Kebangsaan;
	
	public $day;
	public $year;
	public $mont;
	public function __construct($xx){
		$this->conn = $xx;
	}

	function countOne(){
		$query = "SELECT * FROM ".$this->table_name." WHERE Nktp=?";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->ktp);
		$stmt->execute();
		return $stmt->rowCount();
	}
	
	function insert(){
		$query = "insert into ".$this->table_name." values(?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ktp);
		$stmt->bindParam(2, $this->pasport);
		$stmt->bindParam(3, $this->rtj);
		$stmt->bindParam(4, $this->Nama);
		$stmt->bindParam(5, $this->tempat);
		$stmt->bindParam(6, $this->tanggal);
		$stmt->bindParam(7, $this->JK);
		$stmt->bindParam(8, $this->alamat);
		$stmt->bindParam(9, $this->Pekerjaan);
		$stmt->bindParam(10, $this->no_HP);
		$stmt->bindParam(11, $this->agama);
		$stmt->bindParam(12, $this->Kebangsaan);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY Nama ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}
	function readOne(){
		
		$query = "SELECT Nktp,Npaspor,rsj,Nama,tempat, YEAR(tanggallahir) AS tahun, DAY(tanggallahir) AS tanggal, 
					MONTH(tanggallahir) AS bulan, jenisKelamin,alamat,pekerjaan,no_hp, agama, Kebangsaan
					FROM " . $this->table_name . " WHERE Nktp=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->ktp);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->ktp = $row['Nktp'];
		$this->pasport = $row['Npaspor'];
		$this->rtj = $row['rsj'];
	    $this->Nama = $row['Nama'];
		$this->tempat = $row['tempat'];
		$this->day = $row['tanggal'];
		$this->year = $row['tahun'];
		$this->mont = $row['bulan'];
		$this->JK = $row['jenisKelamin'];
		$this->alamat = $row['alamat'];
		$this->Pekerjaan = $row['pekerjaan'];
		$this->no_HP = $row['no_hp'];
		$this->agama = $row['agama'];
		$this->Kebangsaan = $row['Kebangsaan'];

	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					Npaspor =?,
					rsj =?,
					Nama =?,
					tempat =?,
					tanggallahir =?,
					jenisKelamin =?,
					alamat =?,
					pekerjaan =?,
					no_hp =?,
					agama =?,
					Kebangsaan =?
				WHERE
					Nktp =?
					";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->pasport);
		$stmt->bindParam(2, $this->rtj);
		$stmt->bindParam(3, $this->Nama);
		$stmt->bindParam(4, $this->tempat);
		$stmt->bindParam(5, $this->tanggal);
		$stmt->bindParam(6, $this->JK);
		$stmt->bindParam(7, $this->alamat);
		$stmt->bindParam(8, $this->Pekerjaan);
		$stmt->bindParam(9, $this->no_HP);
		$stmt->bindParam(10, $this->agama);
		$stmt->bindParam(11, $this->Kebangsaan);
		$stmt->bindParam(12, $this->ktp);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE Nktp =?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ktp);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>