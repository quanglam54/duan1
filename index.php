<?php

session_start();
require_once 'admin/commons/env.php';
require_once 'admin/commons/function.php';


require_once './controllers/ClientDanhmucController.php';
require_once './controllers/ClientSanPhamController.php';
require_once './controllers/UserController.php';
//
require_once './models/ClientDanhmuc.php';
require_once './models/ClientSanpham.php';
require_once './models/UserModel.php';
//
$act = $_GET['act'] ?? '/';

match ($act) {
     '/' => (new ClientSanphamController)->allSanPham(),
     'allCategory' => (new ClientSanPhamController)->allCategory(),
     'category' => (new ClientSanPhamController)->allSanPham(),
     'detail' => (new ClientSanPhamController)->getProductDetail(),
     'register' => (new UserController)->register(),
     'postRegis' => (new UserController)->postRegister(),
     'login' => (new UserController)->login(),
     'postlogin' => (new UserController)->postLogin(),
     'logout' => (new UserController)->logout(),
}

     ?>