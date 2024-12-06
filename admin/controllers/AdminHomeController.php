<?php
    class AdminHomeController{
        public $modelTaiKhoan;
        public $modelSanPham;
        public $modelDonHang;



        public function __construct()
        {
            $this->modelTaiKhoan = new AdminTaiKhoan();
            $this->modelSanPham = new AdminSanPham();
            $this->modelDonHang = new AdminDonHang();


 
        }
        public function home(){
            $listThongKe = $this->modelSanPham->getAllThongKe();
            $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
            $newOrderCount = $this->modelDonHang->countNewDonHang();
            $countUser = $this->modelTaiKhoan->countUser();
            $total = $this->modelDonHang->doanhThu();
            $toltalProduct = $this->modelDonHang->countProductSold();
            // var_dump($newOrderCount);die();
            require_once './views/home.php';
        }

    }

?>