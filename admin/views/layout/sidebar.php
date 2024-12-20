  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

      <span class="brand-text font-weight-light">Quản trị</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="<?=BASE_URL_ADMIN.'?act=form-sua-tai-khoan-ca-nhan-admin'?>"><img src="<?=BASE_URL_ADMIN.'../uploads/'.$thongTin['anh_dai_dien']?>" class="img-circle elevation-2" alt="User Image"></a>
        </div>
        <div class="info">
          <a href="<?=BASE_URL_ADMIN .'?act=form-sua-tai-khoan-ca-nhan-admin'?>" class="d-block"><?=$thongTin['ho_ten']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=BASE_URL_ADMIN?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Thống kê
                <i class="right"></i>
              </p>
            </a>
    
          </li>
          <li class="nav-item">
            <a href="<?=BASE_URL_ADMIN. '?act=danh-muc'?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh mục
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=BASE_URL_ADMIN.'?act=san-pham'?>" class="nav-link">
              <i class="nav-icon fab fa-shopify"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=BASE_URL_ADMIN . '?act=list-ma-giam-gia'?>" class="nav-link">
            <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Mã giảm giá
                <i class="right"></i>
              </p>
            </a>
    
          </li>


          <li class="nav-item">
            <a href="<?=BASE_URL_ADMIN.'?act=don-hang'?>" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
              Đơn hàng
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Tài khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= BASE_URL_ADMIN .'?act=list-tai-khoan-admin'?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=BASE_URL_ADMIN .'?act=list-tai-khoan-khach-hang'?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khách hàng</p>
                </a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item">
            <a href="<?=BASE_URL?>" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
              Vào website
              </p>
            </a>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


