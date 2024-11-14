<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>
<?php include './views/layout/sidebar.php' ?>
<style>
  .btn-group {
    display: flex;
    gap: 5px;
  }
</style>

<div class="content-wrapper">
  <div class="card">
    <div class="card-header">
      <h1>Quản lý đơn hàng</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row mb-3">
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
              aria-describedby="example1_info">
              <thead class="thead-dark">
                <tr>
                  <th>STT</th>
                  <th>Mã đơn hàng</th>
                  <th>Tên người nhận</th>
                  <th>Số điện thoại</th>
                  <th>Ngày đặt</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listDonHang as $key => $donHang) { ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                          <td><?= $donHang['ma_don_hang'] ?></td>
                          <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                          <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                          <td><?= $donHang['ngay_dat'] ?></td>
                          <td><?= $donHang['tong_tien'] ?></td>
                          <td><?= $donHang['ten_trang_thai'] ?></td>
                          <td>
                      <div class="btn-group">
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                          <button class="btn btn-primary btn-sm">Xem</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                          <button class="btn btn-warning btn-sm">Sửa</button>
                        </a>

                      </div>
                    </td>

                  </tr>
                <?php } ?>


            </table>
          </div>
        </div>

      </div>
    </div>
    <!-- /.card-body -->
  </div>
</div>

<?php include './views/layout/footer.php' ?>
<script src="./asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      responsive: true,
      lengthChange: false,
      autoWidth: false,
      paging: true,
      searching: true
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<style>
  .dataTables_wrapper .dataTables_filter {
    float: right;
    /* Đặt ô tìm kiếm ở bên phải */
  }
</style>
</body>

</html>