<?php
class CartModel
{
     public $conn;

     public function __construct()
     {
          $this->conn = connectDB();
     }

     public function insertCart($user_product)
     {
          $sql = "INSERT INTO gio_hangs(tai_khoan_id) VALUE(:tai_khoan_id)";
          $stmt = $this->conn->prepare($sql);

          $stmt->execute([
               ':tai_khoan_id' => $user_product
          ]);
          $cart_id = $this->conn->lastInsertId();
          // var_dump($cart_id);
          // die;

          return $cart_id;


     }

     //
     public function insertDetailCart($cart_id, $san_pham_id, $so_luong)
     {
          $sql = "INSERT INTO chi_tiet_gio_hangs(gio_hang_id,san_pham_id,so_luong) VALUE(:gio_hang_id,:san_pham_id,:so_luong)";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':gio_hang_id' => $cart_id,
               ':san_pham_id' => $san_pham_id,
               ':so_luong' => $so_luong
          ]);

          return true;
     }
     //
     public function getViewCart()
     {
          $sql = "SELECT chi_tiet_gio_hangs.so_luong,san_phams.* FROM chi_tiet_gio_hangs INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id=san_phams.id";
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     //

     public function getIdCart($user_product)
     {
          $sql = "SELECT * FROM gio_hangs WHERE tai_khoan_id=" . $user_product;
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     //

     // public function getAllDetailCart($id_cart){
     //      $sql="SELECT * FROM chi_tiet_gio_hangs WHERE gio_hang_id";
     //      $stmt=$this->
     // }
}
?>