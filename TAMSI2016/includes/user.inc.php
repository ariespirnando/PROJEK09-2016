<?php
class User{
	
	private $conn;
	private $table_name = "pengguna";
	private $table_nameView = "v_pengguna"; 


	public $id_Pengguna;
	public $nrp;
	public $username;
	public $password;
	public $level;
	public $namaAnggota;

	public function __construct($db){
		$this->conn = $db;
	}
	function update(){
		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nrp =?,
					username =?,
					password =?,
					level =?
				WHERE
					id_Pengguna =?
					";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->nrp);
		$stmt->bindParam(2, $this->username);
		$stmt->bindParam(3, $this->password);
		$stmt->bindParam(4, $this->level);
		$stmt->bindParam(5, $this->id_Pengguna);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function insert(){
		$query = "insert into ".$this->table_name." values(null,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nrp);
		$stmt->bindParam(2, $this->username);
		$stmt->bindParam(3, $this->password);
		$stmt->bindParam(4, $this->level);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_nameView . " WHERE id_Pengguna=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id_Pengguna);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id_Pengguna = $row['id_Pengguna'];
		$this->nrp = $row['nrp'];
		$this->username = $row['username'];
		$this->password = $row['password'];
		$this->level = $row['level'];
		$this->namaAnggota =  $row['Nama_Anggota'];
	}

	function readAll(){

		$query = "SELECT * FROM ".$this->table_nameView." ORDER BY id_Pengguna ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		return $stmt;
	}
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_Pengguna = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_Pengguna);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>
