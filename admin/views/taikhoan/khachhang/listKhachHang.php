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
            <h1>Quản lý tài khoản khách hàng </h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row mb-3">
                
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead class="thead-dark">
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($_SESSION['mess'])) { ?>
                                <div class="alert alert-success">
                                    <?= $_SESSION['mess'] ?>
                                    <?php unset($_SESSION['mess']); ?>
                                    <!--Xóa thông báo sau khi hiển thị-->
                                </div>
                            <?php } ?>

                            <?php foreach ($listKhachHang as $key => $user) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $user['ho_ten'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['so_dien_thoai'] ?></td>
                                    <td><?= $user['trang_thai'] == 1 ? 'Hoạt động' : 'Bị cấm' ?></td>
                                    <td>
                                        <div class="d-flex gap-5">
                                            <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_tai_khoan=' . $user['id'] ?>">
                                                <button class="btn btn-primary btn-sm">Xem</button>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=sua-trang-thai-admin&id_tai_khoan=' . $user['id'] ?>&status=<?= $user['trang_thai'] == 1 ? 2 : 1 ?>"
                                                onclick="return confirm('Bạn có muốn <?= $user['trang_thai'] == 1 ? 'cấm' : 'kích hoạt' ?> tài khoản này không?')">
                                                <button class="btn btn-warning btn-sm">
                                                    <?= $user['trang_thai'] == 1 ? 'Cấm' : 'Kích hoạt' ?>
                                                </button>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_tai_khoan=' . $user['id'] ?>">
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn có muốn reset password không?')">Reset</button>
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