<?php
class ClientSanphamModel
{
     public $conn;

     public function __construct()
     {
          $this->conn = connectDB();
     }

     public function getSanPhamBestSeller()
     {
          $sql = 'SELECT * FROM san_phams WHERE luot_xem>15';
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     public function getAllSanPham()
     {
          $sql = 'SELECT * FROM san_phams LIMIT 8';
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     // mượn model danh mục
     public function getAllDanhMuc()
     {
          $sql = 'SELECT * FROM danh_mucs';
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     //
     public function getSanPhamNew()
     {
          $sql = 'SELECT * FROM san_phams WHERE id order by id desc limit 6';
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     //
     public function getCategoryId($category_id)
     {
          $category_id = (int) $category_id;
          $sql = 'SELECT * FROM san_phams where danh_muc_id=' . $category_id;
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     //
     public function getSanPhamById($product_id)
     {
          $sql = 'SELECT * FROM san_phams WHERE id=' . $product_id;
          $stmt = $this->conn->query($sql);
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }
}
?>