<?php

class UserController
{
     public $userModel;

     public function __construct()
     {
          $this->userModel = new UserModel();
     }

     public function register()
     {
          require_once './views/taikhoan/register.php';
     }
     public function postRegister()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $username = $_POST['username'];
               $email = $_POST['email'];
               $password = $_POST['password'];
               $role = 2;

               // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
               $err = [];
               if (empty($username)) {
                    $err['username'] = "Họ tên không được để trống";
               }
               if (empty($email)) {
                    $err['email'] = "Email không được để trống";
               } else if (!preg_match("/^[\w\-\.]+@([\w-]+\.)+[\w-]{2,4}$/", $email)) {
                    $err['email'] = "Email không đúng định dạng";
               } else {
                    if ($this->userModel->countEmail($email)) {
                         $err['email'] = 'Email đã tồn tại';
                    }
               }
               if (empty($password)) {
                    $err['password'] = "Mật khẩu không được để trống";
               } else if (strlen($password) < 5) {
                    $err['password'] = "Mật khẩu phải lớn hơn 5 kí tự";

               }

               // kiểm tra có email tồn tại


               if (empty($err)) {
                    $this->userModel->insertUser($username, $email, $password, $role);
                    echo "<script type='text/javascript'>
                         alert('đăng ký thành công vui lòng đến trang đăng nhập!');
                         window.location.href = '?act=login';
                       </script>";
               }
          }
          require_once './views/taikhoan/register.php';

     }


     public function login()
     {
          require_once './views/taikhoan/login.php';
     }

     public function postLogin()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $email = $_POST['email'];
               $password = $_POST['password'];

               $err = [];
               if (empty($email)) {
                    $err['email'] = 'Email không được để trống';
               }
               if (empty($password)) {
                    $err['password'] = "Mật khẩu không được để trống";
               }

               $_SESSION['err'] = $err;

               $user = $this->userModel->loginUser($email, $password);
               // var_dump($user);
               // die;
               if (is_array($user)) {
                    $email = $user['email'];
                    $id = $user['id'];

                    // $in_fo = $this->userModel->getUserName($email); // lấy họ tên
                    // var_dump($ho_ten);
                    // die;
                    // $_SESSION['ho_ten'] = $user['ho_ten'];
                    $_SESSION['ho_ten'] = $user;
                    echo "<script type='text/javascript'>
                         alert('đăng nhập thành công!');
                       </script>";
                    header("Location:" . BASE_URL);
                    exit();
               } else {
                    header("Location:" . BASE_URL . '?act=login');
                    exit();
               }
          }

          require_once './views/taikhoan/login.php';
     }

     public function logout()
     {

          unset($_SESSION['ho_ten']);
          header("Location:" . BASE_URL);
          exit();
     }
}
?>