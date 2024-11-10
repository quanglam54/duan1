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

}
?>