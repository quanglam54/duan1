<?php
class AdminDonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getDonHangFromKhachHang($id){
        try{
            $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            WHERE don_hangs.tai_khoan_id= :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();


        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function getAllDonHang(){
        try{
            $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai FROM don_hangs 
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function getDetailDonHang($id){
        try{
            $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai,
            tai_khoans.ho_ten, tai_khoans.email, tai_khoans.so_dien_thoai,
            phuong_thuc_thanh_toans.ten_phuong_thuc
            FROM don_hangs 
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id
            INNER JOIN tai_khoans ON don_hangs.tai_khoan_id = tai_khoans.id
            INNER JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toans.id
            WHERE don_hangs.id = :id;
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' =>$id
            ]);
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    public function getListSanPhamDonHang($id){
        try{
            $sql = "SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham FROM chi_tiet_don_hangs
            INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_don_hangs.don_hang_id = :id";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' =>$id
            ]);
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    public function getAllTrangThaiDonHang(){
        try{
            $sql = "SELECT * FROM trang_thai_don_hangs";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    public function updateDonHang($id,$ten_nguoi_nhan,$sdt_nguoi_nhan,$email_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id){
        try{
            $sql = "UPDATE don_hangs SET ten_nguoi_nhan = :ten_nguoi_nhan, sdt_nguoi_nhan = :sdt_nguoi_nhan, email_nguoi_nhan = :email_nguoi_nhan, dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan, ghi_chu = :ghi_chu, trang_thai_id = :trang_thai_id WHERE id=:id";
        
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':trang_thai_id' => $trang_thai_id,
                ':id' => $id
            ]);
            return true;
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    // Thống kê số đơn hàng mới
    public function countNewDonHang(){
        try{
            $sql = "SELECT COUNT(*) as count FROM don_hangs WHERE trang_thai_id = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Sử dụng PDO::FETCH_ASSOC để lấy kết quả dưới dạng mảng liên kết
            return $result['count']; // Trả về giá trị của 'count'
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    // Doanh thu
    public function doanhThu(){
        try{
            $sql = "SELECT SUM(thanh_tien) as total FROM chi_tiet_don_hangs
            INNER JOIN don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Sử dụng PDO::FETCH_ASSOC để lấy kết quả dưới dạng mảng liên kết
            return $result['total']; // Trả về giá trị của 'total'
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    // Thống kê số lượng sản phẩm bán ra
    public function countProductSold(){
        try{
            $sql = "SELECT SUM(so_luong) as total_product FROM chi_tiet_don_hangs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Sử dụng PDO::FETCH_ASSOC để lấy kết quả dưới dạng mảng liên kết
            return $result['total_product']; // Trả về giá trị của 'total'
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

  
}
