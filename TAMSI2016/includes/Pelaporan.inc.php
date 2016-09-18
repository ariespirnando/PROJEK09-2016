<?php
class Pelaporan{ 
	
	private $conn;
	private $table_name = "pelaporan";
	
	
	public $nopengaduan;
	public $nolaporan;
	public function __construct($xx){
		$this->conn = $xx;
	}
	
	function insert(){
		$query = "insert into ".$this->table_name." values(?,?)";
		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->nolaporan);
		$stmt->bindParam(2, $this->nopengaduan);
		
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function countOne(){
		$query = "SELECT * FROM ".$this->table_name." WHERE no_laporan=?";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->nolaporan);
		$stmt->execute();
		return $stmt->rowCount();
	}
	
}
?>