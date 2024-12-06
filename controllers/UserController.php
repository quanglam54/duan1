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
                    echo "<script>alert('Đăng nhập thành công!'); window.location.href='" . BASE_URL . "';</script>";
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
     //

     public function viewInfo()
     {
          $user_id = $_SESSION['ho_ten']['id'];
          // var_dump($user_id);
          // die;
          $viewUser = $this->userModel->getUser($user_id);
          // var_dump($viewUser);
          // die;
          require_once './views/taikhoan/viewInfo.php';
     }
     //

     public function checkPass()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $old_pass = $_POST['old_pass'];
               $new_pass = $_POST['new_pass'];
               $confirm_pass = $_POST['confirm_pass'];
               if (!isset($_SESSION['ho_ten'])) {
                    header("Location:" . BASE_URL . '?act=login');
                    exit();
               }
               $err = [];
               $user_id = $_SESSION['ho_ten']['id'];

               if ($new_pass !== $confirm_pass) {
                    $err['new_pass'] = 'Mật khẩu không khớp';
               }
               $user = $this->userModel->getUser($user_id);
               // var_dump($user);
               // die;
               // if (!password_verify($old_pass, $user['mat_khau'])) {
               //      echo "<script> alert('Mật khẩu cũ không đúng');</script>";
               //      return;
               // }
               if ($old_pass !== $user['mat_khau']) {

                    $err['old_pass'] = 'Mật không cũ chưa đúng';
               }

               if (!empty($err)) {
                    $_SESSION['err'] = $err;
                    header("Location:" . BASE_URL . '?act=view-info');
                    exit();
               }
               $this->userModel->updatePass($user_id, $new_pass);

               unset($_SESSION['err']);
               echo "<script>alert('Đổi mật khẩu thành công!'); window.location.href='" . BASE_URL . "';</script>";
               exit();

          }
     }
     //

     public function editUser()
     {
          $user_id = $_SESSION['ho_ten']['id'];
          $users = $this->userModel->getUser($user_id);
          // var_dump($users);
          // die;
          require_once './views/taikhoan/editUser.php';
     }
     public function updateUser()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               // var_dump($_POST);
               // die;
               if (!isset($_SESSION['ho_ten'])) {
                    echo "<script>alert('Vui lòng đăng nhập để cập nhật thông tin.'); window.location.href='" . BASE_URL . "?act=login';</script>";
                    exit();
               }

               $user_id = $_SESSION['ho_ten']['id'];

               $name = $_POST['name'];
               $email = $_POST['email'];
               $address = $_POST['address'];
               $phone = $_POST['phone'];
               if ($name) {
                    // var_dump($_SESSION['ho_ten']);
                    // die;
                    $_SESSION['ho_ten']['ho_ten'] = $name;
               }
               $update = $this->userModel->updateUser($user_id, $name, $email, $phone, $address);
               if ($update) {
                    echo "<script>alert('Cập nhật thông tin thành công!'); window.location.href='" . BASE_URL . "';</script>";
                    exit();
               } else {
                    echo "<script>alert('Cập nhật thông tin thất bại!'); window.location.href='" . BASE_URL . "?act=edit-info';</script>";
                    exit();
               }
          }
     }
}
?>