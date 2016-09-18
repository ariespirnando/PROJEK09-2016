<?php 
class Login
{
	private $conn;
	private $table_name = "v_pengguna";
	
    public $user;
    public $userid;
    public $passid;
    public $level;

    public function __construct($db){
		$this->conn = $db;
	}

    public function login()
    {
        $user = $this->checkCredentials();
        if ($user) {
            $this->user = $user;
			session_start();
            $_SESSION['Nama_Anggota'] = $user['Nama_Anggota'];
            $_SESSION['id_Pengguna'] = $user['id_Pengguna'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level'];
            return $user['Nama_Anggota'];
        }
        return false;
    }
    function cekUser(){
        $query = "SELECT * FROM ".$this->table_name." WHERE username= ? and password= ? and level = 'user'";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->userid);
        $stmt->bindParam(2, $this->passid);
        $stmt->execute();
        return $stmt->rowCount();
    }
    protected function checkCredentials()
    {
        $stmt = $this->conn->prepare('SELECT * FROM '.$this->table_name.' WHERE username= ? and password= ? ');
		$stmt->bindParam(1, $this->userid);
		$stmt->bindParam(2, $this->passid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $submitted_pass = $this->passid;
            if ($submitted_pass == $data['password']) {
                return $data;
            }
        }
        return false;
    }

    public function getUser()
    {
        return $this->user;
    }
}
?>
