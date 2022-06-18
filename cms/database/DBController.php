<?php

class DBController
{
  //Protected properties
  protected $SERVER ='localhost';
  protected $USER='root';
  protected $PASSWORD='';
  protected $DB='ecommerce';


  public $conn=null;
//call constructore\
  public function __construct(){
    $this->conn = mysqli_connect($this->SERVER,$this->USER,$this->PASSWORD,$this->DB);
    if($this->conn->connect_error){
      echo "Fail" . $this->conn->connect_error;
    }
    
  }
  public function __destruct()
  {
    $this->closeConnection();    
  }
  //for closing function

  protected function closeConnection(){
    if($this->conn!=null){
      $this->conn->close();
      $this->conn=null;
    }
  }

}
// DBController object


?>