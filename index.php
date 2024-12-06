<?php

session_start();
require_once './commons/env.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/SMTP.php';
require_once './commons/function.php';


require_once './controllers/ClientDanhmucController.php';
require_once './controllers/ClientSanPhamController.php';
require_once './controllers/UserController.php';
require_once './controllers/CartController.php';
//
require_once './models/ClientDanhmuc.php';
require_once './models/ClientSanpham.php';
require_once './models/UserModel.php';
require_once './models/CartModel.php';
//
$act = $_GET['act'] ?? '/';

// sendMailer('lamdqph53571@gmail.com', 'hello bạn nhỏ', 'chào bạn');
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
     'comment' => (new ClientSanPhamController)->comment(),
     'them-gio-hang' => (new CartController)->createCart(),
     'view-cart' => (new CartController)->viewCart(),
     'pay' => (new CartController)->viewPay(),
     'dat-hang' => (new CartController)->postOrder(),
     'deleteSelectedProducts' => (new CartController)->deleteItem(),
     'updateQuantity' => (new CartController())->updateQuantity(),
     'finish' => (new CartController())->viewFinish(),
     'view-info' => (new UserController)->viewInfo(),
     'update-pass' => (new UserController)->checkPass(),
     'search' => (new ClientSanPhamController)->searchProduct(),
     'edit-info' => (new UserController)->editUser(),
     'update-info' => (new UserController)->updateUser(),
     'send-mail' => (new CartController)->sendMail(),
     'huy-don-hang' => (new CartController())->huyDonHang(),
     'chi-tiet-mua-hang' => (new CartController)->chiTietMuaHang()
}
     ?>