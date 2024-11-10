<?php
class UserModel
{
     public $conn;

     public function __construct()
     {
          $this->conn = connectDB();
     }
}

?>