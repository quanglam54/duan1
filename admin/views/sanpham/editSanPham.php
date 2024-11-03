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
              <h3 class="card-title">Sửa sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body row">
                <div class="form-group col-12">

                <input type="hidden" name="san_pham_id" value="<?=$sanPham['id']?>">
                  <label>Tên sản phẩm</label>
                  <input type="text" class="form-control" name="ten_san_pham" value="<?= $sanPham['ten_san_pham']?>" placeholder="Nhập tên sản phẩm">
                  <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Giá sản phẩm</label>
                  <input type="number" class="form-control" name="gia_san_pham"  value="<?= $sanPham['gia_san_pham'] ?>" placeholder="Nhập giá sản phẩm">
                  <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group col-6">
                  <label>Giá khuyến mãi</label>
                  <input type="number" class="form-control" name="gia_khuyen_mai"  value="<?=$sanPham['gia_khuyen_mai'] ?>" placeholder="Nhập giá khuyến mãi sản phẩm">
                  <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?></p>
                  <?php } ?>
                </div>

          
                <div class="form-group col-6">
                  <label>Hình ảnh </label>
                 <div class="input-group">
                  <div class="custom-file">
                  <input type="file" class="custom-file-input" id="hinh_anh" value="<?=$sanPham['hinh_anh']?>" class="form-control" name="hinh_anh" aria-describedby="inputGroupFileAddon01">
                  <label for="hinh_anh" class="custom-file-label"><?=$sanPham['hinh_anh'] ?basename($sanPham['hinh_anh']) : 'Chọn file'?></label>
                  </div>
                 </div>
                  <img src="<?=BASE_URL_ADMIN . $sanPham['hinh_anh']?>" style="width:100px">
                  <?php if (isset($_SESSION['errors']['hinh_anh'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Số lượng</label>
                  <input type="text" class="form-control" name="so_luong" value="<?= $sanPham['so_luong'] ?>" placeholder="Nhập số lượng">
                  <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Ngày nhập </label>
                  <input type="date" class="form-control" name="ngay_nhap" value="<?= $sanPham['ngay_nhap'] ?>" >
                  <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group col-6">
                  <label>Danh mục</label>
                  <select class="form-control" name="danh_muc_id" aria-label="exampleFormControlSelect1">
                    <option disabled>Chọn danh mục sản phẩm</option>
                    <?php foreach($listDanhMuc as $danhMuc){?>
                        <option <?=$danhMuc['id']===$sanPham['danh_muc_id'] ? 'selected' :''?> value ="<?= $danhMuc['id']?>"><?=$danhMuc['ten_danh_muc']?></option>
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
                    <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                    <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng bán</option>
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
                <button type="submit" name= 'submit' class="btn btn-success">Sửa</button>
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