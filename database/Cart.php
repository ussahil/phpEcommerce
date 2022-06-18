<?php

class Cart
{
  public $db = null;

  public function __construct(DBController $db)
  //understand this
  {
    if(!isset($db->conn)){
      return null;
    }
    $this->db =$db;
  }

  //insert into cart table

  public function insertIntoCart($params = null,$table ='cart'){
     if($this->db->conn !=null){
      if($params != null){
        // get table columns
        $columns = implode(',',array_keys($params));
        $values = implode(',',array_values($params));
        
        
        //Create sql query
        $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)",$table,$columns,$values);

        $result = $this->db->conn->query($query_string);
        return $result;
     }
  }
}

 public function addToCart($userid,$itemid){
  if(isset($userid) && isset($itemid)){
    $params= array(
      "user_id"=>$userid,
      "item_id"=>$itemid
    );

    $result= $this->insertIntoCart($params);
    if($result){
      //reload page
      
    }
  }
 }
 //delete cart item
 public function deleteCart($item_id =null, $table ='cart'){
  if($item_id != null){
    $result = $this->db->conn->query("DELETE FROM {$table} WHERE item_id = {$item_id}");
    if($result){
      header('Location',$_SERVER['PHP_SELF']);
    }
    return $result;
  }
 } 
 //calculate sub total
 public function getSum($arr){
  if(isset($arr)){
    $sum = 0;
    foreach($arr as $item){
      $sum += ($item[0]);
     
    }
    //the structure is as follows an Array nested inside another array (nested one as only 1 element)
    return $sum;
    
  }
 }
 //get item id of shopping cart list
 public function getCartId($cartArray = null, $key = "item_id"){
  if ($cartArray != null){
    //array_map does not allow us to use variables outside its scope thats why we had to use this  
    $cart_id = array_map(function ($value) use($key){
          return $value[$key];
      }, $cartArray);
      return $cart_id;
  }
}
}

?>