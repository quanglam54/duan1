<?php
class CartController
{
     public $cartModel;

     public function __construct()
     {
          $this->cartModel = new CartModel();
     }

     public function createCart()
     {
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $user_product = $_POST['user_product'];

               $so_luong = $_POST['so_luong'];
               $san_pham_id = $_POST['id_product'];




               $id_cart = $this->cartModel->getIdCart($user_product);
               // lấy id giỏ hàng
               // var_dump($id_cart);
               // die;

     //           $sql = "SELECT * FROM table WHERE comp_id IN ('" 
     // . implode("','", array_map('mysql_real_escape_string', $arr)) 
     // . "')";
     // SELECT * from table Where comp_id IN ($arr)
               // $getCart = $this->cartModel->getAllDetailCart($id_cart);


               $cart_id = $this->cartModel->insertCart($user_product);
               ;


               $this->cartModel->insertDetailCart($cart_id, $san_pham_id, $so_luong);



               header("Location:" . BASE_URL);
               exit();
          }
     }
     //

     public function viewCart()
     {
          $viewCarts = $this->cartModel->getViewCart();
          require_once './views/cart/cart.php';
     }
}
?>