<?php
    class AdminHomeController{
        public $modelTaiKhoan;
        public $modelSanPham;

        public function __construct()
        {
            $this->modelTaiKhoan = new AdminTaiKhoan();
            $this->modelSanPham = new AdminSanPham();

 
        }
        public function home(){
            $listThongKe = $this->modelSanPham->getAllThongKe();
            $thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
            require_once './views/home.php';
        }

    }

?>