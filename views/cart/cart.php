<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Cart - Kính mắt LML</title>
     <link rel="stylesheet" href="./public/css/cart.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet" />
</head>

<body>
     <section class="wrapper">
          <header id="header">
               <div class="container">
                    <div class="header-main">
                         <div class="header-left">
                              <a href="<?= BASE_URL ?>"><img src="./public/img/ảnh logo.svg" alt="" /></a>
                              <ul class="header-nav">
                                   <li>
                                        <a href="#">Sản phẩm
                                             <span><i class="fa-solid fa-chevron-down"></i></span>
                                        </a>
                                        <div class="hover-product">
                                             <div class="product-hover-cate">
                                                  <ul>
                                                       <li>GỌNG KÍNH</li>
                                                       <li>TRÒNG KÍNH</li>
                                                       <li>KÍNH RÂM</li>
                                                       <li>KÍNH TRẺ EM</li>
                                                  </ul>
                                             </div>
                                             <div class="product-hover-text">
                                                  <div class="hover-text-left">
                                                       <h3>Chất liệu</h3>
                                                       <ul>
                                                            <li>Nhựa</li>
                                                            <li>Kim loại</li>
                                                       </ul>
                                                  </div>
                                                  <div class="hover-text-right">
                                                       <h3>Hình dáng</h3>
                                                       <ul>
                                                            <li>Mắt mèo</li>
                                                            <li>Vuông</li>
                                                       </ul>
                                                  </div>
                                             </div>
                                             <div class="product-hover-img">
                                                  <img src="./public/img/sp-1.jpg" alt="">
                                             </div>
                                        </div>
                                   </li>
                                   <li><a href="#">Tìm cửa hàng</a></li>
                              </ul>

                         </div>
                         <!--  -->
                         <div class="header-center">
                              <form action="<?= BASE_URL . '?act=search' ?>" method="post">
                                   <input type="text" name="name" placeholder="Các mẫu kính râm hot nhất..." />
                                   <div class="center-icon">
                                        <button type="submit" name="timkiem"> <i
                                                  class="fa-solid fa-magnifying-glass"></i></button>
                                   </div>
                              </form>
                         </div>
                         <!--  -->
                         <div class="header-right">
                              <ul class="header-nav">
                                   <li><a href="#">Xem thêm
                                             <span><i class="fa-solid fa-chevron-down"></i></span>
                                        </a></li>
                                   <li><a href="<?=BASE_URL .'?act=view-cart'?>">Giỏ hàng
                                             <span> <i class="fa-solid fa-cart-shopping"></i></span>
                                        </a></li>
                                   <li><a href="<?= BASE_URL . '?act=view-info' ?>">Tài khoản
                                             <span><i class="fa-solid fa-user"></i></i></span>
                                        </a></li>
                              </ul>
                         </div>
                    </div>
               </div>
     </section>
     <!--  -->
     <section class="banner-cart">
          <div class="banner-img">
               <img src="./public/img/banner-cart.jpeg" alt="">
          </div>
          <div class="banner-text">
               <h2>GIỎ HÀNG</h2>
               <ul>
                    <li>Trang chủ</li>
                    <li>Giỏ hàng</li>
               </ul>
          </div>
     </section>
     <!--  -->
     <?php if (empty($viewCarts)): ?>
          <div class="container">
               <div class="cart-empty-blogs">
                    <h2>Giỏ hàng trống</h2>
                    <div class="cart-empty">

                         <img src="./public/img/f1.jpeg" alt="">
                         <img src="./public/img/anh-cart-emty.jpeg" alt="">

                         <img src="./public/img/f2.jpeg" alt="">
                    </div>
                    <div class="cart-empty-button">
                         <button><a href="<?= BASE_URL ?>">Tiếp tục mua hàng</a></button>
                    </div>
               </div>
          </div>
     <?php else: ?>
          <section class="product-title">
               <div class="container">
                    <span>Sản Phẩm</span>
               </div>
          </section>

          <section class="component">
               <div class="container">
                    <div class="cart-block">
                         <div class="cart-component-l">
                              <form action="<?= BASE_URL . '?act=deleteSelectedProducts' ?>" method="post">
                                   <table class="cart-table">
                                        <thead>
                                             <tr>
                                                  <th><input type="checkbox" id="select-all"></th>
                                                  <th>Thông tin sản phẩm</th>
                                                  <th>Giá</th>
                                                  <th>Số lượng</th>
                                                  <th>Còn lại</th>
                                                  <th>Tổng cộng</th>
                                             </tr>
                                        </thead>
                                        <tbody>

                                             <?php foreach ($viewCarts as $cart): ?>
                                                  <tr>
                                                       <td><input type="checkbox" name="selectedItems[]"
                                                                 value="<?= $cart['id'] ?>">
                                                       </td>
                                                       <td class="cart-product-info">
                                                            <img src="<?= "uploads/" . $cart['hinh_anh'] ?>" alt="Product Image">
                                                            <div class="cart-a">
                                                                 <a href="#"><?= $cart['ten_san_pham'] ?></a>
                                                                 <p>Màu sắc: Đen ghi</p>
                                                            </div>
                                                       </td>
                                                       <td class="price" data-price="<?= $cart['gia_san_pham'] ?>">
                                                            <?= number_format($cart['gia_san_pham']) ?>đ
                                                       </td>
                                                       <td class="quantity">
                                                            <button class="decre" data-id="<?= $cart['id'] ?>">-</button>
                                                            <input type="text" value="<?= $cart['so_luong'] ?>"
                                                                 class="quantity-input" data-id="<?= $cart['id'] ?>">
                                                            <button class="incre" data-id="<?= $cart['id'] ?>">+</button>
                                                       </td>
                                                       <td><?= $cart['so_luong'] ?> sản phẩm</td>
                                                       <td class="total">
                                                            <?= number_format($cart['so_luong'] * $cart['gia_san_pham']) ?>đ
                                                       </td>
                                                  </tr>
                                             <?php endforeach; ?>
                                        </tbody>
                                   </table>
                                   <div class="cart-delete-conti">
                                        <button type="submit" class="btn" id="delete-selected-products">Xóa sản phẩm
                                             đã
                                             chọn</button>
                                        <a href="<?= BASE_URL . '?act=allCategory' ?>"><button type="button"
                                                  class="btn-o">Tiếp tục mua
                                                  hàng</button></a>
                                   </div>
                              </form>
                         </div>

                         <!--  -->
                         <div class="cart-block-end">
                              <div class="cart-component-r">
                                   <p>Tóm tắt đơn hàng</p>

                                   <div class="price-start">
                                        <span>Tạm tính</span>

                                        <p><?= is_numeric($total) ? number_format($total) : 0 ?></p>
                                   </div>

                                   <div class="total-end">
                                        <span>Tổng</span>
                                        <p><?= is_numeric($total) ? number_format($total) : 0 ?></p>
                                   </div>
                                   <a href="<?= BASE_URL . '?act=pay' ?>"><button>Thanh toán ngay</button></a>
                              </div>
                              <div class="cart-pay">
                                   <p>Chúng tôi chấp nhận thanh toán</p>
                                   <div class="cart-pay-img">
                                        <img src="./public/img/visa.png" alt="Visa">
                                        <img src="./public/img/amex.png" alt="Amex">
                                        <img src="./public/img/discover.png" alt="Discover">
                                        <img src="./public/img/mastercard.png" alt="Mastercard">
                                   </div>
                              </div>
                         </div>
                    </div>


               </div>
          </section>
     <?php endif; ?>
     <!--  -->
     <footer class="footer">
          <div class="container">
               <div class="footer-block">
                    <div class="footer-left">
                         <img src="./public/img/ảnh logo.svg" alt="" />
                         <p>Đăng ký nhận tin sớm nhất</p>
                         <div class="footer-input">
                              <input type="text" placeholder="Để lại email của bạn" />
                              <span><i class="fa-solid fa-arrow-right"></i></span>
                         </div>
                         <div class="footer-icon">
                              <i class="fa-brands fa-facebook"></i>
                              <i class="fa-brands fa-instagram"></i>
                              <i class="fa-brands fa-youtube"></i>
                              <i class="fa-brands fa-tiktok"></i>
                         </div>
                    </div>
                    <div class="footer-right">
                         <div class="footer-right-blogs">
                              <div class="footer-category">
                                   <h4>SẢN PHẨM</h4>
                                   <ul>
                                        <li>The Titan</li>
                                        <li>Gọng Kính</li>
                                        <li>Tròng kính</li>
                                        <li>Kính râm</li>
                                        <li>Kính râm trẻ em</li>
                                   </ul>
                              </div>
                              <div class="footer-contact">
                                   <h4>THÔNG TIN LIÊN HỆ</h4>
                                   <ul>
                                        <li>19000359</li>
                                        <li>marketing@kinhmatlml.com</li>
                                   </ul>
                              </div>
                         </div>
                         <div class="footer-right-policy">
                              <div class="footer-plc-text">
                                   <h4>CHÍNH SÁCH MUA HÀNG</h4>
                                   <ul>
                                        <li>Hình thức thanh toán</li>
                                        <li>Chính sách giao hàng</li>
                                        <li>Chính sách bảo hành</li>
                                   </ul>
                              </div>
                              <div class="footer-ply-lg">
                                   <h4>MST:0108195925</h4>
                                   <img src="./public/img/logo-bct_60fd99791e9948649b8a8a8f6bc64827.png" alt="" />
                              </div>
                         </div>
                    </div>
               </div>
               <div class="footer-brand">
                    <hr />
                    <p>LML © 2020 - 2024. Design by OKHUB Viet Nam</p>
               </div>
          </div>
     </footer>
     <script src="./public/js/cart.js"></script>
     <script>
          document.addEventListener("DOMContentLoaded", () => {
               // Xử lý sự kiện khi nhấn nút tăng
               document.querySelectorAll(".incre").forEach((button) => {
                    button.addEventListener("click", () => {
                         const id = button.dataset.id;
                         updateQuantity(id, 1); // Tăng số lượng
                    });
               });

               // Xử lý sự kiện khi nhấn nút giảm
               document.querySelectorAll(".decre").forEach((button) => {
                    button.addEventListener("click", () => {
                         const id = button.dataset.id;
                         updateQuantity(id, -1); // Giảm số lượng
                    });
               });

               // Hàm gửi yêu cầu AJAX để cập nhật số lượng
               function updateQuantity(cartId, change) {
                    console.log(cartId, change)
                    // index phải tạo route updateQuantity
                    fetch("<?= BASE_URL . '?act=updateQuantity' ?>", {
                         method: "POST",
                         headers: {
                              "Content-Type": "application/json"
                         },
                         body: JSON.stringify({
                              cartId,
                              change
                         }),
                    })
                         .then((response) => response.json())
                         .then((data) => {
                              console.log(data);
                              if (data.success) {
                                   // Cập nhật giao diện (số lượng, tổng giá trị)
                                   const quantityInput = document.querySelector(
                                        `.quantity-input[data-id="${cartId}"]`
                                   );
                                   const priceElement = document.querySelector(
                                        `.price[data-id="${cartId}"]`
                                   );
                                   const totalElement = document.querySelector(
                                        `.total[data-id="${cartId}"]`
                                   );

                                   quantityInput.value = data.newQuantity;
                                   totalElement.textContent = `${data.newTotalPrice}đ`;

                                   // Cập nhật tổng giỏ hàng
                                   document.querySelector(".cart-total").textContent = `${data.cartTotal}đ`;
                              } else {
                                   alert(data.message || "Cập nhật thất bại");
                              }
                         })
                         .catch((error) => {
                              console.error("Error:", error);
                         });
               }
          });
     </script>
</body>

</html>