<?php
require_once 'admin/commons/env.php';
require_once 'admin/commons/function.php';


require_once './controllers/ClientDanhmucController.php';
require_once './controllers/ClientSanPhamController.php';

require_once './models/ClientDanhmuc.php';
require_once './models/ClientSanpham.php';

$act = $_GET['act'] ?? '/';

match ($act) {
     '/' => (new ClientSanphamController)->allSanPham(),
     'allCategory' => (new ClientSanPhamController)->allCategory(),
     'category' => (new ClientSanPhamController)->allSanPham(),
}

     ?>