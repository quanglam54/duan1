<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelSanPham;
    public $modelDonHang;



    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelSanPham = new AdminSanPham();
        $this->modelDonHang = new AdminDonHang();
    }

    public function listTaiKhoanAdmin()
    {
        $listAdmin = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/taikhoan/admin/listAdmin.php';
    }

    public function formThemAdmin()
    {
        require_once './views/taikhoan/admin/addAdmin.php';
        deleteSession();
    }

    public function addAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            // Lưu dữ liệu đã nhập vào SESSION
            $_SESSION['old_data'] = array(
                'ho_ten' => $_POST['ho_ten'],
                'email' => $_POST['email'],
            );

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {

                // Đặt password mặc định
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                $chuc_vu_id = 1;

                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);

                header("Location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-admin');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-them-admin');
                exit();
            }
        }
    }

    public function editTrangThaiAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id_tai_khoan = $_GET['id_tai_khoan'];
            $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($id_tai_khoan);
            $status = $_GET['status'];

            if (isset($id_tai_khoan) && in_array($status, [1, 2])) {
                if ($status === '1') {
                    $this->modelTaiKhoan->updateStatus($id_tai_khoan, 1);
                    $_SESSION['mess'] = 'Cập nhật trạng thái thành công';
                }
                if ($status === '2') {
                    $this->modelTaiKhoan->updateStatus($id_tai_khoan, 2);
                    $_SESSION['mess'] = 'Cập nhật trạng thái thành công';
                }
            } else {
                $_SESSION['mess'] = 'Cập nhật trạng thái thất bại!';
            }
            // chuyển hướng
            if ($tai_khoan[0]['chuc_vu_id'] === 1) {
                header("Location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-admin');
                exit();
            } else {
                header("Location:" . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            }
        }
    }

    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_tai_khoan'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        // var_dump($tai_khoan);die();

        $password = password_hash('123@123ab', PASSWORD_BCRYPT);
        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        // var_dump($tai_khoan['chuc_vu_id']);die();

        if ($status && $tai_khoan['chuc_vu_id'] === 1) {
            $_SESSION['mess'] = 'Reset mật khẩu thành công';
            header("Location:" . '?act=list-tai-khoan-admin');
            exit();
        } else {
            $_SESSION['mess'] = 'Reset mật khẩu thất bại!';
        }


        if ($status && $tai_khoan['chuc_vu_id'] === 2) {
            $_SESSION['mess'] = 'Reset mật khẩu thành công';
            header("Location:" . '?act=list-tai-khoan-khach-hang');
            exit();
        } else {
            $_SESSION['mess'] = 'Reset mật khẩu thất bại!';
        }
    }

    public function listTaiKhoanKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function detailKhachHang()
    {
        $id_khach_hang = $_GET['id_tai_khoan'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }

    public function taiKhoanCaNhan()
    {
        require_once './views/taikhoan/canhan/editCaNhan.php';
    }

    // LOgin

    public function formLoginAdmin(){
        require_once './views/auth/formLogin.php';
        deleteSession();
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email,$password);
            // var_dump($user);die();
            if($user == $email){
                $_SESSION['user_admin'] = $user;
                header("Location:".BASE_URL_ADMIN);
                exit();
            }else{
                $_SESSION['errors'] = $user;
                $_SESSION['flash'] = true;
                header("Location:".BASE_URL_ADMIN.'?act=form-login-admin');
            }
        }
    }

}
