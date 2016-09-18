<?php
class Anggota{ 
	
	private $conn;
	private $table_name = "anggotapolsek";
	
	public $nrp;
	public $nama;
	public $alamat;
	public $hp;
	public $jabatan;
	
	public function __construct($xx){
		$this->conn = $xx;
	}
	
	function insert(){
		$query = "insert into ".$this->table_name." values(?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nrp);
		$stmt->bindParam(2, $this->nama);
		$stmt->bindParam(3, $this->alamat);
		$stmt->bindParam(4, $this->hp);
		$stmt->bindParam(5, $this->jabatan);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY Nama_Anggota ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}
	function readAllCari(){

		$query = "SELECT * FROM ".$this->table_name." WHERE NRP like ?";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->NRP);
		$stmt->execute();
		return $stmt;
	}
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE NRP=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->NRP);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->nrp = $row['NRP'];
		$this->nama = $row['Nama_Anggota'];
		$this->alamat = $row['Alamat'];
		$this->hp = $row['no_HP'];
		$this->jabatan = $row['Jabatan'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					Nama_Anggota = :nama,
					Alamat = :alamat,
					no_HP = :hp,
					Jabatan = :jabatan
				WHERE
					NRP = :nrp";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nama', $this->nama);
		$stmt->bindParam(':alamat', $this->alamat);
		$stmt->bindParam(':hp', $this->hp);
		$stmt->bindParam(':jabatan', $this->jabatan);
		$stmt->bindParam(':nrp', $this->nrp);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE NRP = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nrp);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>