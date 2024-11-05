<?php
session_start();
// Require file common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Khai báo hàm hỗ trợ

// Require toàn bộ file controller
require_once './controllers/AdminHomeController.php';
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';


// Require toàn bộ file model

require_once './model/AdminDanhMuc.php';
require_once './model/AdminSanPham.php';


$act = $_GET['act'] ?? '/';
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












}

?>