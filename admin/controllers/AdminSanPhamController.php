<?php
class AdminSanPhamConTroller
{
    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function listSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once 'views/sanpham/listSanPham.php';
    }
    public function formAddSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once 'views/sanpham/addSanPham.php';
        deleteSession();
    }

    public function addSanPham()
    {
        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dl từ form
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = isset($_POST['gia_khuyen_mai']) && $_POST['gia_khuyen_mai'] !=='' ? $_POST['gia_khuyen_mai'] : null;
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';


            $hinh_anh = $_FILES['hinh_anh'] ?? null;


            // Lưu ảnh
            $file_thumb = uploadFile($hinh_anh, '../uploads/');

            $errors = []; // thông báo lỗi
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            } elseif (!is_numeric($gia_san_pham) || $gia_san_pham <= 0) {
                $errors['gia_san_pham'] = 'Giá sản phẩm phải là số lớn hơn 0';
            }

            if (!empty($gia_khuyen_mai) && (!is_numeric($gia_khuyen_mai) || $gia_khuyen_mai <= 0)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến mãi phải là số lớn hơn 0';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            } elseif (!is_numeric($so_luong) || $so_luong <= 0) {
                $errors['so_luong'] = 'Số lượng phải là số lớn hơn 0';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Vui lòng chọn danh mục sản phẩm';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái sản phẩm';
            }
            if ($hinh_anh === null) {
                $errors['hinh_anh'] = 'Vui lòng chọn ảnh sản phẩm';
            }

            $_SESSION['errors'] = $errors;

            // Lưu dữ liệu đã nhập vào SESSION
            $_SESSION['old_data']  = array(
                'ten_san_pham' => $_POST['ten_san_pham'],
                'gia_san_pham' => $_POST['gia_san_pham'],
                'gia_khuyen_mai' => $_POST['gia_khuyen_mai'],
                'so_luong' => $_POST['so_luong'],
                'ngay_nhap' => $_POST['ngay_nhap'],
                'danh_muc_id' => $_POST['danh_muc_id'],
                'trang_thai' => $_POST['trang_thai'],
                'mo_ta' => $_POST['mo_ta']
            );

            // Không có lỗi thì thêm sản phẩm
            if (empty($errors)) {
                $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_thumb);
                // var_dump($san_pham_id);
                // die();
                header("Location:" . BASE_URL_ADMIN . '?act=san-pham');
            } else {
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }

    public function formEditSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        // var_dump($sanPham);die();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if (isset($sanPham)) {
            require_once './views/sanpham/editSanPham.php';
            deleteSession();
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

    public function editSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // Truy vấn 
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // Lấy ảnh cũ để phục vụ cho sửa ảnh

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = isset($_POST['gia_khuyen_mai']) && $_POST['gia_khuyen_mai'] !=='' ? $_POST['gia_khuyen_mai'] : null;
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            // Đặt giá trị mặc định cho các trường
            $danh_muc_id =  $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            
            $mo_ta = $_POST['mo_ta'];

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Vui lòng chọn danh mục sản phẩm';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái sản phẩm';
            }

            $_SESSION['errors'] = $errors;

            // Logic sửa ảnh
            if (isset($hinh_anh) && $hinh_anh['errors'] == UPLOAD_ERR_OK) {
                // upload file ảnh mới lên
                $new_file = uploadFile($hinh_anh, '../uploads/');
                if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            $_SESSION['errors'] = $errors;


            // Nếu k có lỗi thì thêm sản phẩm
            if (empty($errors)) {
                $san_pham_id = $this->modelSanPham->updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);
                header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }

    public function deleteSanPham(){
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        
        if($sanPham){
            $this->modelSanPham->destroySanPham($id);
            deleteFile($sanPham)['hinh_anh'];

            // Tạo thông báo xóa thành công
            $_SESSION['mess'] = 'Xóa sản phẩm thành công!';
        }
    
        // Chuyển hướng về trang danh sách sản phẩm
        header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }
}
