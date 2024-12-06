<?php include './views/layout/header.php' ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý đơn hàng</h1>
        </div>
      </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Sửa đơn hàng: <?= $donHang['ma_don_hang'] ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
              <input type="hidden" name="don_hang_id" value="<?= $donHang['id'] ?>">

              <div class="card-body">
                <div class="form-group">
                  <label>Tên người nhận</label>
                  <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $donHang['ten_nguoi_nhan'] ?>" placeholder="Nhập tên người nhận">
                  <!--check Lỗi-->
                  <?php if (isset($_SESSION['errors']['ten_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ten_nguoi_nhan'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $donHang['sdt_nguoi_nhan'] ?>" placeholder="Nhập số điện thoại">
                  <!--check Lỗi-->
                  <?php if (isset($_SESSION['errors']['sdt_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['sdt_nguoi_nhan'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Email người nhận</label>
                  <input type="text" class="form-control" name="email_nguoi_nhan" value="<?= $donHang['email_nguoi_nhan'] ?>" placeholder="Nhập email người nhận">
                  <!--check Lỗi-->

                  <?php if (isset($_SESSION['errors']['email'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $donHang['dia_chi_nguoi_nhan'] ?>" placeholder="Nhập địa chỉ người nhận">
                  <!--check Lỗi-->
                  <?php if (isset($_SESSION['errors']['dia_chi_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['dia_chi_nguoi_nhan'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Ghi chú</label>
                  <input type="text" class="form-control" name="ghi_chu" value="<?= $donHang['ghi_chu'] ?>" placeholder="Nhập ghi chú">

                </div>
                <div class="form-group">
                  <label for="inputStatus">Trạng thái đơn hàng</label>
                  <select name="trang_thai_id" class="custom-select" id="inputStatus">
                    <?php foreach ($listTrangThaiDonHang as $trangThai) { ?>
                      <option
                        <?= $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' : '' ?>
                        <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?>
                        <?= ($donHang['trang_thai_id'] == 9 && $trangThai['id'] == 11) ? 'disabled' : '' ?>
                        value="<?= $trangThai['id'] ?>">
                        <?= $trangThai['ten_trang_thai']; ?>
                      </option>
                    <?php } ?>
                  </select>
                  <!--check Lỗi-->
                  <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                  <?php } ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Sửa</button>
                </div>
            </form>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--footer-->
<?php include './views/layout/footer.php'; ?>
<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
</body>


</html>