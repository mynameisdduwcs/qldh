<?php

class Databases{
   public $table; //Tên bảng
   private $conn;

   function __construct()
   {
      $this ->conn = mysqli_connect('localhost:3306','root','') or die('Lỗi kết nối!');
      mysqli_select_db($this->conn,'qldh') or die ('Lỗi CSDL');

   }

   function __destruct()
   {
      mysqli_close($this->conn);
   }

   public function insert($fields, $value){
      $str_fields = implode(', ', $fields);
      $str_values = implode(" ', '", $value);
      $str_values = " ' ".$str_values. "'";

      $sql = " INSERT INTO {$this->table} ($str_fields) values ($str_values) ";

      mysqli_query($this->conn,$sql) or die('Truy vấn lỗi vl!');

      $id = mysqli_insert_id($this->conn);
      return $id; // Trả lại id của giá trị thêm vào
   }

   public function update ($id, $fields, $values){

      $len = Count($fields); //3

      $tmp_arr = array();
      for ($i=0; $i<$len; $i++){
         $tmp_arr[]= $fields[$i]." = "."'{$values[$i]}'";
      }
      $str = implode(', ', $tmp_arr);

      $sql = "UPDATE {$this->table} set $str WHERE id = $id";

      mysqli_query($this->conn,$sql) or die ('Lỗi truy vấn');
      
   }

   public function detete($id){

      mysqli_query($this->conn,"DELETE FROM {$this->table} WHERE id = $id");
   }

   public function getOne($id){
      $sql= "SELECT * FROM {$this->table} WHERE id=$id";
      $rows = mysqli_query($this->conn,$sql) or die('Lỗi Truy Vấn!');
      $row = mysqli_fetch_array($rows);

      return $row;
   }

   public function getAll(){
      $sql= "SELECT * FROM {$this->table} ";

      $rows = mysqli_query($this->conn,$sql) or die('Lỗi Truy Vấn!');

      return $rows;
   }

   public function Search($condition = 'id = 0'){
      $sql = "SELECT 8 FROM {$this->table} WHERE  $condition";
      $rows = mysqli_query($this->conn,$sql) or die('Lỗi Truy Vấn!');

      return $rows;
   }

   public function  query($sql){

      $rows = mysqli_query($this->conn,$sql) or die('Lỗi Truy Vấn!');

      return $rows;
   }

}

?>