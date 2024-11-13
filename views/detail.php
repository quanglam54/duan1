<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Chi tiết sản phẩm</title>
     <link rel="stylesheet" href="./public/css/detail.css" />
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
     <section class="detail-products">
          <div class="container">
               <div class="detail-lists">
                    <div class="detail-item">
                         <img src="./public/img/sp-1.jpg" alt="" />
                         <img src="./public/img/sp-2.jpg" alt="" />
                         <img src="./public/img/sp-3.jpg" alt="" />
                         <img src="./public/img/sp-gong4.jpg" alt="" />
                         <img src="./public/img/sp-gong3.jpg" alt="" />
                    </div>
                    <!--  -->

                    <div class="detail-item-bn">
                         <img src="<?= "./uploads/" . $productDetail['hinh_anh'] ?>" alt="" />
                    </div>

                    <div class="detail-item-des">
                         <h6>Gọng Kính</h6>
                         <h2><?= $productDetail['ten_san_pham'] ?></h2>
                         <span><?= $productDetail['gia_san_pham'] ?></span>
                         <div class="detail-list-color">
                              <ul>
                                   <li class="dark"></li>
                                   <li class="blur"></li>
                                   <li class="titan"></li>
                              </ul>
                         </div>
                         <p>
                              Gọng nhựa hình oval là một lựa chọn tuyệt vời cho những ai yêu
                              thích phong cách hiện đại và năng động. Với chất liệu nhựa cao
                              cấp, sản phẩm này sẽ giúp bạn tự tin và thoải mái khi sử dụng
                              trong suốt thời gian dài. Đặc điểm nổi bật: Gọng hình oval Chất
                              liệu nhựa cao cấp Thiết kế hiện đại, năng động Sản phẩm này được
                              thiết kế với gọng hình oval tinh tế và thanh lịch, giúp cho khuôn
                              mặt của bạn trở nên hoàn hảo và thu hút. Chất liệu nhựa mang lại
                              sự bền vữṇg và êm ái cho người dùng.
                         </p>
                         <div class="detail-pay">
                              <div class="pay-quantity">
                                   <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                                        <div class="quantity-decre">
                                             <a href="#">- |</a>
                                             <input type="number" name="so_luong" value="1">
                                             <a href="#">| +</a>
                                        </div>
                                        <div class="pay-addcart">
                                             <input type="hidden" name="id_product" value="<?= $productDetail['id'] ?>">
                                             <input type="hidden" name="user_product"
                                                  value="<?= (isset($_SESSION['ho_ten']['id']) ?? '') ?>">
                                             <button type="submit">Thêm vào giỏ</button>
                                             <a href="#">350.000đ</a>
                                        </div>
                                   </form>
                              </div>
                         </div>
                         <hr />
                         <div class="quantity-exist">
                              <span>Còn 12 sản phẩm</span>
                              <p><a href="#">Xem showroom còn hàng +</a></p>
                         </div>
                         <hr />
                         <div class="detail-select-block">
                              <div class="detail-select-item">
                                   <h4>Chọn kính theo gương mặt</h4>
                                   <span>></span>
                              </div>
                              <div class="detail-select-item">
                                   <h4>Thông tin</h4>
                                   <span>+</span>
                              </div>
                              <div class="detail-select-item">
                                   <h4>Vận chuyển - đổi trả</h4>
                                   <span>+</span>
                              </div>
                         </div>
                         <hr />
                    </div>
               </div>
          </div>
     </section>
     <hr />
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
     <section class="comments">
          <div class="container">
               <div class="comment-blocks">
                    <div class="comment-product">
                         <h3>Bình luận của sản phẩm</h3>
                         <?php if (isset($_SESSION['ho_ten'])): ?>
                              <form action="<?= BASE_URL . '?act=comment' ?>" method="post">
                                   <textarea name="comment" cols="70" rows="10"></textarea> <br />
                                   <input type="hidden" name="product_id" value="<?= $productDetail['id'] ?>">
                                   <button type="submit">Gửi bình luận</button>
                              </form>
                         <?php else: ?>
                              <a href="<?= BASE_URL . '?act=login' ?>">Vui lòng đăng nhập</a>
                         <?php endif; ?>
                    </div>
                    <?php if (empty($comments)): ?>
                         <p>Sản phẩm chưa có bình luận</p>
                    <?php else: ?>
                         <div class="comment-product-user">
                              <table>
                                   <thead>
                                        <tr>
                                             <th>Người bình luận</th>
                                             <th>Nội dung</th>
                                             <th>Ngày bình luận</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php foreach ($comments as $cmt): ?>
                                             <tr>
                                                  <td><?= $cmt['ho_ten'] ?></td>
                                                  <td><?= $cmt['noi_dung'] ?></td>
                                                  <td><?= $cmt['ngay_dang'] ?></td>
                                             </tr>
                                        <?php endforeach; ?>
                                   </tbody>

                              </table>
                         </div>

                    <?php endif; ?>
               </div>
               <hr>
          </div>
     </section>

     <!--  -->
     <section class="evalute">
          <div class="container">
               <h3>Đánh giá từ người mua</h3>
               <div class="evalute-block">
                    <div class="evalute-left">
                         <div class="evalute-left-star">
                              <h5>4.9/5</h5>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <span><i class="fa-solid fa-star"></i></span>
                              <p>20 đánh giá</p>
                         </div>
                         <hr />
                         <div class="evalute-left-input">
                              <div class="evalute-input-bg">
                                   <p>
                                        5 <span><i class="fa-solid fa-star"></i></span>
                                   </p>
                                   <span class="span1">
                                        <span class="span2"></span>
                                   </span>
                                   <p>15</p>
                              </div>
                              <div class="evalute-input-bg">
                                   <p>
                                        4 <span><i class="fa-solid fa-star"></i></span>
                                   </p>
                                   <span class="span1">
                                        <span class="span3"></span>
                                   </span>
                                   <p>15</p>
                              </div>
                              <div class="evalute-input-bg">
                                   <p>
                                        3<span><i class="fa-solid fa-star"></i></span>
                                   </p>
                                   <span class="span1">
                                        <span class="span4"></span>
                                   </span>
                                   <p>15</p>
                              </div>
                         </div>
                    </div>
                    <div class="evalute-right">
                         <h2>Đánh giá sản phẩm</h2>
                         <div class="evalute-right-star">
                              <span><i class="fa-regular fa-star"></i></span>
                              <span><i class="fa-regular fa-star"></i></span>
                              <span><i class="fa-regular fa-star"></i></span>
                              <span><i class="fa-regular fa-star"></i></span>
                              <span><i class="fa-regular fa-star"></i></span>
                         </div>
                         <p>Hãy đánh giá sản phẩm chúng tôi</p>
                    </div>
               </div>
          </div>
     </section>
     <!--  -->
     <hr />
     <!--  -->
     <section class="lenses">
          <div class="container">
               <div class="lenses-title">
                    <h2>TRÒNG KÍNH BỔ TRỢ</h2>
                    <a href="#"><i class="fa-solid fa-arrow-right"></i>Xem thêm</a>
               </div>
          </div>
     </section>
     <!--  -->
     <section class="main-block">
          <div class="container">
               <div class="block-products">
                    <div class="product-item">
                         <div class="product-item-img">
                              <img src="public/img/sp-8.jpeg" alt="" />
                         </div>
                         <div class="product-item-title">
                              <h3>Tròng kính Chemi U2 Chiết suất 1.67</h3>
                              <div class="product-item-price">
                                   <p>Liên hệ ngay</p>
                                   <span><i class="fa-solid fa-arrow-right"></i> </span>
                              </div>
                         </div>
                    </div>
                    <!--  -->
                    <div class="product-item">
                         <div class="product-item-img">
                              <img src="public/img/sp-9.jpeg" alt="" />
                         </div>
                         <div class="product-item-title">
                              <h3>Tròng kính Chemi U2 Chiết suất 1.67</h3>
                              <div class="product-item-price">
                                   <p>Liên hệ ngay</p>
                                   <span><i class="fa-solid fa-arrow-right"></i> </span>
                              </div>
                         </div>
                    </div>
                    <!--  -->
                    <div class="product-item">
                         <div class="product-item-img">
                              <img src="public/img/sp-11.jpeg" alt="" />
                         </div>
                         <div class="product-item-title">
                              <h3>Tròng kính Chemi U2 Chiết suất 1.67</h3>
                              <div class="product-item-price">
                                   <p>Liên hệ ngay</p>
                                   <span><i class="fa-solid fa-arrow-right"></i> </span>
                              </div>
                         </div>
                    </div>
                    <!--  -->
                    <div class="product-item">
                         <div class="product-item-img">
                              <img src="public/img/sp-10.jpeg" alt="" />
                         </div>
                         <div class="product-item-title">
                              <h3>Tròng kính Chemi U2 Chiết suất 1.67</h3>
                              <div class="product-item-price">
                                   <p>Liên hệ ngay</p>
                                   <span><i class="fa-solid fa-arrow-right"></i> </span>
                              </div>
                         </div>
                    </div>
                    <!--  -->
               </div>

               <button>Xem thêm tròng kính +</button>
          </div>
     </section>
     <!--  -->
     <section class="bestseller">
          <div class="container">
               <div class="blog-bestseller">
                    <h1>SẢN PHẨM TƯƠNG TỰ</h1>
                    <div class="bestseller-wrap">
                         <div class="products-bestseller-container">
                              <div class="products-bestseller">
                                   <?php foreach ($productOther as $other): ?>
                                        <div class="item-bestseller">
                                             <div class="item-bestseller-img">
                                                  <a href="<?= BASE_URL . '?act=detail&id=' . $other['id'] ?>"><img
                                                            src="<?= "uploads/" . $other['hinh_anh'] ?>" alt="" /></a>
                                             </div>
                                             <div class="item-title">
                                                  <p>GK.M Gọng nhựa LML221393</p>
                                                  <div class="item-icon">
                                                       <h5>350.000đ</h5>
                                                       <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                                                  </div>
                                             </div>
                                        </div>
                                   <?php endforeach; ?>
                              </div>
                         </div>
                         <div class="buttons-seller">
                              <button class="prev-bestseller"><i class="fa-solid fa-arrow-left"></i></button>
                              <button class="next-bestseller"><i class="fa-solid fa-arrow-right"></i></button>
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
     <script src="./public/js/slide.js"></script>
</body>

</html>