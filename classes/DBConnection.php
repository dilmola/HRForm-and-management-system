<?php
class DBConnection{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "hrform";
    
    
    public $conn;
    
    public function __construct(){

        if (!isset($this->conn)) {
            
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->conn) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
    }
    public function __destruct(){
        $this->conn->close();
    }
}
?>


<?php
$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error($conn));
mysqli_select_db($conn, "hrform") or die(mysqli_error($conn));
?>