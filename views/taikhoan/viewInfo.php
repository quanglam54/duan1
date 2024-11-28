<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Tài khoản - Kính mắt LML</title>
     <link rel="stylesheet" href="./public/css/view.css" />
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
     <section class="view-user">
          <div class="container">
               <div class="view-info">
                    <div class="view-info-left">
                         <img src="public/img/anh-info.jpeg" alt="">
                         <h3><?= $viewUser['ho_ten'] ?></h3>
                         <hr>
                         <div class="view-info-list">
                              <ul>
                                   <li><a href="#">Danh sách đơn hàng</a></li>
                                   <li><a href="#">Thông tin tài khoản</a></li>
                                   <li><a href="<?= BASE_URL . '?act=logout' ?>">Đăng xuất</a></li>
                                   <li><a href="<?= BASE_URL . '?act=edit-info' ?>">Sửa thông tin tài khoản</a></li>
                              </ul>
                         </div>
                    </div>
                    <div class="view-info-right">
                         <h3>Thông tin tài khoản</h3>

                         <form action="<?= BASE_URL . '?act=update-pass' ?>" method="post">
                              <div class="form-block">
                                   <div class="form-control">
                                        <label for="">Tên*</label>
                                        <input type="text" placeholder="Tên" disabled>
                                   </div>
                                   <div class="form-control">
                                        <label for="">Họ*</label>
                                        <input type="text" placeholder="Họ">
                                   </div>
                                   <div class="form-control">
                                        <label for="">Tên hiển thị*</label>
                                        <input type="text" placeholder="Tên hiển thị"
                                             value="<?= $viewUser['ho_ten'] ?>" disabled>
                                   </div>
                                   <div class="form-control">
                                        <label for="">Địa chỉ email*</label>
                                        <input type="email" placeholder="Địa chỉ email"
                                             value="<?= $viewUser['email'] ?>" disabled>
                                   </div>
                                   <div class="form-control">
                                        <label for="">Số điện thoại*</label>
                                        <input type="number" placeholder="Số điện thoại"
                                             value="<?= isset($viewUser['so_dien_thoai']) ? $viewUser['so_dien_thoai'] : '' ?>" disabled>
                                   </div>
                              </div>
                              <div class="form-item">
                                   <div class="form-control">
                                        <label for="">Mật khẩu hiện tại*</label>
                                        <input type="password" placeholder="Mật khẩu hiện tại" name="old_pass">
                                        <?php if (isset($_SESSION['err']['old_pass'])): ?>
                                             <p style="color:red;"><?= $_SESSION['err']['old_pass'] ?></p>
                                        <?php endif; ?>
                                   </div>
                                   <div class="form-control">
                                        <label for="">Mật khẩu mới*</label>
                                        <input type="password" placeholder="Mật khẩu mới" name="new_pass">

                                   </div>
                                   <div class="form-control">
                                        <label for="">Nhập lại mật khẩu mới*</label>
                                        <input type="password" placeholder="Nhập lại mật khẩu mới" name="confirm_pass">
                                        <?php if (isset($_SESSION['err']['new_pass'])): ?>
                                             <p style="color:red;"><?= $_SESSION['err']['new_pass'] ?></p>
                                        <?php endif; ?>
                                   </div>
                                   <div class="form-button">
                                        <button type="submit">Đổi mật khẩu</button>
                                   </div>

                              </div>
                         </form>

                    </div>
               </div>
          </div>
     </section>
</body>

</html>