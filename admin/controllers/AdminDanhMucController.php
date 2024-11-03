<?php
class AdminDanhMucController
{

    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function listDanhMuc()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        // var_dump($listDanhMuc);die();
        require_once './views/danhmuc/listDanhMuc.php';
    }

    public function formAddDanhMuc()
    {
        // Hiển thị form thêm danh mục
        require_once './views/danhmuc/addDanhMuc.php';
    }

    public function addDanhMuc()
    {
        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dl từ form
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = []; // thông báo lỗi
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            // Không có lỗi thì thêm danh mục
            if (empty($errors)) {
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("Location:" . BASE_URL_ADMIN . '?act=danh-muc');
            } else {
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }
    }

    public function formEditDanhMuc()
    {
        // Hiển thị form sửa và lấy thông tin danh mục
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        // var_dump($danhMuc);die();
        if (isset($danhMuc)) {
            require_once './views/danhmuc/editDanhMuc.php';
        } else {
            header("Location:" . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }

    public function editDanhMuc()
    {
        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dl từ form
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = []; // thông báo lỗi
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            // Không có lỗi thì thêm danh mục
            if (empty($errors)) {
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header("Location:" . BASE_URL_ADMIN . '?act=danh-muc');
            } else {
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
    }

    public function deleteDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
            // Tạo thông báo xóa thành công
            $_SESSION['mess'] = 'Xóa danh mục thành công!';
        }
        header("Location:" . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
} // end class
