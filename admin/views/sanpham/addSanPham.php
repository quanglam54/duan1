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
          <h1>Quản lý sản phẩm</h1>
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
              <h3 class="card-title">Thêm sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body row">
                <div class="form-group col-12">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" name="ten_san_pham" value="<?= isset($_SESSION['old_data']['ten_san_pham']) ? $_SESSION['old_data']['ten_san_pham'] : '' ?>" placeholder="Nhập tên sản phẩm">
                  <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Giá sản phẩm</label>
                  <input type="text" class="form-control" name="gia_san_pham"  value="<?= isset($_SESSION['old_data']['gia_san_pham']) ? $_SESSION['old_data']['gia_san_pham'] : '' ?>" placeholder="Nhập giá sản phẩm">
                  <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Giá khuyến mãi</label>
                  <input type="text" class="form-control" name="gia_khuyen_mai"  value="<?= isset($_SESSION['old_data']['gia_khuyen_mai']) ? $_SESSION['old_data']['gia_khuyen_mai'] : '' ?>" placeholder="Nhập giá khuyến mãi sản phẩm">
                  <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?></p>
                  <?php } ?>
                </div>

          
                <div class="form-group col-6">
                  <label>Hình ảnh </label>
                  <input type="file" class="form-control" name="hinh_anh" placeholder="Nhập giá sản phẩm">
                  <?php if (isset($_SESSION['errors']['hinh_anh'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Album ảnh</label>
                  <input type="file" name="img_array[]" class="form-control" multiple>
                </div>

                <div class="form-group col-6">
                  <label>Số lượng</label>
                  <input type="text" class="form-control" name="so_luong" value="<?= isset($_SESSION['old_data']['so_luong']) ? $_SESSION['old_data']['so_luong'] : '' ?>" placeholder="Nhập số lượng">
                  <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Ngày nhập </label>
                  <input type="date" class="form-control" name="ngay_nhap" value="<?= isset($_SESSION['old_data']['ngay_nhap']) ? $_SESSION['old_data']['ngay_nhap'] : '' ?>" >
                  <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group col-6">
                  <label>Danh mục</label>
                  <select class="form-control" name="danh_muc_id" aria-label="exampleFormControlSelect1">
                    <option selected disabled>Chọn danh mục sản phẩm</option>
                    <?php foreach($listDanhMuc as $danhMuc){?>
                        <option value="<?=$danhMuc['id']?>"  <?= isset($_SESSION['old_data']['danh_muc_id']) && $_SESSION['old_data']['danh_muc_id'] == $danhMuc['id'] ? 'selected' : ''?>><?=$danhMuc['ten_danh_muc']?></option>
                    <?php }?>
              
                  </select>
                  <?php if (isset($_SESSION['errors']['danh_muc_id'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['danh_muc_id'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Trạng thái</label>
                  <select class="form-control" name="trang_thai" aria-label="exampleFormControlSelect1">
                    <option selected disabled>Chọn trạng thái sản phẩm</option>
                    <option value="1"  <?= isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '1' ? 'selected' : ''?>>Còn bán</option>
                    <option value="2" <?= isset($_SESSION['old_data']['trang_thai']) && $_SESSION['old_data']['trang_thai'] == '2' ? 'selected' : ''?>>Dừng bán</option>
                  </select>
                  <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-12">
                    <label >Mô tả</label>
                    <textarea name="mo_ta" class="form-control"placeholder="Nhập mô tả"><?= isset($_SESSION['old_data']['mo_ta']) ? $_SESSION['old_data']['mo_ta'] : '' ?></textarea>
                  </div>
                

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name= 'submit' class="btn btn-success">Thêm</button>
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