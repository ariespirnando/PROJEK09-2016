<?php
class grafik{
	private $conn;
	private $table_name = "grafikpelayanan";

	public $puas;
	public $spuas;
	public $tpuas;
	public $stpuas; 

	public function __construct($xx){
		$this->conn = $xx;
	}
	function insert(){
		$query ="INSERT INTO ".$this->table_name." VALUES (NULL,?,?,?,?,CURRENT_TIMESTAMP)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->spuas);
		$stmt->bindParam(2, $this->puas);
		$stmt->bindParam(3, $this->tpuas);
		$stmt->bindParam(4, $this->stpuas);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function countSPuas(){
		$query = "SELECT SangatPuas FROM ".$this->table_name." WHERE SangatPuas=1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt->rowCount();
	}
	function countPuas(){
		$query = "SELECT SangatPuas FROM ".$this->table_name." WHERE Puas=1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt->rowCount();
	}
	function counttPuas(){
		$query = "SELECT SangatPuas FROM ".$this->table_name." WHERE kurangpuas=1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt->rowCount();
	}
	function countStPuas(){
		$query = "SELECT SangatPuas FROM ".$this->table_name." WHERE tidakpuas=1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt->rowCount();
	}
	function countall(){
		$query = "SELECT * FROM ".$this->table_name."";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt->rowCount();
	}
}
?>