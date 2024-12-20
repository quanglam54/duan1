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
          <h1>Quản lý tài khoản cá nhân</h1>
        </div>
      </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <div class="text-center">
          <?php if (isset($_SESSION['messImg'])) { ?>
              <div class="alert alert-info alert-dismissable">
                <a href="" class="panel-close close" data-dismiss="alert"></a>
                <i class="fa fa-coffee"></i>
                <?= $_SESSION['messImg'] ?>
                <?php unset($_SESSION['messImg']); ?>
              </div>
            <?php } ?>
            <form action="<?= BASE_URL_ADMIN . '?act=sua-anh-dai-dien-admin' ?>" method="POST" enctype="multipart/form-data">

              <input type="text" name="tai_khoan_id" id="" value="<?= $thongTin['id'] ?>" hidden>

              <img src="<?= BASE_URL_ADMIN.'../uploads/'.$thongTin['anh_dai_dien'] ?>" style="width:100px" class="avatar img-circle" alt="avatar">
              <input type="file" name="anh_dai_dien">

              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                  <input type="submit" class="btn btn-primary" value="Cập nhật Avatar">
                </div>
              </div>
              <hr>

            </form>
          </div>
        </div>
        <!-- edit form column -->

        <div class="col-md-8 personal-info">
          <form action="<?= BASE_URL_ADMIN . '?act=sua-thong-tin-tai-khoan-admin' ?>" method="POST">
            <?php if (isset($_SESSION['mess'])) { ?>
              <div class="alert alert-info alert-dismissable">
                <a href="" class="panel-close close" data-dismiss="alert"></a>
                <i class="fa fa-coffee"></i>
                <?= $_SESSION['mess'] ?>
                <?php unset($_SESSION['mess']); ?>
              </div>
            <?php } ?>
            <input type="text" name="tai_khoan_id" id="" value="<?= $thongTin['id'] ?>" hidden>


            <h3>Thông tin cá nhân</h3>
            <div class="form-group">
              <label class="col-lg-3 control-label">Họ tên:</label>
              <div class="col-lg-12">
                <input class="form-control" type="text" value="<?= $thongTin['ho_ten'] ?>" name="ho_ten">
                <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-12">
                <input class="form-control" type="text" value="<?= $thongTin['email'] ?>" name="email">
                <?php if (isset($_SESSION['errors']['email'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Số điện thoại:</label>
              <div class="col-lg-12">
                <input class="form-control" type="text" value="<?= $thongTin['so_dien_thoai'] ?>" name="so_dien_thoai">
                <?php if (isset($_SESSION['errors']['so_dien_thoai'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Địa chỉ:</label>
              <div class="col-lg-12">
                <input class="form-control" type="text" value="<?= $thongTin['dia_chi'] ?>" name="dia_chi">
                <?php if (isset($_SESSION['errors']['dia_chi'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></p>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Sửa">
              </div>
            </div>

          </form>
          <hr>



          <h3>Đổi mật khẩu</h3>
          <?php if (isset($_SESSION['mess2'])) { ?>
              <div class="alert alert-info alert-dismissable">
                <a href="" class="panel-close close" data-dismiss="alert"></a>
                <i class="fa fa-coffee"></i>
                <?= $_SESSION['mess2'] ?>
                <?php unset($_SESSION['mess2']); ?>
              </div>
            <?php } ?>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-admin' ?>" method="POST">
            <div class="form-group">
              <label class="col-md-3 control-label">Mật khẩu cũ:</label>
              <div class="col-md-12">
                <input class="form-control" name="old_pass" type="password" value="">
                <?php if (isset($_SESSION['errors']['old_pass'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['old_pass'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Mật khẩu mới:</label>
              <div class="col-md-12">
                <input class="form-control" name="new_pass" type="password" value="">
                <?php if (isset($_SESSION['errors']['new_pass'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['new_pass'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Nhập lại mật khẩu mới:</label>
              <div class="col-md-12">
                <input class="form-control" name="confirm_pass" type="password" value="">
                <?php if (isset($_SESSION['errors']['confirm_pass'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['confirm_pass'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Sửa">
              </div>
            </div>
          </form>
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
<script>
  var faqs_row = <?= count($listAnhSanPham); ?>;

  function addfaqs() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><img src="" alt="" style = "width: 50px; height: 50px"></td>';
    html += '<td><input type="file"name ="img_array[]" class="form-control"></td>';
    html += '<td class="mt-10"><button type= "button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }

  function removeRow(rowId, imgId) {
    $('#faqs-row-' + rowId).remove()
    if (imgId !== null) {
      var imgDeleteInput = document.getElementById('img_delete');
      var currentValue = imgDeleteInput.value;
      imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
    }

  }
</script>
<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
</body>


</html>