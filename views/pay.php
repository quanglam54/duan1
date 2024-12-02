<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Thanh toán - Kính mắt LML</title>
     <link rel="stylesheet" href="./public/css/pay.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet" />
     <style>
          .text-danger {
               color: #dc3545;
          }
     </style>
</head>

<body>
     <section class="wrapper">
          <header id="header">
               <div class="container">
                    <div class="header-main">
                         <div class="header-left">
                              <a href="<?= BASE_URL ?>"> <img src="./public/img/ảnh logo.svg" alt="" /></a>
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
                                   <li><a
                                             href="<?= isset($_SESSION['ho_ten']['ho_ten']) ? BASE_URL . '?act=view-cart' : '' ?>">
                                             Giỏ hàng
                                             <span> <i class="fa-solid fa-cart-shopping"></i></span>
                                        </a></li>
                                   <?php if (isset($_SESSION['ho_ten'])): ?>
                                        <li><a href="<?= BASE_URL . '?act=view-info' ?>">Xin
                                                  Chào:<?= $_SESSION['ho_ten']['ho_ten'] ?>
                                                  <span><i class="fa-solid fa-user"></i></i></span>
                                                  <a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a>
                                             </a></li>
                                   <?php else: ?>
                                        <li><a href="<?= BASE_URL . '?act=register' ?>">Tài khoản
                                                  <span><i class="fa-solid fa-user"></i></i></span>
                                             </a></li>
                                   <?php endif; ?>

                              </ul>
                         </div>
                    </div>
               </div>
          </header>
     </section>
     <!--  -->
     <section class="checkout-section">
          <div class="container">
               <div class="checkout-block">
                    <div class="checkout-form">
                         <h2>THANH TOÁN</h2>
                         <form action="<?= BASE_URL . '?act=dat-hang' ?>" method="post">
                              <label for="name">Họ và tên *</label>
                              <input type="text" name="name" placeholder="Họ và tên" value="<?= $users['ho_ten'] ?>">
                              <?php if (isset($_SESSION['errors']['name'])) { ?>
                                   <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                              <?php } ?>

                              <label for="phone">Số điện thoại *</label>
                              <input type="text" name="phone" placeholder="Số điện thoại">
                              <?php if (isset($_SESSION['errors']['phone'])) { ?>
                                   <p class="text-danger"><?= $_SESSION['errors']['phone'] ?></p>
                              <?php } ?>

                              <label for="email">Email *</label>
                              <input type="email" name="email" placeholder="Email" value="<?= $users['email'] ?>">

                              <label for="address">Địa chỉ chi tiết *</label>
                              <input type="text" name="address" placeholder="Địa chỉ chi tiết">
                              <?php if (isset($_SESSION['errors']['address'])) { ?>
                                   <p class="text-danger"><?= $_SESSION['errors']['address'] ?></p>
                              <?php } ?>
                              <label for="date">Ngày đặt *</label>
                              <input type="date" name="date" value="<?= date('Y-m-d') ?>" readonly>

                              <label for="additional-info">Thông tin bổ sung</label>
                              <textarea id="additional-info" name="description"
                                   placeholder="Thông tin bổ sung"></textarea>

                              <div class="payment-method">
                                   <p>Phương thức thanh toán</p>

                                   <div class="payment-radio">
                                        <input type="radio" name="">
                                        <p>Thanh toán khi nhận hàng</p>
                                   </div>
                              </div>

                              <button type="submit">Đặt hàng</button>
                         </form>
                    </div>

                    <div class="checkout-summary">
                         <div class="discount-section">
                              <h3>Nhập mã giảm giá</h3>
                              <input type="text" placeholder="Nhập mã giảm giá">
                              <button class="apply-btn">Áp dụng</button>
                         </div>

                         <div class="product-summary">
                              <h4>Sản phẩm trong giỏ hàng</h4>
                              <?php
                              $totalAmount = 0;
                              foreach ($cart_item as $item) {
                                   $itemTotal = $item['so_luong'] * $item['gia_san_pham'];
                                   $totalAmount += $itemTotal;
                              ?>
                                   <div class="product-item">
                                        <img src="<?= "uploads/" . $item['hinh_anh'] ?>" alt="Product Image">
                                        <div class="product-info">
                                             <p><?= $item['ten_san_pham'] ?></p>
                                             <p>Màu sắc: Đen Ghi</p>
                                        </div>
                                        <p><?= $item['so_luong'] ?></p>
                                        <p><?= number_format($item['gia_san_pham']) ?>đ</p>
                                   </div>
                              <?php } ?>
                         </div>

                         <div class="summary-totals">
                              <div class="summary-item">
                                   <span>Tạm tính</span>
                                   <span><?= number_format($totalAmount) ?></span>
                              </div>
                              <div class="summary-item">
                                   <span>Phí vận chuyển</span>
                                   <span>30.000đ</span>
                              </div>
                              <div class="summary-item">
                                   <span>Giảm</span>
                                   <span>0đ</span>
                              </div>
                              <div class="summary-item total">
                                   <span>Tổng cộng</span>
                                   <span><?= number_format($totalAmount + 30000) ?>đ </span>
                              </div>
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