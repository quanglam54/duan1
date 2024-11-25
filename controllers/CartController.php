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


               echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công!'); window.location.href='" . BASE_URL . "';</script>";
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
          if (isset($_GET['total'])) {
               $total = $_GET['total'];
          } else {
               // Tính tổng giá trị giỏ hàng

               $total = $this->cartModel->getCartTotal($user_product);

          }

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
               $ma_don_hang = 'DH'.rand(1000,9999);
               $name = $_POST['name'];
               $phone = $_POST['phone'];
               $email = $_POST['email'];
               $address = $_POST['address'];
               $date = $_POST['date'];
               $description = $_POST['description'];
               $totalAmount = 0;
               $cart_items = $this->cartModel->getCartItem($user_id);
               foreach ($cart_items as $item) {
                    // var_dump($item);
                    // die;
                    $totalAmount += $item['so_luong'] * $item['gia_san_pham'];
               }
               $totalAmount += 30000;
               $order_id = $this->cartModel->insertOrder($user_id, $ma_don_hang, $name, $phone, $email, $address, $date, $totalAmount, $description);
               // var_dump($order_id); // trả về id của ng đặt hàng
               // die;
               // lưu vào bảng chi tiêt đơn
               foreach ($cart_items as $item) {
                    $san_pham_id = $item['san_pham_id'];
                    $quantity = $item['so_luong'];
                    $price = $item['gia_san_pham'];
                    $subtotal = ($quantity * $price) + 30000;

                    $this->cartModel->insertOrderDetail(
                         $order_id,
                         $san_pham_id,
                         $price,
                         $quantity,
                         $subtotal
                    );
               }
               header("Location:" . BASE_URL . '?act=finish');
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

               $selectedItems = $_POST['selectedItems'];

               foreach ($selectedItems as $itemId) {
                    // var_dump($itemId);
                    // die;
                    $this->cartModel->deleteItem($itemId);
               }
               $user_product = $_SESSION['ho_ten']['id'];
               // tính lại tổng tiền nếu xóa
               $total = $this->cartModel->getCartTotal($user_product);
               // header("Location:" . BASE_URL . '?act=view-cart&total=' . $total);
               // exit();
               echo "<script>
               alert(\"Xóa sản phẩm thành công!\");
               window.location.href=\"" . BASE_URL . "?act=view-cart&total=" . $total . "\";
             </script>";
               exit();

          }
     }

     //
     public function viewFinish()
     {
          $user_product = $_SESSION['ho_ten']['id'];
          $viewEnds = $this->cartModel->getOrderDetail($user_product);
          // var_dump($viewEnds);
          // die;
          require_once './views/endpay.php';
     }
     //
     public function sendMail()
     {
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $order_id = $_POST['order_id'];


               $order_info = $this->cartModel->getOrderById($order_id);
               // var_dump($order_info);
               // die;
               $order_fall = $this->cartModel->getOrderDetails($order_id);
               // var_dump($order_fall);
               // die;
               $email = $order_info['email_nguoi_nhan'];
               $subject = 'Xác nhận đơn hàng của bạn
               ';

               $content = '<html>
        <head>
            <meta charset="UTF-8">
            <title>Xác nhận đơn hàng</title>
        </head>
        <body>
            <h1>Xác nhận đơn hàng của bạn</h1>
            <p>Thông tin người mua hàng:</p>
            <ul>
                <li><strong>Mã đơn hàng:</strong> ' . $order_fall[0]['ma_don_hang'] . '</li>
                <li><strong>Người nhận:</strong> ' . $order_fall[0]['ten_nguoi_nhan'] . '</li>
                <li><strong>Email:</strong> ' . $order_fall[0]['email_nguoi_nhan'] . '</li>
                <li><strong>Số điện thoại:</strong> ' . $order_fall[0]['sdt_nguoi_nhan'] . '</li>
                <li><strong>Địa chỉ:</strong> ' . $order_fall[0]['dia_chi_nguoi_nhan'] . '</li>
                <li><strong>Ngày đặt:</strong> ' . $order_fall[0]['ngay_dat'] . '</li>
                <li><strong>Đơn giá:</strong> ' . $order_fall[0]['don_gia'] . '</li>
                <li><strong>Số lượng:</strong> ' . $order_fall[0]['so_luong'] . '</li>
                <li><strong>Thành tiền:</strong> ' . $order_fall[0]['thanh_tien'] . '</li>
            </ul>
        </body>
        </html>';
               try {
                    sendMailer($email, $subject, $content);
                    echo "Email xác nhận gửi thành công";
               } catch (Exception $e) {
                    echo "Gửi email thất bại. Lỗi:{$e->getMessage()}";
               }
          }
     }


}
?>