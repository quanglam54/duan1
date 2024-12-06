<?php
class ClientDanhmucModel
{
     public $conn;

     public function __construct()
     {
          $this->conn = connectDB();
     }
     public function getAllDanhMuc()
     {
          $sql = 'SELECT * FROM danh_mucs';
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
}
?>