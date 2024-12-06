<?php
class AdminDonHangController
{
    public $modelTaiKhoan;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
    }

    public function listDonHang()
    {
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/listDonHang.php';
    }

    public function detailDonHang(){
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);

        $don_hang_id = $_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
        $sanPhamDonHang = $this->modelDonHang->getListSanPhamDonHang($don_hang_id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        require_once './views/donhang/detailDonHang.php';
        
    }

    public function formEditDonHang(){
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);

        $id=$_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
        if(isset($donHang)){
            require_once './views/donhang/editDonHang.php';
            deleteSession();
        }else{
            header("Location:".BASE_URL_ADMIN.'?act=don-hang');
            exit();
        }
    }

    public function editDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $don_hang_id = $_POST['don_hang_id'];
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';


            $errors = [];
            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
            }

            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại người nhận không được để trống';
            } elseif (!is_numeric($sdt_nguoi_nhan) || strlen($sdt_nguoi_nhan) < 10) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại phải có ít nhất 10 chữ số';
            }

            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ người nhận không được để trống';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email người nhận không được để trống';
            }

            $_SESSION['errors'] = $errors;
            if (empty($errors)) {
                $this->modelDonHang->updateDonHang($don_hang_id,$ten_nguoi_nhan,$sdt_nguoi_nhan,$email_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id);
                // var_dump($status);die();
                header("Location:" . BASE_URL_ADMIN . '?act=don-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang='.$don_hang_id );
                exit();
            }
        }
    }








}
