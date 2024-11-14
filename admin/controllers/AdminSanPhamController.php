<?php
class AdminSanPhamConTroller
{
    public $modelSanPham;
    public $modelDanhMuc;
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
        $this->modelTaiKhoan = new AdminTaiKhoan();

    }

    public function listSanPham()
    {
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once 'views/sanpham/listSanPham.php';
    }
    public function formAddSanPham()
    {
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
        deleteSession();
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once 'views/sanpham/addSanPham.php';
    }

    public function addSanPham()
    {

        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dl từ form
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = isset($_POST['gia_khuyen_mai']) && $_POST['gia_khuyen_mai'] !== '' ? $_POST['gia_khuyen_mai'] : null;
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';


            $hinh_anh = $_FILES['hinh_anh'] ?? null;


            // Lưu ảnh
            $file_thumb = uploadFile($hinh_anh, '../uploads/');

            $img_array = $_FILES['img_array'];
            // var_dump($img_array);die();

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
            // Kiểm tra nếu không có hình ảnh hoặc có lỗi tải lên
            if ($hinh_anh['error'] !== UPLOAD_ERR_OK) {
                $errors['hinh_anh'] = 'Vui lòng chọn ảnh sản phẩm';
            }

            $_SESSION['errors'] = $errors;

            // Lưu dữ liệu đã nhập vào SESSION
            $_SESSION['old_data'] = array(
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
                // Thêm album ảnh sản phẩm
                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];
                        $link_hinh_anh = uploadFile($file, '../uploads/');
                        $album = $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }
                deleteSession();
                header("Location:" . BASE_URL_ADMIN . '?act=san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }

    public function formEditSanPham()
    {
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        // var_dump($sanPham);die();
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        // var_dump($listAnhSanPham);die();

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
            // var_dump($_POST);die();
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // Truy vấn 
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // Lấy ảnh cũ để phục vụ cho sửa ảnh
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = isset($_POST['gia_khuyen_mai']) && $_POST['gia_khuyen_mai'] !== '' ? $_POST['gia_khuyen_mai'] : null;
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            // Đặt giá trị mặc định cho các trường
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
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
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                // upload file ảnh mới lên
                $new_file = uploadFile($hinh_anh, '../uploads/');
                if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            // Nếu k có lỗi thì sửa sản phẩm
            if (empty($errors)) {
                $this->modelSanPham->updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);
                // Tạo thông báo xóa thành công
                // $_SESSION['messInfo'] = 'Sửa sản phẩm thành công!';
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

    public function editAlbumAnhSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // Truy vấn 
            $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($san_pham_id);

            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
            // var_dump($listAnhSanPhamCurrent);die();

            // Xử lý ảnh được gửi từ form
            $img_array = $_FILES['img_array'];
            $image_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            $upload_file = [];

            foreach ($img_array['name'] as $key => $value) {
                $current_img_id = $current_img_ids[$key] ?? null;
                $upload_file[] = [
                    'id' => $current_img_id,
                    'file' => $img_array['error'][$key] == UPLOAD_ERR_OK ? uploadFileAlbum($img_array, '../uploads/', $key) : null
                ];
            }

            foreach ($upload_file as $file_info) {
                if ($file_info['id'] && $file_info['file']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
                    deleteFile($old_file);
                } else if (!$file_info['id']) {
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }

            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $image_delete)) {
                    $del = $this->modelSanPham->destroyAnhSanPham($anh_id);
                    // var_dump($del);die();
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }

            header("Location:" . BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }

    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        if ($sanPham) {
            $this->modelSanPham->destroySanPham($id);
            deleteFile($sanPham)['hinh_anh'];
            // Tạo thông báo xóa thành công
            $_SESSION['mess'] = 'Xóa sản phẩm thành công!';
        }

        if ($listAnhSanPham) {
            foreach ($listAnhSanPham as $key => $anhSP) {
                deleteFile($anhSP['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
            }
        }


        // Chuyển hướng về trang danh sách sản phẩm
        header("Location: " . BASE_URL_ADMIN . '?act=san-pham');
        exit();
    }

    public function detailSanPham()
    {
        $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        // var_dump($listBinhLuan);die();
        if (isset($sanPham)) {
            require_once './views/sanpham/detailSanPham.php';
        } else {
            header("Location:" . BASE_URL_ADMIN . '?act=san-pham');
            exit();
        }
    }

    public function deleteBinhLuan(){
        $id_binh_luan =$_GET['id_binh_luan'];
        // var_dump($id_binh_luan);die();
        $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);

        $this->modelSanPham->deleteBinhLuan($id_binh_luan);
        // var_dump($binhLuan['san_pham_id']);die();
        header("Location:".BASE_URL_ADMIN.'?act=xem-san-pham&id_san_pham='.$binhLuan['san_pham_id']);
    }

    
}