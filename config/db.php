<?php

//connect by PDO

class db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "vusql";
    public $conn;
    
    public function connect()
    {
        //$this->conn = null;
        try {
            $conn = new PDO("mysql:host=localhost;dbname=vusql", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo "Kết nối thành công";
            
            //$query = "SELECT * FROM IMAGE ORDER BY image_id desc";
            //$stmt = $conn->prepare($query);
            //$stmt->execute();
            //print_r($stmt->fetchAll());
            //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //print_r($stmt->fetch());
            

            
          } catch(PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
          }
          return $this->conn;       
    }
    
}
?>