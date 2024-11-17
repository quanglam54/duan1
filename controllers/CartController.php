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

               if (!isset($_SESSION['ho_ten'])) {
                    header('Location:' . BASE_URL . '?act=login');
                    exit();
               }
               $user_product = $_POST['user_product'];

               $so_luong = $_POST['so_luong'];
               $san_pham_id = $_POST['id_product'];




               $id_cart = $this->cartModel->getIdCart($user_product);
               // $id_cart sẽ nhận được mảng id và tai_khoan_id của user đó
               // lấy id giỏ hàng
               // var_dump($id_cart);
               // die;

               if (!$id_cart) {
                    // nếu kh có giỏ tạo giỏ mới
                    $id_cart = $this->cartModel->insertCart($user_product);
               } else {
                    $id_cart = $id_cart[0]['id'];
               }


               // kiểm tra xem sp đã có trong giỏ chưa
               $exitsProduct = $this->cartModel->checkProductCart($id_cart, $san_pham_id);
               // var_dump($exitsProduct);
               // die;

               if ($exitsProduct) {
                    // nếu có cập nhật số lượng
                    $this->cartModel->updateCartQuantity($id_cart, $san_pham_id, $so_luong);
               } else {
                    //nếu chưa có sản phẩm thì thêm
                    $this->cartModel->insertDetailCart($id_cart, $san_pham_id, $so_luong);

               }


               //


               header("Location:" . BASE_URL);
               exit();
          }
     }
     //

     public function viewCart()
     {
          $user_product = $_SESSION['ho_ten']['id'];
          $viewCarts = $this->cartModel->getViewCart($user_product);
          // var_dump($viewCarts);
          // die;

          // Tính tổng giá trị giỏ hàng
          $total = $this->cartModel->getCartTotal($user_product);
          require_once './views/cart/cart.php';
     }
     //
     public function updateQuantity()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               // Lấy dữ liệu gửi từ AJAX
               $data = json_decode(file_get_contents('php://input'), true);
               // var_dump($data);
               // die;
               $cartId = $data['cartId']; // lấy id từ bên json trả về
               $change = $data['change']; // số lượng khi tăng là 1 còn giảm sẽ là -1

               // Kiểm tra session đăng nhập tồn tạ chưa
               if (!isset($_SESSION['ho_ten'])) {
                    echo json_encode(['success' => false, 'message' => 'Bạn cần đăng nhập để cập nhật giỏ hàng']);
                    exit;
               }

               // Lấy thông tin sản phẩm từ giỏ hàng
               $cartItem = $this->cartModel->getCartItemById($cartId);
               if (!$cartItem) {
                    echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng']);
                    exit;
               }

               // Tính toán số lượng mới
               $newQuantity = $cartItem['so_luong'] + $change;

               // Kiểm tra số lượng hợp lệ
               if ($newQuantity < 1) {
                    echo json_encode(['success' => false, 'message' => 'Số lượng phải lớn hơn 0']);
                    exit;
               }

               // Cập nhật số lượng sản phẩm
               $this->cartModel->updateProductQuantity($cartId, $newQuantity);

               // Tính lại giá trị tổng cộng
               $newTotalPrice = $newQuantity * $cartItem['gia_san_pham'];
               $cartTotal = $this->cartModel->getCartTotal($cartItem['gio_hang_id']);

               // Phản hồi kết quả về AJAX
               echo json_encode([
                    'success' => true,
                    'newQuantity' => $newQuantity,
                    'newTotalPrice' => number_format($newTotalPrice),
                    'cartTotal' => number_format($cartTotal),
               ]);
               exit;
          }
     }





     public function viewPay()
     {
          if (!isset($_SESSION['ho_ten'])) {
               header("Location:" . BASE_URL . '?act=login');
               exit();
          }
          $user_id = $_SESSION['ho_ten']['id'];
          // var_dump($user_id);
          // die;
          $cart_item = $this->cartModel->getCartItem($user_id);
          // var_dump($cart_item);
          // die;
          require_once './views/pay.php';
     }



     public function postOrder()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $user_id = $_SESSION['ho_ten']['id'];
               // var_dump($user);
               // die;
               $name = $_POST['name'];
               $phone = $_POST['phone'];
               $email = $_POST['email'];
               $address = $_POST['address'];
               $date = $_POST['date'];
               $description = $_POST['description'];
               $totalAmount = 0;
               $cart_items = $this->cartModel->getCartItem($user_id);
               foreach ($cart_items as $item) {
                    $totalAmount += $item['so_luong'] * $item['gia_san_pham'];
               }
               $totalAmount += 30000;
               $this->cartModel->insertOrder($user_id, $name, $phone, $email, $address, $date, $totalAmount, $description);

               header("Location:" . BASE_URL);
               exit();
          }
     }

     //

     public function deleteItem()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedItems']) && !empty($_POST['selectedItems'])) {

               // var_dump($_POST);
               // die;
               // var_dump($_POST['selectedItems']);
               // exit;
               // lấy ds id cần xóa

               // $selectedItems = array_filter($_POST['selectedItems'], 'is_numeric');
               $selectedItems = $_POST['selectedItems'];

               foreach ($selectedItems as $itemId) {
                    // var_dump($itemId);
                    // die;
                    $this->cartModel->deleteItem($itemId);
               }

               header("Location:" . BASE_URL . '?act=view-cart');
               exit();
          }
     }




}
?>