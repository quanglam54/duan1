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
                              <img src="./public/img/ảnh logo.svg" alt="" />
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
                              <input type="text" placeholder="Các mẫu kính râm hot nhất..." />

                              <div class="center-icon">
                                   <i class="fa-solid fa-magnifying-glass"></i>
                              </div>
                         </div>
                         <!--  -->
                         <div class="header-right">
                              <ul class="header-nav">
                                   <li><a href="#">Xem thêm
                                             <span><i class="fa-solid fa-chevron-down"></i></span>
                                        </a></li>
                                   <li><a href="#">Giỏ hàng
                                             <span> <i class="fa-solid fa-cart-shopping"></i></span>
                                        </a></li>
                                   <li><a href="#">Tài khoản
                                             <span><i class="fa-solid fa-user"></i></i></span>
                                        </a></li>
                              </ul>
                         </div>
                    </div>
               </div>
          </header>
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
     <section class="product-title">
          <div class="container">
               <span>Sản Phẩm</span>
          </div>
     </section>

     <section class="component">
          <div class="container">
               <div class="cart-block">
                    <div class="cart-component-l">
                         <table class="cart-table">
                              <thead>
                                   <tr>
                                        <th><input type="checkbox"></th>
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
                                             <td><input type="checkbox"></td>
                                             <td class="cart-product-info">
                                                  <img src="<?= "uploads/" . $cart['hinh_anh'] ?>" alt="Product Image">
                                                  <div class="cart-a">
                                                       <a href="#"><?= $cart['ten_san_pham'] ?></a>
                                                       <p>Màu sắc: Đen ghi</p>
                                                  </div>
                                             </td>
                                             <td><?= number_format($cart['gia_san_pham']) ?>đ</td>
                                             <td>
                                                  <div class="cart-quantity">
                                                       <button class="decre">-</button>
                                                       <input type="text" value="1">
                                                       <button class="incre">+</button>
                                                  </div>
                                             </td>
                                             <td>9 sản phẩm</td>
                                             <td>1.600.000đ</td>
                                        </tr>
                                   <?php endforeach; ?>
                              </tbody>
                         </table>
                    </div>

                    <div class="cart-component-r">
                         <p>Tóm tắt đơn hàng</p>
                         <div class="price-start">
                              <span>Tạm tính</span>
                              <p>1.600.000đ</p>
                         </div>
                         <div class="total-end">
                              <span>Tổng</span>
                              <p>1.600.000đ</p>
                         </div>
                         <button>Thanh toán ngay</button>
                    </div>
               </div>

               <div class="cart-block-end">
                    <div class="cart-delete-conti">
                         <button>Xóa sản phẩm đã chọn</button>
                         <button>Tiếp tục mua hàng</button>
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
     </section>

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
</body>

</html>