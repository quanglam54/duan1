<?php
class AdminTaiKhoan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTaiKhoan($chuc_vu_id){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':chuc_vu_id' => $chuc_vu_id
            ]);
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function insertTaiKhoan($ho_ten,$email,$password,$chuc_vu_id){
        try{
            $sql = "INSERT INTO tai_khoans(ho_ten,email,mat_khau,chuc_vu_id) VALUES (:ho_ten,:email,:password,:chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':password' => $password,
                ':chuc_vu_id' => $chuc_vu_id
            ]);
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function updateStatus($id,$trang_thai){
        try{
            $sql = "UPDATE tai_khoans SET trang_thai = :trang_thai WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([

                ':id' => $id,
                ':trang_thai' => $trang_thai

            ]);
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function getDetailTaiKhoan($id){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function resetPassword($id,$mat_khau){
        try{
            $sql = "UPDATE tai_khoans SET mat_khau = :mat_khau WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([

                ':id' => $id,
                ':mat_khau' => $mat_khau

            ]);
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function checkLogin($email,$mat_khau){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            $user = $stmt->fetch();
            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 1) { // ADMIN
                    if ($user['trang_thai'] == 1) {
                        return $user['email']; // thành công
                    } else {
                        return "Tài khoản bị cấm";
                    }
                } elseif ($user['chuc_vu_id'] == 2) { // KHACH HANG
                    return "Tài khoản không có quyền đăng nhập admin";
                }
            } 
            return 'Vui lòng kiểm tra lại thông tin đăng nhập';
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function getTaiKhoanFromEmail($email){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function updateThongTinTaiKhoanAdmin($id,$ho_ten,$email,$so_dien_thoai,$dia_chi){
        try{
            $sql = "UPDATE tai_khoans 
            SET ho_ten = :ho_ten, email = :email, so_dien_thoai = :so_dien_thoai, dia_chi = :dia_chi
             WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':dia_chi' => $dia_chi,
                ':id' => $id,

            ]);
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function updateAnhDaiDienAdmin($id,$anh_dai_dien){
        try{
            $sql = "UPDATE tai_khoans 
            SET anh_dai_dien = :anh_dai_dien
             WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':anh_dai_dien' => $anh_dai_dien,    
                ':id' => $id

            ]);
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    


    
}
