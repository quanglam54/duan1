<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>
<?php include './views/layout/sidebar.php' ?>

<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h1>Quản lý tài khoản khách hàng</h1>
        </div>
        <div class="card-body">
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">

                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="<?= BASE_URL_ADMIN . $khachHang['anh_dai_dien'] ?>" class="user-image" alt="User Image" style="width: 500px; height: 500px;">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3"> Họ tên: <?= $khachHang['ho_ten'] ?></h3>
                            <hr>
                            <h4 class="mt-3">Giới tính: <?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></h4>
                            <h4 class="mt-3">Ngày sinh: <?= $khachHang['ngay_sinh'] ?></h4>
                            <h4 class="mt-3">Email: <?= $khachHang['email'] ?></h4>
                            <h4 class="mt-3">Số điện thoại: <?= $khachHang['so_dien_thoai'] ?></h4>
                            <h4 class="mt-3">Địa chỉ: <?= $khachHang['dia_chi'] ?></h4>
                            <h4 class="mt-3">Trạng thái: <?= $khachHang['trang_thai'] == 1 ? 'Hoạt động' : 'Bị cấm' ?></h4>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr>
                        <h2>Lịch sử bình luận</h2>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listBinhLuan as $key => $binhLuan) { ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><a href="<?= BASE_URL_ADMIN . '?act=xem-san-pham&id_san_pham=' . $binhLuan['san_pham_id'] ?>"><?= $binhLuan['ten_san_pham'] ?></a></td>
                                        <td><?= $binhLuan['noi_dung'] ?></td>
                                        <td><?= $binhLuan['ngay_dang'] ?></td>
                                        <td>
                                            <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có muốn xóa bình luận này không?')">Xem</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>


                       <div class="col-12">
                        <hr>
                        <h2>Lịch sử mua hàng</h2>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
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
                                            <a href=""><button class="btn btn-primary" type="submit" >Xem</button></a>
                                            <a href=""><button class="btn btn-warning" type="submit">Sửa</button></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>


            
            </div>
        </div>
    </div>
</div>

<style>
    .dataTables_wrapper .dataTables_filter {
        float: right;
        /* Đặt ô tìm kiếm ở bên phải */
    }
</style>

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

    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img');
            $('.product-image').prop('src', $image_element.attr('src'));
            $('.product-image-thumb.active').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
</body>

</html>