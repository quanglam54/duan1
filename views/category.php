<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Danh mục sản phẩm</title>
     <link rel="stylesheet" href="public/css/category.css" />
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
                                   <li><a href="#">Tài khoản
                                             <span><i class="fa-solid fa-user"></i></i></span>
                                        </a></li>
                              </ul>
                         </div>
                    </div>
               </div>
          </header>
     </section>
     <section class="section-sort">
          <select name="" class="sort">
               <option value="">Sort By</option>
               <option value="">Giá thấp nhất</option>
               <option value="">Giá cao nhất</option>
               <option value="">Giá trung bình</option>
          </select>
     </section>
     <main>
          <div class="container">
               <div class="main-cate">
                    <aside class="filter-sidebar">
                         <h2>Bộ lọc</h2>
                         <div class="filter-section">
                              <h3>Màu sắc</h3>
                              <label><input type="checkbox" /> Đen</label>
                              <label><input type="checkbox" /> Xanh dương</label>
                              <!-- Thêm các tùy chọn màu sắc khác -->
                         </div>

                         <div class="filter-section">
                              <h3>Thương hiệu</h3>
                              <label><input type="checkbox" /> Classic</label>
                              <label><input type="checkbox" /> Excer</label>
                              <!-- Thêm các tùy chọn thương hiệu khác -->
                         </div>

                         <div class="filter-section">
                              <h3>Chất liệu</h3>
                              <label><input type="checkbox" /> Kim loại</label>
                              <label><input type="checkbox" /> Nhựa</label>
                              <!-- Thêm các tùy chọn chất liệu khác -->
                         </div>

                         <div class="filter-section">
                              <h3>Hình dáng</h3>
                              <label><input type="checkbox" /> Hình tròn</label>
                              <label><input type="checkbox" /> Hình vuông</label>
                              <!-- Thêm các tùy chọn hình dáng khác -->
                         </div>

                         <div class="filter-section">
                              <h3>Tính năng</h3>
                              <label><input type="checkbox" /> Chống ánh sáng xanh</label>
                              <label><input type="checkbox" /> Siêu mỏng</label>
                              <!-- Thêm các tùy chọn tính năng khác -->
                         </div>
                    </aside>

                    <section class="product-list">
                         <?php foreach ($allSanPhams as $sp): ?>
                              <div class="product-card">
                                   <div class="product-card-img">
                                        <a href="<?= BASE_URL . '?act=detail&id=' . $sp['id'] ?>"> <img
                                                  src="<?= "uploads/" . $sp['hinh_anh'] ?>" alt="Sản phẩm 1" /></a>
                                   </div>
                                   <div class="product-cart-title">
                                        <h4><?= $sp['ten_san_pham'] ?></h4>
                                        <span><i class="fa-solid fa-arrow-right"></i></span>
                                   </div>
                              </div>
                         <?php endforeach; ?>
                         <!-- -->
                    </section>
               </div>
          </div>
     </main>
     <!-- hết -->
     <section class="product-news">
          <div class="container">
               <div class="product-new-title">
                    <h2>SẢN PHẨM MỚI NHẤT</h2>
               </div>
               <div class="product-hots">
                    <img src="./public/img/img-hot.jpeg" alt="">

                    <div class="slider-product-one-container">
                         <div class="list-item-news">
                              <?php foreach ($sanPhamNews as $spNew): ?>
                                   <div class="news-container">
                                        <div class="item-slider">
                                             <a href="<?= BASE_URL . '?act=detail&id=' . $spNew['id'] ?>"><img
                                                       src="<?= "./uploads/" . $spNew['hinh_anh'] ?>" alt=""></a>
                                        </div>
                                        <div class="item-box-text">
                                             <div class="item-box">
                                                  <a href="#"><span><?= $spNew['ten_san_pham'] ?></span></a>
                                             </div>
                                             <div class="price-slide">
                                                  <p><?= number_format($spNew['gia_san_pham']) ?>đ</p>
                                                  <span><i class="fa-solid fa-arrow-right"></i></span>
                                             </div>
                                        </div>
                                   </div>
                              <?php endforeach; ?>
                              <!--  -->
                         </div>
                         <!--  -->


                         <div class="news-icon">
                              <i class="fa-solid fa-arrow-left"></i>
                              <i class="fa-solid fa-arrow-right"></i>
                         </div>
                    </div>

               </div>
          </div>
     </section>
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
     <script src="./public/js/cate.js"></script>
</body>

</html>