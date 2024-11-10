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
            <h1>Quản lý sản phẩm</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>"><button class="btn btn-success">Thêm
                                mới</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead class="thead-dark">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng</th>
                                    <th>Danh mục</th>
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

                                <?php foreach ($listSanPham as $key => $sanPham) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $sanPham['ten_san_pham'] ?></td>
                                        <td>
                                            <img src="<?= BASE_URL_ADMIN . '../uploads/' . $sanPham['hinh_anh'] ?>" alt=""
                                                style="width: 100%; max-height:100px">

                                        </td>
                                        <td><?= $sanPham['gia_san_pham'] ?></td>
                                        <td><?= $sanPham['so_luong'] ?></td>
                                        <td><?= $sanPham['ten_danh_muc'] ?></td>
                                        <td><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></td>
                                        <td>
                                            <div class="d-flex gap-5">
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=xem-san-pham&id_san_pham=' . $sanPham['id'] ?>"><button
                                                        class="btn btn-primary btn-sm">Xem</button></a>
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>"><button
                                                        class="btn btn-warning btn-sm">Sửa</button></a>
                                                <a
                                                    href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>"><button
                                                        class="btn btn-danger btn-sm"
                                                        onclick=" return confirm('Bạn có muốn xóa không?')">Xóa</button></a>
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
    $(function () {
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