<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Đăng ký - Kính mắt LML</title>
     <link rel="stylesheet" href="./public/css/register.css" />
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
     <section class="login-block">
          <div class="container">
               <div class="login-center">
                    <div class="login-item-left">
                         <img src="./public/img/img-register.jpeg" alt="ảnh login" />
                    </div>
                    <div class="login-item-right">
                         <h5>Đăng ký</h5>
                         <p>Hãy đăng ký để được hưởng đặc quyền riêng dành cho bạn</p>
                         <form action="<?= BASE_URL . '?act=postRegis' ?>" method="post">
                              <div class="form-control">
                                   <label for="tài khoản">Tài khoản<i class="fa-solid fa-star-of-life"></i></label>
                                   <input type="text" name="username" placeholder="Nhập tài khoản" />
                                   <?php if (isset($err['username'])): ?>
                                        <p style="color: red;"><?= $err['username'] ?></p>
                                   <?php endif; ?>
                              </div>
                              <div class="form-control">
                                   <label for="email">Email<i class="fa-solid fa-star-of-life"></i></label>
                                   <input type="email" name="email" placeholder="Nhập email" />
                                   <?php if (isset($err['email'])): ?>
                                        <p style="color: red;"><?= $err['email'] ?></p>
                                   <?php endif; ?>
                              </div>
                              <div class="form-control">
                                   <label for="mật khẩu">Mật khẩu<i class="fa-solid fa-star-of-life"></i></label>
                                   <input type="password" name="password" placeholder="Nhập mật khẩu" />
                                   <?php if (isset($err['password'])): ?>
                                        <p style="color: red;"><?= $err['password'] ?></p>
                                   <?php endif; ?>
                              </div>
                              <div class="form-security">
                                   <p>
                                        Thông tin của bạn sẽ được bảo mật theo
                                        <b> chính sách riêng</b> của chúng tôi
                                   </p>
                              </div>
                              <div class="form-control">
                                   <button type="submit">Đăng ký ngay</button>
                              </div>
                         </form>
                         <div class="form-control or">
                              <p>Hoặc</p>
                         </div>
                         <div class="form-google">
                              <img src="./public/img/logo-google.jpg" alt="" />
                              <a href="#">Đăng nhập bằng <b>Google</b></a>
                         </div>
                         <h6>Bạn chưa có tài khoản LML ?</h6>
                         <a href="<?= BASE_URL . '?act=login' ?>" class="regis-click">Đăng nhập ngay</a>
                         <a href="<?= BASE_URL_ADMIN . '?act=form-login-admin' ?>" class="regis-click">Đăng nhập Admin</a>
                    </div>
               </div>
          </div>
     </section>
     <!--  -->
     <section class="introduce">
          <div class="container">
               <div class="introduce-blogs">
                    <div class="introduce-item introduce-protect">
                         <span><i class="fa-solid fa-shield"></i></span>
                         <p>Bảo hành trọn đời</p>
                    </div>
                    <div class="introduce-item introduce-rotate">
                         <span><i class="fa-solid fa-arrows-rotate"></i></span>
                         <p>Thu cũ đổi mới</p>
                    </div>
                    <div class="introduce-item introduce-rotate">
                         <span><i class="fa-solid fa-eye"></i></span>
                         <p>Đo mắt miễn phí</p>
                    </div>
                    <div class="introduce-item introduce-rotate">
                         <span><i class="fa-solid fa-pump-medical"></i></span>
                         <p>Vệ sinh và bảo quản kính</p>
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