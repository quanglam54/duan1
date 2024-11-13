<?php
session_start();
// Require file common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Khai báo hàm hỗ trợ

// Require toàn bộ file controller
require_once './controllers/AdminHomeController.php';
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminTaiKhoanController.php';
require_once './controllers/AdminDonHangController.php';




// Require toàn bộ file model

require_once './model/AdminDanhMuc.php';
require_once './model/AdminSanPham.php';
require_once './model/AdminTaiKhoan.php';
require_once './model/AdminDonHang.php';


$act = $_GET['act'] ?? '/';

if ($act !== 'form-login-admin' && $act !== 'check-login-admin') {
    checkLoginAdmin();
}
match($act){
    '/' => (new AdminHomeController)->home(),

    'danh-muc' => (new AdminDanhMucController)->listDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController)->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController)->addDanhMuc(),
    'form-sua-danh-muc' =>(new AdminDanhMucController)->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController)->editDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController)->deleteDanhMuc(),

    'san-pham' => (new AdminSanPhamConTroller)->listSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController)->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController)->addSanPham(),
    'form-sua-san-pham' =>(new AdminSanPhamController)->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController)->editSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController)->deleteSanPham(),
    'xem-san-pham' => (new AdminSanPhamController)->detailSanPham(),
    'edit-album-anh-san-pham' => (new AdminSanPhamController)->editAlbumAnhSanPham(),

    'list-tai-khoan-admin' =>(new AdminTaiKhoanController)-> listTaiKhoanAdmin(),
    'form-them-admin' =>(new AdminTaiKhoanController)-> formThemAdmin(),
    'them-admin' =>(new AdminTaiKhoanController)-> addAdmin(),
    'sua-trang-thai-admin' =>(new AdminTaiKhoanController)-> editTrangThaiAdmin(),
    'reset-password' =>(new AdminTaiKhoanController)-> resetPassword(),

    'list-tai-khoan-khach-hang' =>(new AdminTaiKhoanController)-> listTaiKhoanKhachHang(),
    'chi-tiet-khach-hang' =>(new AdminTaiKhoanController)-> detailKhachHang(),

    'form-sua-tai-khoan-ca-nhan-admin' =>(new AdminTaiKhoanController)-> formSuaTaiKhoanCaNhan(),
    'sua-anh-dai-dien-admin' =>(new AdminTaiKhoanController)-> editAnhDaiDienAdmin(),
    'sua-thong-tin-tai-khoan-admin' =>(new AdminTaiKhoanController)-> editThongTinTaiKhoanAdmin(),
    'sua-mat-khau-admin' =>(new AdminTaiKhoanController)-> editMatKhauAdmin(),


    
    // route auth
    'form-login-admin' =>(new AdminTaiKhoanController)-> formLoginAdmin(),
    'check-login-admin' =>(new AdminTaiKhoanController)-> login(),

    'logout-admin' =>(new AdminTaiKhoanController)-> logout(),


   'don-hang' =>(new AdminDonHangController())->danhSachDonHang(),






    















}

?>