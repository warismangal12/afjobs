<?php


class DBconnection
{



	private  $conn;
	private $servername = "localhost";
	private $username = "root";


	private $password ="";
	private $db ="afjobs";


	public function __construct(){

	}


	public function init(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db) or die(mysqli_erorr());
		$this->conn->set_charset('utf8');


		/*if ($this->conn == 1) {
                echo "databse connected";
            }*/

	}

	public function getconn(){

		if ($this->conn == null) {
			$this->init();
			return $this->conn;

		}
		else{
			return $this->conn;
		}
		return null;
	}
	
    public function commit()
    {
        if ($this->conn) {
            $this->conn->commit();
        }
    }

    public function rollback()
    {
        if ($this->conn) {
            $this->conn->rollback();
        }
    }



}

/*$exm1 = new DBconnection();
$exm1->init();*/

?>
