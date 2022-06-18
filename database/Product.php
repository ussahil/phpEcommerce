<?php
class Product
{
  public $db =null;

  public function __construct(DBController $db)
  {
    if(!isset($db->conn)){
      return null;

    }
    $this->db = $db; 
  } 
  //fetch data
  public function getData($table='product'){
    $result =$this->db->conn->query("SELECT * FROM ($table)  " );
    $resultArray =array();
    while ($item = mysqli_fetch_assoc($result)){
      $resultArray[]=$item;
    }
    return $resultArray;
  }
  //get product using item id

  public function getProduct($item_id= null,$table='product'){
    if(isset($item_id)){
      $result= $this->db->conn->query("SELECT * FROM {$table} WHERE item_id={$item_id}");

      $resultArray =array();
    while ($item = mysqli_fetch_assoc($result)){
      $resultArray[]=$item;
    }
    return $resultArray;
    }
  }
  // delete Cart
  public function deleteCart($item_id =null, $table ='product',$sql_col_name = 'item_id'){
    if($item_id != null){
      $result = $this->db->conn->query("DELETE FROM {$table} WHERE $sql_col_name = {$item_id}");
      if($result){
        header('Location',$_SERVER['PHP_SELF']);
      }
      return $result;
    }
   }

  
}

?>