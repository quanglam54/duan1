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
     public function getCartItemById($cartId)
     {
          $sql = "SELECT chi_tiet_gio_hangs.so_luong, san_phams.gia_san_pham, san_phams.id AS san_pham_id
            FROM chi_tiet_gio_hangs
            INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_gio_hangs.id = :cartId";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':cartId' => $cartId]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
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
     public function getViewCart($user_product)
     {
          $sql = "SELECT chi_tiet_gio_hangs.so_luong, chi_tiet_gio_hangs.id, san_phams.ten_san_pham, san_phams.gia_san_pham, san_phams.hinh_anh
                  FROM chi_tiet_gio_hangs
                  INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
                  INNER JOIN gio_hangs ON chi_tiet_gio_hangs.gio_hang_id = gio_hangs.id
                  WHERE gio_hangs.tai_khoan_id = :user_product";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([':user_product' => $user_product]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }


     //

     public function getIdCart($user_product)
     {
          $sql = "SELECT * FROM gio_hangs WHERE tai_khoan_id =" . $user_product;
          // lấy tt gio hang theo tkid=id ng dùng đăng nhập
          $stmt = $this->conn->query($sql);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }


     public function checkProductCart($id_cart, $san_pham_id)
     {
          $sql = "SELECT * FROM chi_tiet_gio_hangs WHERE gio_hang_id=:gio_hang_id AND san_pham_id=:san_pham_id";
          // kiểm tra xem trong chi tiêt cart có ghid và spid = kh
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':gio_hang_id' => $id_cart,
               ':san_pham_id' => $san_pham_id
          ]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }

     public function updateCartQuantity($id_cart, $san_pham_id, $so_luong)
     {
          $sql = "UPDATE chi_tiet_gio_hangs SET so_luong=so_luong + :so_luong WHERE gio_hang_id=:gio_hang_id AND san_pham_id=:san_pham_id";
          $stmt = $this->conn->prepare($sql);

          $stmt->execute([
               ':gio_hang_id' => $id_cart,
               ':san_pham_id' => $san_pham_id,
               ':so_luong' => $so_luong,

          ]);
          return true;
     }
     //



     public function getCartTotal($user_product)
     {
          $sql = "SELECT SUM(chi_tiet_gio_hangs.so_luong * san_phams.gia_san_pham) AS total FROM chi_tiet_gio_hangs INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id=san_phams.id
          INNER JOIN gio_hangs ON chi_tiet_gio_hangs.gio_hang_id=gio_hangs.id WHERE gio_hangs.tai_khoan_id=:user_product";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':user_product' => $user_product
          ]);
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          return $result['total'];
     }
     //
     public function getCartItem($user_id)
     {
          $sql = "SELECT chi_tiet_gio_hangs.so_luong,chi_tiet_gio_hangs.san_pham_id,san_phams.ten_san_pham,san_phams.gia_san_pham,san_phams.hinh_anh
          FROM chi_tiet_gio_hangs INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id=san_phams.id INNER JOIN gio_hangs ON chi_tiet_gio_hangs.gio_hang_id=gio_hangs.id WHERE gio_hangs.tai_khoan_id=:user_id";

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':user_id' => $user_id
          ]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function insertOrder($user_id, $ma_don_hang, $name, $phone, $email, $address, $date, $totalAmount, $description)
     {
          $sql = "INSERT INTO don_hangs(tai_khoan_id, ma_don_hang, ten_nguoi_nhan,email_nguoi_nhan,sdt_nguoi_nhan,dia_chi_nguoi_nhan,ngay_dat,tong_tien,ghi_chu) VALUE(:user_id, :ma_don_hang, :ho_ten,:email,:phone,:address,:date,:total,:mo_ta)";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':user_id' => $user_id,
               ':ma_don_hang' => $ma_don_hang,
               ':ho_ten' => $name,
               ':phone' => $phone,
               ':email' => $email,
               ':address' => $address,
               ':date' => $date,
               ':total' => $totalAmount,
               ':mo_ta' => $description,
          ]);
          return $this->conn->lastInsertId();
          // lấy về id của người vừa thêm vào bảng đơn hàng
     }
     //


     public function deleteItem($itemId)
     {
          $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id=:item_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':item_id' => $itemId
          ]);
     }

     //
     public function updateProductQuantity($cartId, $newQuantity)
     {
          // Truy vấn SQL để cập nhật số lượng
          $sql = "UPDATE chi_tiet_gio_hangs 
                 SET so_luong = :newQuantity 
                 WHERE id = :cartId";

          $stmt = $this->conn->prepare($sql); // Chuẩn bị truy vấn
          $stmt->bindParam(':newQuantity', $newQuantity, PDO::PARAM_INT); // Bind số lượng
          $stmt->bindParam(':cartId', $cartId, PDO::PARAM_INT); // Bind cartId

          // Thực thi truy vấn và trả về kết quả
          return $stmt->execute();
     }

     //
     public function insertOrderDetail(
          $order_id,
          $san_pham_id,
          $price,
          $quantity,
          $subtotal
     ) {
          $sql = "INSERT INTO chi_tiet_don_hangs(don_hang_id,san_pham_id,don_gia,so_luong,thanh_tien) VALUES(:order_id,:san_pham_id,:don_gia,:so_luong,:thanh_tien)";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':order_id' => $order_id,
               ':san_pham_id' => $san_pham_id,
               ':don_gia' => $price,
               ':so_luong' => $quantity,
               ':thanh_tien' => $subtotal
          ]);
          return true;
     }

     //
     public function getOrderDetail($tai_khoan_id)
     {
          $sql = "SELECT chi_tiet_don_hangs.*,don_hangs.ten_nguoi_nhan,don_hangs.email_nguoi_nhan,don_hangs.sdt_nguoi_nhan,don_hangs.dia_chi_nguoi_nhan,don_hangs.ngay_dat,san_phams.ten_san_pham,san_phams.hinh_anh FROM chi_tiet_don_hangs INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id=don_hangs.id INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id=san_phams.id WHERE tai_khoan_id = :tai_khoan_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':tai_khoan_id' => $tai_khoan_id
          ]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     //
     public function getOrderById($order_id)
     {
          $sql = "SELECT * FROM don_hangs WHERE id=:order_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':order_id' => $order_id
          ]);
          return $stmt->fetch(PDO::FETCH_ASSOC);
     }
     //
     public function getOrderDetails($order_id)
     {
          $sql = "SELECT chi_tiet_don_hangs.*,don_hangs.ten_nguoi_nhan,don_hangs.ma_don_hang,don_hangs.email_nguoi_nhan,don_hangs.sdt_nguoi_nhan,don_hangs.dia_chi_nguoi_nhan,don_hangs.ngay_dat,san_phams.ten_san_pham,san_phams.hinh_anh FROM chi_tiet_don_hangs INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id=don_hangs.id INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id=san_phams.id WHERE chi_tiet_don_hangs.don_hang_id=:don_hang_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':don_hang_id' => $order_id
          ]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
     public function getOrderCartUser($user_product)
     {
          $sql = "SELECT * FROM don_hangs WHERE tai_khoan_id=:tai_khoan_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':tai_khoan_id' => $user_product
          ]);
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function deleteDetailCart($gioHangId)
     {
          $sql = "DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id=:gio_hang_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':gio_hang_id' => $gioHangId
          ]);
          return true;
     }
     public function deleteCart($user_id)
     {
          $sql = "DELETE FROM gio_hangs WHERE tai_khoan_id=:tai_khoan_id";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':tai_khoan_id' => $user_id
          ]);
          return true;
     }

}
?>