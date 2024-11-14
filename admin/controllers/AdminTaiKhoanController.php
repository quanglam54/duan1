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
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);

        $listAdmin = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/taikhoan/admin/listAdmin.php';
    }

    public function formThemAdmin()
    {
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);

        require_once './views/taikhoan/admin/addAdmin.php';
        deleteSession();
    }

    public function addAdmin()
    {
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
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
                // $password = password_hash('123@123ab', PASSWORD_BCRYPT);

                $password = '123456';
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

        // $password = password_hash('123@123ab', PASSWORD_BCRYPT);
        $password = '123456';
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
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function detailKhachHang()
    {
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
        $id_khach_hang = $_GET['id_tai_khoan'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        require_once './views/taikhoan/khachhang/detailKhachHang.php';
    }


    // LOgin

    public function formLoginAdmin()
    {
        require_once './views/auth/formLogin.php';
        deleteSession();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            // var_dump($user);die();
            if ($user == $email) {
                $_SESSION['user_admin'] = $user;
                header("Location:" . BASE_URL_ADMIN);
                exit();
            } else {
                $_SESSION['errors'] = $user;
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-login-admin');
            }
        }
    }

    public function formSuaTaiKhoanCaNhan()
    {
        $email = $_SESSION['user_admin'];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
        require_once './views/taikhoan/canhan/editCaNhan.php';
    }

    public function editThongTinTaiKhoanAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $ho_ten = $_POST['ho_ten'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $email = $_POST['email'] ?? '';


            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }

            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            } elseif (!is_numeric($so_dien_thoai) || strlen($so_dien_thoai) < 10) {
                $errors['so_dien_thoai'] = 'Số điện thoại phải có ít nhất 10 chữ số';
            }

            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            $_SESSION['errors'] = $errors;
            if (empty($errors)) {
                $status = $this->modelTaiKhoan->updateThongTinTaiKhoanAdmin($tai_khoan_id, $ho_ten, $email, $so_dien_thoai, $dia_chi);
                // var_dump($status);die();

                if ($status) {
                    $_SESSION['mess'] = 'Sửa thông tin thành công';
                    $_SESSION['flash'] = true;
                }
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-ca-nhan-admin');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-ca-nhan-admin');
                exit();
            }
        }
    }


    public function editMatKhauAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'] ?? '';
            $new_pass = $_POST['new_pass'] ?? '';
            $confirm_pass = $_POST['confirm_pass'] ?? '';

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);

            // $checkPass = password_verify($old_pass, $user['mat_khau']);
            // var_dump($user['mat_khau']);die();

            if (empty($old_pass)) {
                $errors['old_pass'] = 'Mật khẩu cũ không được để trống';
            }
            if (empty($new_pass)) {
                $errors['new_pass'] = 'Mật khẩu mới không được để trống';
            }
            if ($old_pass !== $user['mat_khau']) {
                $errors['old_pass'] = 'Mật khẩu cũ không đúng';
            }
            if ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng';
            }
            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không được để trống';
            }
            $_SESSION['errors'] = $errors;
            if (!$errors) {
                // $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                $status = $this->modelTaiKhoan->resetPassword($user['id'], $new_pass);

                if ($status) {
                    $_SESSION['mess2'] = 'Đổi mật khẩu thành công';
                    $_SESSION['flash'] = true;
                    header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-ca-nhan-admin');
                }
            } else {
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-ca-nhan-admin');
                exit();
            }
        }
    }

    public function editAnhDaiDienAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $thongTinCu = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
            $anh_cu = $thongTinCu['anh_dai_dien'];

            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;

            if (isset($anh_dai_dien) && !empty($anh_dai_dien)) {
                // Upload file ảnh mới
                $new_file = uploadFile($anh_dai_dien, './uploads/');
                if ($new_file) {
                    // Upload file thành công và có ảnh cũ
                    if (!empty($old_file)) {
                        deleteFile($old_file);
                    }
                }else{
                    $new_file = $anh_cu;
                }
            } else {
                $new_file = $anh_cu;
            }

            if (empty($errors)) {
                $status = $this->modelTaiKhoan->updateAnhDaiDienAdmin($tai_khoan_id, $new_file);
                // var_dump($status);die();

                if ($status) {
                    $_SESSION['messImg'] = 'Sửa ảnh thành công';
                    $_SESSION['flash'] = true;
                }
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-ca-nhan-admin');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-tai-khoan-ca-nhan-admin');
                exit();
            }
        }
    }

    public function sidebar(){
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
        require_once './views/layout/sidebar.php';
    }

    public function logout(){
        if(isset($_SESSION['user_admin'])){
            unset($_SESSION['user_admin']);
            header("Location:".BASE_URL_ADMIN.'?act=form-login-admin');
        }
    }
}
