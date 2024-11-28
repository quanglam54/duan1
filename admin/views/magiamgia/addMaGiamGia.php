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
          <h1>Quản lý mã giảm giá</h1>
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
              <h3 class="card-title">Thêm mã giảm giá</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?=BASE_URL_ADMIN.'?act=them-ma-giam-gia'?>" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label>Mã giảm giá</label>
                  <input type="text" class="form-control" name="ma_giam_gia" value="<?= isset($_SESSION['old_data']['ma_giam_gia']) ? $_SESSION['old_data']['ma_giam_gia'] : '' ?>" placeholder="Nhập mã giảm giá">
                  <!--check Lỗi-->
                  <?php if(isset($_SESSION['errors']['ma_giam_gia'])){ ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ma_giam_gia']?></p>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label>Mức giảm giá (VNĐ)</label>
                  <input type="text" class="form-control" name="muc_giam_gia" value="<?= isset($_SESSION['old_data']['muc_giam_gia']) ? $_SESSION['old_data']['muc_giam_gia'] : '' ?>"  placeholder="Nhập mức giảm giá">
                  <!--check Lỗi-->
                  <?php if(isset($_SESSION['errors']['muc_giam_gia'])){ ?>
                    <p class="text-danger"><?= $_SESSION['errors']['muc_giam_gia']?></p>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label>Ngày bắt đầu</label>
                  <input type="date" class="form-control" min="<?=date("Y-m-d")?>" name="bat_dau" value="<?= isset($_SESSION['old_data']['bat_dau']) ? $_SESSION['old_data']['bat_dau'] : '' ?>">
                  <!--check Lỗi-->
                  <?php if(isset($_SESSION['errors']['bat_dau'])){ ?>
                    <p class="text-danger"><?= $_SESSION['errors']['bat_dau']?></p>
                  <?php }?>
                </div>
                <div class="form-group">
                  <label>Ngày kết thúc</label>
                  <input type="date" class="form-control" name="ket_thuc" value="<?= isset($_SESSION['old_data']['ket_thuc']) ? $_SESSION['old_data']['ket_thuc'] : '' ?>">
                  <!--check Lỗi-->
                  <?php if(isset($_SESSION['errors']['ket_thuc'])){ ?>
                    <p class="text-danger"><?=$_SESSION['errors']['ket_thuc']?></p>
                  <?php }?>
                </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success">Thêm</button>
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