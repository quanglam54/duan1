<?php
class ClientSanPhamController
{
     public $modelSanPham;

     public $modelDanhMuc;

     public function __construct()
     {
          $this->modelSanPham = new ClientSanPhamModel();
     }
     public function allSanPham()
     {
          $sanPhamBestSeller = $this->modelSanPham->getSanPhamBestSeller();
          $danhMucs = $this->modelSanPham->getAllDanhMuc();
          $listSanPhams = $this->modelSanPham->getAllSanPham();
          // var_dump($danhMuc);
          // die;
          require_once './views/home.php';
     }
     //

     public function allCategory()
     {
          $sanPhamNews = $this->modelSanPham->getSanPhamNew();
          // var_dump($sanPhamNews);
          // die;
          require_once './views/category.php';
     }
}
?>