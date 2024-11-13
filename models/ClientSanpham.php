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
     //
     // public function getSanPhamOtherId($product_id)
     // {
     //      $sql = 'SELECT * FROM san_phams where id <>' . $product_id;
     //      $stmt = $this->conn->query($sql);
     //      return $stmt->fetchAll(PDO::FETCH_ASSOC);
     // }
     public function getSanPhamOtherId($product_id, $cate_id)
     {
          $sql = 'SELECT * FROM san_phams WHERE id <> :product_id AND danh_muc_id=:cate_id';
          // truy vấn các sản phẩm khác id kh dc trùng
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
          $stmt->bindParam(':cate_id', $cate_id, PDO::PARAM_INT);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function inSertCmt($product_id, $user_id, $comment)
     {
          $sql = "INSERT INTO binh_luans(san_pham_id,tai_khoan_id,noi_dung) VALUE(:san_pham_id,:tai_khoan_id,:noi_dung)";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':san_pham_id' => $product_id,
               ':tai_khoan_id' => $user_id,
               'noi_dung' => $comment
          ]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function getCommentById($product_id)
     {
          $sql = "SELECT binh_luans.*, tai_khoans.ho_ten FROM binh_luans INNER JOIN tai_khoans ON tai_khoans.id=binh_luans.tai_khoan_id WHERE san_pham_id='$product_id' ORDER BY ngay_dang DESC ";
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }


}
?>