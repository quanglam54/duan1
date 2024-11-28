<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Đặt hàng- Kính mắt LML</title>
     <link rel="stylesheet" href="./public/css/end.css" />
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
          </header>
     </section>
     <!--  -->
     <section class="order">
          <marquee behavior="">Đặt hàng thành công cảm ơn quý khách</marquee>
          <div class="container">
               <h2>Thông tin đơn hàng</h2>
               <table>
                    <thead>
                         <tr>
                              <th>Mã đơn hàng</th>
                              <th>Ngày đặt</th>
                              <th>Tổng tiền</th>
                              <th>Phương thức thanh toán</th>
                              <th>Trạng thái đơn hàng</th>
                              <th>Thao tác</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($viewEnds as $end): ?>
                              <tr>
                                   <td><?= $end['ma_don_hang'] ?></td>
                                   <td><?= $end['ngay_dat'] ?></td>
                                   <td><?= number_format($end['tong_tien']) ?>đ</td>
                                   <td><?= $phuongThucThanhToan[$end['phuong_thuc_thanh_toan_id']] ?></td>
                                   <!-- lúc này $pttt sẽ là [1] thì sẽ lấy theo key -->
                                   <td><?= $trangThaiDonHang[$end['trang_thai_id']] ?></td>
                                   <!-- lúc này $ttdh sẽ là [1] theo key -->

                                   <td>Hủy đơn</td>
                              </tr>
                         <?php endforeach; ?>
                    </tbody>
               </table>
               <h5>Gửi Email Xác Nhận</h5>
               <?php
               $ordersGroupedByEmail = [];
               foreach ($view as $order) {
                    $ordersGroupedByEmail[$order['email_nguoi_nhan']][] = $order;
                    // nhóm theo email có bnh đơn cùng email sẽ push vào duyệt qua $order
                    // email nào có 2 mã đơn trùng email sẽ nhóm
                    // [] là thêm vào cuối mảng ktra = cách qua $order email
               }

               foreach ($ordersGroupedByEmail as $email => $orders): ?>
                    <form action="<?= BASE_URL . '?act=send-mail' ?>" method="post">
                         <input type="hidden" name="email" value="<?= $email ?>">

                         <?php foreach ($orders as $order): ?>
                              <input type="hidden" name="order_ids[]" value="<?= $order['don_hang_id'] ?>">
                         <?php endforeach; ?>

                         <button>Gửi email xác nhận cho các đơn hàng của <?= $email ?></button>
                    </form>
               <?php endforeach; ?>
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