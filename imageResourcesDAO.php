<?php

include'config/systemConfig.php';

class imageResources
{
    private $dbReference;
    var $dbConnect;
    var $result;
    var $image_id;
    function __construct(){

    }
    
    function __destruct(){
    
    }
    
    function getIDImage($id)
    {
        
        $this->image_id = $id;
        $this->dbReference = new systemConfig();  
        $this->dbConnect = $this->dbReference->connectDB();
        if($this->image_id==NULL)
        {
            return ;
        }
        else
        {
            if($this->dbConnect==NULL)
            {
                $this->dbReference->sendResponse(503,'{"error_message":'.$this->dbReference->getStatusCodeMeeage(503).'}');
            }
            else{
                
                //echo "TESTT:".$id;
                $sql = "select image_url from image where image_id=$id";
                $result = $this->dbConnect->query($sql);
                //echo "TEST:$sql"."/".json_encode($result->fetch_assoc());
                $this->dbReference->sendResponse(200,json_encode($result->fetch_assoc()));
                             
            }
        }
    }

    function getAllImageResource()
    {
        $this->dbReference = new systemConfig();
        //echo $this->dbReference."\n";
        $this->dbConnect = $this->dbReference->connectDB();
        //echo $this->dbConnect."\n";
        if($this->dbConnect==NULL)
        {
            $this->dbReference->sendResponse(503,'{"error_message":'.$this->dbReference->getStatusCodeMeeage(503).'}');
        }
        else{
            $sql = "Select * from image";
            // $number_per_page = $_POST["number_per_page"];
            // $page = ($_POST["page"]-1)*$number_per_page+1;
            // $page_next = $_POST["page"]*$number_per_page;
            // if($page!=NULL && $number_per_page!=NULL)
            // {
            //     $sql = "Select * from image where image_id BETWEEN $page AND $page_next";

            
            //}
            //else{
            //     echo "0 results";
            //     //return;
            // }
            $this->result = $this->dbConnect->query($sql);
            if($this->result->num_rows >0)
            {
                $resultSet = array();
                while($row = $this->result->fetch_assoc())
                {
                    $resultSet[] = $row;
                }
                $this->dbReference->sendResponse(200,json_encode($resultSet));
                
            }else{
                $this->dbReference->sendResponse(200,'{"items":null}');

            }
            

        }
    }
}

?>