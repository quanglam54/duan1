<?php include './views/layout/header.php' ?>
<?php include './views/layout/navbar.php' ?>
<?php include './views/layout/sidebar.php' ?>

<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h1>Quản lý sản phẩm</h1>
        </div>
        <div class="card-body">
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">

                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="<?= BASE_URL_ADMIN . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image" style="width: 500px; height: 500px;">
                            </div>
                            <div class="col-12 product-image-thumbs">
                                <?php foreach($listAnhSanPham as $key=>$anhSP) {?>
                                    <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>">
                                        <img src="<?=BASE_URL_ADMIN . $anhSP['link_hinh_anh']?>" alt="">
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3"> Tên sản phẩm: <b><?= $sanPham['ten_san_pham'] ?></b></h3>
                            <hr>
                            <h4 class="mt-3">Giá tiền: <?= $sanPham['gia_san_pham'] ?></h4>
                            <h4 class="mt-3">Giá khuyến mãi: <?= $sanPham['gia_khuyen_mai'] ?></h4>
                            <h4 class="mt-3">Số lượng: <?= $sanPham['so_luong'] ?></h4>
                            <h4 class="mt-3">Lượt xem: <?= $sanPham['luot_xem'] ?></h4>
                            <h4 class="mt-3">Ngày nhập: <?= $sanPham['ngay_nhap'] ?></h4>
                            <h4 class="mt-3">Danh mục: <?= $sanPham['ten_danh_muc'] ?></h4>
                            <h4 class="mt-3">Trạng thái: <?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></h4>
                            <h4 class="mt-3">Mô tả: <?= $sanPham['mo_ta'] ?></h4>
                        </div>
                    </div>

                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="col-12">
                            <hr>
                            <h2>Bình luận</h2>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Người bình luận</th>
                                        <th>Nội dung</th>
                                        <th>Ngày bình luận</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listBinhLuan as $key => $binhLuan) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id'] ?>"><?= $binhLuan['ho_ten'] ?></a></td>
                                            <td><?= $binhLuan['noi_dung'] ?></td>
                                            <td><?= $binhLuan['ngay_dang'] ?></td>
                                            <td>
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('Bạn có muốn xóa bình luận này không?')">Xóa</button>
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
</div>

<style>
    .dataTables_wrapper .dataTables_filter {
        float: right; /* Đặt ô tìm kiếm ở bên phải */
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