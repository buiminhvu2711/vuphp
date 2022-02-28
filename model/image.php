<?php

class Image
{
    private $conn;

    //properties
    public $image_id;
    public $image_url;

    //connect db. hàm này là mặc định trả về của class Image
    public function __construct($db)
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=vusql", 'root', '');
           //echo 'a message saying we have connected';
       
          }
           catch(PDOException $e)
               {
                   echo $e->getMessage();
              } 

        //$this->conn = $db;
    }


    public function read()
    {

        

        $query = "select * from image";

        $stmt = $this->conn->prepare($query);
             

        $stmt->execute();

        return $stmt;

    }
    public function read_id()
    {
        $query = "select * from image where image_id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->image_id); //số lượng parameter và parameter
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->image_id = $row['image_id'];
        $this->image_url = $row['image_url'];


        return $stmt;

    }

}

?>