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
            <h1>Quản lý mã giảm giá</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <a href="<?= BASE_URL_ADMIN . '?act=form-them-ma-giam-gia' ?>"><button class="btn btn-success">Thêm
                                mã</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead class="thead-dark">
                                <tr>
                                    <th>STT</th>
                                    <th>Mã giảm giá</th>
                                    <th>Mức giảm giá</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($_SESSION['mess'])) { ?>
                                    <div class="alert alert-info">
                                        <i class="fa fa-coffee"></i>
                                        <?= $_SESSION['mess'] ?>
                                        <?php unset($_SESSION['mess']); ?> <!--Xóa thông báo sau khi hiển thị-->
                                    </div>
                                <?php } ?>

                                <?php foreach ($listMaGiamGia as $key => $maGiamGia) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $maGiamGia['ma_giam_gia'] ?></td>
                                        <td><?= formatPrice($maGiamGia['muc_giam_gia']) ?> VNĐ</td>
                                        <td><?= formatDate($maGiamGia['bat_dau']) ?></td>
                                        <td><?= formatDate($maGiamGia['ket_thuc']) ?></td>
                                        <td>
                                            <a
                                                href="<?= BASE_URL_ADMIN . '?act=form-sua-ma-giam-gia&id_ma_giam_gia=' . $maGiamGia['id'] ?>"><button
                                                    class="btn btn-warning btn-sm">Sửa</button></a>
                                            <a
                                                href="<?= BASE_URL_ADMIN . '?act=xoa-ma-giam-gia&id_ma_giam_gia=' . $maGiamGia['id'] ?>"><button
                                                    class="btn btn-danger btn-sm"
                                                    onclick=" return confirm('Bạn có muốn xóa không?')">Xóa</button>
                                            </a>
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