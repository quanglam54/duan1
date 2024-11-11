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
          $category_id = $_GET['id'] ?? null;
          // var_dump($category_id);
          // die;
          //$category_id sẽ lấy theo getid truyền thẻ a bên link home
          if ($category_id) {
               $listSanPhams = $this->modelSanPham->getCategoryId($category_id);
               // var_dump($listSanPhams);
               // die;
          } else {
               $listSanPhams = $this->modelSanPham->getAllSanPham();
          }
          $sanPhamBestSeller = $this->modelSanPham->getSanPhamBestSeller();
          $danhMucs = $this->modelSanPham->getAllDanhMuc();
          // var_dump($danhMuc);
          // die;
          require_once './views/home.php';
     }
     //

     public function allCategory()
     {
          $sanPhamNews = $this->modelSanPham->getSanPhamNew();
          $allSanPhams = $this->modelSanPham->getAllSanPham();
          // var_dump($sanPhamNews);
          // die;
          require_once './views/category.php';
     }
     //

     public function getProductDetail()
     {
          $product_id = $_GET['id'];

          $productDetail = $this->modelSanPham->getSanPhamById($product_id);
          $cate_id = $productDetail['danh_muc_id'];
          // lấy int danh_muc_id để lấy ra sp #id nhưng cùng danh mục
          // var_dump($cate_id);
          // die;
          $productOther = $this->modelSanPham->getSanPhamOtherId($product_id, $cate_id);

          // var_dump($productDetail);
          // die;
          require_once './views/detail.php';
     }
}
?>