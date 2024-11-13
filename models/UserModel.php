<?php
class UserModel
{
     public $conn;

     public function __construct()
     {
          $this->conn = connectDB();
     }

     public function countEmail($email)
     {
          $sql = 'SELECT COUNT(*) FROM tai_khoans WHERE email = :email';

          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':email' => $email
          ]);
          return $stmt->fetchColumn() > 0; // sẽ ktra trong db có email nào kh nếu có là >0 là trùng
          // hàm count sẽ đếm bảng kia xem email khớp kh
     }
     public function insertUser($username, $email, $password, $role)
     {
          $sql = "INSERT INTO tai_khoans(ho_ten,email,mat_khau,chuc_vu_id) VALUE(:username,:email,:password,:role)";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':username' => $username,
               ':email' => $email,
               ':password' => $password,
               'role' => $role
          ]);
          return true;
     }

     public function loginUser($email, $password)
     {
          $sql = "SELECT * FROM tai_khoans WHERE email= :email";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               'email' => $email
          ]);
          $user = $stmt->fetch(PDO::FETCH_ASSOC);

          if ($user && $password == $user['mat_khau']) {
               if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                         return [
                              'ho_ten' => $user['ho_ten'],
                              'email' => $user['email'],
                              'id' => $user['id']
                         ]; // trả về thông tin
                    } else {
                         return "Tài khoản bị cấm";
                    }
               }
          } elseif ($user && password_verify($password, $user['mat_khau'])) {
               if ($user['chuc_vu_id'] == 1) {
                    return 'tài khoản bạn không có chức năng đăng nhập khách hàng';
               }
          } else {
               return 'Vui lòng kiểm tra thông tin đăng nhập';
          }
     }

     public function getUserName($email)
     {
          $sql = "SELECT * FROM tai_khoans WHERE email= :email";
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               'email' => $email
          ]);
          return $stmt->fetch();
     }


     public function getTaiKhoanFromEmail($email)
     {
          $sql = 'SELECT * FROM tai_khoans WHERE email=:email';
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
               ':email' => $email
          ]);
          return $stmt->fetch();
     }
}

?>