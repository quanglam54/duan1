<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>
<?php include './views/layout/sidebar.php' ?>

<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h1>Quản lý đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
        </div>
        <div class="card-body">
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <?php
                                if(isset($donHang['trang_thai_id'])){
                                    if($donHang['trang_thai_id'] ===1){
                                        $colorAlerts = 'primary';
                                    }else if($donHang['trang_thai_id'] >=2 && $donHang['trang_thai_id'] <=9){
                                        $colorAlerts = 'warning';
                                    }elseif($donHang['trang_thai_id'] ==10){
                                        $colorAlerts = 'success';
                                    }else{
                                        $colorAlerts = 'danger';
                                    }

                                }else{
                                    $colorAlerts = 'danger';

                                }
                            ?>
                            <div class="alert alert-<?=$colorAlerts?>">Đơn hàng: <?= $donHang['ten_trang_thai']?></div>
                        </div>
                        <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                <i class="fas fa-glasses"></i> Shop kính mắt LML
                                    <small class="float-right">Ngày đặt: <?= formatDate( $donHang['ngay_dat']); ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Thông tin người đặt
                                <address>
                                    <strong><?= $donHang['ho_ten'] ?></strong><br>
                                    Email: <?= $donHang['email'] ?><br>
                                    Số điện thoại: <?= $donHang['so_dien_thoai'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Người nhận
                                <address>
                                    <strong><?= $donHang['ten_nguoi_nhan'] ?></strong><br>
                                    Email: <?= $donHang['email_nguoi_nhan'] ?><br>
                                    Số điện thoại: <?= $donHang['sdt_nguoi_nhan'] ?><br>
                                    Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Thông tin
                                <address>
                                    <strong>Mã đơn hàng: <?= $donHang['ma_don_hang'] ?></strong><br>
                                    Tổng tiền: <?= $donHang['tong_tien'] ?><br>
                                    Ghi chú: <?= $donHang['ghi_chu'] ?><br>
                                    Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                                    Thanh toán: <?= $donHang['ten_phuong_thuc'] ?> <br>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong_tien = 0; ?>
                                        <?php foreach ($sanPhamDonHang as $key => $sanPham) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $sanPham['ten_san_pham'] ?></td>
                                                <td><?= $sanPham['don_gia'] ?></td>
                                                <td><?= $sanPham['so_luong'] ?></td>
                                                <td><?= $sanPham['thanh_tien'] ?></td>
                                            </tr>
                                            <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        <!-- </div> -->
                        <!-- /.row -->

                        <!-- <div class="row"> -->
                            <!-- accepted payments column -->

                            <!-- /.col -->
                            <!-- <div class="col-12"> -->
                                <p class="lead">Ngày đặt hàng: <?= formatDate( $donHang['ngay_dat'] ) ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Thành tiền:</th>
                                            <td><?= $tong_tien ?></td>
                                        </tr>
                                        <tr>
                                            <th>Vận chuyển:</th>
                                            <td>200000</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền:</th>
                                            <td><?= $tong_tien + 200000 ?></td>
                                        </tr>
                                    </table>
                                </div>
                            <!-- </div> -->
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->

                    </div>
                    <!-- /.invoice -->
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
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
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

</body>

</html>