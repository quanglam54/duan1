<?php
class AdminMaGiamGiaController
{

    public $modelMaGiamGia;
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelMaGiamGia = new AdminMaGiamGia();
        $this->modelTaiKhoan = new AdminTaiKhoan();

    }

        // Ma giam gia
        public function listMaGiamGia()
        {
            $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
            $listMaGiamGia = $this->modelMaGiamGia->getAllMaGiamGia();
            require_once './views/magiamgia/listMaGiamGia.php';
        }
    
        public function formAddMaGiamGia()
        {
            $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
            require_once './views/magiamgia/addMaGiamGia.php';
            deleteSession();

        }
        public function addMaGiamGia()
        {
    
            // var_dump($_POST);die();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Lấy dl từ form
                $ma_giam_gia = $_POST['ma_giam_gia'] ?? '';
                $muc_giam_gia = $_POST['muc_giam_gia'] ?? '';
                $bat_dau = $_POST['bat_dau'] ?? '';

                $ket_thuc = $_POST['ket_thuc'] ?? '';
    
                $errors = []; // thông báo lỗi

                if (empty($ma_giam_gia)) {
                    $errors['ma_giam_gia'] = 'Mã giảm giá không được để trống';
                }
                if (empty($muc_giam_gia)) {
                    $errors['muc_giam_gia'] = 'Mức giảm giá không được để trống';
                } elseif (!is_numeric($muc_giam_gia) || $muc_giam_gia <= 0) {
                    $errors['gia_san_pham'] = 'Mức giảm giá phải là số lớn hơn 0';
                }

                if (empty($bat_dau)) {
                    $errors['bat_dau'] = 'Ngày bắt đầu không được để trống';
                }
                if (empty($ket_thuc)) {
                    $errors['ket_thuc'] = 'Ngày kết thúc không được để trống';
                }elseif($ket_thuc <= $bat_dau){
                    $errors['ket_thuc'] = 'Ngày kết thúc phải lớn hơn ngày bắt đầu';
                }
    
                // var_dump($errors['ma_giam_gia']);die();
                $_SESSION['errors'] = $errors;

    
                // Lưu dữ liệu đã nhập vào SESSION
                $_SESSION['old_data'] = array(
                    'ma_giam_gia' => $_POST['ma_giam_gia'],
                    'muc_giam_gia' => $_POST['muc_giam_gia'],
                    'bat_dau' => $_POST['bat_dau'],
                    'ket_thuc' => $_POST['ket_thuc'],
                );
                // var_dump(  $_SESSION['errors'] );die;
    
                // Không có lỗi thì thêm sản phẩm
                if (empty($errors)) {
                    $san_pham_id = $this->modelMaGiamGia->insertMaGiamGia($ma_giam_gia, $muc_giam_gia, $bat_dau, $ket_thuc);
                    // var_dump($san_pham_id);die;
                    header("Location:" . BASE_URL_ADMIN . '?act=list-ma-giam-gia');
                } else {
                    $_SESSION['flash'] = true;
                    // var_dump($_SESSION['errors']);die;
                    header("Location:" . BASE_URL_ADMIN . '?act=form-them-ma-giam-gia');
                    exit();
                }
            }
        }

    public function deleteMaGiamGia(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id_ma_giam_gia'];
            $delete = $this->modelMaGiamGia->destroyMaGiamGia($id);
            if($delete){
                $_SESSION['mess'] = 'Xóa mã giảm giá thành công!';
            }else{
                $_SESSION['mess'] = 'Xóa mã giảm giá thất bại!';
            }
            header("Location:".BASE_URL_ADMIN.'?act=list-ma-giam-gia');

        }
    }


    public function formEditMaGiamGia()
    {
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
        $id = $_GET['id_ma_giam_gia'];
        $ma_giam_gia = $this->modelMaGiamGia->getDetailMaGiamGia($id);
        // var_dump($ma_giam_gia);die;
        if (isset($ma_giam_gia)) {
            require_once './views/magiamgia/editMaGiamGia.php';
            deleteSession();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=list-ma-giam-gia');
            exit();
        }
    }
    public function editMaGiamGia()
    {

        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dl từ form
            $ma_giam_gia_id = $_POST['ma_giam_gia_id'] ?? '';
            $ma_giam_gia = $_POST['ma_giam_gia'] ?? '';
            $muc_giam_gia = $_POST['muc_giam_gia'] ?? '';
            $bat_dau = $_POST['bat_dau'] ?? '';

            $ket_thuc = $_POST['ket_thuc'] ?? '';

            $errors = []; // thông báo lỗi
            // var_dump($_POST);die;

            if (empty($ma_giam_gia)) {
                $errors['ma_giam_gia'] = 'Mã giảm giá không được để trống';
            }
            if (empty($muc_giam_gia)) {
                $errors['muc_giam_gia'] = 'Mức giảm giá không được để trống';
            } elseif (!is_numeric($muc_giam_gia) || $muc_giam_gia <= 0) {
                $errors['gia_san_pham'] = 'Mức giảm giá phải là số lớn hơn 0';
            }

            if (empty($bat_dau)) {
                $errors['bat_dau'] = 'Ngày bắt đầu không được để trống';
            }
            if (empty($ket_thuc)) {
                $errors['ket_thuc'] = 'Ngày kết thúc không được để trống';
            }elseif($ket_thuc <= $bat_dau){
                $errors['ket_thuc'] = 'Ngày kết thúc phải lớn hơn ngày bắt đầu';
            }

            $_SESSION['errors'] = $errors;

            // Lưu dữ liệu đã nhập vào SESSION
            $_SESSION['old_data'] = array(
                'ma_giam_gia' => $_POST['ma_giam_gia'],
                'muc_giam_gia' => $_POST['muc_giam_gia'],
                'bat_dau' => $_POST['bat_dau'],
                'ket_thuc' => $_POST['ket_thuc'],
            );

            // Không có lỗi thì thêm sản phẩm
            if (empty($errors)) {
                $san_pham_id = $this->modelMaGiamGia->editMaGiamGia($ma_giam_gia_id,$ma_giam_gia, $muc_giam_gia, $bat_dau, $ket_thuc);
                // var_dump($san_pham_id);die;
                header("Location:" . BASE_URL_ADMIN . '?act=list-ma-giam-gia');
                exit();
            } else {
                $_SESSION['flash'] = true;

                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-ma-giam-gia&id_ma_giam_gia='.$ma_giam_gia_id);
                exit();
            }
        }
    }
}